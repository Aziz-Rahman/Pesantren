<?php
include "../includes/conn.php";
require_once "../includes/functions.php";

if ( isset( $_GET['id'] ) ) :

	$no_register = anti_injection( $_GET['id'] );
	$stts_santri = anti_injection( $_POST['stts_santri'] );

	$update_status_santri = $conn->query( "UPDATE pendaftaran SET status_pendaftaran = '$stts_santri' WHERE no_pendaftaran = '$no_register'" );

	$get_data_register = $conn->query( "SELECT status_pendaftaran FROM pendaftaran WHERE no_pendaftaran = '$no_register' AND status_pendaftaran = 'santri'" );
	$rows = $get_data_register->fetch_assoc();
	$status_santri = $rows['status_pendaftaran'];

	
	/**
	*
	* No Induk Santri OTOMATIS pada saat pendaftaran sebanyak 8 karakter ANGKA
	* Pendaftaran santri baru dapat menampung maksimal 9.999 siswa
	*/
	$query = $conn->query( "SELECT RIGHT( nis, 4 ) FROM santri ORDER BY RIGHT( nis, 4 ) DESC" );
	$check_data = $query->num_rows;
	$fetch_data = $query->fetch_row();
	$maxid = $fetch_data[0];

	// while ( $fetch_data = $sql->fetch_assoc() ) {

	if ( empty( $check_data ) ) {
	  $new_code = 1;
	} else {
	  $the_code = substr( $maxid, -8 );
	  $new_code = $the_code + 1;
	}

	$kd = '';
	date_default_timezone_set("Asia/Jakarta");
	$year = substr( date( 'Y' ), 2 ); // get 2 number of date from right
	$mount = date( 'm' );
	$custom_cd = $year.$mount; // Tahun + bulan, ex: 1602

	if ( $new_code >= 1 && $new_code < 10 ) :
	 	$kd .= $custom_cd ."000". $new_code;
	elseif ( $new_code >= 10 && $new_code < 100 ) :
	 	$kd .= $custom_cd ."00". $new_code;
	 elseif ( $new_code >= 100 && $new_code < 1000 ) :
		$kd .= $custom_cd ."0". $new_code;
	 elseif ( $new_code >= 1000 && $new_code < 10000 ) : // santri avaliable in <= 9.999
	 	$kd .= $custom_cd.$new_code;
	else :
		$kd .= 'Not yet';
	endif;

	if ( $status_santri ) { // if status is santri
		$save = $conn->query( "INSERT INTO santri ( nis, no_pendaftaran ) VALUES (  '$kd', '$no_register' )" );
	} else { // if status not santri
		$delete = $conn->query( "DELETE FROM santri WHERE no_pendaftaran ='$no_register'" );
	}

endif;

$conn->close();
// END: Updat