<?php

include '../includes/conn.php';
require_once "../includes/functions.php";
if ( isset( $_POST['submit_article'] ) ) {

	// Set time zone
	date_default_timezone_set("Asia/Jakarta");

	$tl = anti_injection( $_POST['title'] );
	$dt = anti_injection( date( 'Y-m-d' ) );
	$tm = anti_injection( date( "H:i:s", time() ) );

	// Image article
	$pure_image =  $_FILES['image']['name'];
	if ( ! empty( $pure_image ) ) {
		$files = end( explode( '.', $pure_image ) );
		$file_name = $pure_image;
		$file_ext = $files;
		$hash_name = random_char( $file_name, 5 );
		$img = anti_injection( $hash_name. ".$file_ext" );
		$path = '../images/articles/'.$img;
	} else {
		$img = anti_injection( '' );
		$path = '';
	}

	$cn = $conn->real_escape_string( $_POST['content'] );

	$sql = $conn->query( "INSERT INTO artikel( judul, tanggal, jam, gambar, isi_artikel ) VALUES( '$tl', '$dt', '$tm', '$img', '$cn' )" );

	if ( $sql ){
		move_uploaded_file( $_FILES['image']['tmp_name'], $path );
		echo "<script>alert( 'Data tersimpan !' ); document.location='./?page=article';</script>";
	} else {
		die ( "Gagal tersimpan !". $conn->error );
	}
} $conn->close();