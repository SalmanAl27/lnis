<?php
include "../../function/koneksi.php";
session_start();
if (!$_SESSION['username']) {
  header("location:../login.php");
}
$id_hapus = $_GET['id_hapus'];
$hapus_notif = query("DELETE FROM notif WHERE id_notif = $id_hapus ");
if ($hapus_notif) {
  header("location:notifikasi.php");
} else {
  echo "Data delete Failed";
} 
