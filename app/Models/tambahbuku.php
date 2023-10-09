<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahbuku extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_buku',
        'deskripsi_buku',
        'kode_buku',
        'nama_penulis',
        'nama_penerbit',
        'tanggal_terbit'
    ];
}
