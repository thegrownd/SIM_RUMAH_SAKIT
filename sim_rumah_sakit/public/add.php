<?php
/**
 * add.php
 *
 * Halaman ini menyediakan formulir untuk menambahkan data pasien baru ke
 * sistem. Dibuat oleh **Anggota Frontend**. Pengguna dapat mengisi
 * informasi pasien seperti nama, usia, jenis kelamin, alamat, dan
 * diagnosa. Setelah formulir dikirim, data akan diproses oleh skrip
 * `handle_add.php` pada layer backend.
 *
 * Kegunaan halaman ini:
 *   - Menyajikan form input dengan validasi sisi klien menggunakan
 *     atribut HTML seperti `required` dan `type="number"`.
 *   - Menampilkan pesan error jika ada kode error yang dikirim
 *     dari backend melalui query string (?error=...).
 */

// Cek apakah ada kode error yang dikirimkan dari backend
$errorMessage = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case '1':
            $errorMessage = 'Semua field wajib diisi dan usia harus berupa angka.';
            break;
        case '2':
            $errorMessage = 'Gagal menyimpan data. Silakan coba lagi.';
            break;
        default:
            $errorMessage = '';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-6K5KA8pCaUxTx4hAaF8qZrjKSBNj7Ovt3d8CVv3H6EjjpFpyMxXdh1w8ZSV19svv" crossorigin="anonymous">
</head>
<body>
<div class="container my-4">
    <h1 class="mb-3">Tambah Data Pasien</h1>
    <?php if ($errorMessage !== ''): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($errorMessage); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="../backend/handle_add.php">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Usia</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="diagnosis" class="form-label">Diagnosa</label>
            <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>