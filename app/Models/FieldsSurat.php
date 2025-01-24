<?php

namespace App\Models;

use App\Enums\TypeFieldSurat;
use Illuminate\Database\Eloquent\Model;

class FieldsSurat extends Model
{
    protected $table = 'fields_surat';

    protected $fillable = [
        'data_id',
        'nama',
        'alias',
        'tipe',
    ];


    public function data()
    {
        return $this->belongsTo(Data::class, 'data_id', 'id');
    }
}
