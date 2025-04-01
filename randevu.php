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
$cancelLimit = $settings['cancelLimit'];
$rid= $_GET['id'];
$redirectCheck= $DB->prepare("SELECT * from redirect where url=? ORDER BY id DESC");
$redirectCheck->execute(array($rid));
$redirect = $redirectCheck->fetch(PDO::FETCH_ASSOC);
$appointmentID = $redirect['appointment'];




$appointmentCheck= $DB->prepare("SELECT * from appointments where id=?");
$appointmentCheck->execute(array($appointmentID));
$appointment = $appointmentCheck->fetch(PDO::FETCH_ASSOC);
$service = $appointment['service'];
$providerID = $appointment['providerID'];
$appDate = $appointment['appDate'];
$startTime = $appointment['startTime'];
$endTime = $appointment['endTime'];
$member = $appointment['member'];




$serviceCheck= $DB->prepare("SELECT * from services where id=?");
$serviceCheck->execute(array($service));
$service = $serviceCheck->fetch(PDO::FETCH_ASSOC);
$serviceName = $service['serviceName'];


$providerCheck= $DB->prepare("SELECT * from provider where id=?");
$providerCheck->execute(array($providerID));
$provider = $providerCheck->fetch(PDO::FETCH_ASSOC);
$providerName = $provider['name'];

$appMemberCheck= $DB->prepare("SELECT * from members where id=?");
$appMemberCheck->execute(array($member));
$appMember = $appMemberCheck->fetch(PDO::FETCH_ASSOC);
$appMemberName = $appMember['name'];
$appMemberPhone = $appMember['phone'];
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$translations['appsuccess']?> - <?=$settings['siteName']?></title>
    <meta name="description" content="<?=$settings['siteDesc']?>">
    <meta name="keywords" content="<?=$settings['siteKeyword']?>">
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&family=Lato&display=swap"
        rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Animate-css include -->
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="../assets/css/intlTelInput.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/forms/select/select2.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/pages/app-calendar.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/css/plugins/forms/form-validation.css">

</head>
<script src="https://unpkg.com/feather-icons"></script>
<style>
.iti__flag {
    background-image: url("../assets/images/flags/flags.png");
}

