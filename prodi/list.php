<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>

<body class="bg-light">
    <div class="container" style="align-items: center;">
        <h1 style="font-family: 'Merriweather', Georgia, serif; text-align: center;">Data Program Studi</h1>

        <table class="table table-bordered table-striped-columns">
            <thead class="table-warning">
                <tr>
                    <td>ID</td>
                    <td>Nama Prodi</td>
                    <td>Jenjang</td>
                    <td>Akreditasi</td>
                    <td>Keterangan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    require('koneksi.php');
                
                    $tampil = $db->query("SELECT * from program_studi");
                    while ($data = mysqli_fetch_assoc($tampil)){
                ?>

                <tr>
                    <td>
                        <?= $data['id'];?>
                    </td>
                    <td>
                        <?= $data['nama_prodi']?>
                    </td>
                    <td>
                        <?= $data['jenjang']?>
                    </td>
                    <td>
                        <?= $data['akreditasi']?>
                    </td>
                    <td>
                        <?= $data['keterangan']?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?=$data['id']?>" class="btn btn-warning btn-sm">Edit</a>
                        <a> | </a>
                        <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?');">Hapus</a>
                    </td>
                </tr>
                <?Php }?>
            </tbody>
        </table>
        <a href="index.php?page=create_prodi" class="btn btn-primary mb-3">Input Data Program Studi</a>
        <a href="index.php?page=create_mhs" class="btn btn-primary mb-3">Input Data Mahasiswa</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>