<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
$settings= $DB->query("SELECT * from settings where id=1")->fetch(PDO::FETCH_ASSOC);
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
                                <h4 class="card-title">Site Ayarları</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                <!-- form -->
                                <form id="settingsForm" class="validate-form mt-2 pt-50">
                                <label class="form-label" for="siteName">Site Logo</label>

                                <div class="d-flex">
                                    <a href="#" class="me-25">
                                        <img src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/logo/<?php echo $settings['siteLogo']; ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="site logo" height="60" width="170" />
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
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="siteName">Site Adı</label>
                                            <input type="text" class="form-control" id="siteName" name="siteName" placeholder="Site Adı" value="<?=$settings['siteName']?>"  />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="siteDesc">Site Açıklama</label>
                                            <input type="text" class="form-control" id="siteDesc" name="siteDesc" placeholder="Site Açıklama" value="<?=$settings['siteDesc']?>"  />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="siteKeyword">Site Anahtar Kelimeleri</label>
                                            <input type="text" class="form-control" id="siteKeyword" name="siteKeyword" placeholder="Anahtar Kelimeler" value="<?=$settings['siteKeyword']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="accountAddress">Çalışma Periotu (Dakika)</label>
                                            <input type="text" class="form-control" id="periot" name="periot" placeholder="60" value="<?=$settings['periot']?>"/>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="timeStart">Mesai Başlangıç </label>
                                            <input type="text" id="timeStart" name="timeStart" class="form-control flatpickr-time text-start" placeholder="09:00" value="<?=$settings['timeStart']?>"/>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="timeEnd">Mesai Bitiş </label>
                                            <input type="text" id="timeEnd" name="timeEnd" class="form-control flatpickr-time text-start" placeholder="09:00" value="<?=$settings['timeEnd']?>" />
                                        </div>
                                       
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="alindiTemplate">Mail Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="emailSystem" name="emailSystem" <?php if($settings['emailSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="emailSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="alindiTemplate">Sms Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="smsSystem" name="smsSystem" <?php if($settings['smsSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="smsSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="alindiTemplate">Randevu Düzenleme & İptal Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="cancelSystem" name="cancelSystem" <?php if($settings['cancelSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="cancelSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="alindiTemplate">Doğum Günü Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="birthdaySystem" name="birthdaySystem" <?php if($settings['birthdaySystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="birthdaySystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="cancelLimit">Randevu Düzenleme  & İptal Saat Limiti</label>
                                            <input type="number" class="form-control" id="cancelLimit" name="cancelLimit" placeholder="Saat Limiti" value="<?=$settings['cancelLimit']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="cancelMessage">Randevu Düzenleme & İptal SMS Mesaj</label>
                                            <input type="text" class="form-control" id="cancelMessage" name="cancelMessage" placeholder="Mesaj" value="<?=$settings['cancelMessage']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="alindiTemplate">Kasa Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="caseSystem" name="caseSystem" <?php if($settings['caseSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="caseSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="alindiTemplate">Sipariş Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="orderSystem" name="orderSystem" <?php if($settings['orderSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="orderSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="providerSmsSystem">Çalışan Randevu Hatırlatma Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="providerSmsSystem" name="providerSmsSystem" <?php if($settings['providerSmsSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="providerSmsSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="providerSmsTime">Çalışan Randevu Hatırlatma Saati</label>
                                            <input type="number" class="form-control" id="providerSmsTime" name="providerSmsTime" placeholder="Kaç Saat Kala" value="<?=$settings['providerSmsTime']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="paytrSystem">PayTR Ödeme Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="paytrSystem" name="paytrSystem" <?php if($settings['paytrSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="paytrSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="paytrId">PayTR Merchant ID</label>
                                            <input type="text" class="form-control" id="paytrId" name="paytrId" placeholder="Merchant ID" value="<?=$settings['paytrId']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="paytrKey">PayTR Merchant Key</label>
                                            <input type="text" class="form-control" id="paytrKey" name="paytrKey" placeholder="Merchant Key" value="<?=$settings['paytrKey']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="paytrSalt">PayTR Merchant Salt</label>
                                            <input type="text" class="form-control" id="paytrSalt" name="paytrSalt" placeholder="Merchant Salt" value="<?=$settings['paytrSalt']?>" />
                                        </div>
                                        <div class="col-12 col-sm-12 mb-1">
                                            <label class="form-label" for="paytrBildirim">PayTR Bildirim URL (PayTR Bildirim URL'yi aşağıdaki gibi ayarlayın.)</label>
                                            <input readonly style="cursor:pointer" type="text" onclick="kopyala();" class="form-control" id="paytrBildirim" value="<?php echo $_SERVER['SERVER_NAME']; ?>/odeme/PayTR/a7472b2f8b06d99f0ec94f385ef8ef7c6a1a400a/callback" />
                                        </div>
                                        <script>
                                        function kopyala() {
                                        var copyText = document.getElementById("paytrBildirim");
                                        copyText.select();
                                        copyText.setSelectionRange(0, 99999);
                                        navigator.clipboard.writeText(copyText.value);
                                        alert("Bildirim URL Kopyalandı.");
                                        }
                                        </script>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="eftSystem">Havale / EFT Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="eftSystem" name="eftSystem" <?php if($settings['eftSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="eftSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="salonCreditCardSystem">Salon Kredi Kartıyla Ödeme Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="salonCreditCardSystem" name="salonCreditCardSystem" <?php if($settings['salonCreditCardSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="salonCreditCardSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="stockSystem">Stok Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="stockSystem" name="stockSystem" <?php if($settings['stockSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="stockSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="orderProviderSystem">Sipariş Satıcı Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="orderProviderSystem" name="orderProviderSystem" <?php if($settings['orderProviderSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="orderProviderSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="vestedSystem">Hakediş Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="vestedSystem" name="vestedSystem" <?php if($settings['vestedSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="vestedSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="vestedCommission">Hakediş Komisyon Oranı (%)</label>
                                            <input type="number" class="form-control" id="vestedCommission" name="vestedCommission" placeholder="Komisyon Oranı" value="<?=$settings['vestedCommission']?>" />
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="vestedSystem">Ayın Elemanı Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="providerMonthSystem" name="providerMonthSystem" <?php if($settings['providerMonthSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="providerMonthSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="vestedSystem">Dil Sistemi</label>
                                        <div class="form-check form-switch form-check-primary">
                                                <input type="checkbox" class="form-check-input" id="langSystem" name="langSystem" <?php if($settings['langSystem']=='1'){echo 'checked';}?>>
                                                <label class="form-check-label" for="langSystem">
                                                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="defaultLang">Site Varsayılan Dil</label>
                                        <select class="form-control" name="defaultLang" id="defaultLang">
                                        <?php $langs = $DB->query("SELECT * from languages order by id")->fetchAll(PDO::FETCH_ASSOC); 
                                            foreach ($langs as $langsCek) {
                                                ?>
                                            <option <?php if($settings['defaultLang']==$langsCek['code']){echo 'selected';} ?> value="<?=$langsCek['code']?>"><?=$langsCek['name']?></option>
                                            <?php }?>
                                            
                                        </select>
                                        </div>
                                      
                                        
                                        
                                        <div class="col-12">
                                            <input type="hidden" name="ayarKaydet" value="1">
                                            <button id="ayarKaydet" type="button" class="btn btn-primary mt-1 me-1">Kaydet</button>
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
$("#ayarKaydet").click(function() {
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