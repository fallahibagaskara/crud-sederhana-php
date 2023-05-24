<?php
// Mengambil koneksi dari folder auth agar tidak menuliskan nim berulang kali
require_once "./auth/koneksi.php";

// Cek apakah tabel sudah ada
$namaTable = "mahasiswa";
$queryCekTable = "SHOW TABLES LIKE '$namaTable'";
$HasilCekTable = mysqli_query($koneksi, $queryCekTable);

if (mysqli_num_rows($HasilCekTable) == 0) {
    // Jika tabel belum ada, buat tabel baru
    $queryCreateTable = "CREATE TABLE $namaTable (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(255) NOT NULL,
        nim CHAR(10) NOT NULL,
        program_studi VARCHAR(255) NOT NULL
    )";

    $HasilCreateTable = mysqli_query($koneksi, $queryCreateTable);
}

// Jika create / update / delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $program_studi = $_POST['program_studi'];

    if (isset($_POST['create'])) {
        // Query untuk menyimpan data ke tabel
        $query = "INSERT INTO mahasiswa (nama, nim, program_studi) VALUES ('$nama', '$nim', '$program_studi')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama parameter create=success agar ketika direfresh data tidak terinput kembali (double)
            header("Location: mahasiswa.php?create=success");
            exit();
        } else {
            echo "Gagal menyimpan data ke database.";
        }
    } elseif (isset($_POST['update'])) {
        // Query untuk memperbarui data di tabel
        $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', program_studi='$program_studi' WHERE id=$id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama dengan parameter update=success agar ketika direfresh data tidak terupdate kembali
            header("Location: mahasiswa.php?update=success");
            exit();
        } else {
            echo "Gagal memperbarui data ke database.";
        }
    } elseif (isset($_POST['delete'])) {
        // Query untuk menghapus data dari tabel
        $query = "DELETE FROM mahasiswa WHERE id=$id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama delete=success agar ketika direfresh data tidak terhapus kembali
            header("Location: mahasiswa.php?delete=success");
            exit();
        } else {
            echo "Gagal menghapus data dari database.";
        }
    }
}