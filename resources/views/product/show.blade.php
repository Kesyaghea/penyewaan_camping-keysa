<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>    
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen">

    <div class="container mx-auto p-8">
        <!-- Heading -->
        <h1 class="text-4xl font-bold text-gray-800 text-center mb-10">Detail Produk</h1>

        <!-- Card Container -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden flex flex-col md:flex-row mb-10">
            <!-- Product Image -->
            <div class="md:w-1/2 w-full bg-gradient-to-tr from-blue-500 to-purple-500">
                <img src="{{ Storage::url($produk->gambar) }}" 
                     alt="{{ $produk->nama_product }}" 
                     class="w-full h-full object-cover p-4">
            </div>

            <!-- Product Details -->
            <div class="md:w-1/2 w-full p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-3xl font-bold text-purple-700">{{ $produk->nama_product }}</h2>
                    <p class="text-gray-600 mt-4 leading-relaxed">{{ $produk->deskripsi }}</p>
                    
                    <!-- Price -->
                    <div class="text-2xl font-extrabold text-green-600 mt-6">
                        Rp {{ number_format($produk->harga, 2, ',', '.') }}
                    </div>

                    <!-- Stock -->
                    <div class="text-sm text-gray-500 mt-2">
                        <strong>Stok:</strong> <span class="text-gray-700">{{ $produk->stok }} unit</span>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('produk.index') }}" 
                       class="flex items-center justify-center bg-blue-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                    <a href="{{ route('produk.edit', $produk->id) }}" 
                       class="flex items-center justify-center bg-yellow-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="flex items-center justify-center bg-red-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-red-600 transform hover:scale-105 transition-all duration-300"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            <i class="fas fa-trash-alt mr-2"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer atau Keterangan Tambahan -->
        <footer class="text-center text-gray-600 mt-10">
            
        </footer>
    </div>

</body>
</html>