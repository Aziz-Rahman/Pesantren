<?php
session_start();
if ( empty( $_SESSION['sess_id_admin'] ) || empty( $_SESSION['sess_user_admin'] ) ) : 
    header( 'location:login-administrator.php' );
else :
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Gw</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="../css/justifiedGallery.min.css"> -->
        <link rel="stylesheet" href="../css/bootstrap-fileupload.min.css">
        <!-- <link rel="stylesheet" href="../css/colorbox.css"/> -->
        <link rel="stylesheet" href="../css/dataTables.bootstrap.css"/>
        <link rel="stylesheet" href="../css/admin.css"/>
        <style>
            #my-file,
            #photo-admin {
                display: none;
            }
        </style>
          <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            
            <!-- START: Main-menu -->
            <?php include 'navbar-top.php'; ?>
            <?php include 'navbar-left.php'; ?>
            <!-- /. menu -->

            <div id="page-wrapper" class="page-wrapper-cls">
                <div id="page-inner">
                   
                    <!-- Content-admin -->
                    <?php include 'module-admin.php'; ?>

                </div><!-- /. PAGE INNER  -->
            </div><!-- /. PAGE WRAPPER  -->
        </div><!-- /. WRAPPER  -->
        <footer>
                <?php $date = date('Y'); ?>
                Copyright &copy; <?php echo $date; ?> Pesantren Nur Al- Tauhid. Developer By <a href="http://aziz-rahman.com/">Aziz Rahman Aji</a> 
        </footer>
        <!-- /. FOOTER  -->

        <!-- js -->
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../tinymce/tinymce.min.js"></script>
        <!-- <script src="../js/jquery.justifiedGallery.min.js"></script> -->
        <!-- <script src="../js/admin/jquery.colorbox-min.js"></script> -->
        <script src="../js/dataTables/jquery.dataTables.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.js"></script>
        <script src="../js/admin/jquery.metisMenu.js"></script>
        <script src="../js/bootstrap-fileupload.js"></script>
        <script src="../js/admin/admin.js"></script>
        
        <script>
            $(document).ready(function() {
                // Delete img article ============================
                $('a.delete-img-art').click(function(e) {
                    e.preventDefault();
                    var parent = $(this).parent();
                    $.ajax({
                        type: 'get',
                        url: 'delete-img-article.php',
                        data: 'ajax=1&id_img_art=' + parent.attr('id').replace('my-record-',''),
                        // beforeSend: function() {
                        //     parent.animate({'backgroundColor':'#fb6c6c'},300);
                        // },
                        success: function() {
                            parent.slideUp(300,function() {
                                parent.remove();
                            });
                            $('#my-file').fadeIn(); 
                        }
                    });
                });

                // Delete img admin ==============================
                $('a.delete-img-adm').click(function(e) {
                    e.preventDefault();
                    var parent = $(this).parent();
                    $.ajax({
                        type: 'get',
                        url: 'delete-img-admin.php',
                        data: 'ajax=1&id_img_adm=' + parent.attr('id').replace('my-record-adm-',''),
                        // beforeSend: function() {
                        //     parent.animate({'backgroundColor':'#fb6c6c'},300);
                        // },
                        success: function() {
                            parent.slideUp(300,function() {
                                parent.remove();
                            });
                            $('#photo-admin').fadeIn(); 
                        }
                    });
                });
            });
        </script>

    </body>
    </html>
<?php endif; // END: CHECK SESSION