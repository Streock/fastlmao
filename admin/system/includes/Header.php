<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/eral.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/LoginCheck.php';
$settingsCheck = $DB->prepare("select * from settings where id=?");
$settingsCheck->execute(array('1'));
$settings = $settingsCheck->fetch(PDO::FETCH_ASSOC);
session_start();
$user_id = $_SESSION['memberId'];
$providerCheckSite= $DB->prepare("select * from provider where id=?");
$providerCheckSite->execute(array($user_id));
$providerChk = $providerCheckSite->fetch(PDO::FETCH_ASSOC);

function id($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '', $text);

    return $text;
}

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
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    
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
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/pages/app-invoice-list.css">
    <!-- END: Page CSS-->

    
    <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/forms/select/select2.min.css">
        <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/forms/select/select2.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/pages/app-calendar.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/plugins/forms/form-validation.css">

    <!-- END: Custom CSS-->
<!-- Add to home screen for Safari on iOS -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="<?=$settings['siteName']?>">
<meta name="msapplication-TileImage" content="../assets/144x144.png">
<meta name="msapplication-TileColor" content="#2F3BA2">
<link rel="manifest" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/manifest.json?v=1.1">
<link rel="apple-touch-icon" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/144x144.png">
<link rel="apple-touch-icon" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/192x192.png">
<link rel="icon" sizes="192x192" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/192x192.png">
<link rel="icon" sizes="128x128" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/128x128.png">
<link rel="apple-touch-icon" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/128x128.png">


</head>
<script>
 if ('serviceWorker' in navigator) {
  window.addEventListener('load', function () {
   navigator.serviceWorker.register('service-worker.js').then(function (registration) {
    console.log('Registered!');
   }, function (err) {
    console.log('ServiceWorker registration failed: ', err);
   }).catch(function (err) {
    console.log(err);
   });
  });
 } else {
  console.log('service worker is not supported');
 }
</script>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                   Online Randevu Sistemi
                </ul>
              
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
               
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
              
               
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?=$providerChk['name']?></span><span class="user-status"><?php if($providerChk['isAdmin']=='1'){ ?>Admin<?php } ?></span></div><span class="avatar"><img class="round" src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/profile/<?php if(empty($providerChk['photo'])){echo 'no-photo.png';}else{echo $providerChk['photo'];} ?>" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/profile-settings"><i class="me-50" data-feather="user"></i> Profil</a>
 
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/logout"><i class="me-50" data-feather="power"></i> Çıkış Yap</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
   
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <img src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/logo/<?=$settings['siteLogo']?>" alt="">
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/home'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/home"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Genel Özet</span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Randevu Yönetimi</span><i data-feather="more-horizontal"></i>
                </li>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/appointments'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/appointments"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="Email">Randevular</span></a>
                </li>
                <?php if($providerChk['isAdmin']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/services'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/services"><i data-feather='list'></i><span class="menu-title text-truncate" data-i18n="Chat">Hizmetler</span></a>
                </li>
                <?php if($settings['caseSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/case'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/case"><i data-feather='credit-card'></i><span class="menu-title text-truncate" data-i18n="Chat">Kasa</span></a>
                </li>
                <?php }?>
                <?php if($settings['orderSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/products'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/products"><i data-feather='list'></i><span class="menu-title text-truncate" data-i18n="Chat">Ürünler</span></a>
                </li>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/orders'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/orders"><i data-feather='list'></i><span class="menu-title text-truncate" data-i18n="Chat">Siparişler</span></a>
                </li>
                <?php }?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/providers'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/providers"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="user">Çalışanlar</span></a>
                </li>
                <?php if($settings['providerMonthSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/providersmonth'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/providersmonth"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="user">Ayın Elemanı</span></a>
                </li>
                <?php }?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/members'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/members"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="user">Müşteriler</span></a>
                </li>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/notification-settings'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/notification-settings"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Kanban">Bildirim Yönetimi</span></a>
                </li>
                <?php } ?>
                <?php if($providerChk['isAdmin']=='0'){ ?>
                <?php if($settings['orderSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/orders'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/orders"><i data-feather='list'></i><span class="menu-title text-truncate" data-i18n="Chat">Siparişler</span></a>
                </li>
                <?php }?>
                <?php } ?>
             
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/send-sms-list'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/send-sms-list"><i data-feather='send'></i><span class="menu-title text-truncate" data-i18n="File Manager">Gönderilen Smsler</span></a>
                </li>
                <?php if($settings['cancelSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/canceled'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/canceled"><i data-feather='calendar'></i><span class="menu-title text-truncate" data-i18n="File Manager">İptal Edilen Randevular</span></a>
                </li>
                <?php }?>
                <?php if($providerChk['isAdmin']=='1' && $settings['eftSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/banks'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/banks"><i data-feather='user'></i><span class="menu-title text-truncate" data-i18n="File Manager">Banka Hesapları</span></a>
                </li>
                <?php }?>
                <?php if($providerChk['isAdmin']=='1' && $settings['vestedSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/vested'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/vested"><i data-feather='user'></i><span class="menu-title text-truncate" data-i18n="File Manager">Hakedişler</span></a>
                </li>
                <?php }?>
              
                <?php if($providerChk['isAdmin']=='1'){ ?>
                <li class=" navigation-header"><span data-i18n="User Interface">Genel Ayarlar</span><i data-feather="more-horizontal"></i>
                </li>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/site-settings'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/site-settings"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Typography">Sistem Ayarları</span></a>
                </li>
                <?php if($settings['langSystem']=='1'){ ?>
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/langs'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/langs"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Typography">Dil Yöneticisi</span></a>
                </li>
                <?php }?>

                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/sms-settings'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/sms-settings"><i data-feather="smartphone"></i><span class="menu-title text-truncate" data-i18n="Feather">Sms Ayarları</span></a>
                </li>
                <?php } ?>
      
                <li class=" navigation-header"><span data-i18n="Misc">Profil</span><i data-feather="more-horizontal"></i>
                </li>
           
                <li class=" nav-item <?php if($_SERVER['REQUEST_URI']=='/admin/profile-settings'){echo 'active';} ?>"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/profile-settings" ><i data-feather='edit'></i><span class="menu-title text-truncate" data-i18n="Documentation">Profil Düzenle</span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/logout"><i data-feather='log-out'></i><span class="menu-title text-truncate" data-i18n="Raise Support">Çıkış Yap</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
