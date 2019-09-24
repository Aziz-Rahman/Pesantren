<?php 

if ( ! empty( $_SESSION['santri_id'] ) || ! empty( $_SESSION['user_santri'] ) ) :
	 echo "<meta http-equiv='refresh' content='0; url=?page=ruang-santri'>";
else :

include "includes/breadcrumb.php";
?>

	<section class="main-content">
		<!-- container -->
		<div class="container">
			<div class="row">

				<div class="col-md-7">
					<!-- START: REGISTER -->
					<div class="register-santri">
						<header class="page-header register-title">
							<h2 class="page-title">Form Pendaftaran Santri Baru (PSB)</h2>
						</header>
						<form action="save-register.php" method="post" enctype="multipart/form-data" id="register-santri" class="form-horizontal">
							<fieldset>

			          			<legend>Data Diri</legend>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Nama Lengkap <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="full_name" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Tanggal Lahir <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="date" name="brithday" class="form-control" placeholder="YYYY-MM-DD">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Tempat Lahir <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="city_brithday" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Jenis Kelamin <span class="text-danger">*</span></label>
									<div class="col-sm-3">
										<label for="radio">
										    <input type="radio" name="jekel" id="radio" value="Laki-laki"/>
										    Laki - laki
										</label>
									</div>
									<div class="col-sm-3">
										<label for="radio2">
										    <input type="radio" name="jekel" id="radio2" value="Perempuan"/>
										    Perempuan
										</label>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Status Perkawinan <span class="text-danger">*</span></label>
									<div class="col-sm-3">
										<label for="single">
										    <input type="radio" name="status_kawin" id="single" value="Single"/>
										    Single
										</label>
									</div>
									<div class="col-sm-3">
										<label for="sdh_mnkah">
										    <input type="radio" name="status_kawin" id="sdh_mnkah" value="Sudah Menikah"/>
										    Sudah Menikah 
										</label>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">No. Telepon <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="phone" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Email <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="email" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Kota <span class="text-danger">*</span></label>
									<div class="col-sm-4">
										<input type="text" name="city" class="form-control">
									</div>

									<label class="col-sm-3 control-label" for="textinput">Kode Pos <span class="text-danger">*</span></label>
									<div class="col-sm-2">
										<input type="text" name="cd_pos" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Alamat <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<textarea class="input-textarea" name="address" cols="" rows="4"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Foto <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="file" name="photo" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Ktp <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="file" name="ktp" class="form-control">
									</div>
								</div>

								<legend class="top-margin-50">Pendidikan</legend>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Pendidikan Terakhir</label>
									<div class="col-sm-9">
										<input type="text" name="end_study" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Ijazah</label>
									<div class="col-sm-9">
										<input type="file" name="ijazah" class="form-control">
									</div>
								</div>

								<!-- <legend class="top-margin-50">Akun Santri</legend>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Username <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="username" class="form-control">
									</div>
								</div> -->

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Password <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="password" name="password" class="form-control">
									</div>
								</div>

								<legend class="top-margin-50">Orang Tua / Wali</legend>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Nama Ayah <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="father" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label" for="textinput">Nama Ibu <span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<input type="text" name="mother" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<div class="pull-right">
											<button class="btn btn-magick btn-pressure btn-sensitive" type="submit" name="register_santri">Daftar</button>
										</div>
									</div>
								</div>
								
								Info: <label>( <span class="text-danger">*</span> ) harus diisi.</label>
			        		</fieldset>
			      		</form>
			      	</div>

		    	</div><!-- /.col-md -->

				
				 <!-- <div class="col-md-5"> -->
				 	<!-- START: LOGIN AREA -->
				 	<!-- <div class="login-santri">
				 		<header class="page-header login-title">
							<h2 class="page-title">Login Ruang Santri</h2>
						</header>
					  	<form action="check-login.php" method="post" id="form-login-santri">
							<div class="top-margin-20">
								<label>Username</label>
								<input name="username" type="text" class="form-control">
							</div>
							<div class="top-margin-20">
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
					</div> -->
					<!-- END: LOGIN AREA -->
				<!-- </div> -->

				<div class="col-md-5">
				 	<!-- START: INFO PSB -->
				 	<div class="info-psb login-santri">
				 		<header class="page-header login-title">
							<h2 class="page-title">Informasi</h2>
						</header>
					  	<p>Look for the Union Label when you are buying a coat, dress, or blouse. Remember, somewhere our union's sewing, our wages going to feed the kids, and run the house. 
					  	We work hard, but who's complaining. Thanks to the I.L.G. we're paying our way. So always look for the Union Label. 
					  	It means we're able to make it in the U.S.A.!</p>
					</div>
					<!-- END: INFO PSB -->
				</div>


			</div> 
			<!-- END: Class row -->
			
		</div>	<!-- /container -->
	</section>
<?php endif;
// END: REGISTER SANTRI