	<?php 
	include 'includes/conn.php'; // connections
	require_once 'includes/functions.php'; // functions 
	?>
	<!-- Header -->
	<header id="head">
		<div class="container container-full-width">
			<div class="row">
				<div id="banner" class="container">
					<div class="col-md-12 info-header">
						<h1 class="lead wow bounceInDown animated" data-wow-duration="500ms" data-wow-delay="500ms">Pesantren Nur Al-Tauhid</h1>
						<p class="tagline wow slideInLeft animated" data-wow-duration="700ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto</p>
						<a href="profile" class="btn btn-success btn-lg btn-pressure btn-sensitive wow slideInRight animated" data-wow-duration="700ms" role="button">Profil Selengkapnya</a>
					</div>
					<div class="col-md-12 info-header">
						<h1 class="lead">Pendaftaran Santri Baru (PSB)</h1>
						<p class="tagline">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto</p>
						<a href="procedure" class="btn btn-success btn-lg btn-pressure btn-sensitive" role="button">Prosedur Pendaftaran</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- /Header -->


	<!-- START: NEWS -->
	<section class="main-hompage latest-news">
		<div class="container container-full-width">
			<?php
			// Select data
			$news_sql = $conn->query( "SELECT id_artikel, judul, gambar FROM artikel ORDER BY id_artikel DESC" );
			$check_news = $news_sql->num_rows;
			?>
			
			<!-- <h2 class="feature-title text-center">Latest News</h3> -->	
			<div class="row">
				<div class="inner-carousel">
					<div id="news-slider">
						<?php 
						if ( $check_news ) :
							while ( $news = $news_sql->fetch_assoc() ) : 
						?>
							
								<div class="col-md-12">
									<div class="col-md-12 news-thumbnail">
										<img src="images/articles/<?= $news['gambar']; ?>" alt="<?= $news['judul']; ?>">
										<div class="overlay-latest-news"><h3 class="entry-title"><a href="news-detail/<?= $news['id_artikel'] .'/'. strtolower( str_replace( ' ', '-', $news['judul'] ) ); ?>"><?= limitWord( $news['judul'], 11 ) .' ...'; ?></a></h3></div>
									</div>
								</div>
						
						<?php	 
							endwhile;
						else :
							echo '<p class="text-center">Not available news</p>';
						endif;
						?>
					</div> <!-- #news-slider  -->
				</div>
			</div> <!-- /row  -->
		
		</div>
	</section>
	<!-- END: NEWS -->

	<!-- START: INFO PMB -->
	<section class="main-hompage pmb wow fadeInUp animated animated" data-wow-duration="500ms">
		<div class="container text-center">
			<div class="row">

				<div class="text-sec-title text-center mb40">
					<h2 class="feature-title text-center">Pendaftaran Santri Baru ( PSB )</h2>
					<div class="devider"><i class="fa fa-flash fa-lg"></i></div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2">
					The difference between involvement and commitment is like an eggs-and-ham breakfast: 
					the chicken was involved; the pig was committed. You must provide the name of the creator and a link to the original template in your work.
				</div>
				<div class="col-md-12 url-procedure-info">
					<p><a href="procedure" class="text-center">Prosedur Pendaftaran</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- END: INFO PMB-->


	<!-- START: GALLERY -->
	<section class="main-hompage gallery-img">
		<div class="container">
			<?php
			// Select data
			$gallery_sql = $conn->query( "SELECT foto, ket_singkat FROM galeri ORDER BY RAND() DESC LIMIT 7" );
			$check_gallery = $gallery_sql->num_rows;
			?>
			<div class="text-sec-title text-center mb40 wow fadeInUp animated animated" data-wow-duration="700ms">
				<h2 class="feature-title text-center">Gallery</h2>
				<div class="devider"><i class="fa fa-flash fa-lg"></i></div>
			</div>
					
			<div id="gallery-homepage">
				<?php 
				if ( $check_gallery ) :
					while ( $gallery = $gallery_sql->fetch_assoc() ) :
						echo '<a href="images/gallery/'.$gallery['foto'] .'" alt="gallery-pesantren-al-atlas" >';
				        echo '<img src="images/gallery/'.$gallery['foto'].'" alt="'.$gallery['ket_singkat'].'" class="img-responsive">';
				        echo '<div class="overlay-justyfied"></div>';
				        echo '</a>';
					endwhile;
				else :
					echo '<p class="text-center">Not available gallery</p>';
				endif;
				?>
			</div> <!-- #gallery-slider  -->

			<!-- btn see more -->
			<div class="row">
				<div class="col-md-12 btn-continous">
	                <a href="gallery" class="pull-right">Next <i class="fa fa-angle-double-right"></i></a>
	            </div>
            </div>
		
		</div>
	</section>
	<!-- END: GALLERY -->
		
	<!-- START: Quote -->
	<section class="quote">
		<div class="container">
			<?php
			// Select data
			$quote_sql = $conn->query( "SELECT * FROM kutipan" );
			$quote = $quote_sql->fetch_assoc();
			?>
			<blockquote class="wow slideInRight animated" data-wow-duration="700ms">
				<?php echo $quote['quotes']; ?>
			</blockquote>
			<cite class="wow bounceInDown animated" data-wow-duration="700ms" data-wow-delay="500ms"><?php echo $quote['author']; ?></cite>
	  	</div>
	  	<div class="overlay"></div>
	</section>
	<!-- END: Quote -->

	<!-- START: CONTACT -->
	<section class="main-hompage feature-contact">
		<!-- container -->
		<div class="container">

			<div class="text-sec-title text-center mb40 wow rubberBand animated animated" data-wow-duration="1000ms">
				<h2 class="feature-title text-center">Contact</h2>
				<div class="devider"><i class="fa fa-flash fa-lg"></i></div>
			</div>

			<div class="row">
				<div class="col-md-12 contact-area">
					<form name="admin" action="save_admin.php" method="post" id="contact-messages">
						<!-- <div class="col-md-12 text-center mb40">
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
						</div>
 -->
						<div class="col-md-6 inner-contact wow slideInLeft animated" data-wow-duration="700ms">
							<div class="col-md-12">
								<div class="form-group">
								<input type="text" name="name" id="msg-name" class="form-control" placeholder="Name" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" id="msg-email" class="form-control" placeholder="Email" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="phone" id="msg-phone" class="form-control" placeholder="Telephone" required>
								</div>
							</div>
						</div>

						<div class="col-md-6 inner-contact wow slideInRight animated" data-wow-duration="700ms">
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="messages" id="messages" class="form-control" rows="6" placeholder="Messages" required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<button type="submit" id="btn-messages" class="contact-us btn btn-magick btn-pressure btn-sensitive pull-right">Send</button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-12">
					<div class="clearfix"></div>
					<div id="loader_img"><img src="images/loading.gif" alt=""></div> <!-- Loader -->
                	<div class="info-warning"></div> <!-- INFO EXECUTE -->
                </div>
			</div> <!-- /row -->

		</div>	<!-- /container -->
	</section >
	<!-- END: CONTACT -->