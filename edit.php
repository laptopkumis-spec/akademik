<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: NIM tidak ditemukan");
}

$nim = mysqli_real_escape_string($db, $_GET['id']);

$sql_select = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$result = mysqli_query($db, $sql_select);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Data mahasiswa tidak ditemukan");
}

$data = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $tanggal = mysqli_real_escape_string($db, $_POST['tanggal']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    
    $sql_update = "UPDATE mahasiswa SET 
                nm_mhs = '$nama', 
                tgl_lahir = '$tanggal', 
                alamat = '$alamat' 
                WHERE nim = '$nim'";
    
    $query = mysqli_query($db, $sql_update);
    
    if ($query) {
        echo "<script>
            alert('Data berhasil diubah!');
            window.location.href = 'index.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Gagal mengubah data: " . mysqli_error($db) . "');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1>Edit Data Mahasiswa</h1>
        <br>

        <form method="post" action="" class="container">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim"
                    value="<?php echo htmlspecialchars($data['nim']); ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    value="<?php echo htmlspecialchars($data['nm_mhs']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"
                    value="<?php echo htmlspecialchars($data['tgl_lahir']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat"
                    value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>