<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>
<?php 
$alindi = $DB->query("SELECT * from notification_settings where id=1")->fetch(PDO::FETCH_ASSOC);
$hatirlatma = $DB->query("SELECT * from notification_settings where id=2")->fetch(PDO::FETCH_ASSOC);
$tekrarlama = $DB->query("SELECT * from notification_settings where id=3")->fetch(PDO::FETCH_ASSOC);
$guncelleme = $DB->query("SELECT * from notification_settings where id=4")->fetch(PDO::FETCH_ASSOC);
$dogumgunu = $DB->query("SELECT * from notification_settings where id=5")->fetch(PDO::FETCH_ASSOC);
$memnuniyet = $DB->query("SELECT * from notification_settings where id=6")->fetch(PDO::FETCH_ASSOC);
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
                                <h4 class="card-title">Randevu Alındı</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                               
                                <!-- form -->
                                <form id="alindiForm" class="validate-form mt-2 pt-50">
                                    <div class="row">
                                    <div class="alert alert-warning">
                                    <h4 class="alert-heading">Site Adı : <b>{siteAdi}</b> <br> Üye Adı: <b>{uyeAdi}</b> <br> Tarih: <b>{tarih}</b> <br>Saat: <b>{saat}</b> <br>Hizmet Adı: <b>{hizmet}</b> </h4>
                                </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="alindiTemplate">Şablon</label>
                                                <textarea class="form-control" id="alindiTemplate" name="alindiTemplate" rows="4" placeholder="Bildirim Şablonu Yazın"><?=$alindi['template']?></textarea>
                                        </div>
                                        <div class="col-12 ">
                                        <label class="form-label" for="alindiTemplate">Bildirim Durumu</label>

                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="statusAlindi" name="status" <?php if($alindi['status']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="statusAlindi">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div> 
                                        <input type="hidden" name="alindiEdit" value="1">   
                                        <div class="col-12">
                                            <button id="alindi" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
                                        </div>
                                        <div>
                                    </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Randevu Hatırlatma</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                               
                                <!-- form -->
                                <form id="hatirlatmaForm" class="validate-form mt-2 pt-50">
                                    <div class="row">
                                    <div class="alert alert-warning">
                                    <h4 class="alert-heading">Site Adı : <b>{siteAdi}</b> <br> Üye Adı: <b>{uyeAdi}</b> <br> Tarih: <b>{tarih}</b> <br>Saat: <b>{saat}</b> <br>Hizmet Adı: <b>{hizmet}</b> </h4>
                                </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="hatirlatmaTemplate">Şablon</label>
                                                <textarea class="form-control" id="hatirlatmaTemplate" name="hatirlatmaTemplate" rows="4" placeholder="Bildirim Şablonu Yazın"><?=$hatirlatma['template']?></textarea>
                                        </div>
                                        <div class="col-12 ">
                                        <label class="form-label" for="alindiTemplate">Bildirim Durumu</label>

                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="statusHatirlatma" name="status" <?php if($hatirlatma['status']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="statusHatirlatma">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div> 
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="rememberTime">Kaç saat kala gitsin?</label>
                                         <input type="text" class="form-control" id="rememberTime" name="rememberTime" placeholder="Saat" value="<?=$hatirlatma['rememberTime']?>">
                                        </div>
                                        <input type="hidden" name="hatirlatmaEdit" value="1">            
                                        <div class="col-12">
                                            <button id="hatirlatma" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
                                        </div>
                                        <div>
                                    </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Randevu Tekrarlama</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                               
                                <!-- form -->
                                <form id="tekrarlamaForm" class="validate-form mt-2 pt-50">
                                    <div class="row">
                                    <div class="alert alert-warning">
                                    <h4 class="alert-heading">Site Adı : <b>{siteAdi}</b> <br> Üye Adı: <b>{uyeAdi}</b> <br>Hizmet Adı: <b>{hizmet}</b> </h4>
                                </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="tekrarlamaTemplate">Şablon</label>
                                                <textarea class="form-control" id="tekrarlamaTemplate" name="tekrarlamaTemplate" rows="4" placeholder="Bildirim Şablonu Yazın"><?=$tekrarlama['template']?></textarea>
                                        </div>
                                        <div class="col-12 ">
                                        <label class="form-label" for="alindiTemplate">Bildirim Durumu</label>

                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="statusTekrarlama" name="status" <?php if($tekrarlama['status']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="statusTekrarlama">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div> 
                                       <input type="hidden" name="tekrarlamaEdit" value="1">
                                        <div class="col-12">
                                            <button id="tekrarlama" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
                                        </div>
                                        <div>
                                    </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Randevu Güncelleme</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                               
                                <!-- form -->
                                <form id="guncellemeForm" class="validate-form mt-2 pt-50">
                                    <div class="row">
                                    <div class="alert alert-warning">
                                    <h4 class="alert-heading">Site Adı : <b>{siteAdi}</b> <br> Üye Adı: <b>{uyeAdi}</b> <br> Yeni Tarih: <b>{yenitarih}</b> <br>Yeni Saat: <b>{yenisaat}</b> <br>Hizmet Adı: <b>{hizmet}</b> </h4>
                                </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="guncellemeTemplate">Şablon</label>
                                                <textarea class="form-control" id="guncellemeTemplate" name="guncellemeTemplate" rows="4" placeholder="Bildirim Şablonu Yazın"><?=$guncelleme['template']?></textarea>
                                        </div>
                                        <div class="col-12 ">
                                        <label class="form-label" for="guncellemeTemplate">Bildirim Durumu</label>

                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="statusguncelleme" name="status" <?php if($guncelleme['status']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="statusguncelleme">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div> 
                                       <input type="hidden" name="guncellemeEdit" value="1">
                                        <div class="col-12">
                                            <button id="guncelleme" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
                                        </div>
                                        <div>
                                    </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>

                        <?php if($settings['birthdaySystem']=='1'){ ?>
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Doğum Günü Mesajı</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                               
                                <!-- form -->
                                <form id="dogumgunuForm" class="validate-form mt-2 pt-50">
                                    <div class="row">
                                    <div class="alert alert-warning">
                                    <h4 class="alert-heading">Site Adı: <b>{siteAdi}</b> <br>Site Adres : <b>{siteAdres}</b> <br> Üye Adı: <b>{uyeAdi}</b>  </h4>
                                </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="dogumgunuTemplate">Şablon</label>
                                                <textarea class="form-control" id="dogumgunuTemplate" name="dogumgunuTemplate" rows="4" placeholder="Bildirim Şablonu Yazın"><?=$dogumgunu['template']?></textarea>
                                        </div>
                                        <div class="col-12 ">
                                        <label class="form-label" for="dogumgunuTemplate">Bildirim Durumu</label>

                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="dogumgunu" name="status" <?php if($dogumgunu['status']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="dogumgunu">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div> 
                                       <input type="hidden" name="dogumgunuEdit" value="1">
                                        <div class="col-12">
                                            <button id="dogumgunubutton" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
                                        </div>
                                        <div>
                                    </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                        <?php } ?>

                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Memnuniyet Mesajı</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                               
                                <!-- form -->
                                <form id="memnuniyetForm" class="validate-form mt-2 pt-50">
                                    <div class="row">
                                    <div class="alert alert-warning">
                                    <h4 class="alert-heading">Site Adı: <b>{siteAdi}</b> <br>Site Adres : <b>{siteAdres}</b> <br> Üye Adı: <b>{uyeAdi}</b>  </h4>
                                </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="memnuniyetTemplate">Şablon</label>
                                                <textarea class="form-control" id="memnuniyetTemplate" name="memnuniyetTemplate" rows="4" placeholder="Bildirim Şablonu Yazın"><?=$memnuniyet['template']?></textarea>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="rememberTime">Kaç saat sonra gitsin?</label>
                                         <input type="text" class="form-control" id="rememberTime" name="rememberTime" placeholder="Saat" value="<?=$memnuniyet['rememberTime']?>">
                                        </div>
                                        <div class="col-12 ">
                                        <label class="form-label" for="memnuniyetTemplate">Bildirim Durumu</label>

                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="memnuniyet" name="status" <?php if($memnuniyet['status']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="memnuniyet">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div> 
                                       <input type="hidden" name="memnuniyetEdit" value="1">
                                        <div class="col-12">
                                            <button id="memnuniyetbutton" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
                                        </div>
                                        <div>
                                    </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>

                        <!--/ profile -->
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
$("#alindi").click(function() {
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
$("#hatirlatma").click(function() {
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
$("#tekrarlama").click(function() {
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
$("#guncelleme").click(function() {
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
$("#dogumgunubutton").click(function() {
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
$("#memnuniyetbutton").click(function() {
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