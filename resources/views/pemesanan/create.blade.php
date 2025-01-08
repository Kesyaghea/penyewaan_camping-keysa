<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pemesanan</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Buat Pemesanan</h1>

        <form action="{{ route('pemesanan.store') }}" method="POST">
            @csrf

            <!-- Nama Pemesan -->
            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
            </div>

            <!-- Pilih Produk dan Kuantitas -->
            <div class="mb-3">
                <label for="products" class="form-label">Pilih Produk</label>
                <select name="products[]" id="products" class="form-control" multiple required>
                
                @foreach($produk as $barang)
                  <option value="{{ $barang->id }}" data-harga="{{ $barang->harga }}">
                     {{ $barang->nama_product }} - Rp {{ number_format($barang->harga, 2) }}
                   </option>
               @endforeach

                </select>
            </div>

            <div id="selected-products" class="mb-3">
                <!-- List Produk yang Dipilih -->
            </div>

            <!-- Total Harga Pemesanan -->
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Buat Pemesanan</button>
        </form>
    </div>

    <script>
        // Menambahkan event listener untuk memperbarui total harga dan menampilkan produk yang dipilih
        document.getElementById('products').addEventListener('change', function() {
            const selectedOptions = Array.from(this.selectedOptions);
            const selectedProductsContainer = document.getElementById('selected-products');
            let totalHarga = 0;

            // Kosongkan tampilan produk yang dipilih sebelumnya
            selectedProductsContainer.innerHTML = '';

            selectedOptions.forEach(option => {
                const productId = option.value;
                const productName = option.textContent;
                const productPrice = parseFloat(option.getAttribute('data-price'));
                const quantity = 1; // Default quantity (user bisa menambahnya)

                // Menampilkan produk yang dipilih beserta kuantitas dan harga
                selectedProductsContainer.innerHTML += `
                    <div class="selected-product mb-2" data-product-id="${productId}">
                        <span>${productName}</span>
                        <input type="number" class="form-control quantity" value="${quantity}" data-price="${productPrice}" min="1" style="width: 80px; display: inline-block;">
                        <span> x Rp ${productPrice.toFixed(2)} = Rp <span class="product-total">${(productPrice * quantity).toFixed(2)}</span></span>
                    </div>
                `;

                totalHarga += productPrice * quantity;
            });

            // Update total harga
            document.getElementById('total_harga').value = 'Rp ' + totalHarga.toFixed(2);
        });

        // Event listener untuk menangani perubahan kuantitas
        document.getElementById('selected-products').addEventListener('input', function(event) {
            if (event.target.classList.contains('quantity')) {
                const quantity = parseInt(event.target.value);
                const price = parseFloat(event.target.getAttribute('data-price'));
                const totalElement = event.target.parentElement.querySelector('.product-total');
                const totalPrice = price * quantity;
                totalElement.textContent = totalPrice.toFixed(2);

                // Update total harga
                let totalHarga = 0;
                document.querySelectorAll('.product-total').forEach(productTotal => {
                    totalHarga += parseFloat(productTotal.textContent);
                });

                document.getElementById('total_harga').value = 'Rp ' + totalHarga.toFixed(2);
            }
        });
    </script>
</body>
</html>
