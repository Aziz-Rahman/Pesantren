<?php  
include '../includes/conn.php';
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_img_art'] );
$sql = $conn->query( "SELECT gambar FROM artikel WHERE id_artikel = '$id'" );
$data = $sql->fetch_assoc();
unlink( '../images/articles/'.$data['gambar'] ); // remove image in folder

// Delete
$delete =$conn->query( "DELETE gambar FROM artikel WHERE id_artikel = '$id'" );

$conn->close();