<?php
session_start();
include '../koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $data = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

    // cek username
    if (mysqli_num_rows($data) === 1) {
        $row = mysqli_fetch_assoc($data);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        // cek password
        if (password_verify($pass, $row['password'])) {
            //set session
            $_SESSION['login'] = true;

            echo "<script>
                alert('berhasil login');
                document.location.href = 'index.php';
                </script>";
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="shortcut icon" type="x-icon" href="../assets/img/q&a.png">
</head>

<body>

    <div class="login">
        <h2 class="text-center text2">Halaman Masuk</h2>
        <div class="row">
            <img src="../assets/img/q&a.png" style="width: 135px; height: 120px; margin: auto;">
        </div>
        <!-- error alert -->
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    invalid username / password!
                </div>
                <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <!-- end alert -->
        <form action="" method="post">
            <div class="form-group">
                <label for="username" class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password :</label>
                <input type="password" class="form-control" name="password">
            </div>

            <input type="submit" name="login" class="btn btn-warning btn-sm mt-3" value="Masuk">
        </form>
        <p>Belum punya akun?<a href="register.php" class="ms-1">Daftar</a></p>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>