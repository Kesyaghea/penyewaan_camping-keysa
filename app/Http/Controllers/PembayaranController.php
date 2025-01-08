<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembayaran::all();
        return view('pembayaran.index',compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('pembayaran.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_penyewa' => 'string',
            'tanggal_pembayaran' => 'required|date',
            'total_pembayaran' => 'required|numeric|min:1000',
        ]);

        // Simpan pembayaran
        $pembayaran = Pembayaran::create($validatedData);

        return response()->json(['message' => 'Pembayaran berhasil disimpan', 'data' => $pembayaran], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembayaran $pembayaran)
    {
        //
    }
}
