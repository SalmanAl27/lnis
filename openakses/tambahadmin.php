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
        <div class="col-md-12 text-center">
          <h4>Tambah Admin</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-2">
          <table style="width: 800px;" class="table m-auto">
            <form action="" method="" enctype="multipart/form-data">
              <tr>
                <td>
                  <label for="username"> USERNAME </label>
                </td>
                <td>
                  <input type="text" class="form-control" id="username" name="username" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="username"> PASSWORD </label>
                </td>
                <td>
                  <input type="text" class="form-control" id="password" name="password" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="username"> NAMA </label>
                </td>
                <td>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="username"> No Telp </label>
                </td>
                <td>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="username"> Foto </label>
                </td>
                <td>
                  <input type="file" class="form-control" id="gambar" name="gambar" required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <input type="submit" class="btn btn-success form-control" value="SIMPAN">
                </td>
              </tr>
            </form>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php include "template/footer.php" ?>