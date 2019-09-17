<?php

session_start();

unset( $_SESSION['santri_id'] );
unset( $_SESSION['user_santri'] );
unset( $_SESSION['pswd_santri'] );

session_destroy();

header( 'location:room-santri' );