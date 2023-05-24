<?php
// Mengambil nidn crud php dari folder auth agar kodingan lebih rapih dan clean
include_once "./auth/crud-dosen.php";
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Judul Halaman -->
    <title>CRUD Sederhana</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Footer CSS -->
    <style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        padding: 10px 0;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-4">Tabel Dosen</h2>
        <div class="row">
            <div class="col-md-6 text-left mb-3">
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-md-6 text-right mb-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah
                    Data</button>
            </div>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Jenjang Pendidikan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data dari tabel
                $query = "SELECT * FROM dosen";
                $result = mysqli_query($koneksi, $query);

                // Tampilkan data kedalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . $row['nidn'] . '</td>';
                    echo '<td>' . $row['jenjang_pendidikan'] . '</td>';
                    echo '<td>
                  <a href="#" class="btn btn-sm btn-primary edit-btn" data-id="' . $row['id'] . '" data-nama="' . $row['nama'] . '" data-nidn="' . $row['nidn'] . '" data-jenjang_pendidikan="' . $row['jenjang_pendidikan'] . '">Edit</a>
                  <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="' . $row['id'] . '">Hapus</a>
                </td>';
                    echo "</tr>";
                }

                // Tutup koneksi database
                mysqli_close($koneksi);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="dosen.php" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control" id="nidn" name="nidn" required>
                        </div>
                        <div class="form-group">
                            <label for="jenjang_pendidikan">Jenjang Pendidikan</label>
                            <textarea class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan"
                                required></textarea>
                        </div>
                        <input type="hidden" name="create">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="dosen.php" method="POST">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="form-group">
                            <label for="edit-nama">Nama</label>
                            <input type="text" class="form-control" id="edit-nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-nidn">NIDN</label>
                            <input type="text" class="form-control" id="edit-nidn" name="nidn" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-jenjang_pendidikan">Jenjang Pendidikan</label>
                            <textarea class="form-control" id="edit-jenjang_pendidikan" name="jenjang_pendidikan"
                                required></textarea>
                        </div>
                        <input type="hidden" name="update">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Data -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    <form action="dosen.php" method="POST">
                        <input type="hidden" name="delete">
                        <input type="hidden" id="delete-id" name="id">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2023 Fallahi Bagaskara. All rights reserved.</p>
        </div>
    </footer>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- CRUD JS -->
    <script src="./auth/crud-dosen.js"></script>
</body>

</html>