<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['admin'] != 'admin') {
  header("location:../user/login.php");
}
include "template/header.php";
include "template/sidemenu.php";
?>

<!-- Content -->
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h4>Beranda</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        Disini Tempat Content
      </div>
    </div>
  </div>
</main>
<!-- EndContent -->
<?php
include "template/footer.php";
?>