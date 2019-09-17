
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
           Input Quote
        </div>
        <div class="panel-body">
           <form name="article" action="save-quote.php" method="post">
            <div class="form-group">
              <label for="author">Pengarang</label>
              <input class="form-control" placeholder="Pengarang" type="text" name="author" required>
            </div>
            <div class="form-group">
              <label for="quote">Quote ( Kutipan )</label>
              <textarea id="my-editor" class="form-control" name="quote" id="quote" cols="100" rows="6" placeholder="Kutipan"></textarea>
            </div>
            <button type="submit" class="btn btn-danger btn-submit" name="submit_quote">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <?php  
    include '../includes/conn.php';

    $sql = $conn->query( "SELECT * FROM kutipan" );
    $data = $sql->fetch_assoc();
    ?>

    <!-- START: DISPLAY DATA -->
    <div class="col-md-12">
      <blockquote>
        <?php echo $data['quotes']; ?>
      </blockquote>
      <cite><?php echo $data['author']; ?></cite>
    </div>
    <!-- END: DISPLAY DATA -->

  </div> 
  <!-- END: Class row -->