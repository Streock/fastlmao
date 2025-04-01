<?php
date_default_timezone_set('Europe/Istanbul');
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php'; 
$settings = $DB->query("select * from settings where id=1")->fetch(PDO::FETCH_ASSOC);
function randomCreate($length){
    $char = "1234567890abcdefghKLMNOPRSTuvyzABCDEFGHklmnoprstUVYZ0987654321";
    $text = '';
    for($i=0;$i<$length;$i++)                 
    {
       $text .= $char[rand() % 72];    
    }
    return $text;
 }
 function generateUrl($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $time = substr(time(),-3);
    return $randomString.$time;
}

if (isset($_POST['randevuEkle']) ) {
//KONTROL
$provider   = htmlspecialchars(trim($_POST['provider']));
$randevuTarih = htmlspecialchars(trim($_POST['start-date']));
$saat   = htmlspecialchars(trim($_POST['customOptionsCheckableRadiosWithIcon']));
$randevuKontrol = $DB->prepare("SELECT * FROM appointments WHERE providerID=? AND appDate=? AND startTime=?");
$randevuKontrol->execute(array($provider,$randevuTarih,$saat));
//KONTROL
if($randevuKontrol->rowCount()) {
echo "varvar";    
}else{
if($_POST['randevuDuzenle']=='0'){
$service   = htmlspecialchars(trim($_POST['service']));
$provider   = htmlspecialchars(trim($_POST['provider']));
$randevuTarih = htmlspecialchars(trim($_POST['start-date']));
$saat   = htmlspecialchars(trim($_POST['customOptionsCheckableRadiosWithIcon']));
$musteri   = htmlspecialchars(trim($_POST['musteri']));
$musteriAd = htmlspecialchars(trim($_POST['musteriAd']));
$musteriTelefon = htmlspecialchars(trim($_POST['musteriTelefon']));

if(!empty($musteri)){
$musteriID = $musteri;
}else{

$kontrol = $DB->prepare("SELECT * FROM members WHERE phone = ?");
$kontrol->execute(array($musteriTelefon));
if($kontrol->rowCount()) {
$row = $kontrol ->fetch(PDO::FETCH_ASSOC);
$musteriID = $row['id'];
}else{    
$musteriEkle = $DB->prepare("INSERT into members set name=?, phone=?");
$musteriEkle-> execute(array($musteriAd,$musteriTelefon));
$musteriID = $DB->lastInsertId();
}
}

$musteriKontrol = $DB->prepare("SELECT * FROM members WHERE id=?");
$musteriKontrol->execute(array($musteriID));
$musteriKontrolDeger = $musteriKontrol ->fetch(PDO::FETCH_ASSOC);


$serviceKontrol = $DB->prepare("SELECT * FROM services WHERE id=?");
$serviceKontrol->execute(array($service));
$serviceKontrolDeger = $serviceKontrol ->fetch(PDO::FETCH_ASSOC);
$serviceSaat = $serviceKontrolDeger['hour'];

$endTime = new DateTime($saat);
$endTime->modify('+'.$serviceSaat.' hour');
$endTimeDeger = $endTime->format('H:i:s');

$paymentKey = generateUrl();
$payment = 'Kredi';
$ekle = $DB->prepare("INSERT into appointments set service=?, providerID=?, appDate=?, startTime=?, endTime=?, member=?, paymentKey=?, payment=?");
$ekle -> execute(array($service,$provider,$randevuTarih,$saat,$endTimeDeger,$musteriID,$paymentKey,$payment));
$url = generateUrl();
$eklenenRandevu = $DB->lastInsertId();
$ekle = $DB->prepare("INSERT into redirect set url=?, appointment=?");
$ekle -> execute(array($url,$eklenenRandevu));

//Mutlucell Sms Entegrasyonu
if($settings['smsSystem']=='1'){ //sms bildirim
$notification_settings = $DB->query("select * from notification_settings where id=1")->fetch(PDO::FETCH_ASSOC);
if($notification_settings['status']=='1'){
    $smsSettings = $DB->prepare("select * from sms_settings where id=?");
    $smsSettings->execute(array('1'));
    $sms = $smsSettings->fetch(PDO::FETCH_ASSOC);
    $username = $sms['username'];
    $password = $sms['password'];
    $title = $sms['title'];
    $number = $musteriKontrolDeger['phone'];
    $siteadresi = "https://".$_SERVER['SERVER_NAME'];
    $siteAdi = $settings['siteName'];
    $musteriAdiNe = $musteriKontrolDeger['name'];
    
    $sablon = $DB->prepare("select * from notification_settings where id=?");
    $sablon->execute(array('1'));
    $sablonCek = $sablon->fetch(PDO::FETCH_ASSOC);
    $messageSablon = $sablonCek['template'];
    $tarihNe = $randevuTarih;
    $saatNe = $saat;
    $hizmetNe = $serviceKontrolDeger['serviceName'] ;
    setlocale(LC_TIME,'turkish');
    $tarihNe = iconv('latin5','utf-8',strftime(' %d %B %Y %A ',strtotime($tarihNe)));
    $saatNe = new DateTime($saatNe);
    $saatNe = $saatNe->format("H:i");


    $messageSablon = str_replace('{siteAdi}', $siteAdi, $messageSablon);
    $messageSablon = str_replace('{uyeAdi}', $musteriAdiNe, $messageSablon);
    $messageSablon = str_replace('{tarih}', $tarihNe, $messageSablon);
    $messageSablon = str_replace('{saat}', $saatNe, $messageSablon);
    $messageSablon = str_replace('{hizmet}', $hizmetNe, $messageSablon);
    
    $cancelSystem = $settings['cancelSystem'];
    $cancelMessage = $settings['cancelMessage'];
    if($cancelSystem=='1'){
    $redirect = "https://" . $_SERVER['SERVER_NAME']."/r/".$url;
    $cancelMessageText = " ".$cancelMessage.$redirect;
    $message = $messageSablon.$cancelMessageText;
    }else{
    $message = $messageSablon;
    }
    $source .= '<mesaj><metin>'. $message .'</metin><nums>' . $number . '</nums></mesaj>';
    $xml_data ='<?xml version="1.0" encoding="UTF-8"?>'.
'<smspack charset="turkish" ka="'. $username .'" pwd="'. $password .'" org="'. $title .'">'. $source .'</smspack>';
$URL = "https://smsgw.mutlucell.com/smsgw-ws/sndblkex";
$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_MUTE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$time = date('d/m/Y H:i:s');
$ekle = $DB->prepare("INSERT into sms_history set member=?, number=?, message=?, time=?");
$ekle -> execute(array($musteriID,$number,$message,$time));
}
}
}
echo $paymentKey;
}
}
