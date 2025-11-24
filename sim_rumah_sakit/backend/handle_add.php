<?php
/**
 * handle_add.php
 *
 * Skrip ini menangani permintaan POST untuk menambahkan data pasien baru.
 * File ini dibuat oleh **Anggota Backend 2**. Fungsinya adalah menerima
 * data dari formulir yang dikirim oleh halaman frontend `add.php`,
 * melakukan validasi dasar, lalu memanggil fungsi `addPatient()` dari
 * model agar data tersebut disimpan ke database. Setelah proses
 * selesai, pengguna akan diarahkan kembali ke halaman yang sesuai.
 */

require_once __DIR__ . '/patient_model.php';

// Pastikan permintaan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dengan menggunakan operator null coalescing
    $name     = trim($_POST['name'] ?? '');
    $age      = trim($_POST['age'] ?? '');
    $gender   = trim($_POST['gender'] ?? '');
    $address  = trim($_POST['address'] ?? '');
    $diagnosis= trim($_POST['diagnosis'] ?? '');

    // Validasi sederhana: semua field wajib diisi dan usia harus angka
    if ($name === '' || $age === '' || !is_numeric($age) || $gender === '' || $address === '' || $diagnosis === '') {
        // Kembalikan ke halaman tambah dengan kode error 1 (input tidak valid)
        header('Location: ../public/add.php?error=1');
        exit();
    }

    // Panggil fungsi untuk menambah data pasien
    $result = addPatient($name, (int)$age, $gender, $address, $diagnosis);
    if ($result) {
        // Berhasil menambah data, arahkan ke daftar pasien dengan pesan sukses
        header('Location: ../public/index.php?status=success');
        exit();
    } else {
        // Gagal menyimpan data, kembali ke halaman tambah dengan kode error 2
        header('Location: ../public/add.php?error=2');
        exit();
    }
}

// Jika bukan permintaan POST, kembalikan ke halaman utama
header('Location: ../public/index.php');
exit();