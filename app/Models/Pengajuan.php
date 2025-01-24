<?php

namespace App\Models;

use App\Enums\PengajuanStatus;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        'jenis_surat_id',
        'user_id',
        'telepon',
        'tanggal_pengajuan',
        'ktp',
        'kk',
        'status',
        'berkas_diajukan',
        'isi_surat',
        'berkas_selesai'
    ];

    protected $casts = [
        'isi_surat' => 'array',
        'status'=> PengajuanStatus::class
    ];

    // Di model Pengajuan
    public function jenisSurat()
    {
        return $this->belongsTo(Data::class, 'jenis_surat_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getKtpPathAttribute()
    {
        return $this->ktp ? asset('storage/' . $this->ktp) : null;
    }

    public function getKkPathAttribute()
    {
        return $this->kk ? asset('storage/' . $this->kk) : null;
    }

    public function getIsiSuratAttribute($value)
    {
        return json_decode($value, true);
    }
}
