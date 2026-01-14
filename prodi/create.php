<?php
// File: tambah.php
include("koneksi.php");

// Proses form jika disubmit
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $akreditasi = $_POST['akreditasi'];
    $keterangan = $_POST['keterangan'];

    // Validasi sederhana
    if (empty($id) || empty($nama_prodi) || empty($jenjang) || empty($akreditasi) || empty($keterangan)) {
        $error = "Semua field harus diisi!";
    } else {
        // Cek apakah NIM sudah ada
        $cek_sql = "SELECT id FROM program_studi WHERE id = '$id'";
        $cek_result = mysqli_query($db, $cek_sql);
        
        if (mysqli_num_rows($cek_result) > 0) {
            $error = "ID <strong>$id</strong> sudah terdaftar!";
        } else {
            // Simpan ke database
            $sql = "INSERT INTO program_studi (id, nama_prodi, jenjang, akreditasi, keterangan) 
                    VALUES ('$id', '$nama_prodi', '$jenjang', '$akrediatsi', '$keterangan')";
            $query = mysqli_query($db, $sql);

            if ($query) {
                echo "<script>
                    alert('Data Prodi berhasil ditambahkan!');
                    window.location.href = 'index.php?page=data_prodi';
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
    <title>Tambah Data Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h4 class="mb-0">Tambah Data Program Studi</h4>
            </div>
            <div class="card-body">

                <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="post" action="">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Contoh: 1,2,3" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Program Studi <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                            placeholder="Masukkan nama Program Studi" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenjang" class="form-label">Jenjang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="jenjang" name="jenjang" placeholder="D2,D3,D4,S1"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="akreditasi" class="form-label">Akreditasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="akreditasi" name="akreditasi"
                            placeholder="Masukkan Akreditasi : A,B,C" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
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