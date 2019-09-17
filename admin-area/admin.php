<?php

include '../includes/conn.php'; 
require_once "../includes/functions.php";

$admin_sql = $conn->query( "SELECT * FROM admin" );
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
              <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while( $data = $admin_sql->fetch_assoc() ) {
                    ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['name']; ?></td>
                          <td><?php echo $data['username']; ?></td>
                          <td><?php echo $data['email']; ?></td>
                          <td>
                              <a href="./?page=view-admin&id_adm=<?php echo $data['id_admin']; ?>"><i class="fa fa-eye" title="Detail"></i> Lihat &raquo;</a>
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
       
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Input Your Account
        </div>
        <div class="panel-body">

         <form name="admin" action="save_admin.php" method="post" enctype="multipart/form-data">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" placeholder="Name" type="text" name="name" required>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" placeholder="Email" type="email" name="email" required>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" placeholder="Username" type="text" name="username" required>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="Password">Password</label>
                <input class="form-control" id="input-password1" placeholder="Password" type="password" name="password" required>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../images/my/profil.png" alt=""></div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                      <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                      <input type="file" name="photo" required>
                      </span>
                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
              </div>
              <label>Upload Your Photo</label>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <button type="submit" name="save-admin" class="btn btn-danger btn-submit">Submit</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

  </div> 
  <!-- END: Class row -->
  <?php  $conn->close();