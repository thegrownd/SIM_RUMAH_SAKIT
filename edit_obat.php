<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<h2>Edit Data Obat</h2>

<div class="form-card">

    <form method="post" action="#"> <!-- backend menyusul -->

        <label>Nama Obat</label>
        <input type="text" name="nama" value="Paracetamol" required>

        <label>Stok</label>
        <input type="number" name="stok" value="50" required>

        <label>Satuan</label>
        <input type="text" name="satuan" value="Tablet" required>

        <label>Harga</label>
        <input type="number" name="harga" value="5000" required>

        <button type="submit" class="submit-btn">Simpan Perubahan</button>
        <a href="data_obat.php" class="cancel-btn">Kembali</a>

    </form>

</div>

<?php include '../includes/footer.php'; ?>
