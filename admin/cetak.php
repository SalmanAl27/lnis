<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['admin'] != 'admin') {
  header("location:../user/login.php");
}

if (isset($_POST['cetak'])) {
  $bulan = $_SESSION['bulan'];
  $tahun = $_SESSION['tahun'];
  $output = '';
  $no = 1;
  $data = query("SELECT * FROM informasi INNER JOIN jenis ON informasi.jenis = jenis.id WHERE waktu BETWEEN " . "'$tahun-" . "$bulan-" . "1' AND '$tahun-" . $bulan . "-" . "30'");
  if (mysqli_num_rows($data) > 0) {
    $output .= '
      <table class="table" bordered="1" style="margin: auto;">
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
    ';
    while ($row = mysqli_fetch_array($data)) {
      $output .= '
          <tr>
              <td>' . $no++ . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['barang']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['plat_nomor']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['atas_nama']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['hubungi']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['keterangan']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['waktu']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['pengirim']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['berita']) . '</td>
              <td>' . ($row < 1 ? "No Data" : $row['gambar']) . '</td>
          </tr>
        ';
    }
    $output .= '<table>';
    header("Content-Type: application/xls");
    header("Content-Disposition:attachment; filename=download.xls");
    echo $output;
  }
}