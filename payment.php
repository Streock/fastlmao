<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/eral.php';
$settingsCheck = $DB->prepare("select * from settings where id=?");
$settingsCheck->execute(array('1'));
$settings = $settingsCheck->fetch(PDO::FETCH_ASSOC);
function id($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '', $text);

    return $text;
}

$paymentKey = $_GET['id'];
$randevuKontrol = $DB->prepare("SELECT * FROM appointments WHERE paymentKey=? and paymentStatus=?");
$randevuKontrol->execute(array($paymentKey,'0'));
//KONTROL
if($randevuKontrol->rowCount()=='0'){
echo '<meta http-equiv="refresh" content="0; url=../../">';
exit();
}else{
$paymentID = $paymentKey.randomCreate(8);
$guncelle = $DB->prepare("UPDATE appointments SET paymentID=? where paymentKey=?");
$guncelle -> execute(array($paymentID,$paymentKey));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$translations['appsuccess']?> - <?=$settings['siteName']?><</title>
    <meta name="description" content="<?=$settings['siteDesc']?>">
    <meta name="keywords" content="<?=$settings['siteKeyword']?>">
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&family=Lato&display=swap"
        rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/css/bootstrap.min.css">
    <!-- Animate-css include -->
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/css/animate.min.css">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/css/style.css">

    <link rel="stylesheet" href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/css/intlTelInput.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/vendors/css/forms/select/select2.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/css/pages/app-calendar.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/css/plugins/forms/form-validation.css">

</head>
<script src="https://unpkg.com/feather-icons"></script>
<style>
.iti__flag {
    background-image: url("<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/images/flags/flags.png");
}

@media (-webkit-min-device-pixel-ratio: 2),
(min-resolution: 192dpi) {
    .iti__flag {
        background-image: url("<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/images/flags/flags@2x.png");
    }
}

.select2-container .select2-selection--single {
    height: 50px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 45px;
}

.custom-options-checkable .custom-option-item {
    width: 100%;
    cursor: pointer;
    border-radius: 0.42rem;
    color: #82868b;
    background-color: rgba(130, 134, 139, 0.06);
    border: 1px solid #ebe9f1;
}

.custom-options-checkable .custom-option-item .custom-option-item-title {
    color: #82868b;
}

.custom-option-item-check {
    position: absolute;
    clip: rect(0, 0, 0, 0);
}

.custom-option-item-check:checked+.custom-option-item {
    color: #ff950e;
    background-color: linear-gradient(to right, #ffaf15, #fe6300);
    border-color: #ff950e;
}

.custom-option-item-check:checked+.custom-option-item .custom-option-item-title {
    color: #ff950e;
}

.custom-option-item-check-provider {
    position: absolute;
    clip: rect(0, 0, 0, 0);
}

.custom-option-item-check-provider:checked+.custom-option-item {
    color: #ff950e;
    background-color: linear-gradient(to right, #ffaf15, #fe6300);
    border-color: #ff950e;
}

.custom-option-item-check-provider:checked+.custom-option-item .custom-option-item-title {
    color: #ff950e;
}

.flatpickr-calendar .flatpickr-day.selected,
.flatpickr-calendar .flatpickr-day.selected:hover {
    background: #ff950e;
    color: #fff;
    border-color: #ff950e;
}

.flatpickr-calendar .flatpickr-day.today {
    border-color: #ff950e;
}

</style>

<body>
    <div class="wrapper position-relative overflow-hidden">
        <div class="container-md-fluid p-3 p-lg-0 me-5">
            <div class="row">
                <div class="col-xl-4">
                    <div class="form_logo position-absolute">
                        <a href="#">
                            <img src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/logo/<?=$settings['siteLogo']?>" alt="image-not-found">
                        </a>
                    </div>
                    <div class="steps_area step_area_fixed d-none d-xl-block">
                        <div class="image_holder">
                            <img class="overflow-hidden" src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/images/background/bg_0.png" alt="image-not-found">
                        </div>
                        <div class="step_items position-absolute">
                            <div class="step d-block text-center bg-white position-relative current active">1</div>
                            <div class="step d-block text-center bg-white position-relative">2
                            </div>
                            <div class="step d-block text-center bg-white position-relative">3
                            </div>
                            <div class="step d-block text-center bg-white position-relative last">4
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-7 ps-5 pt-5">
                    <form class="multisteps_form" action="../../paymentGO" method="POST">
                        <!-- ------------------ Step-1 ------------------- -->
                        <div class="multisteps_form_panel" style="display: block;">
                            <div class="step_content d-flex justify-content-between pt-5 pb-2">
                                <h4><?=$translations['sitetitle']?></h4>
                                <span class="text-end text-uppercase"><?=$translations['paymentwaiting']?></span>
                            </div>
                            <div class="step_progress_bar">
                                <div class="progress rounded-pill">
                                    <div class="progress-bar" style="width:100%"></div>
                                </div>
                            </div>
                            <style>
                            .musteri {
                                padding: 10px;
                            }

                            .musteriB {
                                border-radius: 0.525rem;
                            }
                            </style>
                            <div class="form_content">

                                <div class="question_title py-5">
                                    <center><img width="250px" src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/images/completed.webp"></img></center>
                                    <h1 class="text-capitalize"><?=$translations['success']?><br> <p style="color:red"><?=$translations['paymentnotcomp']?></p></h1>

                                </div>

                            </div>

                            <p class="text-capitalize"><?=$translations['paymentnotcomplete']?><br> <p style="color:green"><b><?=$translations['paymentcomplete']?></b></p><p>


                            <div class="form_btn pt-5 d-flex justify-content-between">

                   
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 form_items">
                            <div class="col">
                                <div class="input-group input-group-merge musteri">
                                    <span class="input-group-text musteriB"><i data-feather="user"></i></span>
                                    <input type="text" id="email" class="form-control"
                                        name="email" placeholder="Email"  required/>
                                </div>
                            </div>
                            <input type="hidden" name="paymentKey" value="<?=$paymentKey?>">
                            <input type="hidden" name="paymentID" value="<?=$paymentID?>">
                            <div class="col">
                                <button type="submit" class="next_btn text-uppercase text-white"
                                    ><?=$translations['payment']?> <span><i class="fas fa-arrow-right"></i></span>
                                </button>
                            </div> 
                        </div>
                  
                            </div>
                        </div>
                 
             
                    </form>
                </div>
            </div>
        </div>
    </div>
  
    <!-- jQuery-js include -->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap-js include -->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/js/bootstrap.min.js"></script>
    <!-- jQuery-validate-js include -->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/js/jquery.validate.min.js"></script>
    <!-- Custom-js include -->
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/js/script.js"></script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/js/intlTelInput.js"></script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/vendors/js/forms/select/select2.full.min.js">
    </script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/js/scripts/forms/form-wizard.js">
    </script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js">
    </script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/vendors/js/pickers/pickadate/picker.time.js">
    </script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/js/scripts/forms/pickers/form-pickers.js">
    </script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/js/scripts/pages/app-calendar-events.js">
    </script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/app-assets/js/scripts/pages/app-calendar.js">
    </script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/assets/js/confetti.js"></script>
    <script>
    var input = document.querySelector("#musteriTelefon");
    window.intlTelInput(input, {
        initialCountry: 'tr',
        separateDialCode: true,
    });
    </script>
    <script>
    feather.replace()
    </script>
</body>

</html>
<?php }?>