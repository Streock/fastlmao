<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/eral.php';
$settingsCheck = $DB->prepare("select * from settings where id=?");
$settingsCheck->execute(array('1'));
$settings = $settingsCheck->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="<?=$settings['siteDesc']?>">
    <meta name="keywords" content="<?=$settings['siteKeyword']?>">
    <meta name="author" content="eralbilisim.com">
    <title><?=$settings['siteName']?></title>
    <link rel="apple-touch-icon" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="#">
                        <img src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/logo/<?=$settings['siteLogo']?>" alt="">
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1"><?=$settings['siteName']?> 👋</h2>
                                <p class="card-text mb-2">Yönetici bilgileri ile giriş yapınız.</p>
                                <form class="auth-login-form mt-2" action="" method="POST">
                                    <div class="mb-1">
                                        <label class="form-label" for="login-email">Email</label>
                                        <input class="form-control" id="login-email" type="text" name="email" placeholder="john@example.com" ...>
                                    </div>
                                    <div class="mb-1">
                                        <!--<div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Şifre</label><a href="forget-password"><small>Şifreni mi unuttun?</small></a>
                                        </div>-->
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="login-password" value="" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember-me" name="remember-me" type="checkbox" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Beni Hatırla</label>
                                        </div>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary w-100" tabindex="4">Giriş Yap</button>
                                </form>
                               
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/scripts/pages/auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>