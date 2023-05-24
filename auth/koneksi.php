<?php
// Tidak menampilkan error agar lebih rapih dan clean
// error_reporting(0);

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "siakad");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
