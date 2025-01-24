<?php

namespace App\Http\Controllers;

use App\Enums\PengajuanStatus;
use App\Models\Data;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class PengajuanControler extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function pelayanan()
    {
        // Mengambil data jenis surat dari model Data
        // $jenisSurat = Data::pluck('nama', 'id'); // Pluck akan mengambil kolom 'nama' sebagai value dan 'id' sebagai key
        $jenisSurat = Data::all();

        // Mengirim data jenis surat ke view
        return view('pelayanan', compact('jenisSurat'));
    }
    public function status()
    {
        // mengambil semua data beasiswa dari model
        $pengajuan = Auth::user()->pengajuan;
        return view('status', ['pengajuan' => $pengajuan]);
    }
    public function admin(Request $request)
    {
        // search data
        if ($request->has('search')) {
            $search = $request->query('search');
            $pengajuan = Pengajuan::whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('jenisSurat', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })->orWhere('telepon', 'like', '%' . $search . '%')
                ->get();
        } else {
            $pengajuan = Pengajuan::all();
        }

        return view('dashboardAdmin', ['pengajuan' => $pengajuan, 'totalJenisSurat' => Data::count(), 'penggunaAktif' =>  User::count()]);
    }
    public function kelolaSurat()
    {
        // mengambil semua data beasiswa dari model
        $pengajuan = Pengajuan::all();
        return view('kelolaSurat', ['pengajuan' => $pengajuan]);
    }
    public function store(Request $request)
    {
        try {
            // Melakukan validasi data yang diinput
            $valid = $request->validate([
                'jenis_surat_id' => 'required',
                'telepon' => 'required|string|min:10|max:15',
                'tanggal_pengajuan' => 'required|date', // Tambahkan validasi bahwa ini harus berupa tanggal
                'ktp' => 'required|file|mimes:pdf,zip,jpg,png,jpeg|max:2048',
                'kk' => 'required|file|mimes:pdf,zip,jpg,png,jpeg|max:2048',
                'isi_surat' => 'required|array',
            ]);

            // Simpan file KTP
            $ktpFileName = null;
            if ($request->hasFile('ktp')) {
                $ktpFile = $request->file('ktp');
                $ktpFileName = time() . '_ktp_' . $ktpFile->getClientOriginalName();
                $ktpFile->storeAs('uploads', $ktpFileName, 'public'); // Simpan di disk 'public'
            }

            // Simpan file KK
            $kkFileName = null;
            if ($request->hasFile('kk')) {
                $kkFile = $request->file('kk');
                $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
                $kkFile->storeAs('uploads', $kkFileName, 'public'); // Simpan di disk 'public'
            }

            // get template path
            $type_template = Data::where('id', $valid['jenis_surat_id'])->first();
            $templatePath = storage_path('app/public/uploads/' . $type_template->template);

            $templateProcessor = new TemplateProcessor($templatePath);
            foreach ($valid['isi_surat'] as $key => $value) {
                $templateProcessor->setValue($key, $value);
            }
            // view file
            $file_name = time() . '_surat_' . Auth::user()->name . '_' . str_replace(' ', '_', $type_template->nama) . '.docx';
            $templateProcessor->saveAs(storage_path('app/public/uploads/' . $file_name));

            // Menyimpan data ke database
            Pengajuan::create([
                'jenis_surat_id' => $valid['jenis_surat_id'],
                'user_id' => Auth::user()->id,
                'telepon' => $valid['telepon'],
                'ktp' => $ktpFileName,
                'kk' => $kkFileName,
                "status" => PengajuanStatus::TERTUNDA->value,
                "tanggal_pengajuan" => $valid['tanggal_pengajuan'],
                "isi_surat" => json_encode($valid['isi_surat']),
                'berkas_diajukan' => $file_name,
            ]);

            return redirect()->route('pengajuan.pelayanan')->with('success', 'Pengajuan surat berhasil!');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Gagal mengunggah file dengan error: ' . $th->getMessage()])->withInput();;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Melakukan validasi data yang diinput
            $valid = $request->validate([
                'telepon' => 'required|string|min:10|max:15',
                'tanggal_pengajuan' => 'required|date', // Tambahkan validasi bahwa ini harus berupa tanggal
                'ktp' => 'nullable|file|mimes:pdf,zip,jpg,png,jpeg|max:2048',
                'kk' => 'nullable|file|mimes:pdf,zip,jpg,png,jpeg|max:2048',
                'isi_surat' => 'required|array',
                'status' => 'required',
            ]);

            // Mengambil data pengajuan berdasarkan ID
            $pengajuan = Pengajuan::findOrFail($id);
            // Menyimpan KTP baru jika ada
            if ($request->hasFile('ktp')) {
                // Hapus file KTP lama jika ada
                if ($pengajuan->ktp && Storage::disk('public')->exists('uploads/' . $pengajuan->ktp)) {
                    Storage::disk('public')->delete('uploads/' . $pengajuan->ktp);
                }
                // Simpan KTP baru
                $ktpFile = $request->file('ktp');
                $ktpFileName = time() . '_ktp_' . $ktpFile->getClientOriginalName();
                $ktpFile->storeAs('uploads', $ktpFileName, 'public');
                $valid['ktp'] = $ktpFileName; // Assign new KTP file name
            } else {
                // Jika tidak ada KTP baru, gunakan yang lama
                $valid['ktp'] = $pengajuan->ktp;
            }

            // Menyimpan KK baru jika ada
            if ($request->hasFile('kk')) {
                // Hapus file KK lama jika ada
                if ($pengajuan->kk && Storage::disk('public')->exists('uploads/' . $pengajuan->kk)) {
                    Storage::disk('public')->delete('uploads/' . $pengajuan->kk);
                }
                // Simpan KK baru
                $kkFile = $request->file('kk');
                $kkFileName = time() . '_kk_' . $kkFile->getClientOriginalName();
                $kkFile->storeAs('uploads', $kkFileName, 'public');
                $valid['kk'] = $kkFileName; // Assign new KK file name
            } else {
                // Jika tidak ada KK baru, gunakan yang lama
                $valid['kk'] = $pengajuan->kk;
            }

            // Mengubah status pengajuan
            $pengajuan->update([
                'telepon' => $valid['telepon'],
                'tanggal_pengajuan' => $valid['tanggal_pengajuan'],
                'ktp' => $valid['ktp'] ?? $pengajuan->ktp,
                'kk' => $valid['kk'] ?? $pengajuan->kk,
                'status' => $valid['status'],
                'isi_surat' => json_encode($valid['isi_surat']),
            ]);

            $template_processor = new TemplateProcessor(storage_path('app/public/uploads/' . $pengajuan->jenisSurat->template));
            foreach ($valid['isi_surat'] as $key => $value) {
                $template_processor->setValue($key, $value);
            }
            // replace the existing file
            $template_processor->saveAs(storage_path('app/public/uploads/' . $pengajuan->berkas_diajukan));


            return redirect()->route('pengajuan.kelolaSurat')->with('success', 'Berhasil mengubah pengajuan!');
        } catch (\Throwable $th) {
            return back()->with(['error' => 'Gagal mengubah pengajuan : ' . $th->getMessage()])->withInput();;
        }
    }

    public function upload_completed_file(Request $request, $id)
    {
        try {
            // Melakukan validasi data yang diinput
            $request->validate([
                'berkas_selesai' => 'required|file|mimes:pdf,zip,docx,doc|max:2048',
            ]);

            // Mengambil data pengajuan berdasarkan ID
            $pengajuan = Pengajuan::findOrFail($id);

            // Simpan file
            $berkasFileName = null;
            if ($request->hasFile('berkas_selesai')) {
                $berkasFile = $request->file('berkas_selesai');
                $berkasFileName = time() . '_berkas_selesai_' . $berkasFile->getClientOriginalName();
                $berkasFile->storeAs('uploads', $berkasFileName, 'public'); // Simpan di disk 'public'

            }

            // Mengubah status pengajuan
            $pengajuan->update([
                'berkas_selesai' => $berkasFileName,
                'status' => PengajuanStatus::SELESAI->value,
            ]);

            return redirect()->route('pengajuan.kelolaSurat')->with('success', 'Berhasil mengunggah berkas!');
        } catch (\Throwable $th) {
            return back()->with(['error' => 'Gagal mengunggah berkas selesai : ' . $th->getMessage()])->withInput();;
        }
    }

    // public function search(Request $request)
    // {
    //     // Mengambil query pencarian dari input
    //     $search = $request->input('search');

    //     // Query untuk mengambil data berdasarkan pencarian
    //     $pengajuan = Pengajuan::when($search, function ($query, $search) {
    //         return $query->where('nama', 'like', '%' . $search . '%')
    //                      ->orWhere('jenis_surat', 'like', '%' . $search . '%')
    //                      ->orWhere('nik', 'like', '%' . $search . '%')
    //                      ->orWhere('telepon', 'like', '%' . $search . '%');
    //     })->get();

    //     // Mengembalikan hasil pencarian ke view
    //     return view('admin', compact('pengajuan'));
    // }


}
