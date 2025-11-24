<?php 
require_once __DIR__ . '/../backend/patient_model.php';

// Search handling
$searchQuery = $_GET['q'] ?? null;
$patients = getAllPatients($searchQuery);

// Status message
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
    }
}

// === MULAI FRONTEND LAYOUT ===
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<h2>Data Pasien</h2>

<?php if ($statusMessage !== ''): ?>
    <div class="alert-success">
        <?php echo htmlspecialchars($statusMessage); ?>
    </div>
<?php endif; ?>

<!-- Form Pencarian -->
<form method="get" class="form-search">
    <input type="text" name="q" placeholder="Cari nama atau diagnosa..." 
           value="<?php echo htmlspecialchars($searchQuery ?? ''); ?>">
    <button type="submit" class="btn-primary">Cari</button>
    <a href="index.php" class="btn-secondary">Reset</a>
</form>

<!-- Tombol Tambah -->
<a href="add.php" class="btn-success add-btn">+ Tambah Pasien</a>

<!-- TABEL DATA -->
<table class="custom-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Diagnosa</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($patients)): ?>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= $patient['id']; ?></td>
                    <td><?= htmlspecialchars($patient['name']); ?></td>
                    <td><?= htmlspecialchars($patient['age']); ?></td>
                    <td><?= htmlspecialchars($patient['gender']); ?></td>
                    <td><?= htmlspecialchars($patient['address']); ?></td>
                    <td><?= htmlspecialchars($patient['diagnosis']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $patient['id']; ?>" class="btn-primary btn-sm">Edit</a>

                        <a onclick="confirmDelete('delete.php?id=<?= $patient['id']; ?>')" 
                           class="btn-danger btn-sm" style="cursor:pointer;">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="7" class="no-data">Tidak ada data pasien.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- POPUP KONFIRMASI HAPUS -->
<div class="popup-overlay" id="deletePopup">
    <div class="popup-box">
        <h3>Yakin ingin menghapus?</h3>
        <div class="popup-actions">
            <a id="confirmDeleteBtn" class="popup-btn popup-btn-danger">Hapus</a>
            <a class="popup-btn popup-btn-cancel" onclick="closePopup()">Batal</a>
        </div>
    </div>
</div>

<!-- SCRIPT POPUP -->
<script>
function confirmDelete(url) {
    document.getElementById('deletePopup').style.display = 'flex';
    document.getElementById('confirmDeleteBtn').href = url;
}

function closePopup() {
    document.getElementById('deletePopup').style.display = 'none';
}
</script>

<?php include '../includes/footer.php'; ?>
