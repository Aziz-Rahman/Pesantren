
  <div class="row">

    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
         Video ( Khusus YouTube )
        </div>
        <div class="panel-body">

         <form name="gallery" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text"  class="form-control" name="url_video" placeholder="Url youtube. Contoh: http://youtube.com/shd8xksk" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="text"  class="form-control" name="title" placeholder="Judul" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="btn-video" class="btn btn-danger btn-submit">Simpan</button>
              </div>
            </div>
          </form>

     
        </div>
      </div>
    </div>
    
</div> 
<!-- END: Class row -->

<?php

if ( isset( $_POST['btn-video'] ) ) :
  include '../includes/conn.php';
  require_once '../includes/functions.php';

  $title = anti_injection( $_POST['title'] );
  $url = anti_injection( $_POST['url_video'] );

  $replace_url = str_replace( 'watch?v=', 'embed/',  $url );

  $sql = "INSERT INTO video( `judul`, `url` ) VALUES( '$title', '$replace_url' )";

  $save_video = $conn->query( $sql );

  if ( $save_video ){
    echo "<script>alert( 'Data tersimpan !' ); document.location='./?page=video';</script>";
  }else{
    die ( "Gagal tersimpan !". $conn->close() );
  }
  $conn->close();
endif;