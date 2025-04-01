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
                                <h4 class="card-title">Hizmet Ekleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="hizmetEkleForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="serviceName">Hizmet Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="serviceName" class="form-control"
                                                        name="serviceName" placeholder="Hizmet Adı" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="serviceDesc">Hizmet
                                                        Açıklama</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="serviceDesc" class="form-control"
                                                        name="serviceDesc" placeholder="Açıklama" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="price">Fiyat</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="price" class="form-control"
                                                        name="price" placeholder="Fiyat" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="hour">Hizmet Süresi
                                                        (Saat)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" min="1" id="hour" class="form-control"
                                                        name="hour" placeholder="1" value="1"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="hour">Tekrarlama Süresi
                                                        (Sms bildiriminde kullanılır, yok ise 0 yazınız.)</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" id="againDay" class="form-control"
                                                        name="againDay" placeholder="0" value="0"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="mb-1">
                                                <div class="form-check">
                                                    <input type="checkbox" checked name="status"
                                                        class="form-check-input" id="customCheck1" />
                                                    <label class="form-check-label" for="customCheck1">Aktif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="hizmetEkle" value="1">
                                            <button id="hizmetEkle" type="button"
                                                class="btn btn-primary me-1">Ekle</button>
                                            <a href="services"><button type="button"
                                                    class="btn btn-outline-secondary">Hizmetlere Dön</button></a>
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
$("#hizmetEkle").click(function() {
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