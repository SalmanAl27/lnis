<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['admin'] != 'admin') {
  header("location:../user/login.php");
}

$no = 1;

if (isset($_GET['id_hapus'])) {
  $id_hapus = $_GET['id_hapus'];
  $ambil_data = take_data("SELECT pengirim FROM informasi WHERE id = '$id_hapus'");
  $username_pengirim = $ambil_data['pengirim'];
  $hapus_komentar = query("DELETE FROM komentar WHERE id_informasi = '$id_hapus'");
  $hapus_berita = query("DELETE FROM informasi WHERE id = '$id_hapus'");
  $hapus_komentar_user = query("DELETE FROM komentar WHERE pengirim = '$username_pengirim'");
  if ($hapus_berita && $hapus_komentar) {
    header('Location:berita.php');
  } else {
    echo "Data gagal di hapus";
  }
}

include "template/header.php";
include "template/sidemenu.php";
?>

<!-- Content -->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Halaman Berita</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $data = query("SELECT informasi.*,jenis.barang,user.nama FROM informasi INNER JOIN jenis ON informasi.jenis = jenis.id INNER JOIN user ON informasi.pengirim = user.username"); ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Berita</th>
                            <th>Jenis</th>
                            <th>Pengirim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dt) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt['berita'] ?></td>
                            <td><?= $dt['barang'] ?></td>
                            <td><?= $dt['nama'] ?></td>
                            <td>
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#ViewBerita<?= $dt['id'] ?>" class="btn btn-success"><i
                                        class="bi bi-eye"></i></button>
                                <?php include "template/modal_berita.php" ?>
                                <a href="adminedit_berita.php?id_edit=<?=$dt['id']?>" class="btn btn-warning"><i
                                        class="bi bi-pencil"></i></a>
                                <a href="?id_hapus=<?= $dt['id'] ?>" class="btn btn-danger"><i
                                        class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>
<!-- EndContent -->
<?php
include "template/footer.php";
?>