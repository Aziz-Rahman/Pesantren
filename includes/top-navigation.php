<?php session_start(); ?>
<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-static-top headroom" role="navigation">
      <div class="container">
        <div class="navbar-header">
			<!-- Button for smallest screens -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<!-- <a class="navbar-brand" href="./"><img src="images/my/logo.png" alt="Pesantren"></a> -->
			<a class="navbar-brand" href="./">Pesantren V-Beta</a>
		</div>
		<div class="navbar-collapse collapse my-nav">
			<ul class="nav navbar-nav pull-right">
				<li><a href="./">Home</a></li>
				<li><a href="profile">Profil</a></li>
				<li><a href="news">Artikel</a></li>
				<li><a href="gallery">Galeri</a></li>
				<li><a href="video">Video</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Psb Online <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="procedure">Prosedur Pendaftaran</a></li>
						<?php if ( empty( $_SESSION['santri_id'] ) || empty( $_SESSION['user_santri'] ) ) : ?>
							<li><a href="sign-up">Form Pendaftaran</a></li>
						<?php endif; ?>
					</ul>
				</li>
				<!-- <li><a href="room-santri">Ruang Santri</a></li> -->
				<?php // if ( ! empty( $_SESSION['santri_id'] ) || ! empty( $_SESSION['user_santri'] ) ) : ?>
					<!-- <li><a href="logout.php">Logout</a></li> -->
				<?php // endif; ?>
			</ul>
		</div><!--/.nav-collapse -->
      </div>
    </nav>