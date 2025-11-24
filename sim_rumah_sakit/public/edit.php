<?php
/**
 * edit.php
 *
 * Halaman untuk mengedit data pasien yang telah ada. Dibuat oleh
 * **Anggota Frontend**. Pada halaman ini, data lama pasien akan
 * ditampilkan di dalam formulir sehingga pengguna dapat mengubahnya.
 * Ketika formulir dikirim, data akan diproses oleh skrip
 * `handle_update.php` di layer backend.
 *
 * Kegunaan halaman ini:
 *   - Mengambil ID pasien dari query string lalu mendapatkan data pasien
 *     melalui fungsi `getPatientById()` dari model.
 *   - Menampilkan pesan error jika ada masalah saat validasi atau update.
 *   - Menyediakan formulir yang sudah terisi (prefilled) dengan data
 *     pasien agar pengguna dapat melakukan perubahan.
 */

require_once __DIR__ . '/../backend/patient_model.php';

// Periksa apakah parameter ID valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$id = (int)$_GET['id'];

// Ambil data pasien berdasarkan ID
$patient = getPatientById($id);
if ($patient === null) {
    // Jika data tidak ditemukan, kembali ke halaman utama
    header('Location: index.php');
    exit();
}

// Cek apakah ada kode error yang diterima dari skrip update
$errorMessage = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case '1':
            $errorMessage = 'Semua field wajib diisi dan usia harus berupa angka.';
            break;
        case '2':
            $errorMessage = 'Gagal memperbarui data. Silakan coba lagi.';
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
    <title>Edit Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-6K5KA8pCaUxTx4hAaF8qZrjKSBNj7Ovt3d8CVv3H6EjjpFpyMxXdh1w8ZSV19svv" crossorigin="anonymous">
</head>
<body>
<div class="container my-4">
    <h1 class="mb-3">Edit Data Pasien</h1>
    <?php if ($errorMessage !== ''): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($errorMessage); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="../backend/handle_update.php?id=<?php echo $id; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($patient['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Usia</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($patient['age']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" <?php echo ($patient['gender'] === 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($patient['gender'] === 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="3" required><?php echo htmlspecialchars($patient['address']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="diagnosis" class="form-label">Diagnosa</label>
            <input type="text" class="form-control" id="diagnosis" name="diagnosis" value="<?php echo htmlspecialchars($patient['diagnosis']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>