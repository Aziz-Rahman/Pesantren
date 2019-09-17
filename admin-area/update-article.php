<?php  
include '../includes/conn.php';
require_once "../includes/functions.php";

if ( isset( $_POST['update_article'] ) ) {
	date_default_timezone_set("Asia/Jakarta"); // Set time zone
	$date = date( 'Y-m-d' );
	$time = date('H:i:s', time() );
	$id = anti_injection( $_POST['id_art'] );
	$tl = anti_injection( $_POST['title'] );
	$content = $conn->real_escape_string( $_POST['content'] );

	// GET OLD DATA IF NOT CHANGE
	$get_sql = $conn->query( "SELECT gambar FROM artikel WHERE id_artikel = '$id'" );
	$get_old_data = $get_sql->fetch_assoc();

	// ==================================================

	// Image article
	$pure_image =  $_FILES['upload-file']['name'];
	if ( ! empty( $pure_image ) ) {
		$files = end( explode( '.', $pure_image ) );
		$file_name = $pure_image;
		$file_ext = $files;
		$hash_name = random_char( $file_name, 5 );
		$img = $hash_name . ".$file_ext";
		$path = '../images/articles/'.$img;
	} else {
		$img = '';
		$path = '';
	}

	// file in directory
	$directory = '../images/articles/'.$get_old_data['gambar'];

	if ( empty( $pure_image ) ) :
		// Check file in directory 
		if ( file_exists( $directory ) ) { 
			$images = $get_old_data['gambar'];
		} else {
			$images = '';
		}
	else :
		$images = $img;
		if ( file_exists( $directory ) AND ( ! empty( $get_old_data['gambar' ] ) ) ) { // check if file exists and available in database
			unlink( $directory ); // then, remove file in directory
		}
	endif;

	// ==================================================
	
		
	$data = $conn->query( "UPDATE artikel SET judul = '$tl', tanggal = '$date', jam = '$time', gambar = '$images', isi_artikel = '$content' WHERE id_artikel = '$id' " );

	if ( $data ) {
		move_uploaded_file( $_FILES['upload-file']['tmp_name'], $path );
		echo "<script>alert( 'Data telah diperbarui !' ); document.location='./?page=article';</script>";
	} else {
		die ( "Gagal diperbarui !". $conn->error );
	}

}
$conn->close();