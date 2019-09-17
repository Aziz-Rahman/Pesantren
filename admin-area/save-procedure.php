<?php 
if ( isset( $_POST['submit_procedure'] ) ) {

	include '../includes/conn.php';
	require_once "../includes/functions.php";

	$tt = anti_injection( $_POST['title'] );
	$pr = $conn->real_escape_string( $_POST['procedure'] );

	$save = $conn->query( "INSERT INTO prosedur( judul, isi_text ) VALUES( '$tt', '$pr' )" );

	if ( $save ) {
		echo "<script>alert( 'Data tersimpan !' ); document.location='./?page=procedure';</script>";
	} else {
		die ( "Error". $conn->error );
	}
}

$conn->close();