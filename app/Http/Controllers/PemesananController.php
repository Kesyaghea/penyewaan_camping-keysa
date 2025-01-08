<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data dari model dan menyimpan dalam fariabel $products
        $pemesanan = Pemesanan::all();
        //mengembalikan view 
        return view('pemesanan.index',compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all(); // Mengambil semua data peralatan untuk ditampilkan di form
        return view('pemesanan.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer|min:1',
            'total' => 'required|integer|min:1',
        ]);

        Pemesanan::create($validatedData);
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.show', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.edit', compact('pemesanan', 'produk'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'peralatan_id' => 'required|exists:peralatans,id', // Validasi ID peralatan
            'jumlah' => 'required|integer|min:1',
            'total' => 'required|integer|min:1',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($validatedData);

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus!');

    }
}
