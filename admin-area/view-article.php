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

  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Detail Article</div>
        <div class="panel-body">
          <div class="table-responsive">
           
             <div class="col-lg-4">
             		<?php echo '<img src=../images/articles/'. $data['gambar'] .' height="" width="300px" alt="'. $data['judul'] .'">'; ?>
             </div>

              <div class="col-lg-8">
                <!-- START: Table  -->
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                          <tr>
                            <td></td>
                            <td width="80">Judul</td>
                            <td align="center" width="30">:</td>
                            <td><?php echo $data['judul']; ?></td>
                        </tr>
                          <tr>
                               <td></td>
                            <td width="80">Date</td>
                            <td align="center" width="30">:</td>
                            <td><?php echo $data['tanggal']; ?></td>
                        </tr>
                          <tr>
                            <td></td>
                            <td width="80">Time</td>
                            <td align="center" width="30">:</td>
                            <td><?php echo $data['jam']; ?></td>
                        </tr>
                         <tr>
                            <td></td>
                            <td width="80">Aksi</td>
                            <td align="center" width="30">:</td>
                            <td>
                              <a href="./?page=edit-article&id_art=<?php echo $data['id_artikel']; ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>  ||  
                              <a href="delete-article.php?id_art=<?php echo $data['id_artikel']; ?>" class="delete" onclick="return confirm('Yakin dihapus ??')"><i class="fa fa-times" title="Delete"></i></a>
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

              <div class="col-lg-12">
                <?php echo $data['isi_artikel']; ?>
              </div>

            </div>
          </div>
        </div> 
      </div>
        
  </div> 
  <!-- END: Class row -->
  <?php  $conn->close();