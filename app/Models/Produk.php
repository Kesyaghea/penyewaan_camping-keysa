<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama_product',
        'gambar',
        'deskripsi',
        'stok',
        'harga'
    ];
    public function orders()
    {
        return $this->belongsToMany(Pemesanan::class)->withPivot('jumlah', 'harga', 'total_harga');
    }
}
