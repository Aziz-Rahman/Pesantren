<div id="preloader">
	<img src="images/load.gif" alt="Preloader">
</div>

<?php 

include 'includes/slider.php';
include 'includes/conn.php'; 

$page = (int) ( !isset( $_GET['p'] ) ) ? 1 : $_GET['p'];
# sql query
$sql = "SELECT * FROM artikel ORDER BY id_artikel DESC";
# find out query stat point
$start = ( $page * $limit ) - $limit;
# query for page navigation
$sql_nav = $conn->query( $sql );
if (  $sql_nav->num_rows > ( $page * $limit ) ) {
	$next = ++$page;
}
// display based limit
$query = $conn->query( $sql . " LIMIT {$start}, {$limit}");
if ( $query->num_rows < 1) {
	// header('HTTP/1.0 404 Not Found');
	echo 'Not available news';
	exit();
}
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
		                    <input type="text" name="s" class="form-control my-search" placeholder="Search">
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

			<article class="maincontent">
				<div id="results" class="wrap post-inner list">

					<?php
					$no = 1;
					while( $data = $query->fetch_assoc() ) :
					    if ( $no++ % 2 == 1 ) {
					?>    
				            <div id="item-<?php echo $data['id_artikel']?>" class="item col-md-12 odd-article wow slideInRight animated" data-wow-duration="700ms"> 
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

				            <div id="item-<?php echo $data['id_artikel']?>" class="item col-md-12 even-article wow slideInLeft animated" data-wow-duration="700ms"> 
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
				            
		    		<?php } endwhile; ?>

				</div>
			</article>

			 <!--page navigation-->
			<?php if ( isset( $next ) ): ?>
				<div class="nav-scroll">
					<a href='./?page=article&p=<?php echo $next?>'>Next</a>
				</div>
			<?php endif?>


		</div> <!-- END: row -->
	</div> <!-- END: container -->
</section>
<?php $conn->close();