<?php  
include '../includes/conn.php'; 
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_adm'] );
$query = $conn->query( "SELECT * FROM admin WHERE id_admin = '$id'" );
$data = $query->fetch_assoc();
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
            Account Detail
        </div>
        <div class="panel-body">
          <div class="table-responsive">
           
			 <form name="article" action="update-admin.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_adm" value="<?php echo $data['id_admin']; ?>">
              <!-- START: Table  -->
              <table class="table">
                  <thead>
                      <tr>
                          <th colspan="2">Foto</th>
                          <th colspan="3">Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                     <tr>
                      <td rowspan="7" width="300">
                        <!-- START: Photo -->
                          <?php
                              echo '<div class="my-record-adm" id="my-record-adm-',$data['id_admin'],'">'; 
                              echo '<img src=../images/my/'.$data['photos'].' height="" width="300px" alt="">';
                          ?>
                              <a href="delete-image-admin.php?id_img_adm=<?php echo $data['id_admin']; ?>" class="delete-img-adm">Ubah Foto</a>
                              <?php echo '</div>'; ?>

                              <div id="photo-admin" class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="fileupload-new thumbnail" style="width: 100%; height: auto;"><img src="../images/my/profil.png" alt=""></div>
                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: auto; line-height: 20px;"></div>
                                  <div>
                                      <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                      <input type="file" name="upload-file"/>
                                      </span>
                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                  </div>
                              </div>
                            <!-- END: Photo -->
                           </td>
                      </tr>
                        <tr>
                          <td></td>
                          <td width="100">Nama</td>
                          <td align="center" width="30">:</td>
                          <td><input class="form-control" type="text" name="name" value="<?php echo $data['name']; ?>"></td>
                      </tr>
                       <tr>
                          <td></td>
                          <td width="100">Email</td>
                          <td align="center" width="30">:</td>
                          <td><input class="form-control" type="text" name="email" value="<?php echo $data['email']; ?>"></td>
                      </tr>
                        <tr>
                             <td></td>
                          <td width="100">Username</td>
                          <td align="center" width="30">:</td>
                          <td><input class="form-control" type="text" name="username" value="<?php echo $data['username']; ?>"></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td width="100">Password</td>
                          <td align="center" width="30">:</td>
                          <td><input class="form-control" type="password" name="password"></td>
                      </tr>
                       <tr>
                          <td></td>
                          <td width="100">Aksi</td>
                          <td align="center" width="30">:</td>
                          <td>
                             <button type="submit" class="btn btn-danger btn-submit" name="update_admin">Update</button>
                          </td>
                      </tr>
                       <tr>
                         <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                  </tbody>
              </table>
              <!-- END: Table  -->
          	</form>
          	
          </div>
        </div>
      </div> 
    </div>
        
  </div> 
  <!-- END: Class row -->
  <?php  $conn->close();