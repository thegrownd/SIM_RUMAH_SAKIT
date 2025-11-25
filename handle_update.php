<?php
/**
 * handle_update.php
 *
 * Skrip ini menangani pembaruan data pasien yang telah ada. File ini
 * dibuat oleh **Anggota Backend 2**. Prosesnya meliputi mengambil ID
 * pasien dari parameter GET, memverifikasi data input dari formulir,
 * kemudian memanggil fungsi `updatePatient()` untuk menyimpan perubahan.
 * Jika berhasil, pengguna diarahkan kembali ke halaman daftar pasien.
 */

require_once __DIR__ . '/patient_model.php';

// Pastikan ID tersedia dan valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ../public/index.php');
    exit();
}
$id = (int)$_GET['id'];

// Proses hanya jika permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $name      = trim($_POST['name'] ?? '');
    $age       = trim($_POST['age'] ?? '');
    $gender    = trim($_POST['gender'] ?? '');
    $address   = trim($_POST['address'] ?? '');
    $diagnosis = trim($_POST['diagnosis'] ?? '');

    // Validasi data
    if ($name === '' || $age === '' || !is_numeric($age) || $gender === '' || $address === '' || $diagnosis === '') {
        // Jika validasi gagal, kembali ke halaman edit dengan pesan error
        header('Location: ../public/edit.php?id=' . $id . '&error=1');
        exit();
    }

    // Lakukan update melalui model
    $result = updatePatient($id, $name, (int)$age, $gender, $address, $diagnosis);
    if ($result) {
        // Berhasil update, arahkan ke daftar pasien
        header('Location: ../public/index.php?status=updated');
        exit();
    } else {
        // Gagal update, kembali ke halaman edit dengan error berbeda
        header('Location: ../public/edit.php?id=' . $id . '&error=2');
        exit();
    }
}

// Jika bukan POST, kembalikan ke daftar pasien
header('Location: ../public/index.php');
exit();