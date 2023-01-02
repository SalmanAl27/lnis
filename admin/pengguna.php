<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['admin'] != 'admin') {
  header("location:../user/login.php");
}
$no = 1;
$data_users = query("SELECT user.* FROM user WHERE user.level = 'user' AND user.no_telp NOT IN (SELECT user_blacklist.no_telp FROM user_blacklist)");

if (isset($_GET['id_hapus'])) {
  $id = $_GET['id_hapus'];
  $ambil_data = take_data("SELECT * FROM user WHERE id='$id'");
  $data_username = $ambil_data['username'];
  $data_no_telp = $ambil_data['no_telp'];
  $data_user_gambar = $ambil_data['gambar'];
  $tambah_warning = query("INSERT INTO user_warning VALUES('','$data_no_telp',NOW())");
  $hapus_komentar = query("DELETE FROM komentar WHERE pengirim='$data_username'");
  $hapus_informasi = query("DELETE FROM informasi WHERE pengirim='$data_username'");
  $hapus_user = query("DELETE FROM user WHERE id = '$id'");

  $ambil_data_nomor_warning = query("SELECT * FROM user_warning WHERE no_telp='$data_no_telp'");
  $total_data_warning = mysqli_num_rows($ambil_data_nomor_warning);
  if ($total_data_warning >= 3) {
    $tambah_data_blacklist = query("INSERT INTO user_blacklist VALUES ('','$data_no_telp',NOW())");
    if ($tambah_data_blacklist) {
      query("DELETE FROM user_warning WHERE no_telp ='$data_no_telp'");
    }
  }

  if ($hapus_user && $hapus_komentar && $hapus_informasi) {
    if ($data_user_gambar != "") {
      unlink("../assets/images/users/" . $data_user_gambar);
      header("location:pengguna.php");
    } else {
      header("location:pengguna.php");
    }
  }
}

if (isset($_GET['id_block'])) {
  $id = $_GET['id_block'];
  $ambil_data = take_data("SELECT * FROM user WHERE id='$id'");
  $data_username = $ambil_data['username'];
  $data_no_telp = $ambil_data['no_telp'];
  // $data_user_gambar = $ambil_data['gambar'];
  // $tambah_warning = query("INSERT INTO user_warning VALUES('','$data_no_telp',NOW())");
  $hapus_komentar = query("DELETE FROM komentar WHERE pengirim='$data_username'");
  $hapus_informasi = query("DELETE FROM informasi WHERE pengirim='$data_username'");
  // $hapus_user = query("DELETE FROM user WHERE id = '$id'");

  // $ambil_data_nomor_warning = query("SELECT * FROM user_warning WHERE no_telp='$data_no_telp'");
  // $total_data_warning = mysqli_num_rows($ambil_data_nomor_warning);
  // if ($total_data_warning >= 3) {
    $tambah_data_blacklist = query("INSERT INTO user_blacklist VALUES ('','$data_no_telp',NOW())");
    // if ($tambah_data_blacklist) {
      // query("DELETE FROM user_warning WHERE no_telp ='$data_no_telp'");
    // }
  // }

  if ($tambah_data_blacklist) {
      header("location:pengguna.php");
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
        <h4>Halaman Pengguna</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 50px;" scope="col">#</th>
              <th style="width: 150px;" scope="col">Id Pengguna</th>
              <th style="width: 350px;" scope="col">Nama</th>
              <th style="width: 250px;" scope="col">Nomor Telp</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_users as $users) : ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= $users['username'] ?></td>
              <td><?= $users['nama'] ?></td>
              <td><?= $users['no_telp'] ?></td>
              <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                  data-bs-target="#DataUsers<?= $users['id'] ?>"><i class=" bi bi-eye"></i> </button>
                <?php include "template/modal_user.php" ?>
                <a href="?id_hapus=<?= $users['id'] ?>" class="btn btn-warning"><i class="bi bi-trash"></i> </a>
                <a href="?id_block=<?= $users['id'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i> </a>
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