<?php
require_once __DIR__ . '/../backend/patient_model.php';
require_once __DIR__ . '/../backend/dokter_model.php';
require_once __DIR__ . '/../backend/medicine_model.php';

// total pasien
$totalPasien = count(getAllPatients(null));

// total dokter
$totalDokter = count(getAllDoctors());

// total obat
$totalObat = count(getAllMedicines());

// Layout
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<h2>Dashboard</h2>

<div class="dashboard-container">

    <div class="stat-card">
        <h3><?= $totalPasien ?></h3>
        <p>Total Pasien</p>
    </div>

    <div class="stat-card">
        <h3><?= $totalDokter ?></h3>
        <p>Total Dokter</p>
    </div>

    <div class="stat-card">
        <h3><?= $totalObat ?></h3>
        <p>Total Obat</p>
    </div>

</div>

<div class="menu-card-container">

    <a href="index.php" class="menu-card">
        <h4>Data Pasien</h4>
        <p>Kelola data pasien</p>
    </a>

    <a href="data_dokter.php" class="menu-card">
        <h4>Data Dokter</h4>
        <p>Kelola data dokter</p>
    </a>

    <a href="data_obat.php" class="menu-card">
        <h4>Data Obat</h4>
        <p>Kelola data obat</p>
    </a>

</div>

<?php include '../includes/footer.php'; ?>
