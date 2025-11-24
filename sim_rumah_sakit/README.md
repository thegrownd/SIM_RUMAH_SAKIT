# SIM Rumah Sakit – Struktur Lengkap

Repositori ini adalah versi lengkap dan terstruktur dari aplikasi **Sistem Informasi Manajemen (SIM) Rumah Sakit**. Aplikasi dibangun menggunakan PHP dan MySQL serta dibagi berdasarkan peran anggota tim: dua orang bertugas sebagai pengembang backend dan satu orang sebagai pengembang frontend. Struktur direktori dan pembagian tugas dirancang agar jelas dan mudah dipelihara.

## Struktur Direktori

```
sim_rumah_sakit_complete/
├── backend/               # Kode backend (logika dan model)
│   ├── connection.php     # Konfigurasi dan koneksi database (Backend 1)
│   ├── patient_model.php  # Fungsi CRUD untuk tabel pasien (Backend 1)
│   ├── handle_add.php     # Proses tambah data pasien (Backend 2)
│   ├── handle_update.php  # Proses edit data pasien (Backend 2)
│   └── handle_delete.php  # Proses hapus data pasien (Backend 2)
│
├── public/               # Kode frontend (tampilan)
│   ├── index.php         # Halaman daftar dan pencarian pasien (Frontend)
│   ├── add.php           # Formulir tambah pasien (Frontend)
│   ├── edit.php          # Formulir edit pasien (Frontend)
│   └── delete.php        # Konfirmasi hapus pasien (Frontend)
│
└── README.md             # Dokumen ini
```

> **Catatan:** Jika Anda menyalin proyek ini ke dalam folder `www` Laragon, pastikan seluruh struktur folder tetap sama agar jalur (path) antara frontend dan backend tidak berubah.

## Pembagian Tugas

| Peran            | Tanggung Jawab                                    | Berkas yang Dikerjakan                                  |
|------------------|---------------------------------------------------|---------------------------------------------------------|
| **Backend 1**    | Mengatur koneksi dan model database               | `backend/connection.php`, `backend/patient_model.php`    |
| **Backend 2**    | Menangani proses CRUD (tanpa tampilan)            | `backend/handle_add.php`, `backend/handle_update.php`, `backend/handle_delete.php` |
| **Frontend**     | Mendesain dan membangun tampilan antarmuka (UI)    | `public/index.php`, `public/add.php`, `public/edit.php`, `public/delete.php` |

Dengan pembagian ini, dua anggota backend dapat fokus pada struktur data dan interaksi basis data, sedangkan satu anggota frontend bertanggung jawab penuh pada pengalaman pengguna dan tata letak.

## Cara Menjalankan

1. **Persiapkan Database**
   - Buat database bernama `sim_rumah_sakit` dan tabel `patients` dengan struktur berikut:

   ```sql
   CREATE DATABASE IF NOT EXISTS sim_rumah_sakit;
   USE sim_rumah_sakit;

   CREATE TABLE patients (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(100) NOT NULL,
     age INT NOT NULL,
     gender VARCHAR(10) NOT NULL,
     address TEXT NOT NULL,
     diagnosis VARCHAR(255) NOT NULL
   );
   ```

2. **Konfigurasi Koneksi**
   - Sesuaikan pengaturan host, user, password, dan nama database di file `backend/connection.php` jika berbeda.

3. **Pasang Proyek**
   - Salin folder `sim_rumah_sakit_complete` ke direktori web server Anda (misalnya `C:\laragon\www`).
   - Akses aplikasi melalui `http://localhost/sim_rumah_sakit_complete/public/index.php`.

## Penjelasan Singkat Berkas

### Backend

- **connection.php**: Membuat dan mengelola koneksi ke database MySQL. Seluruh fungsi dan skrip lain akan menyertakan file ini untuk mendapatkan akses ke variabel `$conn`.
- **patient_model.php**: Berisi fungsi-fungsi CRUD untuk tabel `patients`. Memisahkan logika database dari tampilan agar kode lebih modular.
- **handle_add.php**: Menerima data POST dari formulir tambah, melakukan validasi, dan memanggil fungsi `addPatient()` untuk menyimpan data.
- **handle_update.php**: Memproses permintaan POST untuk memperbarui data pasien berdasarkan ID yang diterima melalui query string.
- **handle_delete.php**: Menangani permintaan POST untuk menghapus data pasien setelah konfirmasi dari pengguna.

### Frontend

- **index.php**: Halaman utama yang menampilkan daftar pasien, fitur pencarian, dan pesan status. Menyediakan tautan ke halaman tambah, edit, dan hapus.
- **add.php**: Formulir untuk menambahkan pasien baru. Menampilkan pesan error jika ada kesalahan validasi atau kegagalan saat memasukkan data.
- **edit.php**: Menampilkan data pasien dalam formulir sehingga pengguna dapat mengubahnya. Menangani pesan error dari proses update.
- **delete.php**: Halaman konfirmasi untuk menghapus data pasien. Menyajikan nama pasien yang akan dihapus dan menyediakan pilihan Ya/Tidak.

## Kontribusi Anggota

Proyek ini disusun dengan tujuan pembelajaran kolaboratif. Setiap anggota dapat menyesuaikan nama file atau menambahkan fitur seperti pencarian canggih, otentikasi pengguna, atau tampilan yang lebih menarik menggunakan CSS tambahan. Pastikan untuk menulis komentar pada setiap bagian kode agar anggota lain memahami kegunaannya.