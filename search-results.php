<div id="preloader">
	<img src="images/load.gif" alt="Preloader">
</div>

<?php 
include 'includes/slider.php'; 
include 'includes/conn.php'; 
require_once 'includes/functions.php';

$search = isset( $_POST['s'] ) ? anti_injection( $_POST['s'] ) : '';
$article = $conn->query( "SELECT * FROM artikel WHERE judul like '%$search%' or isi_artikel like '%$search%' ORDER BY tanggal ASC" );
?>

<section class="main-content">
<!-- container -->
	<div class="container">

		<!-- Search -->
		<div id="search-articles" class="row"> <!-- row -->
			<header class="article-s">
				<div class="col-sm-12 col-md-6 col-sm-offset-0 col-md-offset-3">
					<form class="f-search" method="post" action="search">
		                <div class="input-group stylish-input-group">
		                    <input type="text" name="s" class="form-control my-search" placeholder="Search" >
		                    <span class="input-group-btn input-group-addon">
		                        <button type="submit">
		                            <i class="fa fa-search my-icon"></i>
		                        </button>  
		                    </span>
		                </div>
	                </form>
		        </div>
			</header>
		</div>
		<!-- END: search -->

		<div class="row"> <!-- row -->

			<?php 
			if ( $search == '' ) {
				echo '<div class="info-search"><h3 class="info-s"><i class="fa fa-folder-open"></i> Pencarian: " "</h3></div>';
				echo '<div class="info-search"><h3 class="text-search">Silahkan masukan kata kunci pencarian Anda !</h3></div>';
			} else {
				echo '<div class="info-search"><h3 class="info-s"><i class="fa fa-folder-open"></i> Pencarian: '.$search.'</h3></div>'; 
			?>

				<article class="maincontent">
					<div id="results" class="post-inner list">

						<?php
						if ( mysqli_num_rows( $article ) == 0 ) {
							echo '<h3 class="text-search">Hasil pencarian tidak ditemukan !</h3>';
						} else {

							$no = 1;
							while( $data = $article->fetch_assoc() ) :
							    if ( $no++ % 2 == 1 ) {
							?>    
						            <div id="item-<?php echo $data['id_artikel']?>" class="item col-md-12 odd-article"> 
						                <div class="wrapper-inner-article">

						                    <div class="col-md-5 thumbnail-article">
						                        <?php echo '<img src=images/articles/'.$data['gambar'].' height="" width="100%" alt="'.$data['judul'].'">'; ?>
						                    </div> 
						                    <!-- <i class="fa fa-align-left icon-article"></i> -->
						                    <div class="col-md-7 inner-post">
						                        <h3 class="post-title">
						                            <a href="<?php echo 'news-detail/'. $data['id_artikel'] .'/'. strtolower( str_replace( ' ', '-', $data['judul'] ) ); ?>"><?php echo limitWord( $data['judul'], 20 ); ?></a>
						                        </h3>
						                        <div class="meta-post">
						                            <span class="meta"><i class="fa fa-calendar"></i> <?php echo $data['tanggal']; ?></span>
						                            <span class="meta"><i class="fa fa-child"></i> By. Avelin</span>
						                            <span class="meta"><i class="fa fa-clock-o"></i> <?php echo $data['jam']; ?></span>
						                        </div>
						                        <div class="inner-text">
						                            <?php echo limitWord( $data['isi_artikel'], 30 ) .' ...'; ?>
						                        </div>
						                    </div>

						                </div><!-- END: wrapper-inner-article -->
						            </div>

				       			<?php } else { ?>

						            <div id="item-<?php echo $data['id_artikel']?>" class="item col-md-12 even-article"> 
						                <div class="wrapper-inner-article">

						                    <!-- <i class="fa fa-align-left icon-article"></i> -->
						                    <div class="col-md-7 inner-post">
						                        <h3 class="post-title">
						                            <a href="<?php echo 'news-detail/'. $data['id_artikel'] .'/'. strtolower( str_replace( ' ', '-', $data['judul'] ) ); ?>"><?php echo limitWord( $data['judul'], 20 ); ?></a>
						                        </h3>
						                        <div class="meta-post">
						                            <span class="meta"><i class="fa fa-calendar"></i> <?php echo $data['tanggal']; ?></span>
						                            <span class="meta"><i class="fa fa-child"></i> By. Avelin</span>
						                            <span class="meta"><i class="fa fa-clock-o"></i> <?php echo $data['jam']; ?></span>
						                        </div>
						                        <div class="inner-text">
						                            <?php echo limitWord( $data['isi_artikel'], 30 ) .' ...'; ?>
						                        </div>
						                    </div>

						                    <div class="col-md-5 thumbnail-article">
						                        <?php echo '<img src=images/articles/'.$data['gambar'].' height="" width="100%" alt="'.$data['judul'].'">'; ?>
						                    </div> 

						                </div><!-- END: wrapper-inner-article -->
						            </div>
						            
				    			<?php 
				    			} // END: ODD EVENT
				    		endwhile; // END: WHILE 
				    	} //END: CHECK RESULT ?>

					</div>
				</article>

			<?php } ?>

		</div> <!-- END: row -->
	</div> <!-- END: container -->
</section>
<?php $conn->close();