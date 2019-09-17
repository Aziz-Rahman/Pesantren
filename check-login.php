<?php

if ( isset( $_POST['login_santri'] ) ):
	include 'includes/conn.php';
	require_once "includes/functions.php";

	$us = anti_injection( $_POST['username'] );
	$ps = anti_injection( $_POST['password'] );

	// $algo = PASSWORD_DEFAULT;
	$salt = 'arh8hjd3je8r8a7lk30fd930vks2jvn69kjsh5n2';
	$cost = 10;

	$options = array();
	if ( !empty($cost) ) $options['cost'] = (int)$cost;
	if ( !empty($salt) ) $options['salt'] = $salt;

	// $hash   = password_hash($pass, $algo);
	$password = password_hash( $ps, PASSWORD_DEFAULT, $options ); // pswd an insert after ( validation without hash )
	$sql = $conn->query( "SELECT no_pendaftaran, username, password FROM pendaftaran WHERE username = '$us' AND password = '$password'" );
	$check = $sql->num_rows; // cek hasil query
	$data = $sql->fetch_assoc();
	$verify_pass = password_verify( $ps, $password ); // ($pass, $hash)

	if ( $check > 0 AND $verify_pass ) {
		session_start(); // Memulai session
		$_SESSION['santri_id'] = $data['no_pendaftaran'];
		$_SESSION['user_santri'] = $data['username'];
		$_SESSION['pswd_santri'] = $data['password'];

		header( 'location:room-santri' ); // berhasil login

	} else {

		echo "<script>alert( 'Username atau password salah. Silahkan ulangi !' ); document.location='room-santri';</script>";
	
	}

endif;