<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$email = $_SESSION['email'];
$sql = $db->query("SELECT * FROM pengguna WHERE email='$email'");
$data = $sql->fetch_assoc();

$inisial = strtoupper(substr($data['nm_user'], 0, 1));
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background-color: #f8f9fa;
    }


    .navbar-custom {
        background-color: #121212;
    }


    .profile-card {
        border: none;
        border-radius: 12px;
    }


    .avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background-color: #1c1f23;
        color: #fff;
        font-size: 48px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }

    .list-group-item {
        border: none;
        border-bottom: 1px solid #e9ecef;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }
    </style>
</head>

<body>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card profile-card shadow-sm">
                    <div class="card-body text-center">
                        <div class="text-start mb-3">
                            <a href="../index.php" style="color: #121212; text-decoration: none;">
                                ← Kembali
                            </a>
                        </div>



                        <div class="avatar">
                            <?= $inisial ?>
                        </div>


                        <h4 class="mb-0"><?= htmlspecialchars($data['nm_user']) ?></h4>
                        <p class="text-muted"><?= htmlspecialchars($data['email']) ?></p>


                        <ul class="list-group list-group-flush text-start mt-4 mb-4">
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Nama Lengkap</strong>
                                <span><?= htmlspecialchars($data['nm_user']) ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Email</strong>
                                <span><?= htmlspecialchars($data['email']) ?></span>
                            </li>
                        </ul>


                        <div class="d-flex justify-content-center gap-3 mt-3">

                            <a href="edit.php" class="btn btn-primary btn-lg fw-bold shadow-sm px-4">
                                Edit Profil
                            </a>

                            <a href="hapus.php" class="btn btn-danger btn-lg fw-bold shadow px-4"
                                onclick="return confirm('Yakin ingin menghapus akun?')">
                                Hapus Akun
                            </a>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>