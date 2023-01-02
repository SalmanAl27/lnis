<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['level'] != 'user') {
  header("location:login.php");
}

$id = $_SESSION['username'];
$akun = take_data("SELECT * FROM user where username = '$id'");

$information = query("SELECT user.nama,informasi.*,jenis.barang FROM user INNER JOIN informasi ON user.username = informasi.pengirim INNER JOIN jenis ON informasi.jenis = jenis.id WHERE informasi.berita = 'Kehilangan'");
?>
<?php
include "template_index/head_index.php";
include "template_index/nav_index.php";
?>

<section class="page-section bg-light" id="portfolio">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase">Berita Kehilangan</h2>
      <h3 class="section-subheading text-muted">Semoga barang anda cepat di temukan</h3>
    </div>
    <div class="row">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($information as $data_information) : ?>
        <div class="col">
          <div class="card h-100">
            <div class="card-header">
              <?= $data_information['nama'] ?>
            </div>
            <img style="width: 345px; height: 250px;" src="../assets/images/<?= $data_information['gambar'] ?>"
              class="card-img-top ps-3 pt-3 pe-3" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Informasi <?= $data_information['berita'] ?></h5>
              <table class="table">
                <tr>
                  <td>Jenis</td>
                  <td> <?= $data_information['barang'] ?></td>
                </tr>
                <tr>
                  <td>Plat Nomor</td>
                  <td style="text-transform: uppercase;"> <?= $data_information['plat_nomor'] ?></td>
                </tr>
                <tr>
                  <td>Atas Nama</td>
                  <td> <?= $data_information['atas_nama'] ?></td>
                </tr>
                <tr>
                  <td>Hubungi</td>
                  <td> <?= $data_information['hubungi'] ?></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td><?= $data_information['keterangan'] ?></td>
                </tr>
              </table>
            </div>
            <div class="card-footer">
              <small class="text-muted"><?= $data_information['waktu'] ?></small>
              <a href="komentar.php?information_id=<?= $data_information['id'] ?>" <i
                class="bi bi-chat-dots-fill float-end"></i></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php
include "template_index/footer_index.php";
?>