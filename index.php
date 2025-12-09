<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Mahasiswa</title>
</head>

<body class="bg-light">
    <div class="container mt-4">

        <h1 style="font-family: 'Merriweather', Georgia, serif; text-align: center;">DATA MAHASISWA KELAS 2 C TRPL</h1>

        <table class="table table-bordered table-striped-columns">
            <thead>
                <tr class="table-warning" style="text-align: center;">
                    <th scope="col">No</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("koneksi.php");
                $sql = "SELECT * FROM mahasiswa";
                $query = mysqli_query($db, $sql);
                
                if (!$query) {
                    echo "<tr><td colspan='5' class='text-center text-danger'>Error: " . mysqli_error($db) . "</td></tr>";
                } else if (mysqli_num_rows($query) == 0) {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data mahasiswa</td></tr>";
                } else {
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . htmlspecialchars($data['nim']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['nm_mhs']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['tgl_lahir']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                        echo "<td style='text-align: center;'>";
                        echo "<a href='edit.php?id=" . $data['nim'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                        echo " | ";
                        echo "<a href='hapus.php?id=" . $data['nim'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center mb-3">
            <a href="tambah.php" class="btn btn-success">Tambah Data Mahasiswa</a>
        </div>

        <div class="mt-4 pt-3 border-top text-center text-muted">
            <small>
                Muhammad Aufi Syahyudi &copy; <?php echo date('Y'); ?> - Teknologi Rekayasa Perangkat Lunak
                <br>
                Teknologi Informasi - Politeknik Negeri Padang
            </small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>