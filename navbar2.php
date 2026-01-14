<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-university me-2"></i>Data Mahasiswa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= (!isset($_GET['page']) || $_GET['page'] == 'home') ? 'active' : '' ?>"
                            href="index.php">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['page']) && ($_GET['page'] == 'data_mahasiswa' || $_GET['page'] == 'create_mahasiswa' || $_GET['page'] == 'edit_mahasiswa')) ? 'active' : '' ?>"
                            href="index.php?page=data_mhs">
                            <i class="fas fa-users me-1"></i>Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['page']) && ($_GET['page'] == 'data_prodi' || $_GET['page'] == 'create_prodi' || $_GET['page'] == 'edit_prodi')) ? 'active' : '' ?>"
                            href="index.php?page=data_prodi">
                            <i class="fas fa-graduation-cap me-1"></i>Program Studi
                        </a>
                    </li>
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] === TRUE): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/edit_profile.php">
                            <i class="fas fa-user-cog me-1"></i>Edit Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/logout.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                            (<?= isset($_SESSION['nama']) ? htmlspecialchars($_SESSION['nama']) : 'User' ?>)
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/login.php">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/register.php">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>