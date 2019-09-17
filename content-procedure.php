<?php 
 
include 'includes/conn.php';

// Select data
$sql = $conn->query( "SELECT * FROM prosedur" );
$data = $sql->fetch_assoc();

include "includes/breadcrumb.php";
?>

<section class="main-content">
<!-- container -->
	<div class="container">
		<!-- Article main content -->
		<div class="row">
			<article class="col-sm-8 maincontent">
				<div class="page-inner">
					<header class="page-header">
						<h1 class="page-title"><?php echo $data['judul']; ?></h1>
					</header>
					<?php echo $data['isi_text']; ?>
				</div>
			</article>

			<article class="col-sm-4 maincontent">
				<header class="page-header">
					<h2 class="page-title">Lorem Ipsum</h2>
				</header>
				<div class="post-inner">
					<p>Mister Trouble never hangs around when he hears this Mighty sound: "Here I come to save the day!" That means that Mighty Mouse is on his way.</p>
					<p>Yes sir, when there is a wrong to right Mighty Mouse will join the fight. On the sea or on the land, he gets the situation well in hand!</p>					
					<p>We got a right to pick a little fight, Bonanza! If anyone fights anyone of us, he's gotta fight with me! We're not a one to saddle up and run, Bonanza! Anyone of us who starts a little fuss knows he can count on me! One for four, four for one, this we guarantee. We got a right to pick a little fight, Bonanza! If anyone fights anyone of us he's gotta fight with me!</p>
				</div>
			</article>

		</div>
	</div>
</section>
<?php $conn->close();