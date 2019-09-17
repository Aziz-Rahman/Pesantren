<?php
// Connection
$conn = new mysqli( "localhost", "root", "", "pesantren" );
if ( $conn->connect_errno ) {
	die ( "Connection problem !". $conn->connect_error );
}

// SET PAGINATION SCROLLs
$limit = 4; #item per page