<?php  
// Connection
  include '../includes/conn.php';
// $get_data_product = $mysqli->query( "SELECT * FROM produk INNER JOIN kategori ON produk.kd_kategori = kategori.kd_kategori ORDER BY tanggal DESC" );
  $sql = $conn->query( "SELECT * FROM `santri` INNER JOIN pendaftaran ON santri.no_pendaftaran = pendaftaran.no_pendaftaran WHERE status_pendaftaran = 'santri'" );
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
                          <th>NIS</th>
                          <th>Nama Lengkap</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      while( $data = $sql->fetch_assoc() ) { 
                    ?>
                      <tr>
                          <td><?= $data['nis']; ?></td>
                          <td><?= $data['nama_lengkap']; ?></td>
                          <td>
                              <a href="#myModal<?= $data['no_pendaftaran']; ?>" class="btn btn-danger"><i class="fa fa-eye" title="Detail"></i></a>
                          </td>
                      </tr>

                    <?php } ?>
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