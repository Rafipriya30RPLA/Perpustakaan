<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function tambahbuku(){
        return $this->belongsTo(tambahbuku::class, 'id_tambahbuku');
    }
}
