<?php
/**
 * patient_model.php
 *
 * File ini berisi sekumpulan fungsi untuk melakukan operasi CRUD
 * (Create, Read, Update, Delete) terhadap tabel `patients` di database.
 * File ini dibuat oleh **Anggota Backend 1** dalam kelompok. Tujuannya
 * adalah memisahkan logika interaksi database dari tampilan antarmuka
 * sehingga kode lebih terstruktur dan mudah dipelihara.
 *
 * Kegunaan fungsi-fungsi di dalam file ini:
 *   - `getAllPatients($search = null)` untuk mendapatkan daftar semua
 *     pasien, dengan opsi pencarian berdasarkan nama atau diagnosa.
 *   - `getPatientById($id)` untuk mengambil satu data pasien berdasarkan
 *     ID-nya.
 *   - `addPatient($name, $age, $gender, $address, $diagnosis)` untuk
 *     menambahkan data pasien baru ke database.
 *   - `updatePatient($id, $name, $age, $gender, $address, $diagnosis)`
 *     untuk memperbarui data pasien.
 *   - `deletePatient($id)` untuk menghapus data pasien dari database.
 */

require_once __DIR__ . '/connection.php';

/**
 * Mengambil semua data pasien dari tabel dengan opsi pencarian.
 *
 * @param string|null $search Kata kunci pencarian (nama atau diagnosa). Jika
 *                            bernilai null, semua data akan diambil.
 * @return array Array berisi data pasien dalam bentuk asosiatif.
 */
function getAllPatients(?string $search = null): array
{
    global $conn;
    $patients = [];

    if ($search !== null && trim($search) !== '') {
        // Menambahkan wildcard untuk pencarian
        $keyword = '%' . trim($search) . '%';
        $stmt = $conn->prepare(
            "SELECT id, name, age, gender, address, diagnosis
             FROM patients
             WHERE name LIKE ? OR diagnosis LIKE ?
             ORDER BY id ASC"
        );
        $stmt->bind_param('ss', $keyword, $keyword);
    } else {
        $stmt = $conn->prepare(
            "SELECT id, name, age, gender, address, diagnosis
             FROM patients
             ORDER BY id ASC"
        );
    }

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $patients[] = $row;
        }
        $stmt->close();
    }

    return $patients;
}

/**
 * Mengambil satu data pasien berdasarkan ID.
 *
 * @param int $id ID pasien.
 * @return array|null Data pasien dalam bentuk asosiatif atau null jika tidak ditemukan.
 */
function getPatientById(int $id): ?array
{
    global $conn;
    $stmt = $conn->prepare(
        "SELECT id, name, age, gender, address, diagnosis
         FROM patients
         WHERE id = ?"
    );
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $patient = $result->fetch_assoc();
    $stmt->close();
    return $patient ?: null;
}

/**
 * Menambahkan data pasien baru ke database.
 *
 * @param string $name     Nama pasien
 * @param int    $age      Usia pasien
 * @param string $gender   Jenis kelamin (Laki-laki/Perempuan)
 * @param string $address  Alamat pasien
 * @param string $diagnosis Diagnosa pasien
 * @return bool True jika berhasil, false jika gagal.
 */
function addPatient(string $name, int $age, string $gender, string $address, string $diagnosis): bool
{
    global $conn;
    $stmt = $conn->prepare(
        "INSERT INTO patients (name, age, gender, address, diagnosis) VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param('sisss', $name, $age, $gender, $address, $diagnosis);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

/**
 * Memperbarui data pasien yang sudah ada.
 *
 * @param int    $id        ID pasien yang akan diupdate
 * @param string $name      Nama pasien
 * @param int    $age       Usia pasien
 * @param string $gender    Jenis kelamin
 * @param string $address   Alamat pasien
 * @param string $diagnosis Diagnosa
 * @return bool True jika berhasil, false jika gagal.
 */
function updatePatient(int $id, string $name, int $age, string $gender, string $address, string $diagnosis): bool
{
    global $conn;
    $stmt = $conn->prepare(
        "UPDATE patients SET name = ?, age = ?, gender = ?, address = ?, diagnosis = ? WHERE id = ?"
    );
    $stmt->bind_param('sisssi', $name, $age, $gender, $address, $diagnosis, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

/**
 * Menghapus data pasien dari database.
 *
 * @param int $id ID pasien yang akan dihapus
 * @return bool True jika berhasil, false jika gagal.
 */
function deletePatient(int $id): bool
{
    global $conn;
    $stmt = $conn->prepare(
        "DELETE FROM patients WHERE id = ?"
    );
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}