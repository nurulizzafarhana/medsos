<?php
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");
?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3">Data Anggota</legend>
        <div align="right">
            <a href="?pg=tambah-anggota" class="btn btn-primary">Tambah</a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($rowAnggota = mysqli_fetch_assoc($anggota)):
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $rowAnggota['nama_anggota'] ?></td>
                            <td><?php echo $rowAnggota['telepon'] ?></td>
                            <td><?php echo $rowAnggota['email'] ?></td>
                            <td><?php echo $rowAnggota['alamat'] ?></td>
                            <td> <a href="?pg=tambah-anggota&edit=<?php echo $rowAnggota['id'] ?>"
                                    class="btn btn-success btn-sm">Edit</a> |
                                <a href="?pg=tambah-anggota&delete=<?php echo $rowAnggota['id'] ?>"
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