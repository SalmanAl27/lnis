<?php
include "function/koneksi.php";
$information = query("SELECT user.nama,informasi.*,jenis.barang FROM user INNER JOIN informasi ON user.username = informasi.pengirim INNER JOIN jenis ON informasi.jenis = jenis.id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LNIS UTM</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">LNIS UTM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Kehilangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menemukan</a></li>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle me-4" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Akun
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="user/login.php">Login</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">SELAMAT DATANG DI LNIS UTM</div>
            <div class="masthead-heading text-uppercase">LOSS NEWS INFORMATION SYSTEM</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="user/login.php">+ Tambah Informasi</a>
        </div>
    </header>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Berita Sekitar UTM</h2>
                <h3 class="section-subheading text-muted">Tempat berbagi informasi kehilangan atau berita ditemukannya suatu barang</h3>
            </div>
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($information as $data_information) : ?>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-header">
                                    <?= $data_information['nama'] ?>
                                </div>
                                <img src="assets/images/<?= $data_information['gambar'] ?>" class="card-img-top ps-3 pt-3 pe-3" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Informasi <?= $data_information['berita'] ?></h5>
                                    <table class="table">
                                        <tr>
                                            <td>Jenis</td>
                                            <td> <?= $data_information['barang'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Plat Nomor</td>
                                            <td> <?= $data_information['plat_nomor'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Atas Nama</td>
                                            <td> <?= $data_information['atas_nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Hubungi</td>
                                            <td> <?= $data_information['hubungi'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td><?= $data_information['keterangan'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"><?= $data_information['waktu'] ?></small>
                                    <a href="komentar.php?information_id=<?= $data_information['id'] ?>" <i class="bi bi-chat-dots-fill float-end"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>