<?php 
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<aside class="sidebar">
    <ul>
        <li><a href="dashboard.php" class="<?= $currentPage === 'dashboard.php' ? 'active' : '' ?>">Dashboard</a></li>
        <li><a href="index.php" class="<?= $currentPage === 'index.php' ? 'active' : '' ?>">Data Pasien</a></li>
        <li><a href="data_dokter.php" class="<?= $currentPage === 'data_dokter.php' ? 'active' : '' ?>">Data Dokter</a></li>
        <li><a href="data_obat.php" class="<?= $currentPage === 'data_obat.php' ? 'active' : '' ?>">Data Obat</a></li>
    </ul>
</aside>

<div class="content">
