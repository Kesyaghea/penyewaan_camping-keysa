<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penyewa',
        'tanggal_pembayaran',
        'total_pembayaran'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function camping()
    {
        return $this->belongsTo(Produk::class);
    }
}
