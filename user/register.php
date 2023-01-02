<?php
include "../function/koneksi.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $name = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $eks = array('png', 'jpg', 'jpeg');
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    $register = query("SELECT * from user_blacklist where no_telp='$no_telp'");
    $check = mysqli_num_rows($register);
    if ($check > 0) {
        $fetch_data = mysqli_fetch_assoc($register);
        if ($no_telp == $fetch_data['no_telp']) {
            echo "akun diban";
        }
    } else {
        if ($username != "" && in_array($ekstensi, $eks) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($tmp_file, '../assets/images/users/' . $gambar);
                $submit = query("INSERT INTO user VALUES ('','$username','$pass','$name','$no_telp','user','$gambar',NOW())");
                if ($submit) {
                    header("location:login.php");
                } else {
                    echo "Data Added Failed";
                }
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>HALAMAN REGISTER</title>
</head>

<body>
    <section class=" bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-3">REGISTER AKUN</h3>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="typeEmailX-2">Foto Profil</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="typeEmailX-2">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="typePasswordX-2">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">No Telepon</label>
                                    <input type="text" name="no_telp" id="no_telp" class="form-control form-control-lg" />
                                </div>

                                <button class="btn btn-success btn-lg btn-block" type="submit" name="submit" id="submit">REGISTER</button>
                                <div class="mt-3">
                                    <p class="">Registered? <a href="login.php">Login</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>