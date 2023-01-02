<?php
include "../../function/koneksi.php";
session_start();
if (!$_SESSION['username']) {
  header("location:../login.php");
}
$id_hapus = $_GET['id_hapus'];
$hapus_komentar = query("DELETE FROM komentar WHERE id = $id_hapus ");
if ($hapus_komentar) {
  header("location:../index.php");
}
