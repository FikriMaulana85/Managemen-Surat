<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function suratmasuk()
    {
        return $this->belongsTo(Suratmasuk::class, 'id_suratmasuk');
    }
}
