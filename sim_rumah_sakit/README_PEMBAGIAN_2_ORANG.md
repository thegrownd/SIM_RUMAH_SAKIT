# Template Pembagian Tugas – 2 Orang

Dokumen ini memberikan contoh pembagian tugas untuk dua anggota tim yang
akan melanjutkan pengembangan aplikasi **SIM Rumah Sakit**. Struktur
proyek telah dibagi menjadi dua folder utama: `backend/` (logika dan
interaksi dengan basis data) dan `public/` (antarmuka pengguna). Setiap
anggota tim akan mengambil alih salah satu area tersebut dengan peran
yang jelas.

## Struktur Direktori Singkat

```
sim_rumah_sakit_complete/
├── backend/               # Kode backend: koneksi dan proses data
│   ├── connection.php
│   ├── patient_model.php
│   ├── handle_add.php
│   ├── handle_update.php
│   └── handle_delete.php
├── public/                # Kode frontend: tampilan dan formulir
│   ├── index.php
│   ├── add.php
│   ├── edit.php
│   └── delete.php
└── README.md
```

## Pembagian Tugas untuk 2 Anggota

| Anggota | Tanggung Jawab Utama | File yang Dikerjakan | Penjelasan |
|---------|----------------------|----------------------|------------|
| **Anggota A – Backend** | Menyiapkan dan memelihara semua skrip yang berhubungan dengan database. Ini meliputi konfigurasi koneksi, fungsi CRUD, dan skrip pemrosesan data. | `backend/connection.php`, `backend/patient_model.php`, `backend/handle_add.php`, `backend/handle_update.php`, `backend/handle_delete.php` | - Pastikan koneksi database (`connection.php`) berjalan dengan benar dan aman.<br>- Tulis dan uji fungsi di `patient_model.php` (getAllPatients, getPatientById, addPatient, updatePatient, deletePatient) menggunakan prepared statement.<br>- Implementasikan validasi di dalam skrip `handle_*.php` untuk memastikan data yang diterima dari frontend sudah benar.<br>- Lakukan debugging jika ada error terkait query SQL. |
| **Anggota B – Frontend** | Membangun tampilan dan interaksi dengan pengguna. Menyiapkan formulir input, tabel data, serta navigasi antarpages. | `public/index.php`, `public/add.php`, `public/edit.php`, `public/delete.php`, (opsional: berkas CSS tambahan) | - Rancang antarmuka pengguna yang sederhana dan mudah digunakan dengan Bootstrap atau CSS lainnya.<br>- Tampilkan data dari backend melalui fungsi-fungsi yang sudah disediakan (gunakan include `../backend/patient_model.php`).<br>- Buat formulir input (tambah/edit) dan pastikan action-nya mengarah ke skrip `handle_*.php` yang sesuai.<br>- Tampilkan pesan kesalahan atau sukses berdasarkan query string (?error=..., ?status=...).<br>- Jika diinginkan, tambahkan file CSS sendiri untuk mempercantik tampilan. |

## Rekomendasi Kolaborasi

1. **Koordinasi Awal:** Kedua anggota harus sepakat mengenai struktur data (misalnya nama tabel dan kolom) sehingga backend dan frontend sinkron.
2. **Pengujian Bersama:** Setelah masing-masing bagian selesai, lakukan pengujian integrasi bersama untuk memastikan formulir frontend berkomunikasi dengan skrip backend dengan benar.
3. **Dokumentasi:** Anggota frontend dapat menambahkan komentar di setiap file tampilan untuk menjelaskan komponen UI, sementara anggota backend dapat mendokumentasikan fungsi-fungsi dan alur proses data.
4. **Versi Kontrol:** Gunakan sistem version control (misalnya Git) untuk menghindari konflik dan melacak perubahan kode.

Dengan template ini, diharapkan kedua anggota dapat bekerja secara paralel namun tetap terkoordinasi, sehingga proyek berjalan efisien dan terstruktur.