  <?php
  include "../function/koneksi.php";
  session_start();
  if($_SESSION['superadmin'] != 'superadmin'){
    header("location:login.php");
  }

  $data_admin = query("SELECT * FROM user WHERE level='user'");
  $no = 1;

  
  include "template/header.php";
  include "template/sidemenu.php";
  ?>

  <!-- offcanvas -->
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <h4>User - User</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama</th>
                <th>No Telpon</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data_admin as $data): ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$data['username']?></td>
                <td><?=$data['password']?></td>
                <td><?=$data['nama']?></td>
                <td><?=$data['no_telp']?></td>
                <td>
                  <a href="" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                  <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php include "template/footer.php" ?>