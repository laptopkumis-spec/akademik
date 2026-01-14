<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$email = $_SESSION['email'];

$query = $db->query("DELETE FROM pengguna WHERE email='$email'");

if ($query) {
    session_destroy();
    echo "<script>
        alert('Akun berhasil dihapus');
        window.location.href = '../login.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus akun');
        window.location.href = 'profil.php';
    </script>";
}