<?php
session_start();
if (!$_SESSION['level']) {
  header("location:login.php");
}
session_destroy();
header("location:../index.php");
