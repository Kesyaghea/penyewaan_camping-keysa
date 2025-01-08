<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <!-- Tambahkan CSS Bootstrap (opsional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pemesanan</h1>

        <!-- Tombol Tambah Barang -->
        <a href="{{ route('pemesanan.create') }}" class="btn btn-primary mb-3">Tambah Barang Yang Ingin Di Pesan</a>

        <!-- Tabel Daftar Barang -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Product</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pemesanan as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->nama_pemesan }}</td>
                        <td>{{ $barang->product}}</td>
                        <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                        <td>{{ $barang->jumlah }}</td>
                        <td>Rp {{ number_format($barang->total, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('pemesanan.show', $barang->id) }}" class="btn btn-info btn-sm">Lanjut Memesan</a>
                            <a href="{{ route('pemesanan.edit', $barang->id) }}" class="btn btn-warning btn-sm">Batal Memesan</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tambahkan JavaScript Bootstrap (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>