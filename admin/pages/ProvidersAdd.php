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
                                <h4 class="card-title">Çalışan Ekleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="calisanEkleForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="name">Çalışan Adı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="name" class="form-control"
                                                        name="name" placeholder="Çalışan Adı" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="email">Çalışan Email</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="email" id="email" class="form-control"
                                                        name="email" placeholder="Çalışan Email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="password">Çalışan Şifre</label>
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
                                                    <label class="col-form-label" for="services">Verdiği Hizmetler</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <select id="hizmetSec" name="services[]" multiple="multiple">
                                                <option value="allSelect" id="allSelect">Hepsini Seç</option>
                                                <?php $services = $DB->query("SELECT * from services order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
                                                foreach ($services as $service) {
                                                    ?>
                                                <option value="<?=$service['id']?>"><?=$service['serviceName']?></option>
                                                <?php } ?>
                                                
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="w1">Çalışma Saatleri</label>
                                                </div>
                                                <div class="col-sm-4">
                                                <input type="text" id="w1" name="w1" class="form-control flatpickr-time text-start" placeholder="09:00" />
                                                </div>
                                                <div class="col-sm-4">
                                                <input type="text" id="w2" name="w2" class="form-control flatpickr-time text-start" placeholder="21:00" />
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
                                                <option value="1">Pazartesi</option>
                                                <option value="2">Salı</option>
                                                <option value="3">Çarşamba</option>
                                                <option value="4">Perşembe</option>
                                                <option value="5">Cuma</option>
                                                <option value="6">Cumartesi</option>
                                                <option value="7">Pazar</option>
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
                                                    <input type="text"  id="renk" class="form-control"
                                                        name="renk" placeholder="#00000" />
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
                                                            name="working">
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
                                                    <label class="form-label" for="alindiTemplate">Yönetici</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-check form-switch form-check-primary">
                                                        <input type="checkbox" class="form-check-input" id="isAdmin"
                                                            name="isAdmin">
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

                                       
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="calisanEkle" value="1">
                                            <button id="calisanEkle" type="button"
                                                class="btn btn-primary me-1">Ekle</button>
                                            <a href="/admin/providers"><button type="button"
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
	  
	$('#hizmetSec').change(function() {
    var val = $(this).val();
    if(val == 'allSelect'){
    $('#hizmetSec option').prop('selected', true);
    $('#hizmetSec option[value="allSelect"]').prop('selected', false);
    }
    });
    
      hizmetSec.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Hizmet Seçin',
      dropdownParent: hizmetSec.parent(),
      closeOnSelect: true,
      escapeMarkup: function (es) {
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
      escapeMarkup: function (es) {
        return es;
      }
    });
});
</script>

<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Footer.php';
?>