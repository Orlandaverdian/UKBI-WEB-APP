<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id'];

$nilaisekarang = mysqli_query($con, "SELECT score FROM tbl_score WHERE id='$id_user' ");
$row = mysqli_fetch_assoc($nilaisekarang);

?>
<link rel="stylesheet" href="../assets/css/style3.css">
<div class="container" style="height: 80vh;">
    <div class="box2 mx-auto mt-5">
        <h1 class="text-center">Waktu anda sudah habis</h1>
        <h3 class="text-center">Sisa skor anda :</h3>
        <?php if (mysqli_num_rows($nilaisekarang) == 0) : ?>
            <p class="score">0</p>
        <?php elseif (mysqli_num_rows($nilaisekarang) >= 1) : ?>
            <p class="score"><?= $row['score']; ?></p>
        <?php endif; ?>
        <p class="fs-3 text-center">Terima kasih sudah mengerjakan</p>
    </div>
</div>