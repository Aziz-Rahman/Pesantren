<?php
include "includes/conn.php";
require_once "includes/functions.php";

$name = anti_injection( $_POST['name'] );
$email = anti_injection( $_POST['email'] );
$phone = anti_injection( $_POST['phone'] );
$message = anti_injection( $_POST['messages'] );

if ( empty( $name ) || empty( $email ) || empty( $phone ) || empty( $message ) ) {
	echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-exclamation-triangle"></i> Silahkan isi data dengan lengkap dan benar.</div>';
}
elseif ( !preg_match( "/^[a-zA-Z ]*$/",$name ) ) {
	echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-exclamation-triangle"></i> Nama tidak valid.</div>';
}
elseif ( filter_var( $email, FILTER_VALIDATE_EMAIL) === false ) {
	echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-exclamation-triangle"></i> Alamat email tidak valid.</div>';
} 
elseif ( ! is_numeric( $phone ) ) {
	echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-exclamation-triangle"></i> No. Telepon tidak valid</div>';
}
else {
	//if success
	$query = $conn->query( "INSERT INTO kontak( nama, email, no_telp, pesan_masuk ) VALUES ( '$name','$email', '$phone', '$message' )");

	if ( $query ) {
		echo '<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check"></i> 
			Pesan Anda telah kami terima. Kami akan membalas melalui email/ no. telepon Anda.</div>';
			echo '<script>$("#contact-messages")[0].reset();</script>'; // reset empty
	} else {
	    echo "Gagal terkirim !";
	}
}