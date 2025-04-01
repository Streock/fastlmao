<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>
<?php
$id = $_GET['id'];
$uye = $DB->query("SELECT * from members where id=$id")->fetch(PDO::FETCH_ASSOC);?>
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
                                <h4 class="card-title">Üye Düzenleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="uyeDuzenleForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="name">Üye Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="name" class="form-control"
                                                        name="name" placeholder="Üye Adı" value="<?=$uye['name']?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="email">Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="email" id="email" class="form-control"
                                                        name="email" placeholder="Email" value="<?=$uye['email']?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="phone">Üye Telefon</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="phone" id="phone" class="form-control"
                                                        name="phone" placeholder="Telefon" value="<?=$uye['phone']?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($settings['birthdaySystem']=='1'){ ?>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="birthday">Doğum Tarihi</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="date" id="birthday" class="form-control"
                                                        name="birthday" placeholder="Doğum Tarihi" value="<?=$uye['birthday']?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="uyeid" value="<?=$uye['id']?>">
                                            <input type="hidden" name="uyeDuzenle" value="1">
                                            <button id="uyeDuzenle" type="button"
                                                class="btn btn-primary me-1">Kaydet</button>
                                            <a href="../members"><button type="button"
                                                    class="btn btn-outline-secondary">Üyeler Dön</button></a>
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
$("#uyeDuzenle").click(function() {
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