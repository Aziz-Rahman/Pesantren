<?php
include '../includes/conn.php'; 
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_adm'] );
// Select data
$admin_sql = $conn->query( "SELECT * FROM admin WHERE id_admin = '$id'" );
$data = $admin_sql->fetch_assoc();

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
                          <td rowspan="7" width="300"><?php echo '<img src=../images/my/'.$data['photos'].' height="" width="300px" alt="">'; ?></td>
                      </tr>
                        <tr>
                          <td></td>
                          <td width="100">Nama</td>
                          <td align="center" width="30">:</td>
                          <td><?php echo $data['name']; ?></td>
                      </tr>
                        <tr>
                             <td></td>
                          <td width="100">Username</td>
                          <td align="center" width="30">:</td>
                          <td><?php echo $data['username']; ?></td>
                      </tr>
                        <tr>
                          <td></td>
                          <td width="100">Email</td>
                          <td align="center" width="30">:</td>
                          <td><?php echo $data['email']; ?></td>
                      </tr>
                      <tr>
                          <td></td>
                          <td width="100">Password</td>
                          <td align="center" width="30">:</td>
                          <td>( Tidak ditampilkan demi keamanan )</td>
                      </tr>
                       <tr>
                          <td></td>
                          <td width="100">Aksi</td>
                          <td align="center" width="30">:</td>
                          <td>
                            <a href="./?page=edit-admin&id_adm=<?php echo $data['id_admin']; ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>  ||  
                             <a href="delete-admin.php?id_adm=<?php echo $data['id_admin']; ?>" class="delete" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-times" title="Delete"></i></a>
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
          </div>
        </div>
      </div> 
    </div>
        
  </div> 
  <!-- END: Class row -->
  <?php $conn->close();