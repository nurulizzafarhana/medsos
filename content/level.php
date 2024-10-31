<?php
$level = mysqli_query($koneksi, "SELECT * FROM level ORDER BY id DESC");
?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3">Data Level</legend>
        <div align="right">
            <a href="?pg=tambah-level" class="btn btn-primary">Tambah</a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($rowLevel = mysqli_fetch_assoc($level)):
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $rowLevel['nama_level'] ?></td>
                            <td>
                                <!-- <a id="edit-buku" data-id=""></a> -->
                                <a href="?pg=tambah-level&edit=<?php echo $rowLevel['id'] ?>"
                                    class="btn btn-success btn-sm">Edit</a> |
                                <a href="?pg=tambah-level&delete=<?php echo $rowLevel['id'] ?>"
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