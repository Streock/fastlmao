<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>

<?php
$id = $_GET['id'];
$services= $DB->query("SELECT * from services where id=$id")->fetch(PDO::FETCH_ASSOC);

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
                                <h4 class="card-title">Hizmet Düzenleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="hizmetDuzenleForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="serviceName">Hizmet Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="serviceName" class="form-control"
                                                        name="serviceName" placeholder="Hizmet Adı" value="<?=$services['serviceName']?>"/>
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
                                                        name="serviceDesc" placeholder="Açıklama" value="<?=$services['serviceDesc']?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="price">Fiyat </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="price" class="form-control"
                                                        name="price" placeholder="Açıklama" value="<?=$services['price']?>"/>
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
                                                        name="hour" placeholder="1" value="<?=$services['hour']?>"/>
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
                                                        name="againDay" placeholder="0" value="<?=$services['againDay']?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <div class="mb-1">
                                                <div class="form-check">
                                                    <input type="checkbox" <?php if($services['status']=='1'){echo 'checked';}?> name="status"
                                                        class="form-check-input" id="customCheck1" />
                                                    <label class="form-check-label" for="customCheck1">Aktif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="serviceID" id="serviceID" value="<?=$services['id']?>">
                                            <input type="hidden" name="hizmetDuzenle" value="1">
                                            <button id="hizmetDuzenle" type="button"
                                                class="btn btn-primary me-1">Kaydet</button>
                                            <a href="../services"><button type="button"
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
$("#hizmetDuzenle").click(function() {
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