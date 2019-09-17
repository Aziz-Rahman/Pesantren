<?php
	include 'includes/conn.php';
	// require_once "includes/functions.php";
	$sess_id = $_SESSION['santri_id'];
	$sql = $conn->query( "SELECT * FROM pendaftaran WHERE no_pendaftaran = '$sess_id'" );
	$data = $sql->fetch_assoc();
?>


<div class="container">
	<div class="row">

		<div class="col-md-12" >

			<div class="col-md-3 col-lg-3 " align="center"> 
				<?= '<img src="images/santri/'. $data['foto'] .'" class="img-responsive">'; ?>
			</div>

			<div class=" col-md-9 col-lg-9 "> 
				<table class="table table-user-information">
					<tbody>
						<tr>
							<td>No. Pendaftaran</td>
							<td><?= $data['no_pendaftaran']; ?></td>
						</tr>

						<tr>
							<td>Nama Lengkap</td>
							<td><?= $data['nama_lengkap']; ?></td>
						</tr>

						<tr>
							<td>Tanggal Lahir</td>
							<td><?= $data['tgl_lahir']; ?></td>
						</tr>

						<tr>
							<td>Tempat Lahir</td>
							<td><?= $data['tmpt_lahir']; ?></td>
						</tr>

						<tr>
							<td>Jenis Kelamin</td>
							<td><?= $data['jekel']; ?></td>
						</tr>

						<tr>
							<td>Status Perkawinan</td>
							<td><?= $data['status_kawin']; ?></td>
						</tr>

						<tr>
							<td>Kode Pos</td>
							<td><?= $data['kd_pos']; ?></td>
						</tr>

						<tr>
							<td>Kota</td>
							<td><?= $data['kota']; ?></td>
						</tr>

						<tr>
							<td>Alamat</td>
							<td><?= $data['alamat']; ?></td>
						</tr>

						<tr>
							<td>Email</td>
							<td><?= $data['email']; ?></td>
						</tr>

						<tr>
							<td>No. Telepon</td>
							<td><?= $data['no_telp']; ?></td>
						</tr>

						<tr>
							<td>KTP</td>
							<?php  
								$ktp = $data['ktp'];
								if ( ! empty( $ktp ) ) :
									echo '<td>Ada (Sudah diupload)</td>';
								else :
									echo 'Tidak ada (Belum diupload)';
								endif;
							?>
						</tr>

						<tr>
							<td>Ijazah</td>
							<?php  
								$ijzh = $data['pend_terakhir'];
								if ( ! empty( $ijzh ) ) :
									echo '<td>Ada (Sudah diupload)</td>';
								else :
									echo 'Tidak ada (Belum diupload)';
								endif;
							?>
						</tr>

						<tr>
							<td>Pendidikan Terakhir</td>
							<td><?= $data['pend_terakhir']; ?></td>
						</tr>

						<tr>
							<td>Nama Ayah</td>
							<td><?= $data['nama_ayah']; ?></td>
						</tr>

						<tr>
							<td>Nama Ibu</td>
							<td><?= $data['nama_ibu']; ?></td>
						</tr>

					</tbody>
				</table>
				<a href="print-psb.php" target="_new" class="btn btn-danger btn-pressure btn-sensitive">Cetak Bukti Pendaftaran</a>
			</div>
		</div>

	</div> <!-- END: .row -->
</div> <!-- END: .container -->
<?php
$conn->close();