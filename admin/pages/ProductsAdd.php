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
                                <h4 class="card-title">Ürün Ekleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="urunEkleForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="name">Ürün Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="name" class="form-control"
                                                        name="ad" placeholder="Ürün Adı" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="aciklama">Açıklama</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="aciklama" class="form-control"
                                                        name="aciklama" placeholder="Açıklama" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="barcode">Barkod</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="barcode" class="form-control"
                                                        name="barcode" placeholder="Barkod" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="fiyat">Fiyat</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" id="fiyat" class="form-control"
                                                        name="fiyat" placeholder="Fiyat"/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($settings['stockSystem']=='1'){ ?>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="stok">Stok</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" id="stok" class="form-control"
                                                        name="stok" placeholder="Stok"/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="urunEkle" value="1">
                                            <button id="urunEkle" type="button"
                                                class="btn btn-primary me-1">Ekle</button>
                                            <a href="../admin/products"><button type="button"
                                                    class="btn btn-outline-secondary">Ürünlere Dön</button></a>
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
$("#urunEkle").click(function() {
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