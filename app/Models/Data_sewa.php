<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penyewa',
        'nama_product',
        'gambar',
        'tanggal_sewa',
        'tanggal_pengembalian',
        'total_sewa'
    ];
}
