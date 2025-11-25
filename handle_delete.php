<?php
/**
 * handle_delete.php
 *
 * Skrip ini menangani penghapusan data pasien dari database. Skrip ini
 * dibuat oleh **Anggota Backend 2**. ID pasien diterima melalui
 * parameter GET, dan konfirmasi pengguna dikirim melalui POST dari
 * halaman frontend `delete.php`. Jika konfirmasi adalah 'yes', fungsi
 * `deletePatient()` dipanggil untuk menghapus data. Setelah itu,
 * pengguna diarahkan kembali ke halaman daftar.
 */

require_once __DIR__ . '/patient_model.php';

// Pastikan parameter ID valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ../public/index.php');
    exit();
}
$id = (int)$_GET['id'];

// Proses hanya jika permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah pengguna mengonfirmasi penghapusan
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        // Lakukan penghapusan
        $result = deletePatient($id);
        if ($result) {
            // Berhasil hapus
            header('Location: ../public/index.php?status=deleted');
            exit();
        } else {
            // Gagal hapus (bisa ditambahkan pesan error jika perlu)
            header('Location: ../public/index.php?status=delete_error');
            exit();
        }
    }
    // Jika konfirmasi bukan "yes", kembali ke daftar pasien tanpa menghapus
    header('Location: ../public/index.php');
    exit();
}

// Jika bukan permintaan POST, kembalikan ke daftar pasien
header('Location: ../public/index.php');
exit();