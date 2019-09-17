<?php

if ( isset( $_POST['save-admin'] ) ) :
	include '../includes/conn.php'; 
	require_once "../includes/functions.php";

	$nm = anti_injection( $_POST['name'] );
	$em = anti_injection( $_POST['email'] );
	$user = anti_injection( $_POST['username'] );
	$pass = anti_injection( $_POST['password'] );
	// $pass = anti_injection( sha1( uniqid( $_POST['password'], true ) ) );

	// Gallery
	$pure_img =  $_FILES['photo']['name'];
	if ( ! empty( $pure_img ) ) {
		$files = end( explode( '.', $pure_img ) );
		$file_name = $pure_img;
		$file_ext = $files;
		$hash_name = random_char( $file_name, 5 );
		$image = $hash_name. ".$file_ext";
		$path = '../images/my/'.$image;
	} else {
		$image = '';
		$path = '';
	}

    // hash_pswd
    // $algo = PASSWORD_DEFAULT;
    $salt = 'ad3in7deje834dgfn3g3h3u373jdnd37dnd3d3n3dz';
    $cost = 10;

    $options = array();
    if ( !empty($cost) ) $options['cost'] = (int)$cost;
    if ( !empty($salt) ) $options['salt'] = $salt;

    // $hash   = password_hash($pass, $algo, $options);
    $password = password_hash( $pass, PASSWORD_DEFAULT, $options );

	$save_admin = $conn->query( "INSERT INTO admin ( `name`, `email`, `photos`, `username`, `password` )
					VALUES( '$nm', 
							'$em', 
							'$image', 
							'$user', 
							'$password' 
					)" );


	if ( $save_admin ){
		move_uploaded_file( $_FILES['photo']['tmp_name'], $path );
		echo "<script>alert( 'Data tersimpan !' ); document.location='./?page=admin';</script>";
	}else{
		die ( "Gagal tersimpan !". $conn->error );
	}
	$conn->close();

endif;