@media (-webkit-min-device-pixel-ratio: 2),
(min-resolution: 192dpi) {
    .iti__flag {
        background-image: url("../assets/images/flags/flags@2x.png");
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

.invalid {
    border-color: red;
}

.titleColor {
    background: -webkit-linear-gradient(top right, #ffaf15, #fe6300);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
label:after{
display: none;
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
                            <img class="overflow-hidden" src="../assets/images/background/bg_0.png"
                                alt="image-not-found">
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
                <?php if($redirectCheck->rowCount()=='0'){?>
                    <form class="multisteps_form" id="wizard" method="POST" action="success.php">
                        <!-- ------------------ Step-1 ------------------- -->
                        <div class="multisteps_form_panel" style="display: block;">
                            <div class="step_content d-flex justify-content-between pt-5 pb-2">
                                <h4><?=$translations['sitetitle']?></h4>
                                <span class="text-end text-uppercase"><?=$translations['update']?></span>
                            </div>
                            <div class="step_progress_bar">
                                <div class="progress rounded-pill">
                                    <div class="progress-bar" style="width: 100%"></div>
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
                                    <h1 class="text-capitalize"><?=$translations['appupdate']?></h1>
                                </div>
                                <h3 class="titleColor"><?=$translations['appupdatenotfound']?></h3><br>
                                <div class="form_btn pt-5 d-flex justify-content-between">

                            <a href="../index.php"><button type="button" class="next_btn text-uppercase text-white"
                                ><?=$translations['newappointment']?> <span><i
                                        class="fas fa-arrow-right"></i></span></button></a>
                            </div>
                            </div>
                        </div>
                    </form>
                   <?php }else{?>
                    <?php 
                    $baslangic     = strtotime(date('Y/m/d H').':00:00');
                    $bitis     = strtotime(''.$appDate.''.$startTime.'');
                    $fark        = abs($bitis-$baslangic);
                    $kalansaat = $fark/60/60;

                    $baslangicgun=date('Y-m-d');
                    $bitisgun= date("Y-m-d",strtotime($appDate));
                    ?>

                     <?php if(strtotime($baslangicgun)>strtotime($bitisgun)){ ?>
                    <form class="multisteps_form" id="wizard" method="POST" action="success.php">
                    <!-- ------------------ Step-1 ------------------- -->
                    <div class="multisteps_form_panel" style="display: block;">
                        <div class="step_content d-flex justify-content-between pt-5 pb-2">
                           <h4><?=$translations['sitetitle']?></h4>
                           <span class="text-end text-uppercase"><?=$translations['update']?></span>
                        </div>
                        <div class="step_progress_bar">
                            <div class="progress rounded-pill">
                                <div class="progress-bar" style="width: 100%"></div>
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
                                <h1 class="text-capitalize"><?=$translations['appupdate']?></h1>
                            </div>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 form_items">

                                <div class="col">
                                    <h3 class="titleColor"><?=$translations['perfonelinfo']?></h3><br>
                                    <h5 id="OzetAdSoyad"><?=$appMemberName?></h5>
                                    <h5 id="OzetTelefon"><?=$appMemberPhone?></h5>
                                </div>

                                <div class="col">
                                    <h3 class="titleColor"><?=$translations['serviceinfo']?></h3><br>
                                    <h5 id="OzetHizmetAd"><?=$serviceName?></h5>
                                    <h5 id="OzetCalisanAd"><?=$providerName?></h5>
                                </div>

                                <div class="col">
                                    <h3 class="titleColor"><?=$translations['appointmentinfo']?></h3><br>
                                    <h5 id="OzetTarih"><?=date("d.m.Y",strtotime($appDate))?></h5>
                                    <h5 id="OzetSaat"><?=date("H:i",strtotime($startTime))?></h5>
                                </div>

                            </div>
                            <h3 style="margin-top:30px" class="titleColor"><?=$translations['appupdatedate']?><br> <?=$translations['appupdatethanks']?></h3><br>
                        </div>
                    </div>
                </form>   
                    <?php }else{ ?>
                    <?php if($kalansaat>=$cancelLimit){ ?>
                    <form class="multisteps_form" id="wizard" method="POST" action="success.php">
                        <!-- ------------------ Step-1 ------------------- -->
                        <div class="multisteps_form_panel" style="display: block;">
                            <div class="step_content d-flex justify-content-between pt-5 pb-2">
                               
                                <h4><?=$translations['sitetitle']?></h4>
                                <span class="text-end text-uppercase"><?=$translations['update']?></span>
                            </div>
                            <div class="step_progress_bar">
                                <div class="progress rounded-pill">
                                    <div class="progress-bar" style="width: 100%"></div>
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
                                    <h1 class="text-capitalize"><?=$translations['appupdate']?></h1>
                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 form_items">

                                    <div class="col">
                                        <h3 class="titleColor"><?=$translations['perfonelinfo']?></h3><br>
                                        <h5 id="OzetAdSoyad"><?=$appMemberName?></h5>
                                        <h5 id="OzetTelefon"><?=$appMemberPhone?></h5>
                                    </div>

                                    <div class="col">
                                        <h3 class="titleColor"><?=$translations['serviceinfo']?></h3><br>
                                        <h5 id="OzetHizmetAd"><?=$serviceName?></h5>
                                        <h5 id="OzetCalisanAd"><?=$providerName?></h5>
                                    </div>


                                    <div class="col">
                                        <h3 class="titleColor"><?=$translations['appointmentinfo']?></h3><br>
                                        <h5 id="OzetTarih"><?=date("d.m.Y",strtotime($appDate))?></h5>
                                        <h5 id="OzetSaat"><?=date("H:i",strtotime($startTime))?></h5>
                                    </div>

                                </div>
                                <div style="margin-top:20px" class="row row-cols-1 row-cols-sm-2 row-cols-md-4 form_items">
                                <h4 class="titleColor"><?=$translations['newappdate']?></h4><br>
                                    <div class="col-12">
                                        <div class="mb-1 position-relative">
                                            <input type="text" class="form-control" id="start-date" name="start-date"
                                                placeholder="<?=$translations['newappdate']?>" />
                                        </div>
                                    </div>
                                    <div style="margin-top:15px"></div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <div class="row custom-options-checkable g-1" id="timeSelect">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="randevuGuncelle" value="1">
                            <input type="hidden" name="randevuR" value="<?=$_GET['id']?>">
                            <input type="hidden" name="rDuzenle" value="1">
                            

                            <div class="form_btn pt-5 d-flex">
                                <button id="randevuGuncelle" type="button" class="next_btn text-uppercase text-white"><i
                                        style="margin-right:5px;color: green;" class="fas fa-sync-alt"></i><?=$translations['updatebutton']?>
                                    <span></span></button>
                                <button onclick="return iptal('<?php echo $rid; ?>')" type="button" class="next_btn text-uppercase text-white"><i
                                        style="margin-right:5px;color: red;" class="far fa-window-close"></i><?=$translations['appcancel']?>
                                    <span></span></button>
                            </div>
                        </div>

                    </form>
                    <?php }else{?>
                        <form class="multisteps_form" id="wizard" method="POST" action="success.php">
                        <!-- ------------------ Step-1 ------------------- -->
                        <div class="multisteps_form_panel" style="display: block;">
                            <div class="step_content d-flex justify-content-between pt-5 pb-2">
                                <h4><?=$translations['sitetitle']?></h4>
                                <span class="text-end text-uppercase"><?=$translations['update']?></span>
                            </div>
                            <div class="step_progress_bar">
                                <div class="progress rounded-pill">
                                    <div class="progress-bar" style="width: 100%"></div>
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
                                    <h1 class="text-capitalize"><?=$translations['appupdate']?></h1>
                                </div>
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 form_items">

                                    <div class="col">
                                        <h3 class="titleColor"><?=$translations['perfonelinfo']?></h3><br>
                                        <h5 id="OzetAdSoyad"><?=$appMemberName?></h5>
                                        <h5 id="OzetTelefon"><?=$appMemberPhone?></h5>
                                    </div>

                                    <div class="col">
                                        <h3 class="titleColor"><?=$translations['serviceinfo']?></h3><br>
                                        <h5 id="OzetHizmetAd"><?=$serviceName?></h5>
                                        <h5 id="OzetCalisanAd"><?=$providerName?></h5>
                                    </div>

                                    <div class="col">
                                        <h3 class="titleColor"><?=$translations['appointmentinfo']?></h3><br>
                                        <h5 id="OzetTarih"><?=date("d.m.Y",strtotime($appDate))?></h5>
                                        <h5 id="OzetSaat"><?=date("H:i",strtotime($startTime))?></h5>
                                    </div>

                                </div>
                                <h3 style="margin-top:30px" class="titleColor"><?=$translations['appdatelast']?> <?=$kalansaat?> <?=$translations['appdatelast2']?><br> <?=$translations['appdatelast3']?> <?=$cancelLimit?> <?=$translations['appdatelast4']?></h3><br>
                            </div>
                        </div>
                    </form>
                    <?php }?>
                    <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery-js include -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap-js include -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- jQuery-validate-js include -->
    <script src="../assets/js/jquery.validate.min.js"></script>
    <!-- Custom-js include -->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/intlTelInput.js"></script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/js/forms/select/select2.full.min.js">
    </script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/scripts/forms/form-wizard.js">
    </script>
    
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js">
    </script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js">
    </script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/scripts/forms/pickers/form-pickers.js">
    </script>
    <script
        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/scripts/pages/app-calendar-events.js">
    </script>
    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/scripts/pages/app-calendar.js">
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $("#randevuGuncelle").click(function() {
        if ($('#start-date').val() == '') {
            Swal.fire({
                title: "<?=$translations['error']?>",
                text: "<?=$translations['pleasenewappdate']?>",
                icon: 'error',
                confirmButtonColor: '#7367f0',
                confirmButtonText: "<?=$translations['okey']?>"

            });
        } else if ($(".custom-option-item-check:checked").val() == undefined) {
            Swal.fire({
                title: "<?=$translations['error']?>",
                text: "<?=$translations['pleasenewapptime']?>",
                icon: 'error',
                confirmButtonColor: '#7367f0',
                confirmButtonText: "<?=$translations['okey']?>"

            });
        } else {
            var form = $('#wizard')[0];
            var data = new FormData(form);
            $.ajax({
                type: 'post',
                url: 'eral',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    var data = data.substring(0,6);
                    if (data == 'varvar') {
                        Swal.fire({
                            title: "<?=$translations['sorry']?>",
                            text: "<?=$translations['otherselect']?>",
                            icon: 'error',
                            confirmButtonColor: '#7367f0',
                            confirmButtonText: "<?=$translations['okey']?>"

                        }).then((result) => {
                            if (result.isConfirmed) {
                                //document.getElementById("randevuOlustur").reset();
                                location.reload();
                            }
                            if (result.isDismissed) {
                                //document.getElementById("randevuOlustur").reset();
                                location.reload();

                            }
                        })
                    } else {
                        location.href = "../rsuccess";
                    }

                }
            });

        }

    });
    </script>

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
  
  <script type="text/javascript">
    $(document).ready(function() {
    var date = $('#start-date').val();
    var providerID = '<?=$providerID?>';
    $.ajax({
    type: "POST",
    url: "../admin/system/ajax/AvailableTimeAjax.php",
    data: {
    "date": date,
    "providerID": providerID
    },
    success: function(e) {
    $("#timeSelect").html(e);
    }
    });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#start-date").change(function() {
            var date = $(this).val();
            var providerID = '<?=$providerID?>';
            $.ajax({
                type: "POST",
                url: "../admin/system/ajax/AvailableTimeAjax.php",
                data: {
                    "date": date,
                    "providerID": providerID

                },
                success: function(e) {
                    $("#timeSelect").html(e);
                }
            });
        })
    });
    </script>
    <script>



    iptal = function(val) {
        Swal.fire({
        icon: 'question',
        title: '<?=$translations['cancelquest']?>',
        text: "<?=$translations['cancelquesttext']?>",
        showDenyButton: true,
        confirmButtonText: '<?=$translations['yes']?>',
        confirmButtonColor: 'green',
        denyButtonText: `<?=$translations['no']?>`,
        }).then((result) => {
        if (result.isConfirmed) {
            var pID = val;
            $.ajax({
                url: 'eral',
                type: "POST",
                data: {randevuR: pID, rIptal: "1"},
                success: function(data) {
                    location.href = "../risuccess";
                }
            });
            return false;
        } else if (result.isDenied) {
            Swal.fire({
            icon: 'info',
            title: "<?=$translations['cancelnot']?>",
            confirmButtonText: '<?=$translations['okey']?>',
            confirmButtonColor: 'green',
            })
        }
        })
        return false;
    }

</script>


</body>

</html>