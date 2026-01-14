<?php

include("koneksi.php");
$nim = $_GET['id'];
$hapus = mysqli_query($db, "DELETE FROM program_studi WHERE id='$nim'");
if ($hapus) {
    header("location:index.php?page=data_prodi");
} else {
    echo "Gagal menghapus data";
}