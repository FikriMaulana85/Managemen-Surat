<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }

    public function jenis_surat()
    {
        return $this->belongsTo(Jenissurat::class, 'id_jenis_surat');
    }

    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class);
    }
}
