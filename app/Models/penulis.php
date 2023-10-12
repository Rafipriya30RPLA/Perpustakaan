<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penulis extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function penerbit(){
        return $this->belongsTo(penerbit::class, 'id_penerbit');
    }
}

