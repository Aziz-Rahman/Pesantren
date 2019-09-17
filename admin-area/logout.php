<?php
session_start();
unset( $_SESSION['sess_id_admin'] );
unset( $_SESSION['sess_user_admin'] );
session_destroy();
header( "location:login-administrator.php" );
?>