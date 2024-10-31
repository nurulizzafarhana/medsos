<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" />
    <title>Login Form - Kocak</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Welcome to Social Media Kocak ^_^</h5>
                                <p>Please login with your account!</p>
                            </div>

                            <?php if(isset($_GET['register'])): ?>
                            <div class="alert alert-success">Registrasi pengguna berhasil!</div>
                            <?php endif ?>

                            <form action="actionLogin.php" method="POST">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Email
                                    </label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="d-grid mb-3">
                                        <button class="btn btn-primary" type="submit">Login</button>
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