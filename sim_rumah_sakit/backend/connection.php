<?php
/**
 * connection.php
 *
 * File ini berfungsi untuk membuat koneksi ke basis data MySQL.
 * File ini dibuat oleh **Anggota Backend 1** dalam kelompok. Pengembang
 * backend bertanggung jawab untuk memastikan koneksi database dapat
 * dipakai oleh seluruh bagian aplikasi baik backend maupun frontend.
 *
 * Kegunaan:
 *   - Menyimpan konfigurasi koneksi (host, user, password, dan nama
 *     database). Silakan sesuaikan nilai-nilai berikut sesuai
 *     pengaturan di Laragon atau server lokal Anda.
 *   - Menginisialisasi objek koneksi `$conn` yang akan digunakan
 *     oleh fungsi-fungsi lain untuk melakukan query ke database.
 */

$host   = 'localhost';           // Nama host database, biasanya 'localhost'
$user   = 'root';               // Username database, default Laragon adalah 'root'
$pass   = '';                   // Password database, biasanya kosong di Laragon
$dbname = 'sim_rumah_sakit';    // Nama database yang digunakan

// Membuat objek koneksi menggunakan ekstensi mysqli
$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa apakah koneksi berhasil
if ($conn->connect_error) {
    // Jika koneksi gagal, hentikan skrip dan tampilkan pesan kesalahan
    die('Koneksi ke database gagal: ' . $conn->connect_error);
}

// Mengatur charset ke UTF-8 untuk mendukung karakter internasional
$conn->set_charset('utf8mb4');

// Dengan adanya file ini, Anda dapat menyertakan (require/include)
// connection.php di file lain untuk menggunakan variabel $conn