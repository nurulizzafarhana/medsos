<?php
$buku = mysqli_query($koneksi, "SELECT kategori.nama_kategori, buku.* FROM buku LEFT JOIN kategori 
ON kategori.id = buku.id_kategori ORDER BY id DESC");
?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3">Data Buku</legend>
        <div align="right">
            <a href="?pg=tambah-buku" class="btn btn-primary">Tambah</a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Nama Buku</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Pengarang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($rowBuku = mysqli_fetch_assoc($buku)):
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $rowBuku['nama_kategori'] ?></td>
                            <td><?php echo $rowBuku['nama_buku'] ?></td>
                            <td><?php echo $rowBuku['penerbit'] ?></td>
                            <td><?php echo $rowBuku['tahun_terbit'] ?></td>
                            <td><?php echo $rowBuku['pengarang'] ?></td>
                            <td>
                                <!-- <a id="edit-buku" data-id=""></a> -->
                                <a href="?pg=tambah-buku&edit=<?php echo $rowBuku['id'] ?>"
                                    class="btn btn-success btn-sm">Edit</a> |
                                <a href="?pg=tambah-buku&delete=<?php echo $rowBuku['id'] ?>"
                                    onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <!-- <i class="bi bi-trash"></i> | <i class="bi bi-pencil"></i> </i> -->
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>