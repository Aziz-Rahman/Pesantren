<div id="preloader">
	<img src="images/load.gif" alt="Preloader">
</div>

<?php 

// include 'includes/conn.php'; 
// $sql = $conn->query( "SELECT * FROM video ORDER BY id_video DESC" );
// $check_video = $sql->num_rows;

include "includes/breadcrumb.php";
?>

<style>
	.list-video {
		height: 270px;
	}
	.list-video img {
		width: 100%;
	}

	.list-video h4 {
		font-size: 14px;
		margin-top: 10px;
	}
	.list-video a.title-y {
		color: #ccc;
	}
	.modal-header {
		border-bottom: none;
		padding: 15px 15px 0;
	}
</style>


<section class="main-content wrpper-video">
	<!-- container -->
	<div class="container">
		<div class="row">
			<article class="maincontent" id="videos">
					
				<div id="my-video">
					<?php 
					$api_key = 'AIzaSyBLtj6p6S6nNwHlyI_tHEisj1qC9KSy5mk';
					$playlist_id = 'PLJRWDZaS477Oii7RXZj0uUHCUN_7VDK35'; 
					$result = 24;
					$api_url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults='. $result .'&playlistId='. $playlist_id . '&key=' . $api_key;
					      
					$playlist = json_decode(file_get_contents($api_url));
					// if ( ! empty( $check_video ) ) :
					$i = 1;
					foreach($playlist->items AS $item) { 
						$video = str_replace('https://i.ytimg.com/vi/', '', $item->snippet->thumbnails->default->url);
						// $bbbbb = substr(string, start)
						$video_id = explode("/", $video);

					?>
						<div class="col-xs-12 col-sm-6 col-md-3 list-video">
							<a href=".display-modal" id="myModal-<?php echo $video_id[0]; ?>+a" class="btn-modal" data-toggle="modal">
								<img src="<?php echo $item->snippet->thumbnails->default->url; ?>" class="img-fluid">
							</a>
							
							<!-- <a href="https://www.youtube.com/watch?v=<?php // echo $video_id[0]; ?>&list=<?php // echo $item->snippet->playlistId; ?>&index=<?php // echo $i; ?>" target="_blank"> -->

							<a href=".display-modal" id="myModal-<?php echo $video_id[0]; ?>+b" class="btn-modal title-y" data-toggle="modal">
					  			<h4><?php echo $item->snippet->title;  ?></h4>
					  		</a>
						</div>
					<?php 
						$i++; 
					} // END: WHILE

					?>

				</div>


				<!-- Modal HTML -->
				<div id="myModal" class="modal fade display-modal">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header" >
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                <h4 class="modal-title"><i class="fa fa-youtube-square" aria-hidden="true"></i> YouTube Video</h4>
				            </div>
				            <div class="modal-body" id="myVideoYoutube">
				                
				            </div>
				        </div>
				    </div>
				</div>
				

			</article>
		</div>
	</div>
</section>
<?php $conn->close(); 