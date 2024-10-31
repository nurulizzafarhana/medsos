<?php
$peminjaman = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota 
ON anggota.id = peminjaman.id_anggota WHERE deleted_at = 0 ORDER BY id DESC");
?>

<div class="mt-5 container">
    <fieldset class="border p-3 border-black border-2">
        <legend class="float-none w-auto px-3">Data Peminjaman</legend>
        <div align="right">
            <a href="?pg=tambah-peminjaman" class="btn btn-primary">Tambah</a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>No Peminjaman</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($peminjaman)):
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_anggota'] ?></td>
                            <td><?php echo $row['no_peminjaman'] ?></td>
                            <td><?php echo date('D, d-m-Y', strtotime($row['tgl_peminjaman'])) ?></td>
                            <td><?php echo date('D, d-m-Y', strtotime($row['tgl_pengembalian'])) ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td>
                                <!-- <a id="edit-buku" data-id=""></a> -->
                                <a href="?pg=tambah-peminjaman&detail=<?php echo $row['id'] ?>"
                                    class="btn btn-success btn-sm">Detail</a> |
                                <a href="?pg=tambah-peminjaman&delete=<?php echo $row['id'] ?>"
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