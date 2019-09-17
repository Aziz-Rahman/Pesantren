<?php  
include '../includes/conn.php';
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_art'] );
$sql = $conn->query( "SELECT * FROM artikel WHERE id_artikel = '$id'" );
$data = $sql->fetch_assoc();
?>

<div class="row">

  <!-- Info -->
  <div class="col-lg-12">
    <div class="alert alert-info">
      This is a free admin dashboard temple for personal and commercial use. Use this template for your projecs and save you money and time. Hope you will like it.
    </div>
  </div>

  <form name="article" action="update-article.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_art" value="<?php echo $data['id_artikel']; ?>">
    <div class="col-lg-8">
      <div class="form-group">
        <input type="text" class="form-control" name="title" value="<?php echo $data['judul'];?>">
      </div>
    </div>

    <div class="col-lg-2">
      <div class="form-group">
        <input type="date" class="form-control" name="date" value="<?php echo $data['tanggal'];?>" disabled>
      </div>
    </div>

    <div class="col-lg-2">
      <div class="form-group">
        <input type="text" class="form-control" name="time" value="<?php echo $data['jam'];?>" disabled>
      </div>
    </div>

    <div class="col-lg-3">
      <?php
        echo '<div class="my-record" id="my-record-',$data['id_artikel'],'">'; 
        echo '<img src=../images/articles/'.$data['gambar'].' height="" width="270px" alt="article">';
      ?>
      <a href="delete-image-article.php?id_img_art=<?php echo $data['id_artikel']; ?>" class="delete-img-art">Ubah Foto</a>
      <?php echo '</div>'; ?>

       <!-- Upload file -->
      <!-- <div class="custom-file-upload">
          <input type="file" id="my-file" name="upload-file"/>
      </div> -->

      <div id="my-file" class="fileupload fileupload-new" data-provides="fileupload">
          <div class="fileupload-new thumbnail" style="width: 100%; height: auto;"><img src="../images/my/profil.png" alt=""></div>
          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: auto; line-height: 20px;"></div>
          <div>
              <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
              <input type="file" name="upload-file"/>
              </span>
              <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
          </div>
      </div>
    </div>

    <div class="col-lg-9">
      <div class="form-group">
        <label for="content">The Contents</label>
        <textarea class="my-editor form-control" name="content" cols="100" rows="6"><?php echo $data['isi_artikel']; ?></textarea>
      </div>
    </div>

    <div class="col-md-6 col-lg-6">
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-submit" name="update_article">Submit</button>
      </div>
    </div>
  </form>

</div> 
  <!-- END: Class row -->
<?php $conn->close();