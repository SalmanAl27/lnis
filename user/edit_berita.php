<?php
include "../function/koneksi.php";
session_start();
if ($_SESSION['level'] != 'user') {
  header("location:login.php");
}

$take_username = $_SESSION['username'];
// $fetch_data = query("SELECT * FROM user WHERE username = '$username'");
$data = take_data("SELECT * FROM user WHERE username = '$take_username'");


if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $query = take_data("SELECT * FROM informasi INNER JOIN jenis ON informasi.jenis = jenis.id WHERE informasi.id = '$id'");
    if(isset($_POST['posting'])){
        $nama = $_POST['atas_nama'];
        $telp = $_POST['no_telp'];
        $ket = $_POST['keterangan'];
        $update = query("UPDATE informasi set atas_nama='$nama',hubungi='$telp',keterangan='$ket' WHERE id = '$id'");
        if ($update){
            header ("location: index.php");
        }
    }

    //   $file = $_FILES["gambar"]["name"];
//   $tmp_name = $_FILES["gambar"]["tmp_name"];
//   move_uploaded_file($tmp_name, "../assets/images/users/".$file);

  // $gambar = $file;
  // $user = $_POST['username'];
  // $pass = $_POST['password'];
  // $name = $_POST['nama'];
  // $no_telp = $_POST['no_telp'];
  // $update = query("UPDATE user SET password='$pass', gambar='$gambar', nama='$name', no_telp='$no_telp' WHERE username='$user'");
  
  //Ketika gambarnya kosong, maka gambar tidak akan diupdate
//   if(empty($_FILES["PHOTO"]["name"])){
//     $jenis = $_POST['jenis'];
//     $plat_nomor = $_POST['plat_nomor'];
//     $atas_nama = $_POST['atas_nama'];
//     $hubungi = $_POST['hubungi'];
//     $keterangan = $_POST['keterangan'];
//     $waktu = $_POST['waktu'];
//     $pengirim = $_POST['pengirim'];
//     $berita = $_POST['berita'];
//     $update = query("UPDATE informasi SET jenis='$jenis', plat_nomor='$plat_nomor', atas_nama='$atas_nama', hubungi='$hubungi', keterangan='$keterangan', waktu='$waktu', berita='$berita' WHERE id='$id'");
//   }
//   //Ketika gambarnya diganti
//   else{
//     $jenis = $_POST['jenis'];
//     $plat_nomor = $_POST['plat_nomor'];
//     $atas_nama = $_POST['atas_nama'];
//     $hubungi = $_POST['hubungi'];
//     $keterangan = $_POST['keterangan'];
//     $waktu = $_POST['waktu'];
//     $pengirim = $_POST['pengirim'];
//     $berita = $_POST['berita'];
//     $update = query("UPDATE informasi SET jenis='$jenis', plat_nomor='$plat_nomor', atas_nama='$atas_nama', hubungi='$hubungi', keterangan='$keterangan', waktu='$waktu', berita='$berita' WHERE id='$id'");
//   }

  // $statement->bindValue(':gambar', $file);
//   if ($update) {
//     header("location:index.php");
//   } else {
//     echo "Update Data Failed!!";
//   }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cssku.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>HALAMAN REGISTER</title>
</head>

<body>
    <section class="bg-primary">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-3">Edit Berita</h3>

                            <form action="" method="post" enctype="multipart/form-data">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="mt-1">Jenis Informasi</div>
                                        </td>
                                        <td>
                                            <?=$query['berita']?>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="mt-1">Jenis Benda</div>
                                        </td>
                                        <td>
                                            <?=$query['barang']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Plat Nomor</div>
                                        </td>
                                        <td>
                                            <input style="text-transform:uppercase" type="text" name="plat_nomor"
                                                id="plat_nomor" class="form-control" value="<?=$query['plat_nomor']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Nama Pemilik</div>
                                        </td>
                                        <td>
                                            <input type="text" name="atas_nama" id="atas_nama" class="form-control"
                                                value="<?=$query['atas_nama']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">No Telp Untuk Dihubungi</div>
                                        </td>
                                        <td>
                                            <input type="text" name="no_telp" id="no_telp" class="form-control"
                                                value="<?=$query['hubungi']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Keterangan</div>
                                        </td>
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control"
                                                rows="5"><?=$query['keterangan']?></textarea>
                                        </td>
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary" href="index.php"
                                        data-bs-dismiss="modal">Batal</a>
                                    <input type="submit" name="posting" value="Posting" class="btn btn-success"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    document.getElementById("image").onchange = function() {
        document.getElementById("form").submit();
    };

    const showPassword = document.querySelector("#show-password");
    const passwordField = document.querySelector("#password");

    function showpassword(event) {
        event.target.classList.toggle("fa-eye")
        event.target.classList.toggle("fa-eye-slash");
        const input_pass = document.getElementById("password");
        if (input_pass.getAttribute("type") == "password") {
            input_pass.setAttribute("type", "text");
        } else {
            input_pass.setAttribute("type", "password");
        }
    }
    // showPassword.addEventListener("click", function(){
    //   this.classList.remove("fa-eye")
    //   const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    //   passwordField.setAttribute("type", type);
    // })
    </script>
</body>

</html>