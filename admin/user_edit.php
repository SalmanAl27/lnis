<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['admin'] != 'admin') {
  header("location:../user/login.php");
}

$username = $_SESSION['username'];
$data = take_data("SELECT * FROM user WHERE username = '$username'");

if (isset($_POST['simpan'])) {
  $pass = $_POST['password'];
  $gambar = gambar('gambar')[3];
  $fotolama = $_POST['fotolama'];
  if ($gambar) {
    if (gambar('gambar')[0] === true && gambar('gambar')[1] < 1044070) {
      $update_user = query("UPDATE user SET password='$pass', gambar='$gambar' WHERE username='$username'");
      if ($update_user) {
        unlink("images/" . $fotolama);
        move_uploaded_file(gambar('gambar')[2], "images/" . $gambar);
        header("location:user_edit.php");
      } else {
        echo "Data Gagal Update";
      }
    }
  } else {
    $update_pass = query("UPDATE user SET password='$pass' WHERE username='$username'");
    if ($update_pass) {
      echo "Berhasil";
      header("location:user_edit.php");
    } else {
      echo "Data Gagal Di Update";
    }
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
        <h4>Edit Informasi</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card m-auto" style="width: 800px;">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nama" class="form-label"> FOTO PROFIL </label> <br>
                <img src="images/<?= $data['gambar'] ?>" alt="Foto Profil" style="width: 150px; margin-bottom: 15px;ir">
                <input class="form-control" type="file" name="gambar" id="gambar">
                <input type="hidden" class="form-control" id="fotolama" name="fotolama" value="<?= $data['gambar'] ?>">
              </div>
              <div class="mb-3">
                <label class="form-label" for="nama">PASSWORD </label>
                <input class="form-control" type="text" name="password" id="nama" value="<?= $data['password'] ?>">
              </div>
              <input type="submit" name="simpan" class="btn btn-success mt-3" value="SIMPAN">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- EndContent -->
<?php
include "template/footer.php";
?>