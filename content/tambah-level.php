<?php
if (isset($_POST['tambah'])) {
    $nama_level = $_POST['nama_level'];

    //SQL
    // DML = Data Manipulation Language (select, update, delete, insert)

    //INSERT
    $insert = mysqli_query($koneksi, "INSERT INTO level (nama_level) VALUES ('$nama_level')");
    header("location:?pg=level&tambah=berhasil");


}


//EDIT
//show filled form/existed data to be edited
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editLevel = mysqli_query($koneksi, "SELECT * FROM level WHERE id = '$id'");
$rowLevel = mysqli_fetch_assoc($editLevel);


//post edited data
if (isset($_POST['edit'])) {
    $nama_level = $_POST['nama_level'];

    //update user, kolom apa yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE level SET nama_level='$nama_level' WHERE id='$id'");
    header("location:?pg=level&ubah=berhasil");
}


//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM level WHERE id='$id'");
    header("location:?pg=level&hapus=berhasil");
}
?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level </legend>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Nama Level</label>
                <input type="text" class="form-control" name="nama_level" placeholder="Masukkan nama level"
                    value="<?php echo isset($_GET['edit']) ? $rowLevel['nama_level'] : '' ?>">
            </div>



            <div class="mb-3">
                <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" type="submit"
                    class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </fieldset>
</div>