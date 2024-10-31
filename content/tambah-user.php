<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    //SQL
    // DML = Data Manipulation Language (select, update, delete, insert)

    //INSERT
    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, email, password, jenis_kelamin, telepon) VALUES ('$nama', '$email', '$password', '$jenis_kelamin', '$telepon')");
    header("location:?pg=user&tambah=berhasil");


}


//EDIT
//show filled form/existed data to be edited
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editUser);


//post edited data
if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    if ($_POST['password']) {
        $password = sha1($_POST['password']);
    } else {
        $password = $rowEdit['password'];
    }
    //$password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    //update user, kolom apa yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE user SET nama='$nama', email='$email', password='$password', jenis_kelamin='$jenis_kelamin', telepon='$telepon' WHERE id='$id'");
    header("location:?pg=user&ubah=berhasil");
}


//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    header("location:?pg=user&hapus=berhasil");
}
?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> User </legend>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda"
                    value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda"
                    value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password Anda">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jenis Kelamin</label>
                <br>
                <input <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == 'Perempuan' ? 'checked' : '') : '' ?> type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                <br>
                <input <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '') : '' ?> type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telepon</label>
                <input type="number" class="form-control" name="telepon" placeholder="Masukkan nomer telepon Anda"
                    value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : '' ?>">
            </div>

            <div class="mb-3">
                <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" type="submit"
                    class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </fieldset>
</div>