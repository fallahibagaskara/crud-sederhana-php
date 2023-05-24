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
        <h2 class="text-center mt-4 mb-4">CRUD Sederhana UTS Pemrograman Web II</h2>
        <div class="row text-center">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                <a href="mata-kuliah.php" class="btn btn-primary">Tabel Mata Kuliah</a>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                <a href="dosen.php" class="btn btn-primary">Tabel Dosen</a>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                <a href="mahasiswa.php" class="btn btn-primary">Tabel Mahasiswa</a>
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
</body>

</html>