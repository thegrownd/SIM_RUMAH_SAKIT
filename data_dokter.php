<?php
// BACKEND BELUM ADA, jadi sementara pakai array kosong
$doctors = [];

// Layout
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<h2>Data Dokter</h2>

<a href="add_dokter.php" class="btn-success add-btn">+ Tambah Dokter</a>

<table class="custom-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Dokter</th>
            <th>Poli</th>
            <th>Nomor STR</th>
            <th>Jam Praktik</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($doctors)): ?>
            <?php foreach ($doctors as $d): ?>
                <tr>
                    <td><?= $d['id']; ?></td>
                    <td><?= htmlspecialchars($d['nama']); ?></td>
                    <td><?= htmlspecialchars($d['poli']); ?></td>
                    <td><?= htmlspecialchars($d['str']); ?></td>
                    <td><?= htmlspecialchars($d['jam']); ?></td>

                    <td>
                        <a href="edit_dokter.php?id=<?= $d['id']; ?>" class="btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="6" class="no-data">Belum ada data dokter.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
