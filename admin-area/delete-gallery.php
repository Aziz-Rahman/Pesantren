<?php  
include '../includes/conn.php';
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_img'] );

$sql = $conn->query( "SELECT id_galeri, foto FROM galeri WHERE id_galeri = '$id'" );
$data = $sql->fetch_assoc();
$directory = '../images/gallery/'. $data['foto']; // Directory file
if ( file_exists( $directory ) AND ! empty ( $data['foto'] ) ) :
	unlink( $directory ); // remove image in folder
endif;

// Delete
$delete = $conn->query( "DELETE FROM galeri WHERE id_galeri = '$id'" );

if ( $delete ) {
	echo "<script>alert( 'Data berhasil dihapus !' ); document.location='./?page=gallery';</script>";
} else {
	die ( "Error". $conn->error );
}

$conn->close();