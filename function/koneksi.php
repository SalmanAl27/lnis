<?php
$conn = mysqli_connect("localhost", "root", "", "p_db_lnis");
if (!$conn) {
  echo "Connection Failed";
}

function query($q)
{
  global $conn;
  $result = mysqli_query($conn, $q);
  return $result;
}

function take_data($q)
{
  global $conn;
  $result = mysqli_query($conn, $q);
  $take = mysqli_fetch_assoc($result);
  return $take;
}

function gambar($data)
{
  global $conn;
  $eks = array('png', 'jpg', 'jpeg');
  $gambar = $_FILES[$data]['name'];
  $x = explode('.', $gambar);
  $eksten = strtolower(end($x));
  $ukuran = $_FILES[$data]['size'];
  $tmp_file = $_FILES[$data]['tmp_name'];
  $ekstensi = in_array($eksten, $eks);

  return [$ekstensi, $ukuran, $tmp_file, $gambar];
}
