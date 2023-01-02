<?php
include "../function/koneksi.php";
session_start();

if (isset($_POST['submit'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $login = query("SELECT * from user where username='$user' and password='$pass'");
  $check = mysqli_num_rows($login);
  if ($user == "" || $pass == "") {
    echo "Isian tidak boleh kosong";
  } else {
    if ($check > 0) {
      $fetch_data = mysqli_fetch_assoc($login);
      if ($user == $fetch_data['username'] && $pass == $fetch_data['password'] && $fetch_data['level'] == 'admin') {
        $_SESSION['name'] = $fetch_data['nama'];
        $_SESSION['admin'] = 'admin';
        $_SESSION['username'] = $fetch_data['username'];
        header("location:../admin/index.php");
      }
      if ($user == $fetch_data['username'] && $pass == $fetch_data['password'] && $fetch_data['level'] == 'user') {
        $_SESSION['level'] = 'user';
        $_SESSION['name'] = $fetch_data['nama'];
        $_SESSION['username'] = $fetch_data['username'];
        $_SESSION['u_hb'] = $fetch_data['username'];
        header("location:index.php");
      }
    } else {
      echo "Data Not Found!!!";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>HALAMAN LOGIN</title>
</head>

<body>
    <section class="vh-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">HALAMAN LOGIN</h3>

                            <form action="" method="POST">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Username</label>
                                    <input type="text" name="username" id="username"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg" />
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit"
                                    id="submit">Login</button>
                                <div class="mt-3">
                                    <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                                </div>
                                <!-- <a class="btn btn-warning btn-lg btn-block" href="register.php">Register</a> -->

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>