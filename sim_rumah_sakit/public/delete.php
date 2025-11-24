<?php
/**
 * delete.php
 *
 * Halaman ini menampilkan konfirmasi sebelum menghapus data pasien dari
 * sistem. Dibuat oleh **Anggota Frontend**. Pengguna harus memilih
 * apakah ingin menghapus data pasien tertentu atau membatalkan
 * penghapusan. Keputusan pengguna kemudian dikirimkan ke skrip
 * `handle_delete.php` pada layer backend.
 *
 * Kegunaan halaman ini:
 *   - Mengambil ID pasien dari query string untuk menampilkan nama
 *     pasien yang akan dihapus.
 *   - Mencegah penghapusan tanpa konfirmasi dengan menampilkan pilihan
 *     "ya" atau "tidak".
 */

require_once __DIR__ . '/../backend/patient_model.php';

// Periksa parameter ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$id = (int)$_GET['id'];

// Ambil data pasien untuk menampilkan namanya
$patient = getPatientById($id);
if ($patient === null) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-6K5KA8pCaUxTx4hAaF8qZrjKSBNj7Ovt3d8CVv3H6EjjpFpyMxXdh1w8ZSV19svv" crossorigin="anonymous">
</head>
<body>
<div class="container my-4">
    <h1 class="mb-3">Hapus Data Pasien</h1>
    <div class="alert alert-warning" role="alert">
        Apakah Anda yakin ingin menghapus pasien <strong><?php echo htmlspecialchars($patient['name']); ?></strong>?
    </div>
    <form method="post" action="../backend/handle_delete.php?id=<?php echo $id; ?>">
        <button type="submit" name="confirm" value="yes" class="btn btn-danger">Ya, Hapus</button>
        <button type="submit" name="confirm" value="no" class="btn btn-secondary">Tidak</button>
    </form>
</div>
</body>
</html>