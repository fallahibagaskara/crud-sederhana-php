<?php
// Mengambil koneksi dari folder auth agar tidak menuliskan kode berulang kali
require_once "./auth/koneksi.php";

// Cek apakah tabel sudah ada
$namaTable = "matakuliah";
$queryCekTable = "SHOW TABLES LIKE '$namaTable'";
$HasilCekTable = mysqli_query($koneksi, $queryCekTable);

if (mysqli_num_rows($HasilCekTable) == 0) {
    // Jika tabel belum ada, buat tabel baru
    $queryCreateTable = "CREATE TABLE $namaTable (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(255) NOT NULL,
        kode CHAR(5) NOT NULL,
        deskripsi TEXT NOT NULL
    )";

    $HasilCreateTable = mysqli_query($koneksi, $queryCreateTable);
}

// Jika create / update / delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kode = $_POST['kode'];
    $deskripsi = $_POST['deskripsi'];

    if (isset($_POST['create'])) {
        // Query untuk menyimpan data ke tabel
        $query = "INSERT INTO matakuliah (nama, kode, deskripsi) VALUES ('$nama', '$kode', '$deskripsi')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama parameter create=success agar ketika direfresh data tidak terinput kembali (double)
            header("Location: mata-kuliah.php?create=success");
            exit();
        } else {
            echo "Gagal menyimpan data ke database.";
        }
    } elseif (isset($_POST['update'])) {
        // Query untuk memperbarui data di tabel
        $query = "UPDATE matakuliah SET nama='$nama', kode='$kode', deskripsi='$deskripsi' WHERE id=$id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama dengan parameter update=success agar ketika direfresh data tidak terupdate kembali
            header("Location: mata-kuliah.php?update=success");
            exit();
        } else {
            echo "Gagal memperbarui data ke database.";
        }
    } elseif (isset($_POST['delete'])) {
        // Query untuk menghapus data dari tabel
        $query = "DELETE FROM matakuliah WHERE id=$id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama delete=success agar ketika direfresh data tidak terhapus kembali
            header("Location: mata-kuliah.php?delete=success");
            exit();
        } else {
            echo "Gagal menghapus data dari database.";
        }
    }
}
