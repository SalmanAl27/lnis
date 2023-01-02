<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['admin'] != 'admin') {
  header("location:../user/login.php");
}
$no = 1;
$take_data = query("SELECT * FROM notif");
 
$data_users = query("SELECT * FROM user WHERE level = 'user'");

if (isset($_POST['submit'])) {
  $deskripsi = $_POST['deskripsi'];
  
  $submit = query("INSERT INTO notif VALUES ('','$deskripsi')");
  if ($submit) {
    header("location:notifikasi.php");
  } else {
    echo "Data Added Failed";
  }
  
}

if(isset($_GET['id_hapus'])){
  $id_notif = $_GET['id_hapus'];

  $notif_query = query("DELETE FROM notif WHERE id_notif = '$id_notif'");
  if($notif_query){
    header("location: notifikasi.php");
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
        <h4>Notifikasi</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah">
          Tambah Notifikasi
        </button>
        <table class="table">
          <thead>
            <tr>
              <th style="width: 50px;" scope="col">#</th>
              <th style="width: 150px;" scope="col" >Deskripsi</th>
              <th scope="col" style="width: 50px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($take_data as $info) : ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= $info['deskripsi'] ?></td>
              <td>
                <a href="notifikasi.php?id_hapus=<?= $info['id_notif'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i> </a>
           
                
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>



        <!-- Modal -->
        <div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <!-- <input type="text" class="form-control" name="deskripsi"> -->
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit"
                  id="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
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