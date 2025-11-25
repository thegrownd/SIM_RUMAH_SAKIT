<?php
// Karena backend obat belum ada, sementara pakai array kosong
$obat = [];

// Layout
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<h2>Data Obat</h2>

<a href="add_obat.php" class="btn-success add-btn">+ Tambah Obat</a>

<table class="custom-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Obat</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($obat)): ?>
            <?php foreach ($obat as $o): ?>
                <tr>
                    <td><?= $o['id']; ?></td>
                    <td><?= htmlspecialchars($o['nama']); ?></td>
                    <td><?= htmlspecialchars($o['stok']); ?></td>
                    <td><?= htmlspecialchars($o['satuan']); ?></td>
                    <td><?= htmlspecialchars($o['harga']); ?></td>

                    <td>
                        <a href="edit_obat.php?id=<?= $o['id']; ?>" class="btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="6" class="no-data">Belum ada data obat.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
