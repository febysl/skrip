<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class DataController extends Controller
{
    public function data(Request $request)
    {
        // Mengambil semua data dari model
        if ($request->has('search')) {
            $data = Data::where('nama', 'like', '%' . $request->query('search') . '%')->get();
        } else {
            $data = Data::all();
        }
        return view('dataSurat', ['data' => $data]);
    }

    public function jenis()
    {
        // Mengambil semua data dari model
        $data = Data::all();
        return view('jenis', ['data' => $data]);
    }

    public function index()
    {
        // Mengambil jumlah total jenis surat dari tabel jenis_surat
        $totalJenisSurat = Data::count();

        // Mengambil semua data pengajuan dari tabel pengajuan
        $pengajuan = Pengajuan::all();

        // Mengirimkan kedua data ke view
        return view('dashboardAdmin', compact('totalJenisSurat', 'pengajuan'));
    }


    public function store(Request $request)
    {
        try {
            // Melakukan validasi data yang diinput
            $valid = $request->validate([
                'nama' => 'required|max:255| unique:data,nama', 
                'template' => 'required|file|mimes:pdf,doc,docx|max:2048', // Maksimum 2MB
                'deskripsi' => 'required|max:1000',
            ]);

            // Simpan file template
            $templateFileName = null;
            if ($request->hasFile('template')) {
                $templateFile = $request->file('template');
                $templateFileName = time() . '_template_' . $templateFile->getClientOriginalName();
                $templateFile->storeAs('uploads', $templateFileName, 'public'); // Simpan di disk 'public'
            }
            $templateProcesor = new TemplateProcessor(storage_path('app/public/uploads/' . $templateFileName));

            $data = [
                'nama' => $valid['nama'],
                'template' => $templateFileName,
                'deskripsi' => $valid['deskripsi'],
            ];

            $fields = $templateProcesor->getVariables();

            // return view instead of redirect
            return view('fields.create', ['fields' => $fields, 'data' => $data]);
            
        } catch (\Throwable $th) {
            return redirect()->route('data.data')->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Temukan data berdasarkan ID
            $data = Data::findOrFail($id);

            // Hapus file template jika ada
            if ($data->template && Storage::disk('public')->exists('uploads/' . $data->template)) {
                Storage::disk('public')->delete('uploads/' . $data->template);
            }

            // Hapus data dari database
            $data->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data.data')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('data.data')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Melakukan validasi data yang diinput
            $valid = $request->validate([
                'nama' => 'required|max:255', 
                'template' => 'file|mimes:pdf,doc,docx|max:2048', // Maksimum 2MB
                'deskripsi' => 'max:1000',
            ]);

            // Simpan file template
            $templateFileName = null;
            if ($request->hasFile('template')) {
                $templateFile = $request->file('template');
                $templateFileName = time() . '_template_' . $templateFile->getClientOriginalName();
                $templateFile->storeAs('uploads', $templateFileName, 'public'); // Simpan di disk 'public'
                $templateProcesor = new TemplateProcessor(storage_path('app/public/uploads/' . $templateFileName));
    
                $data = [
                    'id' => $id,
                    'nama' => $valid['nama'],
                    'template' => $templateFileName,
                    'deskripsi' => $valid['deskripsi'],
                ];
    
                $fields = $templateProcesor->getVariables();
    
                // return view instead of redirect
                return view('fields.create', ['fields' => $fields, 'data' => $data]);
            } else {
                $data = Data::findOrFail($id);
                $data->update([
                    'nama' => $valid['nama'],
                    'deskripsi' => $valid['deskripsi'],
                ]);
                return redirect()->route('data.data')->with('success', 'Data updated successfully.');
            }
            
        } catch (\Throwable $th) {
            return redirect()->route('data.data')->with('error', $th->getMessage());
        }
    }

    // public function create()
    // {
    //     $jenisSurat = Data::pluck('nama', 'id'); // Ambil kolom nama dan id
    //     return view('pelayanan', compact('jenisSurat')); // Kirim data ke view
    // }
}
