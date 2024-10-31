<?php
include 'koneksi.php';

//jika button daftar diklik
if (isset($_POST['daftar'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_pengguna = $_POST['nama_pengguna'];

    //insert data ke dlm tbl_user, kolom tbl_user dan nilainya diambil dari input sesuai dengan urutan kolom
    mysqli_query($koneksi, "INSERT INTO user (email, password, nama_lengkap, nama_pengguna) VALUES ('$email','$password','$nama_lengkap','$nama_pengguna')");

    //header ke halaman login
    header("location:login.php?register=berhasil");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" />
    <title>Register Form - Kocak</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h5>Welcome to Social Media Kocak ^_^</h5>
                                <p>Please regist your info!</p>
                            </div>

                            <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Email
                                    </label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                </div>
                               
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7">
                                </div>

                                 <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Nama Lengkap
                                    </label>
                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Nama Pengguna
                                    </label>
                                    <input type="text" class="form-control" name="nama_pengguna" placeholder="Masukkan nama pengguna">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="d-grid mb-3">
                                        <button name="daftar" class="btn btn-primary" type="submit">Register</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    
                    <div class="card mt-3">
                        <div class="card-body">
                            <p>Sudah punya akun? <a href="register.php" class="text-secondary">Buat akun</a></p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>