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
                                <h4 class="card-title"><?php if($_GET['type']=='1'){echo "Gelir";} ?><?php if($_GET['type']=='2'){echo "Gider";} ?> Ekleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="caseAddForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="caseDate">Tarih</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="date" id="caseDate" class="form-control"
                                                        name="caseDate" value="<?php echo date('Y-m-d'); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="casePaymentMethod">Ödeme Yöntemi</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="js-example-basic-single" id="casePaymentMethod" name="casePaymentMethod">
                                                  <option value="Havale">Havale</option>
                                                  <option value="Kredi Kartı">Kredi Kartı</option>
                                                  <option value="Nakit">Nakit</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="caseAmount">Tutar</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" id="caseAmount" class="form-control"
                                                        name="caseAmount" placeholder="Tutar" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="caseNote">Not</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="caseNote" class="form-control"
                                                        name="caseNote" placeholder="Notunuz"/>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="caseType" value="<?=$_GET['type']?>">
                                            <input type="hidden" name="caseAdd" value="1">
                                            <button id="caseAdd" type="button"
                                                class="btn btn-primary me-1">Ekle</button>
                                            <a href="case"><button type="button"
                                                    class="btn btn-outline-secondary">Kasaya Dön</button></a>
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
$("#caseAdd").click(function() {
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
 <script>
$(document).ready(function() {
$('.js-example-basic-single').select2();
});

</script>