<?php

include '../includes/conn.php';
require_once "../includes/functions.php";

// Gallery
$pure_img =  $_FILES['gallery']['name'];
if ( ! empty( $pure_img ) ) {
	$files = end( explode( '.', $pure_img ) );
	$file_name = $pure_img;
	$file_ext = $files;
	$hash_name = random_char( $file_name, 5 );
	$image = $hash_name. ".$file_ext";
	$path = '../images/gallery/'.$image;
} else {
	$image = '';
	$path = '';
}

$ket = anti_injection( $_POST['ket'] );


$sql = "INSERT INTO galeri( `foto`, `ket_singkat` ) VALUES( '$image', '$ket' )";

$save_gallery = $conn->query( $sql );

if ( $save_gallery ) {
	move_uploaded_file( $_FILES['gallery']['tmp_name'], $path );
	echo "<script>alert( 'Data tersimpan !' ); document.location='./?page=gallery';</script>";
} else {
	die ( "Error". $conn->error );
}
$conn->close();
// END: UPLOAD GALLERY