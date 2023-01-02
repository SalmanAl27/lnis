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
      <div class="col-md-12 text-center">
        <h4>Cetak Laporan Bulanan</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card m-auto" style="width: 800px;">
          <div class="card-body">
            <form action="export.php" method="post">
              <label for="tahun" class="mb-2"> TAHUN </label>
              <select class="form-control mb-2" name="tahun" id="tahun">
                <option selected="selected">TAHUN</option>
                <?php
                $angka = 2022;
                $batas = 2040;
                while ($angka <= $batas) : ?>
                  <option value="<?= $angka ?>"><?= $angka ?></option>
                <?php
                  $angka++;
                endwhile; ?>
              </select>
              <label for="bulan" class="mb-2"> BULAN </label>
              <select name="bulan" id="bulan" class="form-control">
                <option selected=”selected”>BULAN</option>
                <?php
                $bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "July", "Agustus", "September", "Oktober", "November", "Desember");
                for ($bulan = 1; $bulan <= 12; $bulan++) {
                  if ($bulan <= 9) {
                    echo "<option value='$bulan'>$bln[$bulan]</option>";
                  } else {
                    echo "<option value='$bulan'>$bln[$bulan]</option>";
                  }
                }
                ?>
              </select>
              <input type="submit" class="btn btn-primary mt-3" name="informasi" value="LIHAT BERITA">
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