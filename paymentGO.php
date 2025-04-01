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

$paymentKey = $_POST['paymentKey'];
$paymentID = $_POST['paymentID'];
$randevuKontrol = $DB->prepare("SELECT * FROM appointments WHERE paymentKey=?");
$randevuKontrol->execute(array($paymentKey));
$check = $randevuKontrol->fetch(PDO::FETCH_ASSOC);
$member = $check['member'];
$service = $check['service'];


$musteriKontrol = $DB->prepare("SELECT * FROM members WHERE id=?");
$musteriKontrol->execute(array($member));
$musteri = $musteriKontrol->fetch(PDO::FETCH_ASSOC);

$serviceKontrol = $DB->prepare("SELECT * FROM services WHERE id=?");
$serviceKontrol->execute(array($service));
$hizmet = $serviceKontrol->fetch(PDO::FETCH_ASSOC);


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
                    <form class="multisteps_form" id="wizard" method="POST">
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

                            <div style="width: 100%;margin: 0 auto;display: table;">

                            <?php

                            $merchant_id    = $settings['paytrId'];
                            $merchant_key   = $settings['paytrKey'];
                            $merchant_salt  = $settings['paytrSalt'];
                            $email = $_POST['email'];
                            $payment_amount = $hizmet['price']*100;
                            $merchant_oid = $paymentID;
                            $user_name = $musteri['name'];
                            $user_address = "ISTANBUL/TURKEY";
                            $user_phone = $musteri['phone'];
                            $merchant_ok_url = "https://" . $_SERVER['SERVER_NAME'] . "/payment-success?id=".$paymentKey;
                            $merchant_fail_url = "https://" . $_SERVER['SERVER_NAME'] . "/payment-unsuccess?id=".$paymentKey;
                            $user_basket = $hizmet['serviceName'];
                            if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
                            $ip = $_SERVER["HTTP_CLIENT_IP"];
                            } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
                            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                            } else {
                            $ip = $_SERVER["REMOTE_ADDR"];
                            }
                            $user_ip=$ip;
                            $timeout_limit = "30";
                            $debug_on = 0;
                            $test_mode = 1;
                            $no_installment = 0;
                            $max_installment = 0;
                            $currency = "TL";
                            $hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
                            $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
                            $post_vals=array(
                            'merchant_id'=>$merchant_id,
                            'user_ip'=>$user_ip,
                            'merchant_oid'=>$merchant_oid,
                            'email'=>$email,
                            'payment_amount'=>$payment_amount,
                            'paytr_token'=>$paytr_token,
                            'user_basket'=>$user_basket,
                            'debug_on'=>$debug_on,
                            'no_installment'=>$no_installment,
                            'max_installment'=>$max_installment,
                            'user_name'=>$user_name,
                            'user_address'=>$user_address,
                            'user_phone'=>$user_phone,
                            'merchant_ok_url'=>$merchant_ok_url,
                            'merchant_fail_url'=>$merchant_fail_url,
                            'timeout_limit'=>$timeout_limit,
                            'currency'=>$currency,
                            'test_mode'=>$test_mode
                            );

                            $ch=curl_init();
                            curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_POST, 1) ;
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
                            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                            curl_setopt($ch, CURLOPT_TIMEOUT, 20);

                            $result = @curl_exec($ch);

                            if(curl_errno($ch))
                            die("PAYTR IFRAME connection error. err:".curl_error($ch));

                            curl_close($ch);

                            $result=json_decode($result,1);

                            if($result['status']=='success')
                            $token=$result['token'];
                            else
                            die("PAYTR IFRAME failed. reason:".$result['reason']);

                            ?>

                            <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                            <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
                            <script>iFrameResize({},'#paytriframe');</script>
              

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
