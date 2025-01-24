<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';

    protected $fillable = [
        'nomor_surat',
        'tanggal',
        'asal',
        'tujuan',
        'perihal',
        'berkas'
    ];
}
