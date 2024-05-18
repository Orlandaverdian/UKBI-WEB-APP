<?php
session_start();

if(isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="x-icon" href="../assets/img/q&a.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>UKBI</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-success sticky-top shadow">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="../assets/img/q&a.png" class="me-1" width="40">
                UKBI
            </a>
            <form class="d-flex">
                <a href="login.php" class="btn btn-primary">MASUK</a>
            </form>
        </div>
    </nav>

    <div class="container-fluid banner">
        <div class="container banner-content col-lg-6 col-md-6 col-sm-6">
            <div class="text-center">
                <p class="fs-1">
                    <b>Selamat datang</b>
                </p>
                <p class="fs-3">
                    di Website Uji Kemahiran Bahasa Indonesia
                </p>
                <a href="register.php" class="btn btn-outline-primary btn-lg">DAFTAR</a>
            </div>
        </div>
    </div>

    <!-- section 1 -->
    <div class="container-fluid content">
        <div class="container mt-5" style="padding: 25px 60px;">
            <div class="row offset-lg-1">
                <div class="col-lg-5 col-md-6 col-sm-12 d-none d-md-block">
                    <img src="../assets/img/person-studying-at-a-desk.png" class="gambar">
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <h2>Apa itu UKBI?</h2>
                    <p class="mt-3">UKBI adalah sarana uji untuk mengukur kemahiran seseorang dalam berbahasa indonesia
                        berbasis web. Web UKBI berisi soal pilihan ganda baik secara text maupun audio</p>
                </div>
            </div>
        </div>
    </div>

    <!-- section 2 -->
    <div class="container-fluid" style="height: auto; background-color: rgb(246, 245, 245); padding-bottom: 30px;">
        <h3 class="text-center mt-3 mb-5" style="padding-top: 25px;">Alur pelaksanaan ujian</h3>
        <div class="container mt-3 mb-3">
            <div class="row mt-1 d-flex justify-content-center">
                <div class="col-10 mb-3 col-lg-3 col-md-3 col-sm-3">
                    <p class="text-center">1</p>
                    <div class="d-flex justify-content-center">
                        <img src="../assets/img/register-removebg-preview.png" alt="" width="150" height="150">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-secondary">Pendaftaran</button>
                    </div>
                </div>
                <div class="col-10 mb-3 col-lg-3 col-md-3 col-sm-3">
                    <p class="text-center">2</p>
                    <div class="d-flex justify-content-center">
                        <img src="../assets/img/730_generated-removebg-preview.png" width="150" height="150">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-secondary">Masuk</button>
                    </div>
                </div>
                <div class="col-10 mb-3 col-lg-3 col-md-3 col-sm-3">
                    <p class="text-center">3</p>
                    <div class="d-flex justify-content-center">
                        <img src="../assets/img/computer-screen-removebg-preview.png" width="150" height="150">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-secondary">Pelaksanaan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <small>2023 Copyright &copy; by <strong>Kelompok 3 IF-2A Pagi</strong> All rights reserved</small>
        </div>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>