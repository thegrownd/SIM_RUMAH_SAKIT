<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<h2>Tambah Data Dokter</h2>

<div class="form-card">

    <form method="post" action="../backend/handle_add_dokter.php">

        <label>Nama Dokter</label>
        <input type="text" name="nama" required>

        <label>Poli</label>
        <input type="text" name="poli" required>

        <label>Nomor STR</label>
        <input type="text" name="str" required>

        <label>Jam Praktik</label>
        <input type="text" name="jam" required>

        <button type="submit" class="submit-btn">Simpan Data</button>
        <a href="data_dokter.php" class="cancel-btn">Kembali</a>

    </form>

</div>

<?php include '../includes/footer.php'; ?>
