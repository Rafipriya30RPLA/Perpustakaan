<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class penerbit extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function penulis():HasOne{
        return $this->hasOne(Penerbit::class);
    }
}
