<?php 

$conn = mysqli_connect( "localhost", "root", "", "pesantren") or die ( "Error". mysqli_error( $conn ) );

$au = mysqli_real_escape_string( $conn, $_POST['author'] );
$qu = mysqli_real_escape_string( $conn, $_POST['quote'] );
$sql = "INSERT INTO kutipan( author, quotes ) VALUES( '".$au."', '".$qu."' )";

$result = mysqli_query( $conn, $sql );

if ( $result ){
	echo "<script>alert( 'Data tersimpan !' ); document.location='home.php?page=quote';</script>";
} else {
	die ( "Error". mysqli_error( $conn ) );
}
mysqli_close( $conn );
?>