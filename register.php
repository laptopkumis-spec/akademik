<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4">Form Register</h2>

                <form method="post">

                    <div class="mb-3">
                        <label class="form-label">Nama Pengguna</label>
                        <input type="text" name="nm_user" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Daftar</button>

                    <div class="text-center mt-3">
                        Sudah punya akun? <a href="login.php">Login</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nm_user = $_POST['nm_user'];
    $email  = $_POST['email'];
    $pass1  = $_POST['password'];
    $pass2  = $_POST['password2'];

    // cek password cocok
    if ($pass1 !== $pass2) {
        echo "<div class='alert alert-danger text-center mt-3'>Password tidak sama</div>";
        exit;
    }

    // enkripsi password (sesuai login kamu)
    $password = md5($pass1);

    // cek email sudah ada
    $cek = $db->query("SELECT id FROM pengguna WHERE email='$email'");
    if ($cek->num_rows > 0) {
        echo "<div class='alert alert-danger text-center mt-3'>Email sudah terdaftar</div>";
        exit;
    }

    // simpan ke database
    $simpan = $db->query("INSERT INTO pengguna (nm_user, email, password) VALUES ('$nm_user','$email', '$password')");

    if ($simpan) {
        echo "<script>
                alert('Registrasi berhasil, silakan login');
                window.location.href='login.php';
            </script>";
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Registrasi gagal</div>";
    }
}
?>