<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['admin'] != 'admin') {
  header("location:../user/login.php");
}
include "template/header.php";
include "template/sidemenu.php";
?>

<?php
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
if (isset($_POST['informasi'])) :
  $data = query("SELECT * FROM informasi INNER JOIN jenis ON informasi.jenis = jenis.id WHERE waktu BETWEEN " . "'$tahun-" . "$bulan-" . "1' AND '$tahun-" . $bulan . "-" . "30'");
  $no = 1;
  $_SESSION['bulan'] = $bulan;
  $_SESSION['tahun'] = $tahun;
?>

<!-- Content -->
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 text-center">
        <h4>Cetak Informasi Bulanan</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php if (mysqli_num_rows($data) > 0) : ?>
        <table class="table" style="margin: auto;">
          <thead>
            <tr>
              <th> NO </th>
              <th> Jenis </th>
              <th> Plat Nomor </th>
              <th> atas_nama </th>
              <th> hubungi </th>
              <th> Keterangan </th>
              <th> waktu </th>
              <th> pengirim </th>
              <th> berita </th>
              <th> Gambar </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $dt) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['barang']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['plat_nomor']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['atas_nama']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['hubungi']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['keterangan']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['waktu']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['pengirim']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['berita']) ?></td>
              <td><?= ($dt < 1 ? "No Data" : $dt['gambar']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <form action="cetak.php" method="post">
          <input type="submit" name="cetak" class="btn btn-success mt-3" value="Cetak Excel">
        </form>
        <?php else : ?>
        <?= "NO DATA ??" ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>
<?php endif; ?>
<!-- EndContent -->





<?php
include "template/footer.php";
?>