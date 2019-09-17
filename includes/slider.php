<?php
 
// Connection
include 'includes/conn.php';
require_once 'includes/functions.php'; 
// Select data
$article = "SELECT id_artikel, judul, gambar FROM artikel ORDER BY RAND() LIMIT 10";

// Execute the query
$result = $conn->query( $article ); 
?>

<Section class="carousel-news">
	<div class="container container-full-width">
		<div class="row">
			<div id="slider-pagenews">

				<?php while( $data = $result->fetch_assoc() ) { ?>
					<div class="col-md-12 item-slider">
						<div class="col-md-12 news-title">
							<span class="icon"><i class="fa fa-book icon"></i></span>
							<h3 class="entry-title"><a href="news-detail/<?= $data['id_artikel'] .'/'. strtolower( str_replace( ' ', '-', $data['judul'] ) ); ?>"><?= limitWord( $data['judul'], 8 ) .' ...'; ?></a></h3>
							<div class="clearfix"></div>
						</div>

						<div class="news-thumbnail"><img src="images/articles/<?= $data['gambar']; ?>" alt="<?= $data['judul']; ?>" class="img-responsive"></div>
					</div>
				<?php } $conn->close(); ?>

			</div>
		</div>
	</div>
</Section>