<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
session_start();
include("../koneksi.php");


$email = $_SESSION['email'];
$edit = $db->query("SELECT * FROM pengguna WHERE email='$email'");
$data = $edit->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan";
    exit();
}
?>

<body>
    <div class="container mt-4">
        <h1>Edit Profil</h1>

        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nm_user" value="<?= $data['nm_user']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" class="form-control" name="password">
                <div class="form-text text-muted">
                    Kosongkan jika tidak ingin mengubah password
                </div>
            </div>

            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>

            <a href="profil.php" class="btn btn-secondary" style="float:right">
                Kembali
            </a>
        </form>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        $nama = $_POST['nm_user'];
        $password = $_POST['password'];

        if (!empty($password)) {
            $pass = md5($password);
            $sql = "UPDATE pengguna SET 
                nm_user='$nama',
                password='$pass'
                WHERE email='$email'";
        } else {
            $sql = "UPDATE pengguna SET 
                nm_user='$nama',
                WHERE email='$email'";
        }

        $query = $db->query($sql);

        if ($query) {
            $_SESSION['nm_user'] = $nama;

            echo "<script>
            alert('Profil berhasil diperbarui!');
            window.location.href = 'profil.php';
        </script>";
        } else {
            echo "<script>
            alert('Gagal mengubah profil!');
        </script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>