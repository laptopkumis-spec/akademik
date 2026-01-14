<?php

include("../koneksi.php");
$nim = $_GET['id'];
$hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$nim'");
if ($hapus) {
    header("location:../index.php?page=data_mhs");
} else {
    echo "Gagal menghapus data";
}