<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Full calendar start -->
            <section>
                <div class="app-calendar overflow-hidden border">
                    <div class="row g-0">
                        <!-- Sidebar -->
                        <div class="col app-calendar-sidebar flex-grow-0 overflow-hidden d-flex flex-column"
                            id="app-calendar-sidebar">
                            <div class="sidebar-wrapper">
                                <div class="card-body d-flex justify-content-center">
                                    <button id="randevuEkleButton" class="btn btn-primary btn-toggle-sidebar w-100"
                                        data-bs-toggle="modal" data-bs-target="#add-new-sidebar">
                                        <span class="align-middle">Randevu Ekle</span>
                                    </button>
                                </div>
                                
                               <!-- <div class="card-body pb-0">
                                    <h5 class="section-label mb-1">
                                        <span class="align-middle">Filter</span>
                                    </h5>
                                    <div class="form-check mb-1">
                                        <input type="checkbox" class="form-check-input select-all" id="select-all"
                                            checked />
                                        <label class="form-check-label" for="select-all">Hepsini Göster</label>
                                    </div>

                                    <?php $providers = $DB->query("SELECT * from provider WHERE working='1' order by id ASC")->fetchAll(PDO::FETCH_ASSOC); 
									foreach ($providers as $provider) {
										?>
                                    <div class="calendar-events-filter">
                                        <div class="form-check form-check-<?=id($provider['renk'])?> mb-1">
                                            <input type="checkbox" class="form-check-input input-filter"
                                                id="<?=id($provider['name'])?>" data-value="<?=id($provider['name'])?>"
                                                checked />
                                            <label class="form-check-label"
                                                for="<?=id($provider['name'])?>"><?=$provider['name']?></label>
                                        </div>
                                    </div>
                                    <?php } ?>


                                </div>-->
                            </div>
                            <div class="mt-auto">
                                <img src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/images/pages/calendar-illustration.png"
                                    alt="Calendar illustration" class="img-fluid" />
                            </div>
                        </div>
                        <!-- /Sidebar -->

                        <!-- Calendar -->
                        <div class="col position-relative">
                            <div class="card shadow-none border-0 mb-0 rounded-0">
                                <div class="card-body pb-0">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /Calendar -->
                        <div class="body-content-overlay"></div>
                    </div>
                </div>
                <!-- Calendar Add/Update/Delete event modal-->
                <div class="modal modal-slide-in event-sidebar fade" id="add-new-sidebar">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">Randevu İşlemleri</h5>
                            </div>
                            <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                <form class="event-form needs-validation" id="randevuOlustur" action="#">
                                    <div class="mb-1">
                                        <label for="hizmet" class="form-label">Hizmet</label>
                                        <select class="select2 select-label form-select w-100" id="service"
                                            name="service">
                                            <option selected="" disabled="" value="">Seçin</option>

                                            <?php $services = $DB->query("select * from services order by id ASC")->fetchAll(PDO::FETCH_ASSOC); 
									foreach ($services as $service) {
										?>
                                            <option id="service<?=$service['id']?>"
                                                data-label="<?=id($service['serviceName'])?>"
                                                value="<?=$service['id']?>"><?=$service['serviceName']?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="mb-1">
                                        <label for="select-label" class="form-label">Çalışan</label>
                                        <select class="select2 select-label form-select w-100" id="providerList"
                                            name="provider">

                                        </select>
                                    </div>
                                    <script
                                        src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/jquery-3.5.1.min.js">
                                    </script>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $("#service").change(function() {
                                            var serviceID = $(this).val();
                                            $.ajax({
                                                type: "POST",
                                                url: "../admin/system/ajax/ProviderAjax.php",
                                                data: {
                                                    "serviceID": serviceID
                                                },
                                                success: function(e) {
                                                    $("#providerList").html(e);
                                                    $("#timeSelect").html("");
                                                }
                                            });
                                        })
                                    });
                                    </script>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $("#providerList").change(function() {
                                            var date = $('#start-date').val();
                                            var providerID = $(this).val();
                                            $.ajax({
                                                type: "POST",
                                                url: "../admin/system/ajax/AvailableTimeAjax.php",
                                                data: {
                                                    "date": date,
                                                    "providerID": providerID
                                                },
                                                success: function(e) {
                                                    $("#timeSelect").html(e);

                                                }
                                            });
                                        })
                                    });
                                    </script>

                                    <div class="mb-1 position-relative">
                                        <label for="start-date" class="form-label">Tarih Seçin</label>
                                        <input type="text" class="form-control" id="start-date" name="start-date"
                                            placeholder="Randevu Tarihi" />
                                    </div>
                                    <div class="row custom-options-checkable g-1" id="timeSelect">
                                    </div>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $("#start-date").change(function() {
                                            var date = $(this).val();
                                            if ($('#providerList').val() == undefined) {
                                                var providerID = $('#providerID').val();
                                            } else {
                                                var providerID = $('#providerList').val();
                                            }
                                            var edit = $('#edit').val();
                                            $.ajax({
                                                type: "POST",
                                                url: "../admin/system/ajax/AvailableTimeAjax.php",
                                                data: {
                                                    "date": date,
                                                    "providerID": providerID,
                                                    "edit": edit

                                                },
                                                success: function(e) {
                                                    $("#timeSelect").html(e);
                                                }
                                            });
                                        })
                                    });
                                    </script>
                                    <br>
                                    <input type="hidden" id="providerID" value="">
                                    <div class="mb-1" id="secimEkran">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input musteriTipi" type="radio" name="musteriSec"
                                                id="inlineRadio1" value="mevcut">
                                            <label class="form-check-label" for="inlineRadio1">Mevcut Müşteri</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input musteriTipi" type="radio" name="musteriSec"
                                                id="inlineRadio2" value="yeni">
                                            <label class="form-check-label" for="inlineRadio2">Yeni Müşteri</label>
                                        </div>
                                    </div>

                                    <div id="mevcutMusteri" class="mb-1 select2-primary">
                                        <label for="event-guests" class="form-label">Müşteri</label>
                                        <select class="select2 select-add-guests form-select w-100" id="event-guests"
                                            name="musteri">
                                            <option selected="" disabled="" value="">Seçin</option>
                                            <?php $members = $DB->query("select * from members order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
									foreach ($members as $member) {
										?>
                                            <option id="member<?=$member['id']?>" value="<?=$member['id']?>">
                                                <?=$member['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div id="musteriDuzenle"></div>


                                    <div class="mb-1" id="adSoyad">
                                        <label for="event-location" n class="form-label">Ad Soyad</label>
                                        <input type="text" class="form-control" name="musteriAd" id="musteriAd"
                                            placeholder="Alperen Belet" />
                                    </div>
                                    <div class="mb-1" id="telefon">
                                        <label class="form-label">Telefon</label>
                                        <input type="phone" class="form-control" name="musteriTelefon"
                                            id="musteriTelefon" placeholder="05340737273" />
                                    </div>


                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#mevcutMusteri').hide();
                                        $('#adSoyad').hide();
                                        $('#telefon').hide();

                                        $("input[type='radio']").click(function() {
                                            var radioValue = $("input[name='musteriSec']:checked")
                                                .val();
                                            if (radioValue == 'mevcut') {
                                                $('#mevcutMusteri').show();
                                                $('#adSoyad').hide();
                                                $('#telefon').hide();
                                            } else if (radioValue == 'yeni') {
                                                $('#adSoyad').show();
                                                $('#telefon').show();
                                                $('#mevcutMusteri').hide();
                                            }
                                        });


                                    });
                                    </script>

                                    <div class="mb-1 d-flex">
                                        <input type="hidden" value="0" name="randevuDuzenle" id="randevuDuzenle">
                                        <input type="hidden" value="1" name="randevuEkle" id="randevuEkleDurum">
                                        <input type="hidden" value="0" name="edit" id="edit">
                                        <button id="randevuEkle" type="button" name="randevuEkle"
                                            class="btn btn-primary add-event-btn me-1">Ekle</button>
                                        <button type="button" class="btn btn-outline-secondary btn-cancel"
                                            data-bs-dismiss="modal">Vazgeç</button>
                                        <button id="randevuDuzen" type="button"
                                            class="btn btn-primary update-event-btn d-none me-1">Kaydet</button>
                                        <button id="randevuSil" type="button"
                                            class="btn btn-outline-danger btn-delete-event d-none">Sil</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Calendar Add/Update/Delete event modal-->
            </section>
            <!-- Full calendar end -->

        </div>
    </div>
</div>
<!-- END: Content-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$("#randevuDuzen").click(function() {
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
$("#randevuSil").click(function() {
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
$("#randevuEkle").click(function() {
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