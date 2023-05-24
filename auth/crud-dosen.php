<?php
// Mengambil koneksi dari folder auth agar tidak menuliskan nidn berulang kali
require_once "./auth/koneksi.php";

// Cek apakah tabel sudah ada
$namaTable = "dosen";
$queryCekTable = "SHOW TABLES LIKE '$namaTable'";
$HasilCekTable = mysqli_query($koneksi, $queryCekTable);

if (mysqli_num_rows($HasilCekTable) == 0) {
    // Jika tabel belum ada, buat tabel baru
    $queryCreateTable = "CREATE TABLE $namaTable (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(255) NOT NULL,
        nidn CHAR(8) NOT NULL,
        jenjang_pendidikan ENUM('S2','S3') NOT NULL
    )";

    $HasilCreateTable = mysqli_query($koneksi, $queryCreateTable);
}

// Jika create / update / delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nidn = $_POST['nidn'];
    $jenjang_pendidikan = $_POST['jenjang_pendidikan'];

    if (isset($_POST['create'])) {
        // Query untuk menyimpan data ke tabel
        $query = "INSERT INTO dosen (nama, nidn, jenjang_pendidikan) VALUES ('$nama', '$nidn', '$jenjang_pendidikan')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama parameter create=success agar ketika direfresh data tidak terinput kembali (double)
            header("Location: dosen.php?create=success");
            exit();
        } else {
            echo "Gagal menyimpan data ke database.";
        }
    } elseif (isset($_POST['update'])) {
        // Query untuk memperbarui data di tabel
        $query = "UPDATE dosen SET nama='$nama', nidn='$nidn', jenjang_pendidikan='$jenjang_pendidikan' WHERE id=$id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama dengan parameter update=success agar ketika direfresh data tidak terupdate kembali
            header("Location: dosen.php?update=success");
            exit();
        } else {
            echo "Gagal memperbarui data ke database.";
        }
    } elseif (isset($_POST['delete'])) {
        // Query untuk menghapus data dari tabel
        $query = "DELETE FROM dosen WHERE id=$id";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Redirect ke halaman utama delete=success agar ketika direfresh data tidak terhapus kembali
            header("Location: dosen.php?delete=success");
            exit();
        } else {
            echo "Gagal menghapus data dari database.";
        }
    }
}