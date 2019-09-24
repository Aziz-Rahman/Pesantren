	<div id="preloader">
		<img src="images/load.gif" alt="Preloader">
	</div>

	<?php
	
	include 'includes/slider.php'; 
	include 'includes/conn.php'; 

	$id_bta = anti_injection( $_GET['id_artikel'] ); // Get the id
	$detail_article = $conn->query( "SELECT * FROM artikel WHERE id_artikel = '$id_bta'" );

	// execute the query
	$data = $detail_article->fetch_assoc();
	?>
	
	<section class="main-content">

		<!-- container -->
		<div class="container">
			<!-- Article main content -->
			<div class="row">
				<article class="col-sm-12 col-md-8 col-sm-offset-0 col-md-offset-2 maincontent-detail">
					<header class="detail-title">
						<?php echo '<h1 class="post-title">'.$data['judul'].'</h1>'; ?>
						<div class="meta-post meta-detail">
							<span class="meta"><i class="fa fa-calendar"></i> <?php echo $data['tanggal']; ?></span>
							<span class="meta"><i class="fa fa-child"></i> By. Avelin</span>
							<span class="meta"><i class="fa fa-clock-o"></i> <?php echo $data['jam']; ?></span>
						</div>
					</header>
					<div class="detail-thumbnail">
						<?php echo '<img src=images/articles/'. $data['gambar'] .' height="" width="100%" alt="'. $data['judul'] .'">'; ?>
					</div>
					<div class="inner-post">
						<?php echo $data['isi_artikel']; ?>
					</div>

					<!-- Facebook comments -->
					<!-- <div class="fb-comments" data-href="https://www.facebook.com/Tutorial-1417922951780882/?ref=hl" data-width="555" data-numposts="5"></div> -->
					<div class="fb-comments" colorscheme="dark" data-href="http://beta.aziz-rahman.com/pesantren/?page=detail-article&id_artikel=<?php echo $data['id_artikel']; ?>" data-width="750" data-numposts="5"></div>

				</article>
			</div>
		</div>
	</section>
	<?php $conn->close();