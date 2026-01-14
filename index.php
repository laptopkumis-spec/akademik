<?php
    session_start();

    if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header("location : login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Data Mahasiswa</title>
</head>

<body>
    <?Php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            if($page == 'data_mhs'){
                echo "";
            }elseif($page == 'create_mhs'){
                echo "";
            }elseif($page == 'edit_mhs'){
                echo "";
            }elseif($page == 'hapus_mhs'){
                echo "";
            }elseif($page == 'data_prodi'){
                echo "";
            }elseif($page == 'create_prodi'){
                echo "a";
            }elseif($page == 'edit_prodi'){
                echo "";
            }elseif($page == 'hapus_prodi'){
                echo "i";
            }else{
                echo "error pak dhe";
            }
        }
    ?>

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
        <div class="container">
            <a class="navbar-brand" href="#">Data Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="index.php?page=data_mhs">Mahasiswa</a>
                    <a class="nav-link" href="index.php?page=data_prodi">Program Studi</a>
                </div>
                <div class="ms-auto">
                    <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
                </div>

                <div class="ms-3">
                    <a href="../akademik/pengguna/profil.php" class="btn btn-outline-dark btn-sm">Profil</a>
                </div>

            </div>
        </div>
    </nav>
    <div class="container my-4">
        <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";

    if ($page == 'home') include("home.php");
    if ($page == 'data_mhs') include("mahasiswa2/list.php");
    if ($page == 'create_mhs') include("mahasiswa2/create.php");
    if ($page == 'edit_mhs') include("mahasiswa2/edit.php");
    if ($page == 'hapus_mhs') include("mahasiswa2/hapus.php");
    if ($page == 'data_prodi') include("prodi/list.php");
    if ($page == 'create_prodi') include("prodi/create.php");
    if ($page == 'edit_prodi') include("podi/edit.php");
    if ($page == 'hapus_prodi') include("prodi/hapus.php");
    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>