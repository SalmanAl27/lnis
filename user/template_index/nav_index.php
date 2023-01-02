<?php
if (isset($_POST['posting'])) {
  if ($_SESSION['level'] != 'user') {
    header("location:login.php");
  } else {
    $id = $_SESSION['username'];
    $jenis_informasi = $_POST['posting_info'];
    $jenis_benda = $_POST['benda'];
    $plat_nomor = $_POST['plat_nomor'];
    $atas_nama = $_POST['atas_nama'];
    $no_telp = $_POST['no_telp'];
    $keterangan = $_POST['keterangan'];
    $gambar = gambar('gambar')[3];
    if ($jenis_informasi != "" && $jenis_benda != "" && $plat_nomor != "" && $atas_nama != "" && $no_telp != "" && $keterangan != "" && gambar('gambar')[0] === true) {
      if (gambar('gambar')[1] < 1044070) {
        move_uploaded_file(gambar('gambar')[2], '../assets/images/' . $gambar);
        $post_info = query("INSERT INTO informasi VALUES ('','$jenis_benda','$plat_nomor','$atas_nama','$no_telp','$keterangan',NOW(),'$id','$jenis_informasi','$gambar')");
        if ($post_info) {
          header("location:index.php");
        } else {
          echo ("Data gagal di tambahkan");
        }
      } else {
        echo "Ukuran data terlalu besar";
      }
    } else {
      echo "Data tidak boleh kosong";
    }
  }
}

$notif_query = query("SELECT * FROM notif");


?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">LNIS UTM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index_kehilangan.php">Kehilangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="index_ditemukan.php">Menemukan</a></li>
                    <div class="dropdown">
                        <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php foreach($notif_query as $notif) : ?>
                            <li><a class="dropdown-item"><?= $notif['deskripsi'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn text-white dropdown-toggle pe-5" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $akun['nama'] ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="settingaccount.php">Setting Account</a></li>
                            <li><a class="dropdown-item" href="logoutuser.php">Logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <div class="masthead">
        <div class="container">
            <div class="masthead-subheading">SELAMAT DATANG DI LNIS UTM</div>
            <div class="masthead-heading text-uppercase">LOSS NEWS INFORMATION SYSTEM</div>
            <a href="../user/tambah_berita.php">
                <button type="button" class="btn btn-primary btn-xl text-uppercase">+ Tambah Informasi</button>
            </a>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>
                                    <div class="mt-1">Jenis Informasi</div>
                                </td>
                                <td>
                                    <input type="radio" class="btn-check" name="posting_info" id="danger-outlined"
                                        autocomplete="off" value="Kehilangan">
                                    <label class="btn btn-outline-danger" for="danger-outlined">Kehilangan</label>
                                    <input type="radio" class="btn-check" name="posting_info" id="success-outlined"
                                        autocomplete="off" value="Ditemukan">
                                    <label class="btn btn-outline-success" for="success-outlined">Ditemukan</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mt-1">Gambar</div>
                                </td>
                                <td>
                                    <input type="file" name="gambar" id="gambar" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mt-1">Jenis Benda</div>
                                </td>
                                <td>
                                    <?php
                  $value_jenis = query("SELECT * FROM jenis");
                  ?>
                                    <select name="benda" id="benda" class="form-control">
                                        <option value="">Benda Yang Hilang -></option>
                                        <?php foreach ($value_jenis as $jenis) : ?>
                                        <option value="<?= $jenis['id'] ?>"><?= $jenis['barang'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mt-1">Plat Nomor</div>
                                </td>
                                <td>
                                    <input style="text-transform:uppercase" type="text" name="plat_nomor"
                                        id="plat_nomor" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mt-1">Nama Pemilik</div>
                                </td>
                                <td>
                                    <input type="text" name="atas_nama" id="atas_nama" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mt-1">No Telp Untuk Dihubungi</div>
                                </td>
                                <td>
                                    <input type="text" name="no_telp" id="no_telp" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="mt-1">Keterangan</div>
                                </td>
                                <td>
                                    <textarea name="keterangan" id="keterangan" class="form-control"
                                        rows="5"></textarea>
                                </td>
                            </tr>
                        </table>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                            <input type="submit" name="posting" value="Posting" class="btn btn-success"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>