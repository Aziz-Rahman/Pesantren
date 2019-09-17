  <div class="row">

    <!-- Info -->
    <div class="col-md-12">
        <div class="alert alert-info">
            This is a free admin dashboard temple for personal and commercial use. Use this template for your projecs and save you money and time. Hope you will like it.
        </div>
    </div>

   <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
           Input Procedure
        </div>
        <div class="panel-body">
           <form name="procedure" action="save-procedure.php" method="post">
            <div class="form-group">
              <label for="title">Judul</label>
              <input class="form-control" placeholder="Judul" type="text" name="title" required>
            </div>

            <div class="form-group">
              <label for="procedure">Prosedur</label>
              <textarea class="my-editor form-control" name="procedure" cols="100" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-danger btn-submit" name="submit_procedure">Submit</button>
          </form>
        </div>
      </div>
    </div>


    <?php  
    include '../includes/conn.php';

    $sql = $conn->query( "SELECT * FROM Prosedur" );
    $data = $sql->fetch_assoc();
    ?>

    <!-- START: DISPLAY DATA -->
    <div class="col-lg-12">
      <h3><?php echo $data['judul']; ?></h3>
    </div>
    <div class="col-lg-12">
      <?php echo $data['isi_text']; ?>
    </div>
    <!-- END: DISPLAY DATA -->

  </div> 
  <!-- END: Class row -->
  <?php $conn->close();