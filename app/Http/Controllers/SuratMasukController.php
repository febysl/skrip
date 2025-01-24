<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function kelolaSuratMasuk(Request $request)
    {
        // Mengambil semua data surat masuk dari model
        if ($request->has('search')) {
            $search = $request->query('search');
            $surat = SuratMasuk::where('nomor_surat', 'like', '%' . $search . '%')
                ->orWhere('asal', 'like', '%' . $search . '%')
                ->orWhere('tujuan', 'like', '%' . $search . '%')
                ->orWhere('perihal', 'like', '%' . $search . '%')
                ->get();
        } else {
            $surat = SuratMasuk::all();
        }
        return view('kelolaSuratMasuk', ['surat' => $surat]);
    }

    public function suratMasuk()
    {
        // Mengambil semua data surat masuk dari model
        $surat = SuratMasuk::all();
        return view('suratMasuk', ['surat' => $surat]);
    }

    public function store(Request $request)
    {
        // Melakukan validasi data yang diinput
        $valid = $request->validate([
            'nomor_surat' => 'required|max:255',
            'tanggal' => 'required|date',
            'asal' => 'required|max:255',
            'tujuan' => 'required|max:255',
            'perihal' => 'required|max:1000',
            'berkas' => 'required|file|mimes:pdf,doc,docx|max:2048', // Hanya menerima file PDF, Word (.doc, .docx), maksimum 2MB
        ]);

        // Simpan file
        $berkasFileName = null;
        if ($request->hasFile('berkas')) {
            $berkasFile = $request->file('berkas');
            $berkasFileName = time() . '_berkas_' . $berkasFile->getClientOriginalName();
            $berkasFile->storeAs('uploads', $berkasFileName, 'public'); // Simpan di disk 'public'
        }

        // Menyimpan data ke database
        SuratMasuk::create([
            'nomor_surat' => $valid['nomor_surat'],
            'tanggal' => $valid['tanggal'],
            'asal' => $valid['asal'],
            'tujuan' => $valid['tujuan'],
            'perihal' => $valid['perihal'],
            'berkas' => $berkasFileName,
        ]);

        // Setelah klik daftar maka kembali lagi ke halaman daftar
        return redirect()->route('surat.kelolaSuratMasuk')->with('success', 'Pendaftaran Berhasil!');
    }

    public function destroy($id)
    {
        try {
            // Temukan data berdasarkan ID
            $surat = SuratMasuk::findOrFail($id);

            // Hapus file berkas jika ada
            if ($surat->berkas && Storage::disk('public')->exists('uploads/' . $surat->berkas)) {
                Storage::disk('public')->delete('uploads/' . $surat->berkas);
            }

            // Hapus data dari database
            $surat->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('surat.kelolaSuratMasuk')->with('success', 'Data surat berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('surat.kelolaSuratMasuk')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function update(Request $request, $id)
{
    // Validasi data
    $valid = $request->validate([
        'nomor_surat' => 'required|max:255',
        'tanggal' => 'required|date',
        'asal' => 'required|max:255',
        'tujuan' => 'required|max:255',
        'perihal' => 'required|max:1000',
        'berkas' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'template' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validasi untuk template jika ada
    ]);

    // Temukan surat berdasarkan ID
    $surat = SuratMasuk::findOrFail($id);

    // Menyimpan berkas baru jika ada
    if ($request->hasFile('berkas')) {
        // Hapus berkas lama jika ada
        if ($surat->berkas && Storage::disk('public')->exists('uploads/' . $surat->berkas)) {
            Storage::disk('public')->delete('uploads/' . $surat->berkas);
        }

        // Simpan berkas baru
        $berkasFile = $request->file('berkas');
        $berkasFileName = time() . '_berkas_' . $berkasFile->getClientOriginalName();
        $berkasFile->storeAs('uploads', $berkasFileName, 'public');
        $valid['berkas'] = $berkasFileName;
    } else {
        // Jika tidak ada berkas baru, gunakan berkas lama
        $valid['berkas'] = $surat->berkas;
    }

    // Menyimpan template baru jika ada
    if ($request->hasFile('template')) {
        // Simpan file template
        $templateFile = $request->file('template');
        $templateFileName = time() . '_template_' . $templateFile->getClientOriginalName();
        $templateFile->storeAs('uploads', $templateFileName, 'public');
        $valid['template'] = $templateFileName;
    }

    // Update data surat masuk
    $surat->update([
        'nomor_surat' => $valid['nomor_surat'],
        'tanggal' => $valid['tanggal'],
        'asal' => $valid['asal'],
        'tujuan' => $valid['tujuan'],
        'perihal' => $valid['perihal'],
        'berkas' => $valid['berkas'],
        'template' => $valid['template'] ?? $surat->template,  // Menyimpan template baru jika ada, jika tidak tetap menggunakan template lama
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('surat.kelolaSuratMasuk')->with('success', 'Data surat berhasil diupdate.');
}



}
