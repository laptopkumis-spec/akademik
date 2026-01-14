<?php 
    require('koneksi.php');

    if(isset($_POST['submit'])){
        $nama = $_POST['nama_prodi'];
        $jenjang = $_POST['jenjang'];
        $akreditasi = $_POST['akreditasi'];
        $keterangan = $_POST['keterangan'];

        $sql = "INSER INTO program_studi(nama_prodi,jenjang,akreditasi,keterangan)
                Values ('$nama','$jenjang','$akreditasi','$keterangan')";
        $query = $db->query($sql);

        if($query){
            echo "<script>
                alert('Berhasil Menyimpa Data');
                window.location.href = 'index.php?page=data_prodi';
            </script>";
        }else{
            echo "Gagal Menyimpan Data";
        }
    }
?>