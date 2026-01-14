<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Halaman Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lgl-6">
                <h1>login from</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="contohemail" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="contohemail1" name="email" require>
                        <div id="emailhelp" class="from-text">Kami Tidak Pernah Memberikan Email Anda Ke Siapapun</div>
                    </div>
                    <div class="mb-3">
                        <label for="contohpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="contohpassword1" name="password" require>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    session_start();
    require_once 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $ceklogin = $db->query("SELECT * FROM pengguna WHERE email='$email' AND password='$password'");

        if ($ceklogin && $ceklogin->num_rows == 1) {
            $data = $ceklogin->fetch_assoc();

            $_SESSION['login'] = TRUE;
            $_SESSION['email'] = $data['email'];
            $_SESSION['nama'] = $data['nama_lengkap'];

            echo"<script>
                    alert('Berhasil Login');
                    window.location.href = 'index.php?page=data_mhs';
                </script>";
            exit;
        } else {
            echo "<div class='alert alert-danger mt-3 text-center'>Login Anda Gagal, Email atau Password Salah</div>";
        }
    } 
?>