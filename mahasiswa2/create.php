<?php
// File: tambah.php
include("koneksi.php");

// Proses form jika disubmit
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $program_studi_id = $_POST['program_studi_id'];

    // Validasi sederhana
    if (empty($nim) || empty($nama) || empty($tanggal) || empty($alamat) || empty($program_studi_id)){
        $error = "Semua field harus diisi!";
    } else {
        // Cek apakah NIM sudah ada
        $cek_sql = "SELECT nim FROM mahasiswa WHERE nim = '$nim'";
        $cek_result = mysqli_query($db, $cek_sql);
        
        if (mysqli_num_rows($cek_result) > 0) {
            $error = "NIM <strong>$nim</strong> sudah terdaftar!";
        } else {
            // Simpan ke database
            $sql = "INSERT INTO mahasiswa (nim, nm_mhs, tgl_lahir, alamat, program_studi_id) 
                    VALUES ('$nim', '$nama', '$tanggal', '$alamat','$program_studi_id')";
            $query = mysqli_query($db, $sql);

            if ($query) {
                echo "<script>
                    alert('Data mahasiswa berhasil ditambahkan!');
                    window.location.href = 'index.php?page=data_mhs';
                </script>";
                exit;
            } else {
                $error = "Gagal menyimpan data: " . mysqli_error($db);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h4 class="mb-0">Tambah Data Mahasiswa</h4>
            </div>
            <div class="card-body">

                <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="post" action="">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Contoh: 2023081001"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-control" name="program_studi_id" required>
                            <option value="1">TRPL</option>
                            <option value="2">TK</option>
                            <option value="3">MI</option>
                            <option value="4">ANIMASI</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"
                            placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" name="submit" class="btn btn-success">
                            Simpan Data
                        </button>
                        <a href="index.php?page=data_mhs" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>