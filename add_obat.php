<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<h2>Tambah Data Obat</h2>

<div class="form-card">

    <form method="post" action="../backend/handle_add_obat.php">

        <label>Nama Obat</label>
        <input type="text" name="nama" required>

        <label>Stok</label>
        <input type="number" name="stok" required>

        <label>Satuan</label>
        <input type="text" name="satuan" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <button type="submit" class="submit-btn">Simpan Data</button>
        <a href="data_obat.php" class="cancel-btn">Kembali</a>

    </form>

</div>

<?php include '../includes/footer.php'; ?>
