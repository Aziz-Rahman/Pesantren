<?php

include '../includes/conn.php'; 
require_once "../includes/functions.php";
$sess_id = anti_injection( $_SESSION['sess_id_admin'] );

$get_img = $conn->query( "SELECT `photos` FROM `admin` WHERE id_admin = '$sess_id'" );
$data = $get_img->fetch_assoc();
?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li><div class="user-img-div"><?php echo '<img src=../images/my/'.$data['photos'].' height="" class="img-responsive">'; ?></div></li>
            <li><a class="active-menu" href="./"><i class="fa fa-dashboard "></i>Dashboard</a></li>
             <li><a href="./?page=admin"><i class="fa fa-user-plus"></i>Admin</a></li>
            <li><a href="./?page=article"><i class="fa fa-leanpub"></i>Artikel</a></li>
            <li>
                <a href="#"><i class="fa fa-sitemap "></i>Santri<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="./?page=procedure"><i class="fa fa-cogs "></i>Prosedur</a></li>
                    <li><a href="?page=register-santri"><i class="fa fa-bullhorn "></i>Pendaftaran</a></li>
                    <li><a href="?page=santri"><i class="fa fa-bullhorn "></i>Data Santri</a></li>
                    <li><a href="?page=lesson"><i class="fa fa-pencil-square-o"></i>Pelajaran</a></li>
                </ul>
            </li>
            <li><a href="./?page=message"><i class="fa fa-envelope-o"></i>Pesan</a></li>
            <li>
                <a href="#"><i class="fa fa-sitemap "></i>Fitur<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="./?page=quote"><i class="fa fa-quote-left"></i>Kutipan</a></li>
                    <li><a href="./?page=gallery"><i class="fa fa-image"></i>Galeri</a></li>
                    <li><a href="./?page=video"><i class="fa fa-image"></i>Video</a></li>
                    <li><a href="./?page=sosmed"><i class="fa fa-image"></i>Social Media</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<?php  $conn->close();