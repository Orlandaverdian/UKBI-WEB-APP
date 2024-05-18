<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["login"]) || $_SESSION['username'] != 'admin') {
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$query = "DELETE FROM tbl_soal WHERE id='$id'";
$result = mysqli_query($con, $query);
$query2 = "DELETE FROM tbl_jawaban WHERE id_soal='$id'";
$result2 = mysqli_query($con, $query2);
echo json_encode(array("status" => TRUE));

?>