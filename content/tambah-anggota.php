<?php
if (isset($_POST['tambah'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    //SQL
    // DML = Data Manipulation Language (select, update, delete, insert)

    //INSERT
    $insert = mysqli_query($koneksi, "INSERT INTO anggota (nama_anggota, telepon, email, alamat) VALUES ('$nama_anggota', '$telepon', '$email', '$alamat')");
    header("location:?pg=anggota&tambah=berhasil");


}


//EDIT
//show filled form/existed data to be edited
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editAnggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id = '$id'");
$rowAnggota = mysqli_fetch_assoc($editAnggota);


//post edited data
if (isset($_POST['edit'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    //update user, kolom apa yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama_anggota', telepon='$telepon', email='$email', alamat='$alamat' WHERE id='$id'");
    header("location:?pg=anggota&ubah=berhasil");
}


//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");
    header("location:?pg=anggota&hapus=berhasil");
}

// $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");


?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Anggota </legend>

        <form action="" method="POST">


            <div class="mb-3">
                <label for="" class="form-label">Nama Anggota</label>
                <input type="text" class="form-control" name="nama_anggota" placeholder="Masukkan nama Anda"
                    value="<?php echo isset($_GET['edit']) ? $rowAnggota['nama_anggota'] : '' ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Telepon</label>
                <input type="text" class="form-control" name="telepon" placeholder="Masukkan telepon Anda"
                    value="<?php echo isset($_GET['edit']) ? $rowAnggota['telepon'] : '' ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Masukkan email Anda"
                    value="<?php echo isset($_GET['edit']) ? $rowAnggota['email'] : '' ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat Anda"
                    value="<?php echo isset($_GET['edit']) ? $rowAnggota['alamat'] : '' ?>">
            </div>


            <div class="mb-3">
                <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" type="submit"
                    class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </fieldset>
</div>