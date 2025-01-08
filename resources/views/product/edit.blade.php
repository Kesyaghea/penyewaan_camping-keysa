<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title>Edit Produk</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Edit Produk</h1>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Nama Barang:</label>
                <input type="text" name="nama_product" value="{{ $produk->nama_product }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Gambar:</label>
                <input type="file" name="gambar" class="w-full p-2 border border-gray-300 rounded mt-1">
                @if($produk->gambar)
                    <p class="text-sm text-gray-500 mt-1">Gambar saat ini: <a href="{{ $produk->gambar }}" target="_blank" class="text-blue-500 underline">{{ $produk->gambar }}</a></p>
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Deskripsi:</label>
                <textarea name="deskripsi" class="w-full p-2 border border-gray-300 rounded mt-1">{{ $produk->deskripsi }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Stok:</label>
                <input type="text" name="stok" value="{{ $produk->stok }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Harga:</label>
                <input type="text" name="harga" value="{{ $produk->harga }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
               
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
