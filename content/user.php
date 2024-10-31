<?php
$user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC");
?>

<div class="mt-5 container">
  <fieldset class="border p-3 border-black border-2">
    <legend class="float-none w-auto px-3">Data User</legend>
    <div align="right">
      <a href="?pg=tambah-user" class="btn btn-primary">Tambah</a>
    </div>

    <div class="table-responsive mt-3">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Telepon</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($rowUser = mysqli_fetch_assoc($user)):
            ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $rowUser['telepon'] ?></td>
              <td><?php echo $rowUser['nama'] ?></td>
              <td><?php echo $rowUser['email'] ?></td>
              <td><?php echo $rowUser['jenis_kelamin'] ?></td>
              <td> <a href="?pg=tambah-user&edit=<?php echo $rowUser['id'] ?>" class="btn btn-success btn-sm">Edit</a> |
                <a href="?pg=tambah-user&delete=<?php echo $rowUser['id'] ?>"
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