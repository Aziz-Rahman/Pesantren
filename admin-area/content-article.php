<?php  
// Connection
include '../includes/conn.php';
// Select data
$article = $conn->query( "SELECT * FROM artikel ORDER BY tanggal DESC" );

?>

<div class="row">

  <!-- Info -->
  <div class="col-lg-12">
      <div class="alert alert-info">
          This is a free admin dashboard temple for personal and commercial use. Use this template for your projecs and save you money and time. Hope you will like it.
      </div>
  </div>

  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
          Account Administrator
      </div>
      <div class="panel-body">
        <div class="table-responsive">
         

            <!-- START: Table  -->
            <table class="table table-striped table-bordered table-hover" id="my-dataTables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    while( $data = $article->fetch_assoc() ) { 
                  ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['judul']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $data['jam']; ?></td>
                        <td>
                            <a href="./?page=edit-article&id_art=<?= $data['id_artikel']; ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a> || 
                            <a href="delete-article.php?id_art=<?= $data['id_artikel']; ?>" class="delete" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-times" title="Delete"></i></a> || 
                            <a href="./?page=view-article&id_art=<?= $data['id_artikel']; ?>"><i class="fa fa-eye" title="Detail"></i> Lihat &raquo;</a>
                        </td>
                    </tr>
                  <?php $no++; } ?>
                </tbody>
            </table>
            <!-- END: Table  -->
        </div>
      </div>
    </div> 
  </div>
     
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Input Your Article
      </div>
      <div class="panel-body">

       <form name="article" action="save-article.php" method="post" enctype="multipart/form-data">
          <div class="col-lg-12">
            <div class="form-group">
              <input class="form-control" placeholder="Title" type="text" name="title" required>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <div class="fileupload fileupload-new" data-provides="fileupload"><input name="" value="" type="hidden">
                  <span class="btn btn-file btn-info">
                      <span class="fileupload-new">Chose file image</span>
                      <span class="fileupload-exists">Change</span>
                      <input name="image" type="file">
                  </span>
                  <span class="fileupload-preview"></span>
                  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"> × </a>&nbsp;
                  <label>Upload Your image for the articles</label>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <label for="content">The Contents</label>
              <textarea class="my-editor form-control" name="content" cols="100" rows="6"></textarea>
            </div>
          </div>

          <div class="col-md-6 col-lg-6">
            <div class="form-group">
              <button type="submit" class="btn btn-danger btn-submit" name="submit_article">Submit</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div> 
<!-- END: Class row -->
<?php $conn->close(); 