<div id="preloader">
	<img src="images/load.gif" alt="Preloader">
</div>

<?php 

include 'includes/conn.php'; 
$sql = $conn->query( "SELECT * FROM video ORDER BY id_video DESC" );
$check_video = $sql->num_rows;

include "includes/breadcrumb.php";
?>

<section class="main-content wrpper-video">
	<!-- container -->
	<div class="container">
		<div class="row">
			<article class="maincontent">
					
				<div id="my-video">
					<?php 
					if ( ! empty( $check_video ) ) :
						while( $video = $sql->fetch_assoc() ) { ?>
							<div class="col-md-4 list-video">
								<!-- <header class="page-header">
									<h2 class="page-title">Visi & Misi</h2>
								</header> -->
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="<?= $video['url']; ?>"></iframe>
								</div>
							</div>
					<?php 
						} // END: WHILE
					else :
						echo 'Not available video !';
					endif; // END: CHECK
					?>

				</div>
			</article>
		</div>
	</div>
</section>
<?php $conn->close();