<?php  
include '../includes/conn.php';
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_art'] );
$sql = $conn->query( "SELECT * FROM artikel WHERE id_artikel = '$id'" );
$data = $sql->fetch_assoc();
unlink( '../images/articles/'.$data['gambar'] ); // remove image in folder

// Delete
$delete = $conn->query( "DELETE FROM artikel WHERE id_artikel = '$id' " );

if ( $delete ) {
	echo "<script>alert( 'Data berhasil dihapus !' ); document.location='./?page=article';</script>";
} else {
	die ( "Gagal !". $conn->error );
}

$conn->close();