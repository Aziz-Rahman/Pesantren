  <div class="row">

    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Input Your Gallery
        </div>
        <div class="panel-body">

         <form name="gallery" action="save-gallery.php" method="post" enctype="multipart/form-data">
            <div class="col-lg-12">
              <div class="form-group">
                <input type="text"  class="form-control" name="ket" placeholder="Keterangan singkat foto" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../images/my/profil.png" alt=""></div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                      <input type="file" name="gallery" required>
                      </span>
                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <label>Upload Your Gallery</label>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <button type="submit" class="btn btn-danger btn-submit">Submit</button>
              </div>
            </div>
          </form>

     
        </div>
      </div>
    </div>
    
</div> 
<!-- END: Class row -->
 
<?php 
include '../includes/conn.php';
require_once "../includes/functions.php";

$sql = $conn->query( "SELECT * FROM galeri ORDER BY id_galeri DESC" );
?>

<div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Gallery
      </div>
      <div class="panel-body">

        <div class="col-md-12">
          <?php while ( $data = $sql->fetch_assoc() ) { ?>
              <div class="col-md-1 gallery-img">
                <img src="../images/gallery/<?= $data['foto']; ?>" width="100%" alt="<?= $data['ket_singkat']; ?>">
                <div class="overlay"><a href="delete-gallery.php?id_img=<?= $data['id_galeri']; ?>" onclick="return confirm('Yakin dihapus ??')">Delete</a></div>
              </div>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>

</div> 
<!-- END: Class row -->
<?php  $conn->close();