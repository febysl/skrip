<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $fillable = [
        'nama',
        'template',
        'deskripsi',
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'jenis_surat_id');
    }

    public function getTemplatePathAttribute()
    {
        return $this->template ? asset('storage/' . $this->template) : null;
    }

    public function fields()
    {
        return $this->hasMany(FieldsSurat::class, 'data_id');
    }

}
