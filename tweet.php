<?php
if (isset($_POST['posting'])) {
    $content = $_POST['content'];
    
    //jika gambar mau diubah
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];
        
        
        //png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);
        
        // jika extension foto tidak ada/ tidak sesuai dengan ext yang telah di-declare di array $ext
        if (!in_array($extFoto, $ext)) {
            echo "Ekstensi/jenis file tidak ditemukan. Ekstensi yang diizinkan: " . implode(", ", $extFoto);
            die;
        }else {
            //pindah directory gambar ke folder upload (tmp/temporary path)
            unlink('upload/' . $rowTweet['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);
            
            $insert = mysqli_query($koneksi, "INSERT INTO tweet (content, id_user, foto) VALUES('$content', '$id_user', '$nama_foto')");
        }
    } else {
        // gambar tidak mau diubah
        $insert = mysqli_query($koneksi, "INSERT INTO tweet (content, id_user) VALUES('$content', '$id_user')");
        // print_r($id_user); die;
    }
    header("location:?pg=profil&tweet=berhasil");

}

$queryPosting = mysqli_query($koneksi, "SELECT tweet.* FROM tweet WHERE id_user='$id_user'");


?>

<div class="row">
    <div class="col-sm-12 mt-2" align="right">
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleTweet">Tweet</button>
    </div>

    <!-- TWEETING -->
    <div class="col-sm-12 mt-3">
        <?php while($rowPosting = mysqli_fetch_assoc($queryPosting)): ?>
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="upload/<?php echo !empty($rowUser['foto']) ? $rowUser['foto'] : 'https://placehold.co/100' ?>" width="100" class="border border-2 rounded-circle" alt="...">
                </div>
                    <div class="flex-grow-1 ms-3">
                        <?php if (!empty($rowPosting['foto'])): ?>
                            <img src="upload/<?php echo $rowPosting['foto'] ?>" width="250" alt="">
                        <?php endif ?>
                        
                        <?php echo $rowPosting['content'] ?>
                    </div>

                    <!-- LIKE -->
                     <div class="status mt-1">
                            <input type="text" id="user_id_like" value="<?php echo $rowPosting['id_user'] ?>">
                        <button class="btn btn-danger btn-sm" onclick="toggleLike(<?php echo $rowPosting['id']; ?>)">(0)
                            <i class="bi bi-heart"></i>
                        </button>
                     </div>

                     <!-- REP/COMMENT TWEET -->
                      <div class="flex-grow-1 ms-3">
                        <form method="POST" action="add_comment.php">
                            <input type="text" name="status_id" value="<?php echo $rowPosting['id'] ?>">
                            <input type="text" name="user_id" value="<?php echo $rowPosting['id_user'] ?>">
                            <textarea class="form-control" name="comment_text" cols="5" rows="5" placeholder="Tulis balasan..."></textarea>
                            <button class="btn btn-primary btn-sm mt-2" type="submit">Balas</button>
                        </form>

                        <div class="mt-2 alert" id="comment-alert" style="display: none;"></div>

                        <div class="mt-1">
                            <?php 
                            if (isset($rowPosting['id']) && isset($rowPosting['id_user'])) {
                                $idStatus = $rowPosting['id'];
                                $userId = $rowPosting['id_user'];
                                $queryComment = mysqli_query($koneksi, "SELECT * FROM comments WHERE status_id = '$idStatus' AND user_id = '$userId'");
                                $rowCounts = mysqli_fetch_all($queryComment, MYSQLI_ASSOC);

                                // var_dump($rowCounts);
                                foreach ($rowCounts as $rowCount) {
                                    
                            ?>        
                                    <span>
                                        <pre>Komentar : <?php echo $rowCount['comment_text'] ?></pre>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                        </div>

                      </div>

            </div>
            <hr class="mt-2">
        <?php endwhile ?>
    </div>



</div>


<!-- Modal -->
<div class="modal fade" id="exampleTweet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
                <textarea id="summernote" type="text" value="<?php echo $rowUser['nama_lengkap'] ?>" class="form-control" placeholder="Apa yang sedang dibicarakan?" name="content"></textarea>
            </div>


            <div class="mb-3">
                <input type="file" class="form-control" placeholder="Foto" name="foto">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" name="posting">Tweet</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
    function toggleLike(statusId) {
        const userId = document.getElementById('user_id_like').value;
        fetch("like_status.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `status_id=${statusId}&user_id=${userId}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.status == "liked"){
                alert("Liked!");
            }else if (data.status === "unliked") {
                alert("Unliked!");
            }
            location.reload();
        })
        .catch(error => console.error("Error:", error));
    }
</script>