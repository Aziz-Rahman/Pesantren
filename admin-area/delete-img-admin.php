<?php  
include '../includes/conn.php'; 
require_once "../includes/functions.php";

$id = anti_injection( $_GET['id_img_adm'] );
$sql = $conn->query( "SELECT photos FROM admin WHERE id_admin = '$id'" );
$data = $sql->fetch_assoc();
unlink( '../images/my/'.$data['photos'] ); // remove image in folder

// Delete
$delete = $conn->query( "DELETE photos FROM admin WHERE id_admin = '$id'" );

$conn->close();