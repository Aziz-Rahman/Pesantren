<?php include "includes/breadcrumb.php"; ?>

<section class="main-content">
	<!-- container -->
	<div class="container room-santri-area">
		<div class="row">

			<?php if ( empty( $_SESSION['santri_id'] ) || empty( $_SESSION['user_santri'] ) ) : ?>
			  	<!-- START: LOGIN AREA -->
				 <div class="col-md-5">
					 <div class="login-santri">
					 	<header class="page-header login-title">
							<h2 class="page-title">Login Ruang Santri</h2>
						</header>
					  	<form action="check-login.php" method="post" id="form-login-santri">
							<div class="top-margin">
								<label>Username</label>
								<input name="username" type="text" class="form-control">
							</div>
							<div class="top-margin">
								<label>Password</label>
								<input name="password" type="password" class="form-control">
							</div>

							<hr>

							<div class="row">
								<div class="col-lg-8">
									<b><a href="#">Forgot password?</a></b>
								</div>
								<div class="col-lg-4 text-right">
									<button name="login_santri" class="btn btn-magick btn-pressure btn-sensitive" type="submit">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- END: LOGIN AREA -->

				<!-- START: INFO LOGIN -->
				<div class="col-md-7">
					<div class="login-santri login-info">
						<header class="page-header login-title">
							<h2 class="page-title">Informasi</h2>
						</header>
						Mister Trouble never hangs around when he hears this Mighty sound: "Here I come to save the day!" That means that Mighty Mouse is on his way. Yes sir, when there is a wrong to right Mighty Mouse will join the fight. On the sea or on the land, he gets the situation well in hand!
						Making the world a better place, starts with one more smiling face. And Ronald's smile is just the thing, To make everybody sing! Put a smile on, put a smile on, everybody come on! Put a smile on!
					</div>
				</div>
				<!-- END: INFO LOGIN -->

			<?php else : 
				include 'includes/conn.php';
				$sql = $conn->query( "SELECT status_pendaftaran FROM pendaftaran WHERE no_pendaftaran = '". $_SESSION['santri_id'] ."' AND status_pendaftaran = 'santri'" );
				$data_santri = $sql->fetch_assoc();

				if ( ! $data_santri ) {
					$data_togle = '';
					$add_class = 'disabled';
					$navmenu = 'Info PSB';
				} else {
					$data_togle = 'data-toggle="tab"';
					$add_class = '';
					$navmenu = 'Info Santri';
				}
			?>

				<div class="col-sm-12 col-md-12">
	                <div class="panel panel-default panel-room-santri">
	                    <!-- <div class="panel-heading">Ruang Santri</div> -->
	                    <div class="panel-body">
	                        <ul class="nav nav-tabs">

	                            <li class="active"><a href="room-santri/#home" data-toggle="tab"><?php echo $navmenu; ?></a></li>
	                            <li><a href="room-santri/#profile" data-toggle="tab">Data PSB</a></li>
                            	<li><a href="room-santri/#lesson" class="nav-santri <?php echo $add_class; ?>" <?php echo $data_togle; ?>>Pelajaran</a></li>
	                            <li><a href="room-santri/#schedule" class="nav-santri <?php echo $add_class; ?>" <?php echo $data_togle; ?>>Jadwal</a></li>
	                            <li><a href="room-santri/#announcement" class="nav-santri <?php echo $add_class; ?>"<?php echo $data_togle; ?>>Pengumuman</a></li>
	                            <li class="pull-right"><a href="logout.php">Logout</a></li>
	                        </ul>

	                        <div class="tab-content">
	                            <div class="tab-pane fade in active" id="home">
	                                <?php include 'includes/ruang-santri/home-santri.php'; ?>
	                            </div>
	                            <div class="tab-pane fade" id="profile">
	                               	<?php include 'includes/ruang-santri/data-psb.php'; ?>
	                            </div>
	                            <div class="tab-pane fade" id="lesson">     
	                                <?php include 'includes/ruang-santri/lesson.php'; ?>
	                            </div>
	                            <div class="tab-pane fade" id="schedule">
									<?php include 'includes/ruang-santri/schedule.php'; ?>
	                            </div>
	                            <div class="tab-pane fade" id="announcement">
	                                <?php include 'includes/ruang-santri/announcement.php'; ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        <?php endif; ?>

		</div> 
		<!-- END: Class row -->
		
	</div>	<!-- /container -->
</section>