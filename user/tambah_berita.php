<?php
include "../function/koneksi.php";
session_start();

if (isset($_POST['posting'])) {
  if ($_SESSION['level'] != 'user') {
    header("location:login.php");
  } else {
    $id = $_SESSION['username'];
    $jenis_informasi = $_POST['posting_info'];
    $jenis_benda = $_POST['benda'];
    $plat_nomor = $_POST['plat_nomor'];
    $atas_nama = $_POST['atas_nama'];
    $no_telp = $_POST['no_telp'];
    $keterangan = $_POST['keterangan'];
    $gambar = gambar('gambar')[3];
    if ($jenis_informasi != "" && $jenis_benda != "" && $plat_nomor != "" && $atas_nama != "" && $no_telp != "" && $keterangan != "" && gambar('gambar')[0] === true) {
      if (gambar('gambar')[1] < 1044070) {
        move_uploaded_file(gambar('gambar')[2], '../assets/images/' . $gambar);
        $post_info = query("INSERT INTO informasi VALUES ('','$jenis_benda','$plat_nomor','$atas_nama','$no_telp','$keterangan',NOW(),'$id','$jenis_informasi','$gambar')");
        if ($post_info) {
          header("location:index.php");
        } else {
          echo ("Data gagal di tambahkan");
        }
      } else {
        echo "Ukuran data terlalu besar";
      }
    } else {
      echo "Data tidak boleh kosong";
    }
  }
}
$notif_query = query("SELECT * FROM notif");

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
    <section class="bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-4 text-center">

                            <h3 class="mb-3">Edit Berita</h3>

                            <form action="" method="post" enctype="multipart/form-data">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="mt-1">Jenis Informasi</div>
                                        </td>
                                        <td>
                                            <input type="radio" class="btn-check" name="posting_info"
                                                id="danger-outlined" autocomplete="off" value="Kehilangan">
                                            <label class="btn btn-outline-danger"
                                                for="danger-outlined">Kehilangan</label>
                                            <input type="radio" class="btn-check" name="posting_info"
                                                id="success-outlined" autocomplete="off" value="Ditemukan">
                                            <label class="btn btn-outline-success"
                                                for="success-outlined">Ditemukan</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Gambar</div>
                                        </td>
                                        <td>
                                            <input type="file" name="gambar" id="gambar" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Jenis Benda</div>
                                        </td>
                                        <td>
                                            <?php
                  $value_jenis = query("SELECT * FROM jenis");
                  ?>
                                            <select name="benda" id="benda" class="form-control">
                                                <option value="">Benda Yang Hilang -></option>
                                                <?php foreach ($value_jenis as $jenis) : ?>
                                                <option value="<?= $jenis['id'] ?>"><?= $jenis['barang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Plat Nomor</div>
                                        </td>
                                        <td>
                                            <input style="text-transform:uppercase" type="text" name="plat_nomor"
                                                id="plat_nomor" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Nama Pemilik</div>
                                        </td>
                                        <td>
                                            <input type="text" name="atas_nama" id="atas_nama" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">No Telp Untuk Dihubungi</div>
                                        </td>
                                        <td>
                                            <input type="text" name="no_telp" id="no_telp" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-1">Keterangan</div>
                                        </td>
                                        <td>
                                            <textarea name="keterangan" id="keterangan" class="form-control"
                                                rows="5"></textarea>
                                        </td>
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
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