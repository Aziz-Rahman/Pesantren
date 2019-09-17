<?php
session_start();

if ( empty( $_SESSION['santri_id'] ) || empty( $_SESSION['user_santri'] ) ) :
	echo "<meta http-equiv='refresh' content='0; url=./?page=ruang-santri'>";

else :

	include 'includes/conn.php';
	$sess_id = $_SESSION['santri_id'];
	$sql = $conn->query( "SELECT * FROM pendaftaran WHERE no_pendaftaran = '$sess_id'" );
	$data = $sql->fetch_assoc();
?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cetak Bukti Pendaftaran</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/print-style.css">
	</head>
	<body>

		<section id="main-wrapper">
			<div class="container">
				<div class="row">

					<div class="col-md-8 col-md-offset-2 inner-wrapper">

						<!--  -->
						<div class="col-md-12"> 
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td rowspan="2" class="photo top-area">
											<?= '<img src="images/santri/'. $data['foto'] .'" class="img-responsive">'; ?>
										</td>
										<td class="top-area"></td>
										<td colspan="2" class="top-area"><h1 class="pesantren-title">Pesantren Nur Al Tauhid</h1></td>
									</tr>
									<tr>
										<td class="top-area"></td>
										<td colspan="3" class="top-area"><h2 class="info-title">Bukti Pendaftaran</h2></td>
									</tr>
									<tr>
										<td>No. Pendaftaran</td>
										<td style="width: 10px;">:</td>
										<td><?= $data['no_pendaftaran']; ?></td>
									</tr>

									<tr>
										<td>Nama Lengkap</td>
										<td>:</td>
										<td><?= $data['nama_lengkap']; ?></td>
									</tr>

									<tr>
										<td>Email</td>
										<td>:</td>
										<td><?= $data['email']; ?></td>
									</tr>

									<tr>
										<td>No. Telepon</td>
										<td>:</td>
										<td><?= $data['no_telp']; ?></td>
									</tr>
								</tbody>
							</table>
							<a href="print-psb.php" class="btn btn-danger btn-pressure btn-sensitive noPrint" onclick="window.print()">Cetak</a>
							<div class="clearfix"></div>
						</div>
					</div>

				</div> <!-- END: .row -->
			</div> <!-- END: .container -->
			<?php $conn->close(); ?>
		</section>
		
	</body>
	</html>
<?php endif;