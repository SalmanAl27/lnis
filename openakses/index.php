  <?php 
  include "../function/koneksi.php";
  session_start();
  if($_SESSION['superadmin'] != 'superadmin'){
    header("location:login.php");
  }
  
  include "template/header.php";
  include "template/sidemenu.php";
  ?>

  <!-- offcanvas -->
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
  <?php include "template/footer.php" ?>