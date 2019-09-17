<div id="preloader">
	<img src="images/load.gif" alt="Preloader">
</div>

<?php 
include 'includes/conn.php'; 
$sql = $conn->query( "SELECT * FROM galeri ORDER BY id_galeri DESC" );

include "includes/breadcrumb.php"; 
?>

<section class="main-content">
	<!-- container -->
	<div class="container">
		<div class="row">
			<article class="maincontent page-gallery">
					
				<div id="my-gallery" class="justified-gallery">
					<?php 
						while( $data = $sql->fetch_assoc() ) {
					    	echo '<a href="images/gallery/'. $data['foto'] .'" alt="gallery-pesantren-al-atlas" >';
					        echo '<img src="images/gallery/'. $data['foto'] .'" alt="'. $data['ket_singkat'] .'">';
					        echo '<div class="overlay-justyfied"></div>';
					        echo '</a>';
						} $conn->close(); 
					?>
				</div>
			</article>
		</div>
	</div>
</section>