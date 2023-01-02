<?php
include "../../function/koneksi.php";
session_start();
if (!$_SESSION['username']) {
  header("location:../login.php");
}
$id = $_GET['id_hapus'];
$query = query("DELETE FROM informasi WHERE id = '$id'"); 
if($query){
    header('location:../index.php');
}