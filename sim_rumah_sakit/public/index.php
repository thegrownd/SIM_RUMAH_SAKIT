<?php
/**
 * index.php
 *
 * Halaman ini merupakan tampilan utama dari SIM Rumah Sakit. Dibuat oleh
 * **Anggota Frontend**. Halaman ini bertugas menampilkan daftar seluruh
 * pasien yang tersimpan di database dengan tabel responsif. Pengguna
 * dapat melakukan pencarian berdasarkan nama atau diagnosa melalui
 * formulir pencarian yang disediakan. Selain itu, tersedia tautan untuk
 * menambah data pasien baru serta tombol untuk mengedit atau menghapus
 * data pasien.
 *
 * Penjelasan singkat:
 *   - Memanggil fungsi `getAllPatients()` dari layer model untuk
 *     mengambil data pasien.
 *   - Menangani parameter pencarian dari query string (?q=).
 *   - Menampilkan pesan status (sukses/terhapus/diperbarui) yang
 *     dikirim dari backend via query string (?status=...).
 */

require_once __DIR__ . '/../backend/patient_model.php';

// Ambil kata kunci pencarian dari parameter 'q' (jika ada)
$searchQuery = $_GET['q'] ?? null;

// Ambil data pasien menggunakan model. Jika ada kata kunci, data akan disaring.
$patients = getAllPatients($searchQuery);

// Cek apakah ada pesan status dari operasi sebelumnya
$statusMessage = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $statusMessage = 'Data pasien berhasil ditambahkan.';
            break;
        case 'updated':
            $statusMessage = 'Data pasien berhasil diperbarui.';
            break;
        case 'deleted':
            $statusMessage = 'Data pasien berhasil dihapus.';
            break;
        case 'delete_error':
            $statusMessage = 'Terjadi kesalahan saat menghapus data.';
            break;
        default:
            $statusMessage = '';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Rumah Sakit – Daftar Pasien</title>
    <!-- Memuat Bootstrap dari CDN untuk tampilan yang rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-6K5KA8pCaUxTx4hAaF8qZrjKSBNj7Ovt3d8CVv3H6EjjpFpyMxXdh1w8ZSV19svv" crossorigin="anonymous">
</head>
<body>
<div class="container my-4">
    <h1 class="mb-3">Data Pasien</h1>

    <?php if ($statusMessage !== ''): ?>
        <div class="alert alert-success" role="alert">
            <?php echo htmlspecialchars($statusMessage); ?>
        </div>
    <?php endif; ?>

    <!-- Formulir pencarian -->
    <form class="row g-3 mb-3" method="get">
        <div class="col-sm-8 col-md-6">
            <input type="text" name="q" class="form-control" placeholder="Cari nama atau diagnosa" value="<?php echo htmlspecialchars($searchQuery ?? ''); ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
        <div class="col-auto">
            <a href="index.php" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Tombol tambah data pasien -->
    <div class="mb-3">
        <a href="add.php" class="btn btn-success">Tambah Data Pasien</a>
    </div>

    <!-- Tabel data pasien -->
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Usia</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Diagnosa</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($patients)): ?>
                <?php foreach ($patients as $patient): ?>
                    <tr>
                        <td><?php echo $patient['id']; ?></td>
                        <td><?php echo htmlspecialchars($patient['name']); ?></td>
                        <td><?php echo htmlspecialchars($patient['age']); ?></td>
                        <td><?php echo htmlspecialchars($patient['gender']); ?></td>
                        <td><?php echo htmlspecialchars($patient['address']); ?></td>
                        <td><?php echo htmlspecialchars($patient['diagnosis']); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $patient['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $patient['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pasien.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>