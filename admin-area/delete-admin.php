<?php  
include '../includes/conn.php';
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_adm'] );
$sql = $conn->query( "SELECT * FROM admin WHERE id_admin = '$id' " );
$data = $sql->fetch_assoc();
unlink( '../images/my/'.$data['photos'] ); // remove image in folder

// Delete
$delete = $conn->query( "DELETE FROM admin WHERE id_admin = '$id' " );

if ( $delete ){
		echo "<script>alert( 'Data berhasil dihapus !' ); document.location='./?page=admin';</script>";
	} else{
		die ( "Gagal !". $conn->error );
	}

$conn->close();