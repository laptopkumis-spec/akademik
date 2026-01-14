<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<body class=" bg-light">
    <div class="container mt-4">

        <h1 style="font-family: 'Merriweather', Georgia, serif; text-align: center;">DATA MAHASISWA TEKNOLOGI INGORMASI
        </h1>

        <table class="table table-bordered table-striped-columns">
            <thead>
                <tr class="table-warning" style="text-align: center;">
                    <th scope="col">No</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("koneksi.php");
                $sql = "SELECT m.*,p.nama_prodi from mahasiswa m left join program_studi p on m.program_studi_id = p.id ";
                $query = mysqli_query($db, $sql);
                
                if (!$query) {
                    echo "<tr><td colspan='5' class='text-center text-danger'>Error: " . mysqli_error($db) . "</td></tr>";
                } else if (mysqli_num_rows($query) == 0) {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data mahasiswa</td></tr>";
                } else {
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)){
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . htmlspecialchars($data['nim']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['nm_mhs']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['tgl_lahir']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['alamat']) . "</td>"; 
                        echo "<td>" . htmlspecialchars($data['nama_prodi']) . "</td>";
                        echo "<td style='text-align: center;'>";
                        echo "<a href='mahasiswa2/edit.php?id=" . $data['nim'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                        echo " | ";
                        echo "<a href='mahasiswa2/hapus.php?id=" . $data['nim'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center mb-3">
            <a href="index.php?page=create_mhs" class="btn btn-success mx- 5" style="margin-right: 20px;">Tambah Data
                Mahasiswa</a>

            <a href="index.php?page=create_prodi" class="btn btn-success">Tambah Data Prodi</a>
        </div>

        <div class="mt-4 pt-3 border-top text-center text-muted">
            <small>
                Muhammad Aufi Syahyudi &copy; <?php echo date('Y'); ?> - Teknologi Rekayasa Perangkat Lunak
                <br>
                Teknologi Informasi - Politeknik Negeri Padang
            </small>
        </div>
    </div>
    <title>Document</title>
</head>

<body>

</body>

</html>