<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: home.php");
}

$jumlah = mysqli_query($con, "SELECT * FROM tbl_soal");
$jumlah_soal = mysqli_num_rows($jumlah);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="x-icon" href="../assets/img/q&a.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <!-- sweeat alert -->
    <link href="../assets/sweet_alert/dist/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/datatables/dataTables.bootstrap.css">
    <title>UKBI</title>
    <style>
        body {
            background-color: rgb(218, 217, 217);
        }
    </style>
</head>

<body>
    <nav id="navbar-example2" class="navbar navbar-light bg-success sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="../assets/img/q&a.png" class="me-1" width="40">
                UKBI
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Menu</a>
                    <ul class="dropdown-menu">
                        <?php if($_SESSION['username'] == 'admin') : ?>
                        <li><a class="dropdown-item" href="#" onclick="soaljawab()">Soal & jawaban</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mb-5">
        <div class="container">
            <div id="kontenku">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-5">
                        <img src="../assets/img/q&a.png" width="320">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="mt-5 text-center">Hello, Selamat datang.. <?= $_SESSION['username'] ?></h1>
                    </div>
                    <div class="col-12">
                        <p class="text-center fs-5">Anda akan memulai Aplikasi kuis acak UKBI</p>
                    </div>
                    <div class="col-12">
                        <p class="text-center">Jumlah soal : <?php echo $jumlah_soal; ?></p>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-success" onclick="mulai()">Mulai</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- sweetalert -->
    <script src="../assets/sweet_alert/dist/sweetalert.min.js"></script>
    <!-- datatable -->
    <script src="../assets/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        function mulai() {
            $('#kontenku').load('soal.php');
        }

        function soaljawab() {
            $('#kontenku').load('soaljawab.php');
        }
    </script>
    <?php $query=mysqli_query($con,"DELETE FROM tbl_score WHERE id= '".$_SESSION['id']."' "); ?>
</body>

</html>