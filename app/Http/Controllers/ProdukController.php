<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mengambil semua data dari model dan menyimpan dalam fariabel $products
        $produk = Produk::all();
        //mengembalikan view 
        return view('product.index',compact('produk'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengembalikan ke view product
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('gambar', 'public');
        }

        Produk::create([
            'nama_product' => $request->nama_product,
            'gambar' => $imagePath,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('product.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('product.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nama_product' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($validatedData);
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil dihapus');
    }
}
