<?php

$hal = isset( $_GET['page'] ) ? $_GET['page'] : '';

if ( $hal == "" ) {
	include "content-home.php";
}

elseif ( $hal == "admin" ){
	include "admin.php";
}

elseif ( $hal == "article" ){
	include "content-article.php";
}

elseif ( $hal == "comments" ){
	include "comments-article.php";
}

elseif ( $hal == "message" ){
	include "message.php";
}

elseif ( $hal == "quote" ){
	include "quote.php";
}

elseif ( $hal == "procedure" ){
	include "procedure.php";
}

elseif ( $hal == "gallery" ){
	include "content-gallery.php";
}

elseif ( $hal == "video" ){
	include "content-video.php";
}

elseif ( $hal == "sosmed" ){
	include "content-sosmed.php";
}

elseif ( $hal == "view-admin" ){
	include "view-admin.php";
}

elseif ( $hal == "view-article" ){
	include "view-article.php";
}

elseif ( $hal == "edit-article" ){
	include "edit-article.php";
}

elseif ( $hal == "edit-admin" ){
	include "edit-admin.php";
}

elseif ( $hal == "register-santri" ){
	include "register-santri.php";
}

elseif ( $hal == "santri" ){
	include "santri.php";
}

elseif ( $hal == "lesson" ){
	include "lesson.php";
}

else {
	include "404.php";
}