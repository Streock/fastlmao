<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
$smssettings= $DB->query("SELECT * from sms_settings where id=1")->fetch(PDO::FETCH_ASSOC);
?>
<?php
$smsSettings = $DB->prepare("select * from sms_settings where id=?");
$smsSettings->execute(array('1'));
$sms = $smsSettings->fetch(PDO::FETCH_ASSOC);
$username = $sms['username'];
$password = $sms['password'];
$title = $sms['title'];
$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
<smskredi ka="'.$username.'" pwd="'.$password.'" />';

$URL = "https://smsgw.mutlucell.com/smsgw-ws/gtcrdtex";
$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_MUTE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
?>
 <!-- BEGIN: Content-->
 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
         
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        
                        <!-- profile -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Sms Ayarları</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                <!-- form -->
                                <form id="smssettingsForm" class="validate-form mt-2 pt-50">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="username">Kullanıcı Adı</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı Adı" value="<?=$smssettings['username']?>"  />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="password">Şifre</label>
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Şifre" value="<?=$smssettings['password']?>"  />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="title">Başlık</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Başlık" value="<?=$smssettings['title']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="title">Kalan Sms</label>
                                            <input type="text" class="form-control" disabled value="<?=str_replace('$','',$output)?>" />
                                        </div>

                                      
                                    
                                        <div class="col-12">
                                            <input type="hidden" name="smsayarKaydet" value="1">
                                            <button id="smsayarKaydet" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/jquery-3.5.1.min.js">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$("#smsayarKaydet").click(function() {
    Swal.fire({
        title: "Hata",
        text: "DEMODA İŞLEM YAPILAMAZ",
        icon: 'error',
        confirmButtonColor: '#7367f0',
        confirmButtonText: "Tamam"

        });
});
</script>

<?php
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Footer.php';
?>