<?php
if ( isset( $_POST['register_santri'] ) ) :

	include 'includes/conn.php';
	require_once "includes/functions.php";

	$full_name = anti_injection( $_POST['full_name'] );
	$city_brithday = anti_injection( $_POST['city_brithday'] );
	$brithday = anti_injection( $_POST['brithday'] );
	$gender = isset( $_POST['jekel'] ) ? anti_injection( $_POST['jekel'] ) : '';
	$status_kawin = anti_injection( $_POST['status_kawin'] );
	$address = anti_injection( $_POST['address'] );
	$pos = anti_injection( $_POST['cd_pos'] );
	$city = anti_injection( $_POST['city'] );
	$study = anti_injection( $_POST['end_study'] );
	$father = anti_injection( $_POST['father'] );
	$mother = anti_injection( $_POST['mother'] );
	$phone = anti_injection( $_POST['phone'] );
	$email = anti_injection( $_POST['email'] );
	$username = anti_injection( $_POST['username'] );
	$pw = anti_injection( $_POST['password'] );

	// hash_pswd
	// $algo = PASSWORD_DEFAULT;
	$salt = 'arh8hjd3je8r8a7lk30fd930vks2jvn69kjsh5n2';
	$cost = 10;

	$options = array();
	if ( !empty($cost) ) $options['cost'] = (int)$cost;
	if ( !empty($salt) ) $options['salt'] = $salt;

	// $hash   = password_hash($pass, $algo);
	$password = password_hash( $pw, PASSWORD_DEFAULT, $options ); // pswd an insert after ( validation without hash )

	// Photo
	$pure_photo =  $_FILES['photo']['name'];
	if ( ! empty( $pure_photo ) ) {
		$files = end( explode( '.', $pure_photo ) );
		$file_name = $pure_photo;
		$file_ext = $files;
		$hash_name = random_char( $file_name, 5 );
		$photo = $hash_name. ".$file_ext";
		$path_photo = 'images/santri/'.$photo;
	} else {
		$photo = '';
		$path_photo = '';
	}

	// Ijazah
	$ijzh =  $_FILES['ijazah']['name'];
	if ( ! empty( $ijzh ) ) {
		$files_ijzh = end( explode( '.', $ijzh ) );
		$file_name_ijzh = $ijzh;
		$ext_ijzh = $files_ijzh;
		$hash_name_ijzh = random_char( $file_name_ijzh, 5 );
		$ijazah = $hash_name_ijzh. ".$ext_ijzh";
		$path_ijzh = 'images/santri/'.$ijazah;
	} else {
		$ijazah = '';
		$path_ijzh = '';
	}

	// KTP
	$upload_ktp =  $_FILES['ktp']['name'];
	if ( ! empty( $upload_ktp ) ) {
		$files_ktp = end( explode( '.', $upload_ktp ) );
		$file_name_ijzh = $upload_ktp;
		$ext_ktp = $files_ktp;
		$hash_name_ktp = random_char( $file_name_ijzh, 5 );
		$ktp = $hash_name_ktp. ".$ext_ktp";
		$path_ktp = 'images/santri/'.$ktp;
	} else {
		$ktp = '';
		$path_ktp = '';
	}


	// $kd = '';
	date_default_timezone_set("Asia/Jakarta");
	$year = substr( date( 'Y' ), 2 ); // get 2 number of date from right
	$mount = date( 'm' );

	$kd =  $year . $mount . random_number(6);


	if ( empty( $full_name ) || empty( $city_brithday ) || empty( $brithday ) || empty( $gender ) || empty( $status_kawin ) || empty( $address ) || empty( $pos ) || empty( $city ) || empty( $father ) || empty( $mother ) || empty( $phone ) || empty( $email ) || empty( $username ) || empty( $pw ) ) {
		echo "<script>alert( 'Pengisian data harus lengkap, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( !preg_match( "/^[a-zA-Z ]*$/",$full_name ) ) {
		echo "<script>alert( 'Nama tidak valid, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( !preg_match( "/^[a-zA-Z ]*$/",$city_brithday ) ) {
		echo "<script>alert( 'Nama kota kelahiran Anda tidak valid, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( !preg_match( "/^[0-9- ]*$/",$brithday ) ) {
		echo "<script>alert( 'Tanggal lahir tidak valid, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( ! is_numeric( $pos ) ) {
		echo "<script>alert( 'Kode pos tidak valid, silahkan ulangi. Contoh: 12345' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( !preg_match( "/^[a-zA-Z ]*$/",$city ) ) {
		echo "<script>alert( 'Nama kota tidak valid, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( filter_var( $email, FILTER_VALIDATE_EMAIL) === false ) {
		echo "<script>alert( '($email) alamat email tidak valid, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( ! is_numeric( $phone ) ) {
		echo "<script>alert( 'No. Telp tidak valid, silahkan ulangi. Contoh: 081234234222' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( !preg_match( "/^[a-zA-Z ]*$/",$city ) ) {
		echo "<script>alert( 'Nama kota tidak valid, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( !preg_match( "/^[a-zA-Z0-9]*$/",$username ) ) {
		echo "<script>alert( 'Username hanya boleh diisi dengan karakter huruf atau angka dan tidak mengandung spasi, silahkan ulangi' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( strlen( $username ) < 6 ) {
		echo "<script>alert( 'Panjang karakter username minimal 6 karakter, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	}
	elseif ( strlen( $pw ) < 8 ) {
		echo "<script>alert( 'Panjang karakter password minimal 8 karakter, silahkan ulangi.' );
			document.location.href='./?page=pendaftaran';</script>";
	} 

	else {

		// PROCESS INSERT TO DB
		$save = $conn->query( "INSERT INTO pendaftaran ( no_pendaftaran, nama_lengkap, tmpt_lahir, tgl_lahir, jekel, status_kawin, alamat, kd_pos, kota, pend_terakhir, nama_ayah, nama_ibu, no_telp, email, foto, ijazah, ktp, username, password, status_pendaftaran ) 
										VALUES( '$kd', '$full_name', '$city_brithday', '$brithday', '$gender', '$status_kawin', '$address', '$pos', '$city', '$study', '$father', '$mother', '$phone', '$email', '$photo', '$ijazah', '$ktp', '$username', '$password', 'proses' )" );

		if ( $save ) {
			move_uploaded_file( $_FILES['photo']['tmp_name'], $path_photo );
			move_uploaded_file( $_FILES['ijazah']['tmp_name'], $path_ijzh );
			move_uploaded_file( $_FILES['ktp']['tmp_name'], $path_ktp );

			echo "<script>alert( 'Terima kasih telah melakukan pendaftaran, silahkan login keruang santri.' );
				document.location.href='sign-up';</script>";

		} else {

			echo "<script>alert( 'Maaf, Ada kesalahan teknis dalam sistem kami. Anda belum bisa melakukan pendaftaran.' );
				document.location.href='sign-up';</script>";
		}

	} // END: VALIDATION

endif;
// END: REGISTER SANTRI