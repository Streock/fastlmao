<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/jquery-3.5.1.min.js"></script>
<?php 
date_default_timezone_set('Europe/Istanbul');
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/eral.php';
function id($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '', $text);
    return $text;
}
?>
<?php if(!empty($_POST['providerID']) and !empty($_POST['date'])){?>
<?php 
$suankiSaat = date("H:i");
$bugunTarih= date('Y-m-d');
$providerID = $_POST['providerID'];
$date = $_POST['date'];
$providerCheck = $DB->prepare("select * from provider where id=?");
$providerCheck->execute(array($providerID));
$provider = $providerCheck->fetch(PDO::FETCH_ASSOC);
$breakTime = $provider['breakTime'];
$breakDate = new DateTime($date);
$breakDate = $breakDate->format( 'N' );
$workingTime = $provider['workingTime']; 
$workingTime = explode("-", $workingTime);
$startTime = $workingTime[0];
$endTime = $workingTime[1];
$t1 = strtotime( $startTime );
$t2 = strtotime( $endTime );
$diff = $t2 - $t1;
$hours = $diff / ( 60 * 60 );
$datetime = new DateTime($startTime);
$deger = $datetime->format('H:i:s');
$appointmentsCheck= $DB->prepare("SELECT * from appointments where providerID=? and DATE(appDate)=? and TIME(startTime)=?");
$appointmentsCheck->execute(array($providerID,$date,$deger));
$app = $appointmentsCheck->fetch(PDO::FETCH_ASSOC);

$breakTime = $provider['breakTime'];
$breakTime = explode(",", $breakTime);
if (in_array($breakDate, $breakTime)){
  echo '<small style="color:red">'.$translations['dayoff'].'</small>';
}

if($appointmentsCheck->rowCount()){
    $appstartTime = $app['startTime'];
    $appendTime = $app['endTime'];
    $appt1 = strtotime( $appstartTime );
    $appt2 = strtotime( $appendTime );
    $appdiff = $appt2 - $appt1;
    $apphours = $appdiff / ( 60 * 60 )-1;
    $appdatetime = new DateTime($appstartTime);
    for ($c=0; $c < $apphours ; $c++) { ?>
<?php    
    $appdatetime->modify('+1 hour');
    $appdeger = $appdatetime->format('Hi');
    ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#<?=$appdeger?>').remove();
});
</script>
<?php } ?>
<?php }else{?>
<?php $randevuSaat = $datetime->format('H:i'); ?>
<?php $suankiSaat = date("H:i"); ?>
<?php $bugunTarih= date('Y-m-d'); ?>
<?php if($date==$bugunTarih){ ?>
<?php $ickontrol = 'return !in_array($breakDate, $breakTime) && $randevuSaat > $suankiSaat;';?>
<?php }else{?>
<?php $ickontrol = 'return !in_array($breakDate, $breakTime);';?>
<?php }?>
<?php if (eval($ickontrol)){?>
    <?php if(!empty($_POST['edit'])){ ?>
    <?php 
    $editID = $_POST['edit'];
    $editCheck= $DB->prepare("SELECT * from appointments where id=?");
    $editCheck->execute(array($editID));
    $editDeger = $editCheck->fetch(PDO::FETCH_ASSOC);
    ?>
    <div id="<?=$datetime->format('Hi')?>" class="col-md-2">
    <input class="custom-option-item-check" type="radio" <?php if($datetime->format('H:i:s')==$editDeger['startTime']){echo "checked";} ?> value="<?=$datetime->format('H:i:s')?>"
        name="customOptionsCheckableRadiosWithIcon" id="customOptionsCheckableRadiosWithIcon<?=$i?>">
    <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon<?=$i?>">
        <small><?=$datetime->format('H:i')?></small>
        </label>
    </div>
    <?php }else{?>
    <div id="<?=$datetime->format('Hi')?>" class="col-md-2">
    <input class="custom-option-item-check" type="radio" value="<?=$datetime->format('H:i:s')?>"
        name="customOptionsCheckableRadiosWithIcon" id="customOptionsCheckableRadiosWithIcon<?=$i?>">
    <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon<?=$i?>">
        <small><?=$datetime->format('H:i')?></small>
        </label>
    </div>
    <?php }?>
<?php } ?>
<?php } ?>
<?php 
for ($i=0; $i < $hours ; $i++) { 
$datetime->modify('+1 hour');
$deger = $datetime->format('H:i:s');
$appointmentsCheck= $DB->prepare("SELECT * from appointments where providerID=? and DATE(appDate)=? and TIME(startTime)=?");
$appointmentsCheck->execute(array($providerID,$date,$deger));
$app = $appointmentsCheck->fetch(PDO::FETCH_ASSOC);
if($appointmentsCheck->rowCount()){
    $appstartTime = $app['startTime'];
    $appendTime = $app['endTime'];
    $appt1 = strtotime( $appstartTime );
    $appt2 = strtotime( $appendTime );
    $appdiff = $appt2 - $appt1;
    $apphours = $appdiff / ( 60 * 60 )-1;
    $appdatetime = new DateTime($appstartTime);
    for ($c=0; $c < $apphours ; $c++) { ?>
<?php    
    $appdatetime->modify('+1 hour');
    $appdeger = $appdatetime->format('Hi');
    ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#<?=$appdeger?>').remove();
});
</script>
<?php } ?>
<?php }else{?>
<?php $randevuSaat = $datetime->format('H:i'); ?>
<?php $suankiSaat = date("H:i"); ?>
<?php $bugunTarih= date('Y-m-d'); ?>
<?php if($date==$bugunTarih){ ?>
<?php $ickontrol = 'return !in_array($breakDate, $breakTime) && $randevuSaat > $suankiSaat;';?>
<?php }else{?>
<?php $ickontrol = 'return !in_array($breakDate, $breakTime);';?>
<?php }?>
<?php if (eval($ickontrol)){?>
    <?php if(!empty($_POST['edit'])){ ?>
    <?php 
    $editID = $_POST['edit'];
    $editCheck= $DB->prepare("SELECT * from appointments where id=?");
    $editCheck->execute(array($editID));
    $editDeger = $editCheck->fetch(PDO::FETCH_ASSOC);
    ?>
     <div id="<?=$datetime->format('Hi')?>" class="col-md-2">
    <input class="custom-option-item-check" type="radio" <?php if($datetime->format('H:i:s')==$editDeger['startTime']){echo "checked";} ?> value="<?=$datetime->format('H:i:s')?>"
        name="customOptionsCheckableRadiosWithIcon" id="customOptionsCheckableRadiosWithIcon<?=$i?>">
    <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon<?=$i?>">
        <small><?=$datetime->format('H:i')?></small>
    </label>
    </div>
    <?php }else{?>
    <div id="<?=$datetime->format('Hi')?>" class="col-md-2">
    <input class="custom-option-item-check" type="radio" value="<?=$datetime->format('H:i:s')?>"
        name="customOptionsCheckableRadiosWithIcon" id="customOptionsCheckableRadiosWithIcon<?=$i?>">
    <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon<?=$i?>">
        <small><?=$datetime->format('H:i')?></small>
    </label>
    </div>
    <?php }?>
<?php } ?>
<?php } ?>
<?php }?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
$(document).ready(function() {
    <?php if($suankiSaat > $endTime && $date==$bugunTarih) {?>
    Swal.fire({
        title: "<?=$translations['error']?>",
        text: "<?=$translations['timepass']?>",
        icon: 'error',
        confirmButtonColor: '#7367f0',
        confirmButtonText: "<?=$translations['okey']?>"
    });
    <?php }else{?>
    if ($("#timeSelect .col-md-2").length) {} else {
        <?php if (in_array($breakDate, $breakTime)){?>
        Swal.fire({
            title: "<?=$translations['error']?>",
            text: "<?=$translations['staffpass']?>",
            icon: 'error',
            confirmButtonColor: '#7367f0',
            confirmButtonText: "<?=$translations['okey']?>"
        });
        <?php }else{ ?>
        Swal.fire({
            title: "<?=$translations['error']?>",
            text: "<?=$translations['apppass']?>",
            icon: 'error',
            confirmButtonColor: '#7367f0',
            confirmButtonText: "<?=$translations['okey']?>"
        });
        <?php } ?>
    }
  <?php } ?> 
});
</script>

