<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>
<?php
$id = $_GET['id'];
$provider = $DB->query("SELECT * from provider where id=$id")->fetch(PDO::FETCH_ASSOC);
$providerServices = $provider['services'];
$providerServices = explode(",", $providerServices);

$providerbreakTime = $provider['breakTime'];
$providerbreakTime = explode(",", $providerbreakTime);

?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Çalışan Düzenleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="calisanEkleForm" class="form form-horizontal">
                                <div class="d-flex">
                                    <a href="#" class="me-25">
                                        <img src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/profile/<?php if(empty($provider['photo'])){echo 'no-photo.png';}else{echo $provider['photo'];} ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                                    </a>
                                    <!-- upload and reset button -->
                                    <div class="d-flex align-items-end mt-75 ms-1">
                                        <div>
                                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Yükle</label>
                                            <input type="file" name="files" id="account-upload" hidden accept="image/*" />
                                            <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Sıfırla</button>
                                            <p class="mb-0">Yüklenebilir uzantılar: png, jpg, jpeg.</p>
                                        </div>
                                    </div>
                                    <!--/ upload and reset button -->
                                </div>
                                <div style="margin-top:20px"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="name">Çalışan Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        placeholder="Çalışan Adı" value="<?=$provider['name']?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="email">Çalışan Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        placeholder="Çalışan Email" value="<?=$provider['email']?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="password">Çalışan Şifre
                                                        (Güncellemek istiyosanız doldurun)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password" placeholder="*******" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="services">Verdiği
                                                        Hizmetler</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select id="hizmetSec" name="services[]" multiple="multiple">
                                                        <?php $services = $DB->query("SELECT * from services order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
                                                foreach ($services as $service) {
                                                    $serviceID = $service['id'];
                                                    ?>
                                                        <option
                                                            <?php  if (in_array($serviceID, $providerServices)){echo 'selected';}?>
                                                            value="<?=$service['id']?>"><?=$service['serviceName']?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="w1">Çalışma Saatleri (Güncellemek
                                                        için iki alanıda yeniden seçin)</label>
                                                </div>
                                                <?php
                                                $working = $provider['workingTime'];
                                                $working = explode('-', $working);
                                                ?>
                                                <div class="col-sm-4">
                                                    <input type="text" id="w1" name="w1"
                                                        class="form-control flatpickr-time text-start"
                                                        placeholder="09:00" value="<?=$working[0]?>" />
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="w2" name="w2"
                                                        class="form-control flatpickr-time text-start"
                                                        placeholder="21:00" value="<?=$working[1]?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="breakTime">Tatil Günleri</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select id="breakTime" name="breakTime[]" multiple="multiple">
                                                        <option
                                                            <?php  if (in_array('1', $providerbreakTime)){echo 'selected';}?>
                                                            value="1">Pazartesi</option>
                                                        <option
                                                            <?php  if (in_array('2', $providerbreakTime)){echo 'selected';}?>
                                                            value="2">Salı</option>
                                                        <option
                                                            <?php  if (in_array('3', $providerbreakTime)){echo 'selected';}?>
                                                            value="3">Çarşamba</option>
                                                        <option
                                                            <?php  if (in_array('4', $providerbreakTime)){echo 'selected';}?>
                                                            value="4">Perşembe</option>
                                                        <option
                                                            <?php  if (in_array('5', $providerbreakTime)){echo 'selected';}?>
                                                            value="5">Cuma</option>
                                                        <option
                                                            <?php  if (in_array('6', $providerbreakTime)){echo 'selected';}?>
                                                            value="6">Cumartesi</option>
                                                        <option
                                                            <?php  if (in_array('7', $providerbreakTime)){echo 'selected';}?>
                                                            value="7">Pazar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="renk">Renk Kodu</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="renk" class="form-control" name="renk"
                                                        placeholder="#00000" value="<?=$provider['renk']?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 ">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="form-label" for="alindiTemplate">Çalışma Durumu
                                                        (Randevu alması için açınız)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-switch form-check-primary">
                                                        <input type="checkbox" class="form-check-input" id="working"
                                                            name="working"
                                                            <?php if($provider['working']=='1'){echo 'checked';}?>>
                                                        <label class="form-check-label" for="working">
                                                            <span class="switch-icon-left"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-check">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg></span>
                                                            <span class="switch-icon-right"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-x">
                                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                </svg></span>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-12 ">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="form-label" for="alindiTemplate">Çalışmadığı Gün Aralıkları (Açarsanız günleri doldurunuz. Açılınca o günler randevuya kapatılır.)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-switch form-check-primary">
                                                        <input type="checkbox" class="form-check-input" id="breakstatus"
                                                            name="breakstatus"
                                                            <?php if($provider['breakstatus']=='1'){echo 'checked';}?>>
                                                        <label class="form-check-label" for="breakstatus">
                                                            <span class="switch-icon-left"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-check">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg></span>
                                                            <span class="switch-icon-right"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-x">
                                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                </svg></span>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="break_start_time">Çalışmadığı Günler</label>
                                                </div>
                                                
                                                <div class="col-sm-4">
                                                    <input type="text" id="break_start_time" name="break_start_time"
                                                        class="form-control flatpickr-date-time text-start"
                                                         value="<?=$provider['break_start_time']?>" />
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="break_end_time" name="break_end_time"
                                                        class="form-control flatpickr-date-time text-start"
                                                         value="<?=$provider['break_end_time']?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 ">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="form-label" for="alindiTemplate">Yönetici</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-switch form-check-primary">
                                                        <input type="checkbox" class="form-check-input" id="isAdmin"
                                                            name="isAdmin"
                                                            <?php if($provider['isAdmin']=='1'){echo 'checked';}?>>
                                                        <label class="form-check-label" for="isAdmin">
                                                            <span class="switch-icon-left"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-check">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg></span>
                                                            <span class="switch-icon-right"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-x">
                                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                </svg></span>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 ">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="form-label" for="smsNoti">Çalışan Randevu Hatırlatma</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-switch form-check-primary">
                                                        <input type="checkbox" class="form-check-input" id="smsNoti"
                                                            name="smsNoti"
                                                            <?php if($provider['smsNoti']=='1'){echo 'checked';}?>>
                                                        <label class="form-check-label" for="smsNoti">
                                                            <span class="switch-icon-left"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-check">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg></span>
                                                            <span class="switch-icon-right"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-x">
                                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                </svg></span>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="smsNumber">Çalışan Telefon Numarası</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="smsNumber" class="form-control" name="smsNumber"
                                                        placeholder="Çalışan Telefon Numarası" value="<?=$provider['smsNumber']?>" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-9 offset-sm-3">

                                            <input type="hidden" name="calisanID" value="<?=$_GET['id']?>">
                                            <input type="hidden" name="calisanDuzenle" value="1">
                                            <button id="calisanDuzenle" type="button"
                                                class="btn btn-primary me-1">Kaydet</button>
                                            <a href="../providers"><button type="button"
                                                    class="btn btn-outline-secondary">Çalışanlara Dön</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/jquery-3.5.1.min.js">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var resetImage = $('.uploadedAvatar').attr('src');
$("#account-upload").on('change', function (e) {
      var reader = new FileReader(),
        files = e.target.files;
      reader.onload = function () {
        if ($("#account-upload-img")) {
            $("#account-upload-img").attr('src', reader.result);
        }
      };
      reader.readAsDataURL(files[0]);
    });
    $('#account-reset').on('click', function () {
        $('.uploadedAvatar').attr('src', resetImage);
    });    
</script>
<script>
$("#calisanDuzenle").click(function() {
    Swal.fire({
        title: "Hata",
        text: "DEMODA İŞLEM YAPILAMAZ",
        icon: 'error',
        confirmButtonColor: '#7367f0',
        confirmButtonText: "Tamam"

        });

});
</script>

<script>
$(document).ready(function() {
    var hizmetSec = $('#hizmetSec');
    hizmetSec.wrap('<div class="position-relative"></div>').select2({
        placeholder: 'Hizmet Seçin',
        dropdownParent: hizmetSec.parent(),
        closeOnSelect: true,
        escapeMarkup: function(es) {
            return es;
        }
    });
});
</script>
<script>
$(document).ready(function() {
    var breakTime = $('#breakTime');
    breakTime.wrap('<div class="position-relative"></div>').select2({
        placeholder: 'Tatil Günü Seçin',
        dropdownParent: breakTime.parent(),
        closeOnSelect: true,
        escapeMarkup: function(es) {
            return es;
        }
    });
});
</script>

<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Footer.php';
?>