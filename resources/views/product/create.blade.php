<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 mt-5">
        <h1 class="text-3xl font-bold mb-6">Tambah Produk</h1>
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama Barang:</label>
                <input type="text" name="nama_product" class="w-full p-2 border border-gray-300 rounded mt-1 form-control" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Gambar:</label>
                <input type="file" name="gambar" class="w-full p-2 border border-gray-300 rounded mt-1 form-control">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control w-full p-2 border border-gray-300 rounded mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Stok:</label>
                <input type="text" name="stok" class="form-control w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Harga:</label>
                <input type="text" name="harga" class="form-control w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