<?php }?>


<!-- Takvim Break Sorgulama -->
<?php if(!empty($_POST['providerID'])){?>
<?php 
$breakCheck= $DB->prepare("SELECT * from provider where id=? and breakstatus=?");
$breakCheck->execute(array($_POST['providerID'],'1'));
$break = $breakCheck->fetch(PDO::FETCH_ASSOC);
if($breakCheck->rowCount()){?>
<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var start_time = "<?=$break['break_start_time']?>";
    var end_time = "<?=$break['break_end_time']?>";
    startDate = $('#start-date');
    if (startDate.length) {
        var start = startDate.flatpickr({
            disable: [{
                from: start_time,
                to: end_time
            }],

            minDate: "today",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    longhand: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma',
                        'Cumartesi'],
                    shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
                },
                months: {
                    longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz',
                        'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
                    ],
                    shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki',
                        'Kas', 'Ara'
                    ]
                },
                today: 'Bugün',
                clear: 'Temizle'
            },
            altFormat: 'd-m-YTH:i',
            onReady: function(selectedDates, dateStr, instance) {
                if (instance.isMobile) {
                    $(instance.mobileInput).attr('step', null);
                }
            }
        });
    }
});
</script>
<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<?php }else{ ?>
<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    startDate = $('#start-date');
    if (startDate.length) {
        var start = startDate.flatpickr({
            minDate: "today",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    longhand: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma',
                        'Cumartesi'],
                    shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
                },
                months: {
                    longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz',
                        'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
                    ],
                    shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki',
                        'Kas', 'Ara'
                    ]
                },
                today: 'Bugün',
                clear: 'Temizle'
            },
            altFormat: 'd-m-YTH:i',
            onReady: function(selectedDates, dateStr, instance) {
                if (instance.isMobile) {
                    $(instance.mobileInput).attr('step', null);
                }
            }
        });
    }
});
</script>
<script src="<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<?php } ?>
<?php }?>
<!-- Takvim Break Sorgulama -->