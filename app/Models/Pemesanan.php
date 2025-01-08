<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'product',
        'harga',
        'jumlah',
        'total_harga'
    ];
     // Relasi Many-to-Many dengan produk
     public function produks()
     {
         return $this->belongsToMany(produk::class)->withPivot('jumlah', 'harga', 'total_harga');
     }
 
     // Menghitung total harga pemesanan
     public function getTotalPriceAttribute()
     {
         return $this->produk->sum(function ($produk) {
             return $produk->pivot->jumlah * $produk->pivot->harga;
         });
     }
}
       

