<?php
if (isset($_POST['tambah'])) {
    $nama_kategori = $_POST['nama_kategori'];

    //SQL
    // DML = Data Manipulation Language (select, update, delete, insert)

    //INSERT
    $insert = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");
    header("location:?pg=kategori&tambah=berhasil");


}


//EDIT
//show filled form/existed data to be edited
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editKategori);


//post edited data
if (isset($_POST['edit'])) {
    $nama_kategori = $_POST['nama_kategori'];

    //update user, kolom apa yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id='$id'");
    header("location:?pg=kategori&ubah=berhasil");
}


//delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");
    header("location:?pg=kategori&hapus=berhasil");
}
?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Kategori </legend>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan kategori"
                    value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_kategori'] : '' ?>">
            </div>


            <div class="mb-3">
                <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" type="submit"
                    class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </fieldset>
</div>