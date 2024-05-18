<?php
include '../koneksi.php';

$username = strtolower(stripslashes($_POST['username'])); 
$password = $_POST['password'];
$email = strtolower(stripslashes($_POST['email'])); 

// enkripsi password
$pass_acak = password_hash($password, PASSWORD_DEFAULT);

$input = mysqli_query($con, "INSERT INTO users VALUES ('','$username','$email','$pass_acak')");

if($input) {
    echo "<script>
    alert('berhasil registrasi! silahkan login');
    document.location.href = 'login.php';
    </script>";
} else {
    echo "Gagal disimpan";
}