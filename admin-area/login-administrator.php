<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Aziz Rahman Aji">
    <meta name="keyword" content="">
<!--     <link rel="shortcut icon" href="img/favicon.png"> -->

    <title>Login Administrator</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/admin.css"/>

</head>

<body>

    <div class="container login-area">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="col-md-12 title-form">
                    <h4><i class="fa fa-user"></i> Login Administrator</h4>
                </div>
                <div class="col-md-12 form-login">
                    <form class="login-form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <fieldset>
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-lg btn-block" name="submit-login" type="submit">Login</button>
                                <label class="input-group checkbox pull-right">
                                    <span> <a href="forgot-password.php"> Forgot Password?</a></span>
                                </label>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
</html>

<?php
if ( isset( $_POST['submit-login'] ) ) :

    include '../includes/conn.php'; 
    require_once "../includes/functions.php";
    // require_once "includes/passwordLib.php";

    $username = anti_injection( $_POST['username'] );
    $pure_password = anti_injection( $_POST['password'] );

    // hash_pswd
    // $algo = PASSWORD_DEFAULT;
    $salt = 'ad3in7deje834dgfn3g3h3u373jdnd37dnd3d3n3dz';
    $cost = 10;

    $options = array();
    if ( !empty($cost) ) $options['cost'] = (int)$cost;
    if ( !empty($salt) ) $options['salt'] = $salt;

    // $hash   = password_hash($pass, $algo, $options);
    $password = password_hash( $pure_password, PASSWORD_DEFAULT, $options );
    $sql = $conn->query( "SELECT id_admin, username, password FROM admin WHERE username = '$username' AND password = '$password'" );
    $check = $sql->num_rows;
    $data = $sql->fetch_assoc();
    $verify_pass = password_verify( $pure_password, $password ); // ($pass, $hash)

    if ( $check > 0 AND $verify_pass ) {
        session_start();
        $_SESSION['sess_id_admin'] = $data['id_admin'];
        $_SESSION['sess_user_admin'] = $data['username'];

        header( 'location:./' ); // Direct to dashboard

    } else {
        echo "<script>alert('Username atau password salah, silahkan ulangi.'); top.location='login-administrator.php';</script>";
    }

    $conn->close();

endif;