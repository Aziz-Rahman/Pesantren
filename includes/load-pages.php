<?php

$page = isset( $_GET['page'] ) ? $_GET['page'] : '';

if ( $page == "" ) {
	include "home.php";
}

elseif( $page == "profile" ){
	include "content-profile.php";
}

elseif( $page == "pendaftaran" ){
	include "content-psb.php";
}

elseif( $page == "article" ){
	include "content-article.php";
}

elseif( $page == "detail-article" ){
	include "detail-article.php";
}

elseif( $page == "procedure" ){
	include "content-procedure.php";
}

elseif( $page == "ruang-santri" ){
	include "ruang-santri.php";
}

elseif( $page == "gallery" ){
	include "content-gallery.php";
}

elseif( $page == "video" ){
	include "content-video.php";
}

elseif( $page == "search-results" ){
	include "search-results.php";
}

else {
	include "404.php";
}