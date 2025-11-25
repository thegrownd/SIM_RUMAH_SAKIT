<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<h2>Edit Data Dokter</h2>

<div class="form-card">

    <form method="post" action="#"> <!-- BACKEND BELUM ADA -->

        <label>Nama Dokter</label>
        <input type="text" name="nama" value="Nama contoh" required>

        <label>Poli</label>
        <input type="text" name="poli" value="Poli contoh" required>

        <label>Nomor STR</label>
        <input type="text" name="str" value="STR123456" required>

        <label>Jam Praktik</label>
        <input type="text" name="jam" value="08:00 - 12:00" required>

        <button type="submit" class="submit-btn">Simpan Perubahan</button>
        <a href="data_dokter.php" class="cancel-btn">Kembali</a>

    </form>

</div>

<?php include '../includes/footer.php'; ?>
