<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanControler extends Controller
{
    public function admin()
    {
        // mengambil semua data beasiswa dari model
        // $pengajuan = Pengajuan::all();
        return view('dashboardAdmin');
    }
}
