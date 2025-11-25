<?php
require_once __DIR__ . '/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'] ?? '';
    $poli = $_POST['poli'] ?? '';
    $str  = $_POST['str'] ?? '';
    $jam  = $_POST['jam'] ?? '';

    if ($nama === '' || $poli === '' || $str === '' || $jam === '') {
        header("Location: ../public/add_dokter.php?error=1");
        exit();
    }

    $query = "INSERT INTO doctors (name, poli, nomor_str, jam_praktik) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Query error: " . $conn->error);
    }

    $stmt->bind_param("ssss", $nama, $poli, $str, $jam);

    if ($stmt->execute()) {
        header("Location: ../public/data_dokter.php?status=success");
    } else {
        header("Location: ../public/add_dokter.php?error=2");
    }

    exit();
}
