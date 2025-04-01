<?php 
//srequire_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/AdminCheck.php';
?>
<?php 
require $_SERVER['DOCUMENT_ROOT'].'/admin/system/includes/Header.php';
?>
<?php
$id = $_GET['id'];
$orders = $DB->query("SELECT * from orders where id=$id")->fetch(PDO::FETCH_ASSOC);
$kontrolurun = explode(",",$orders['products']);
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
                                <h4 class="card-title">Sipariş Düzenleme</h4>
                            </div>
                            <div class="card-body">
                                <form id="orderDuzenleForm" class="form form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="name">Ürünler</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <select class="js-example-basic-multiple" name="urunler[]" multiple="multiple">
                                                   <?php $urunler = $DB->query("SELECT * from products order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
                                                    foreach ($urunler as $urunlerCek) {
                                                        ?>
                                                  <option <?php if (in_array($urunlerCek['id'], $kontrolurun)) {echo 'selected="selected"';}?> 
                                                   value="<?=$urunlerCek['id']?>"><?=$urunlerCek['ad']?> | <?=$urunlerCek['fiyat']?>₺</option>
                                                  <?php } ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                      <div class="col-12">
                                          <div class="mb-1 row">
                                               <div class="col-sm-3">
                                                 <label class="col-form-label">Müşteri Tipi</label>
                                                </div>
                                                <div class="col-sm-9">  
                                                 <form id="tipForm">
                                                <input type="radio" id="mevcut" name="musteriTipi" value="Mevcut Müşteri" checked="checked">
                                                <label for="mevcut">Mevcut Müşteri</label><br>
                                                <input type="radio" id="yeni" name="musteriTipi" value="Yeni Müşteri">
                                                <label for="yeni">Yeni Müşteri</label><br>
                                                 </form>
                                              </div>
                                           </div>
                                        </div>

 

                                        <div id="mevcutMusteri">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="name">Müşteri Seçin</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <select class="js-example-basic-single" name="musteri">
                                                   <?php $musteriler = $DB->query("SELECT * from members order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
                                                    foreach ($musteriler as $musterilerCek) {
                                                        ?>
                                                  <option <?php if($musterilerCek['id']==$orders['memberID']){echo 'selected="selected"';} ?> value="<?=$musterilerCek['id']?>"><?=$musterilerCek['name']?></option>
                                                  <?php } ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div id="yeniMusteri">
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="musteriAd">Müşteri Ad</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="musteriAd" class="form-control"
                                                        name="musteriAd" placeholder="Müşteri Ad" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="musteriEposta">Müşteri Eposta</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="email" id="musteriEposta" class="form-control"
                                                        name="musteriEposta" placeholder="Müşteri Eposta" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="musteriEposta">Müşteri Telefon</label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="tel" id="musteriTelefon" class="form-control"
                                                        name="musteriTelefon" placeholder="05340737273" />
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        
                                        
                                       
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="paymentMethod">Ödeme Yöntemi</label>
                                                </div>
                                                <div class="col-sm-9">
                                                  <select class="js-example-basic-single" id="paymentMethod" name="paymentMethod">
                                                  
                                                  <option <?php if($orders['paymentMethod']=="Havale"){echo 'selected="selected"';} ?> value="Havale">Havale</option>
                                                  <option <?php if($orders['paymentMethod']=="Kredi Kartı"){echo 'selected="selected"';} ?>  value="Kredi Kartı">Kredi Kartı</option>
                                                  <option <?php if($orders['paymentMethod']=="Nakit"){echo 'selected="selected"';} ?> value="Nakit">Nakit</option>
                                                 
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="paymentStatus">Ödeme Durumu</label>
                                                </div>
                                                <div class="col-sm-9">
                                                  <select class="js-example-basic-single" id="paymentStatus" name="paymentStatus">
                                                  
                                                  <option <?php if($orders['paymentStatus']=="0"){echo 'selected="selected"';} ?> value="0">Ödenmedi</option>
                                                  <option <?php if($orders['paymentStatus']=="1"){echo 'selected="selected"';} ?> value="1">Ödendi</option>
                                                 
                                                </select>
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
                                                        name="fiyat" placeholder="Fiyat" value="<?=$orders['orderFiyat']?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($settings['orderProviderSystem']=='1'){ ?>
                                        <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label" for="orderProvider">Satıcı</label>
                                                </div>
                                                <div class="col-sm-9">
                                                  <select class="js-example-basic-single" id="orderProvider" name="orderProvider">
                                                  
                                                <?php $orderProvider = $DB->query("SELECT * from provider order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
                                                foreach ($orderProvider as $orderProviderCek) {
                                                    ?>
                                                  <option <?php if($orderProviderCek['id']==$orders['orderProvider']){echo "selected";} ?> value="<?=$orderProviderCek['id']?>"><?=$orderProviderCek['name']?></option>
                                                <?php } ?>
                                                 
                                                 
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                     
                                        <div class="col-sm-9 offset-sm-3">
                                            <input type="hidden" name="orderUpdate" value="1">
                                            <input type="hidden" name="orderID" value="<?=$orders['id']?>">
                                            <button id="orderUpdate" type="button"
                                                class="btn btn-primary me-1">Düzenle</button>
                                            <a href="../../admin/orders"><button type="button"
                                                    class="btn btn-outline-secondary">Siparişlere Dön</button></a>
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
$("#orderUpdate").click(function() {
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
    $('#mevcutMusteri').show();
    $('#yeniMusteri').hide();
    $('.js-example-basic-multiple').select2();
    $('.js-example-basic-single').select2();

});
$('input').on('change', function() {
 var deger = $('input[name=musteriTipi]:checked').val();
  if(deger==="Yeni Müşteri"){
      $('#yeniMusteri').show();
      $('#mevcutMusteri').hide();
  }
  if(deger==="Mevcut Müşteri"){
      $('#mevcutMusteri').show();
      $('#yeniMusteri').hide();
  }
  
});
</script>
<style>
.select2-selection--multiple{
    overflow: hidden !important;
    height: auto !important;
}
</style>