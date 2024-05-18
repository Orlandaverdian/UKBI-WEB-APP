<?php 
session_start();
require "../koneksi.php";

if (!isset($_SESSION["login"]) || $_SESSION['username'] != 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$soal = $_POST['soal'];
$jawaban = $_POST['jawaban'];
$query = "UPDATE tbl_soal SET soal='$soal', jawaban='$jawaban' WHERE id = '$id' ";
$result=mysqli_query($con, $query);
echo json_encode(array("status" => TRUE));

?>