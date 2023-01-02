<?php
error_reporting(0); #untuk menghilangkan pesan warning
$data = $data_information['id'];
$komen = query("SELECT komentar.*,user.nama FROM komentar INNER JOIN user on komentar.pengirim = user.username WHERE id_informasi = $data");
$total_data = mysqli_num_rows($komen);
if (isset($_POST['submit_komentar'])) {
  $id_information = $data;
  $pengirim = $_SESSION['username'];
  $isi_komentar = $_POST['komentar' . $data];
  if ($isi_komentar != "") {
    $post_komentar = query("INSERT INTO komentar VALUES('','$id_information','$pengirim',NOW(),'$isi_komentar')");
    if ($post_komentar) {
      echo "Data berhasil di posting";
      header("location:index.php");
    } else {
      echo "Data gagal di upload";
    }
  }
}
?>
<div class="modal fade " id="CommentPost<?= $data_information['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Komentar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <textarea name="komentar<?= $data_information['id'] ?>" id="komentar" cols="47" rows="3" placeholder="Komentar disini....."></textarea>
          <input class="float-end" type="submit" name="submit_komentar" id="submit_komentar" value="kirim">
        </form>
      </div>
      <?php if ($total_data < 1) : ?>
        <div class="card mb-3">
          <div class="card-body">
            Tidak ada Komentar
          </div>
        </div>
      <?php endif; ?>
      <?php if ($total_data > 0) : ?>
        <div class="modal-body modal-dialog-scrollable">
          <?php foreach ($komen as $komentar) : ?>
            <div class="card mb-3">
              <div class="card-header text-muted">
                <div class="float-start">
                  <?= $komentar['nama'] ?>
                </div>
                <div class="float-end">
                  <?= $komentar['waktu'] ?>
                </div>
              </div>
              <div class="card-body">
                <?= $komentar['isi'] ?>
              </div>
              <div class="card-footer">
                <?php if ($komentar['pengirim'] == $_SESSION['username']) : ?>
                  <a href="function/delete_komentar.php?id_hapus=<?= $komentar['id'] ?>" class="float-end"><i class="bi bi-trash-fill fs-5"></i></a>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>