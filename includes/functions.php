<?php
/**
 * Functions
 * ------------------
 * By Aziz Rahman Aji
 *
 */


/**
 * ----------------------------------------
 * ANTI INJECTION
 * ----------------------------------------
 */
if ( ! function_exists( 'anti_injection' ) ) {
	function anti_injection( $data ){
		include "conn.php";
		$filter = $conn->real_escape_string( stripslashes( strip_tags( htmlspecialchars( $data,ENT_QUOTES ) ) ) );
		return $filter;
	}
}

// if ( ! function_exists( 'anti_injection' ) ) {
// 	function anti_injection($data){
// 		$filter = $mysqli->real_escape_string( stripslashes( strip_tags(htmlspecialchars( $data, ENT_QUOTES ) ) ) ); 
// 		return $filter; 
// 	}
// }


/**
 * ----------------------------------------
 * RANDOM CHAR
 * ----------------------------------------
 */
if ( ! function_exists( 'random_char' ) ) {
	function random_char( $filename, $length ) {
		$char = 'abcdefghijklmnopqrstuvwqyz1234567890'. $filename;
		$str_replace = str_replace( array( ' ', '.', ',', '+', ':', '/', '*', '^', '%', '$', '#', '(', ')', '_', '-' ), '', $char );
		$shuffle_string = substr( str_shuffle( $str_replace ), 0, $length ); // exp use substr ->> substr( $str, 0, 5 );
		return $shuffle_string;
	}
}
// str_shuffle -> random character
// shuffle -> random char with array, 
// ex: $my_array = array("red","green","blue","yellow","purple"); shuffle( $my_array );

/**
 * ----------------------------------------
 * RANDOM NUMBER ( NO. REGISTER STUDENT )
 * ----------------------------------------
 */
if ( ! function_exists( 'random_number' ) ) {
	function random_number( $length ) {
		$number = '1234567890';
		$shuffle_number = substr( str_shuffle( $number ), 0, $length );
		return $shuffle_number;
	}
}

/**
 * ----------------------------------------
 * LIMIT CHAR
 * ----------------------------------------
 */
if ( ! function_exists( 'limitChar' ) ) {
	function limitChar( $content, $limit ) {
	    if ( strlen( $content ) <= $limit ) {
	        return $content;
	    } else {
	        $excerpt = substr( $content, 0, $limit );
	        return $excerpt ." ... ";
	    }
	}
}


/**
 * ----------------------------------------
 * LIMIT WORD
 * ----------------------------------------
 */
if ( ! function_exists( 'limitWord' ) ) {
	function limitWord( $string, $word_limit ) {
	   $words = explode( " ", $string );
	   return implode( " ", array_splice( $words, 0, $word_limit ) );
	}
}


/**
 * ----------------------------------------
 * FORMAT NUMBER (RUPIAH)
 * ----------------------------------------
 */
if ( ! function_exists( 'idr' ) ) {
	function idr( $number ) {
		$money = "Rp ". number_format( $number,2,',','.' );
	return $money;
	}
}


/**
 * ----------------------------------------
 * GET BASE URL
 * ----------------------------------------
 */
if ( ! function_exists( 'base_url' ) ) {
	function base_url() {
		return sprintf(
			"%s://%s%s",
			isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			$_SERVER['REQUEST_URI']
		);
	}
} // echo base_url();
// END: Functions = = =