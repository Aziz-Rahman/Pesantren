<?php  
include '../includes/conn.php';
require_once "../includes/functions.php";

if ( isset( $_POST['update_admin'] ) ) {
	$id = anti_injection( $_POST['id_adm'] );
	$nm = anti_injection( $_POST['name'] );
	$em = anti_injection( $_POST['email'] );
	$user = anti_injection( $_POST['username'] );
	$pswd = anti_injection( $_POST['password'] );
	// $pswd = anti_injection( sha1( uniqid( $_POST['password'], true ) ) );

	// GET OLD DATA IF NOT CHANGE
	$get_sql = $conn->query( "SELECT photos, password FROM admin WHERE id_admin = '$id'" );
	$get_old_data = $get_sql->fetch_assoc();

	// ==================================================

    // $algo = PASSWORD_DEFAULT;
    $salt = 'ad3in7deje834dgfn3g3h3u373jdnd37dnd3d3n3dz';
    $cost = 10;

    $options = array();
    if ( !empty($cost) ) $options['cost'] = (int)$cost;
    if ( !empty($salt) ) $options['salt'] = $salt;

    // $hash   = password_hash($pass, $algo, $options);
    $password = password_hash( $pswd, PASSWORD_DEFAULT, $options );

    if ( ! empty( $pswd ) ) :
    	$pass = $password;
    else :
    	$pass = $get_old_data['password'];
    endif;

    // ==================================================

	// Photo
	$pure_image =  $_FILES['upload-file']['name'];
	if ( ! empty( $pure_image ) ) {
		$files = end( explode( '.', $pure_image ) );
		$file_name = $pure_image;
		$file_ext = $files;
		$hash_name = random_char( $file_name, 5 );
		$img = $hash_name . ".$file_ext";
		$path = '../images/my/'.$img;
	} else {
		$img = '';
		$path = '';
	}

	// file in directory
	$directory = '../images/my/'.$get_old_data['photos'];

	if ( empty( $pure_image ) ) :
		// Check file in directory 
		if ( file_exists( $directory ) ) { 
			$photo = $get_old_data['photos'];
		} else {
			$photo = '';
		}
	else :
		$photo = $img;
		if ( file_exists( $directory ) AND ( ! empty( $get_old_data['photos' ] ) ) ) { // check if file exists and available in database
			unlink( $directory ); // then, remove file in directory
		}
	endif;

	// ==================================================
	

	$data = $conn->query( "UPDATE admin SET name = '$nm', email = '$em', photos = '$photo', username = '$user', password = '$pass' WHERE id_admin = '$id' " );

	if ( $data ) {
		move_uploaded_file( $_FILES['upload-file']['tmp_name'], $path );
		echo "<script>alert( 'Data telah diperbarui !' ); document.location='./?page=admin';</script>";
	} else {
		die ( "Gagal diperbarui !". $conn->error );
	}

}

$conn->close();