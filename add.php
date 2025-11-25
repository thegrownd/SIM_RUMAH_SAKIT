<?php
// Error handler
$errorMessage = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case '1':
            $errorMessage = 'Semua field wajib diisi dan usia harus berupa angka.';
            break;
        case '2':
            $errorMessage = 'Gagal menyimpan data. Silakan coba lagi.';
            break;
    }
}

// Layout Front-End
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<h2>Tambah Data Pasien</h2>

<?php if ($errorMessage !== ''): ?>
    <div class="alert-danger">
        <?= htmlspecialchars($errorMessage); ?>
    </div>
<?php endif; ?>

<div class="form-card">

    <form method="post" action="../backend/handle_add.php">

        <label>Nama Pasien</label>
        <input type="text" name="name" required>

        <label>Usia</label>
        <input type="number" name="age" required>

        <label>Jenis Kelamin</label>
        <select name="gender" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="address" required></textarea>

        <label>Diagnosa</label>
        <input type="text" name="diagnosis" required>

        <button type="submit" class="submit-btn">Simpan Data</button>
        <a href="index.php" class="cancel-btn">Kembali</a>

    </form>

</div>

<?php include '../includes/footer.php'; ?>
