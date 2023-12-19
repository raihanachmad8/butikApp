<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    //Relasi tabel Produk
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
