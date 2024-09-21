<?php
//menyertakan file program koneksi.php pada register
require('../../koneksi.php');
//inisialisasi session
session_start();

$error = '';
$validate = '';
//mengecek apakah form registrasi di submit atau tidak
if (isset($_POST['submit'])) {
  // menghilangkan backshlases
  $username = stripslashes($_POST['username']);
  //cara sederhana mengamankan dari sql injection
  $username = mysqli_real_escape_string($conn, $username);
  $email    = stripslashes($_POST['email']);
  $email    = mysqli_real_escape_string($conn, $email);
  $password = stripslashes(md5($_POST['password']));
  $password = mysqli_real_escape_string($conn, $password);
  $repass   = stripslashes(md5($_POST['repassword']));
  $repass   = mysqli_real_escape_string($conn, $repass);
  //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
  if (!empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
    //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
    if ($password == $repass) {
      //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
      if (cek_nama($username, $conn) == 0) {
        //hashing password sebelum disimpan didatabase
        $pass  = password_hash($password, PASSWORD_DEFAULT);
        //insert data ke database
        $query = "INSERT INTO user (username,email, pass, level ) VALUES ('$username','$email','$password' , 'User')";
        $result   = mysqli_query($conn, $query);
        //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
        if ($result) {
          $_SESSION['username'] = $username;

          header('Location: sign-in.php');

          //jika gagal maka akan menampilkan pesan error
        } else {
          $error =  'Register User Gagal !!';
        }
      } else {
        $error =  'Username sudah terdaftar !!';
      }
    } else {
      $validate = 'Password tidak sama !!';
    }
  } else {
    $error =  'Data tidak boleh kosong !!';
  }
}
//fungsi untuk mengecek username apakah sudah terdaftar atau belum
function cek_nama($username, $conn)
{
  $nama = mysqli_real_escape_string($conn, $username);
  $query = "SELECT * FROM users WHERE username = '$nama'";
  if ($result = mysqli_query($conn, $query)) return mysqli_num_rows($result);
}
?>

<!--
=========================================================
* Material Dashboard 2 - v3.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <title>
    Bookstore
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="tambahData.php">
                    <?php
                    $tampilkan_isi = "select count(id_cust) as jumlah from customer;";
                    $tampilkan_isi_sql = mysqli_query($conn, $tampilkan_isi);
                    $no = 1;

                    while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
                      $jumlah = $isi['jumlah'];
                    ?>

                      <input type="hidden" name="id_customer" value="C00<?php echo $no + $jumlah; ?>">

                    <?php } ?>


                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Phone Number</label>
                      <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Alamat</label>
                      <textarea name="alamat" cols="50" rows="5" class="input--style-4"></textarea>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="radio-container m-r-45">Pria
                        <input type="radio" name="gender" value="Pria">
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container">Wanita
                        <input type="radio" name="gender" value="Wanita">
                        <span class="checkmark"></span>
                      </label>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <input type="submit" name="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="Sign Up">
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="../pages/sign-in.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>