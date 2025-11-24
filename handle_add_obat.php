<?php

require_once __DIR__ . '/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama   = $_POST['nama'] ?? '';
    $stok   = $_POST['stok'] ?? '';
    $satuan = $_POST['satuan'] ?? '';
    $harga  = $_POST['harga'] ?? '';

    if ($nama === '' || $stok === '' || $satuan === '' || $harga === '') {
        header('Location: ../public/add_obat.php?error=1');
        exit();
    }

    $sql = "INSERT INTO medicines (name, stock, satuan, harga)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisi", $nama, $stok, $satuan, $harga);

    if ($stmt->execute()) {
        header('Location: ../public/data_obat.php?status=success');
        exit();
    } else {
        header('Location: ../public/add_obat.php?error=2');
        exit();
    }
}

header('Location: ../public/data_obat.php');
exit();
