<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
function id($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '', $text);

    return $text;
}

$settings = $DB->query("select * from settings where id=1")->fetch(PDO::FETCH_ASSOC);
$appointments = $DB->query("select * from appointments order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($appointments as $appointmentsVeri) {
$serviceID = $appointmentsVeri['service'];
$providerID= $appointmentsVeri['providerID']; 
$memberID = $appointmentsVeri['member']; 


$services = $DB->query("SELECT * from services where id='$serviceID'")->fetch(PDO::FETCH_ASSOC);
$provider= $DB->query("SELECT * from provider where id='$providerID'")->fetch(PDO::FETCH_ASSOC);
$member= $DB->query("SELECT * from members where id='$memberID'")->fetch(PDO::FETCH_ASSOC);

$deger[] = array(
"id" => $services['id'],
"resourceId" => $provider['id'],
"url" => '',
"color"=> $provider['renk'],
"textColor" => $provider['yazirenk'], 
"title" => $services['serviceName'], 
"start" => $appointmentsVeri['appDate'].'T'.$appointmentsVeri['startTime'],
"end" => $appointmentsVeri['appDate'].'T'.$appointmentsVeri['endTime'],
"allDay" => false,
"extendedProps" => array(
      "calendar"=> id($provider['name']),
      "guests"=>  $appointmentsVeri['member'],
      "location"=> $appointmentsVeri['id'],
      "description"=> $appointmentsVeri['providerID'],
      "musteriAd"=> $member['name'],
      "musteriTel"=> $member['phone'],
      "calisanAd" => $provider['name'],
      "payment" => $appointmentsVeri['payment'],
      "paymentStatus" => $appointmentsVeri['paymentStatus'],
      "coming" => $appointmentsVeri['coming'],
      "paytrSystem" => $settings['paytrSystem'],
      
     )

);

}

echo json_encode($deger);
?>
