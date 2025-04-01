<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
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
                                <h4 class="card-title">Banka Ekleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="bankaEkleForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="bankName">Banka Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="bankName" class="form-control"
                                                        name="bankName" placeholder="Banka Adı" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="bankAccountName">Hesap Sahibi Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="bankAccountName" class="form-control"
                                                        name="bankAccountName" placeholder="Hesap Sahibi Adı" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="bankCode">Şube Kodu</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="bankCode" class="form-control"
                                                        name="bankCode" placeholder="Şube Kodu" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="bankAccountCode">Banka Hesap Numarası</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="bankAccountCode" class="form-control"
                                                        name="bankAccountCode" placeholder="Banka Hesap Numarası" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="bankIban">Banka Iban</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="bankIban" class="form-control"
                                                        name="bankIban" placeholder="Banka Iban" />
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="col-12 ">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="form-label" for="alindiTemplate">Banka Durumu</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-switch form-check-primary">
                                                        <input type="checkbox" class="form-check-input" id="bankStatus"
                                                            name="bankStatus">
                                                        <label class="form-check-label" for="bankStatus">
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
                                    
                                       
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="bankAdd" value="1">
                                            <button id="bankAdd" type="button"
                                                class="btn btn-primary me-1">Ekle</button>
                                            <a href="/admin/banks"><button type="button"
                                                    class="btn btn-outline-secondary">Banklara Dön</button></a>
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
$("#bankAdd").click(function() {
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