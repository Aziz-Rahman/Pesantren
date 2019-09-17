<?php
include "conn.php";
require_once "functions.php";
$breadcrumb_from_url = isset( $_GET['page'] ) ? anti_injection( $_GET['page'] ) : 'FUCK!'; // Get url


if ( empty( $_SESSION['santri_id'] ) || empty( $_SESSION['user_santri'] ) ) :
    $ssession_room_santri = 'Login';
else :
     $ssession_room_santri = 'Room Santri';
endif;


if ( $breadcrumb_from_url == "" ) {
	$breadcrumb_from_url = 'Home';
}
elseif ( $breadcrumb_from_url == "profile" ) {
	$breadcrumb_from_url = 'Profile';
}
elseif ( $breadcrumb_from_url == "gallery" ){
	$breadcrumb_from_url = 'Gallery';
}
elseif ( $breadcrumb_from_url == "video" ){
    $breadcrumb_from_url = 'Video';
}
elseif ( $breadcrumb_from_url == "procedure" ) {
	$breadcrumb_from_url = 'Procedure';
}
elseif ( $breadcrumb_from_url == "ruang-santri" ){
    $breadcrumb_from_url = $ssession_room_santri;
}
elseif ( $breadcrumb_from_url == "pendaftaran" ){
	$breadcrumb_from_url = 'Register';
}

else {
	$breadcrumb_from_url = '404 Not Found';
}
?>


<section class="header-section">
    <div class="container">
        <ul class="breadcrumb">
            <?php 
                if ( ! $breadcrumb_from_url == "" ) { 
                    echo ' <li><a href="./"><i class="fa fa-home"></i> Home</a></li>  <li>'. $breadcrumb_from_url. '</li>'; 
                } else { 
                    echo ''; 
                } 
            ?>
           <!--  <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Gallery</li> -->
        </ul>
    </div>
</section>