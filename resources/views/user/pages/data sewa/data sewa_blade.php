<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Brand Mobil</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include('includes.admin.style')
</head>
<body>
    @include('includes.admin.navbar')

    @include('includes.admin.sidebar')


    <br>
    <br>

    <div class="container-brand mx-15">
        <h2 class="mb-4">CRUD Mobil</h2>

        <!-- Form untuk Menambah Data -->
        <form id="addForm">
            <div class="form-group">
                <label for="mobilName">id:</label>
                <input type="text" class="form-control" id="brandName" name="id" required>

                <label for="mobilName">brand_id:</label>
                <input type="text" class="form-control" id="brandName" name="brand_id" required>

                <label for="mobilName">nama:</label>
                <input type="text" class="form-control" id="brandName" name="nama" required>

                <label for="mobilName">deskripsi:</label>
                <input type="text" class="form-control" id="brandName" name="deskripsi" required>

                <label for="mobilName">harga:</label>
                <input type="text" class="form-control" id="brandName" name="harga" required>

                <label for="brandName">status:</label>
                <input type="text" class="form-control" id="brandName" name="status" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="addBrand()">Tambah Mobil</button>
        </form>

        <!-- Tabel untuk Menampilkan Data -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand_id</th>                    
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="brandTableBody">
                <!-- Data akan ditampilkan di sini -->
            </tbody>
        </table>

        <!-- Form untuk Mengedit atau Menghapus Data -->
        <form id="editForm" style="display:none;">
            <div class="form-group">
                <label for="editBrandName">Nama Brand:</label>
                <input type="text" class="form-control" id="editBrandName" name="editBrandName" required>
            </div>
            <button type="button" class="btn btn-success" onclick="saveChanges()">Simpan Perubahan</button>
            <button type="button" class="btn btn-danger" onclick="deleteBrand()">Hapus Brand</button>
            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Batal</button>
        </form>
    </div>

    <!-- Sertakan file JavaScript Bootstrap dan file jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('includes.admin.script')

    <script>
        // Logika JavaScript untuk menangani CRUD akan ditambahkan di sini
    </script>
</body>
</html>
