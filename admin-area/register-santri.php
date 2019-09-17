<?php  
// Connection
  include '../includes/conn.php';

  $sql = $conn->query( "SELECT * FROM pendaftaran ORDER BY status_pendaftaran DESC" );

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
                          <th>No. Pendaftaran</th>
                          <th>Nama Lengkap</th>
                          <th>No. telepon</th>
                          <th>Email</th>
                          <th>Status Pendaftaran</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      while( $data = $sql->fetch_assoc() ) { 
                    ?>
                      <tr>
                          <td><?= $no; ?></td>
                          <td><?= $data['no_pendaftaran']; ?></td>
                          <td><?= $data['nama_lengkap']; ?></td>
                          <td><?= $data['no_telp']; ?></td>
                          <td><?= $data['email']; ?></td>
                          <td><?= $data['status_pendaftaran']; ?></td>
                          <td>
                              <a href="#myModal<?= $data['no_pendaftaran']; ?>" data-toggle="modal" class="btn btn-danger" title="Edit status pendaftaran"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                              <a class="btn btn-warning delete" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-times" title="Hapus"></i></a>
                              <a class="btn btn-info"><i class="fa fa-eye" title="Detail"></i></a>
                          </td>
                      </tr>

                      <!-- START: POP-UP FOR EDIT STATUS SANTRI -->
                      <div aria-hidden="true" aria-labelledby="myModalLabel<?php echo $data['no_pendaftaran']; ?>" role="dialog" tabindex="-1" id="myModal<?php echo $data['no_pendaftaran']; ?>" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Form Tittle</h4>
                                </div>
                                <div class="modal-body">

                                    <form role="form">
                                        <div class="form-group">
                                            <label for="no-register">No. Pendaftaran</label>
                                            <input type="text" class="form-control" id="no-register<?php echo $data['no_pendaftaran']; ?>" value="<?php echo $data['no_pendaftaran']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="stts_register">Status Pendaftaran</label>
                                            <input type="text" class="form-control" id="stts_santri<?php echo $data['no_pendaftaran']; ?>" value="<?php echo $data['status_pendaftaran']; ?>">
                                        </div>

                                        <div class="form-group">
                                          <button type="button" value="<?php echo $data['no_pendaftaran']; ?>" class="update-status-santri btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                    <div id="info-update"></div>

                                </div>
                            </div>
                        </div>
                      </div>
                      <!-- END: POP-UP FOR EDIT STATUS SANTRI -->

                    <?php $no++; } ?>
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