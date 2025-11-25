<?php
require_once __DIR__ . '/../backend/patient_model.php';

// validasi ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}
$id = (int)$_GET['id'];

// ambil data pasien
$patient = getPatientById($id);
if ($patient === null) {
    header('Location: index.php?status=not_found');
    exit();
}

// error message
$errorMessage = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case '1':
            $errorMessage = 'Semua field wajib diisi dan usia harus berupa angka.';
            break;
        case '2':
            $errorMessage = 'Gagal memperbarui data. Silakan coba lagi.';
            break;
    }
}

// load UI layout
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<h2>Edit Data Pasien</h2>

<?php if ($errorMessage !== ''): ?>
    <div class="alert-danger">
        <?= htmlspecialchars($errorMessage); ?>
    </div>
<?php endif; ?>

<div class="form-card">

    <form method="post" action="../backend/handle_update.php?id=<?= $id; ?>">

        <label>Nama Pasien</label>
        <input type="text" name="name" value="<?= htmlspecialchars($patient['name']); ?>" required>

        <label>Usia</label>
        <input type="number" name="age" value="<?= htmlspecialchars($patient['age']); ?>" required>

        <label>Jenis Kelamin</label>
        <select name="gender" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" <?= $patient['gender'] === "Laki-laki" ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= $patient['gender'] === "Perempuan" ? 'selected' : '' ?>>Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="address" required><?= htmlspecialchars($patient['address']); ?></textarea>

        <label>Diagnosa</label>
        <input type="text" name="diagnosis" value="<?= htmlspecialchars($patient['diagnosis']); ?>" required>

        <button type="submit" class="submit-btn">Simpan Perubahan</button>
        <a href="index.php" class="cancel-btn">Kembali</a>

    </form>

</div>

<?php include '../includes/footer.php'; ?>
