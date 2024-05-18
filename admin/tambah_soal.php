<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION["login"]) || $_SESSION['username'] != 'admin') {
    header("Location: login.php");
    exit;
}

$soal = $_POST['soal'];
$jawaban = $_POST['jawaban'];
$query = "INSERT INTO tbl_soal VALUES ('','$soal','$jawaban')";
$result=mysqli_query($con, $query);
echo json_encode(array("status" => TRUE));
?>