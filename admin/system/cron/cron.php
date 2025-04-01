<?php 
date_default_timezone_set('Europe/Istanbul');
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
$settings = $DB->query("select * from settings where id=1")->fetch(PDO::FETCH_ASSOC);
//Randevu Hatırlatma Sms
$tarih = date('Y-m-d');
//$newDate = strtotime('1 day',strtotime($tarih));
//$newDate = date('Y-m-d' ,$newDate );
$hatirlatma = $DB->query("SELECT * from notification_settings where id=2")->fetch(PDO::FETCH_ASSOC);
$saat = $hatirlatma['rememberTime'];
$timestamp = time() + $saat*60*60;
$newTime = date('H' ,$timestamp);
$newTime = $newTime.':00:00';
$randevular = $DB->query("SELECT * from appointments WHERE appDate='$tarih' and startTime='$newTime' and lastRememberNoti='0' order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($randevular as $randevularCek) {
$randevuID = $randevularCek['id'];
$hangiuye = $randevularCek['member'];
$uyeKontrol = $DB->prepare("SELECT * FROM members WHERE id=?");
$uyeKontrol->execute(array($hangiuye));
$uyeKontrolDeger = $uyeKontrol ->fetch(PDO::FETCH_ASSOC);

$randevuTarih = $randevularCek['appDate'];
$saat = $randevularCek['startTime'];
$service = $randevularCek['service'];
$serviceKontrol = $DB->prepare("SELECT * FROM services WHERE id=?");
$serviceKontrol->execute(array($service));
$serviceKontrolDeger = $serviceKontrol ->fetch(PDO::FETCH_ASSOC);

//mutlucell
    if($settings['smsSystem']=='1'){ //sms bildirim
        $notification_settings = $DB->query("select * from notification_settings where id=2")->fetch(PDO::FETCH_ASSOC);
        if($notification_settings['status']=='1'){
            $smsSettings = $DB->prepare("select * from sms_settings where id=?");
            $smsSettings->execute(array('1'));
            $sms = $smsSettings->fetch(PDO::FETCH_ASSOC);
            $username = $sms['username'];
            $password = $sms['password'];
            $title = $sms['title'];
            $number = $uyeKontrolDeger['phone'];
            $siteadresi = "https://".$_SERVER['SERVER_NAME'];
            $siteAdi = $settings['siteName'];
            $musteriAdiNe = $uyeKontrolDeger['name'];
            
            $sablon = $DB->prepare("select * from notification_settings where id=?");
            $sablon->execute(array('2'));
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
         
            $message = $messageSablon;
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
            $ekle -> execute(array($hangiuye,$number,$message,$time));
            $guncelle = $DB->prepare("UPDATE appointments set lastRememberNoti=? WHERE id=?");
            $guncelle -> execute(array('1',$randevuID));
            }
            }


}

//Randevu Hatırlatma Sms




//Tekrarlama Sms
$notification_settings = $DB->query("select * from notification_settings where id=3")->fetch(PDO::FETCH_ASSOC);
if($notification_settings['status']=='1'){
        
    $randevular = $DB->query("SELECT * from appointments WHERE rememberNoti='0' order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
    foreach ($randevular as $randevularCek) {
        $randevuID = $randevularCek['id'];
        $service = $randevularCek['service'];
        $serviceKontrol = $DB->prepare("SELECT * FROM services WHERE id=?");
        $serviceKontrol->execute(array($service));
        $serviceKontrolDeger = $serviceKontrol ->fetch(PDO::FETCH_ASSOC);
        $againDay = $serviceKontrolDeger['againDay'];

        $hangiuye = $randevularCek['member'];
        $uyeKontrol = $DB->prepare("SELECT * FROM members WHERE id=?");
        $uyeKontrol->execute(array($hangiuye));
        $uyeKontrolDeger = $uyeKontrol ->fetch(PDO::FETCH_ASSOC);


        $suan = date('Y-m-d');
        $tarih = $randevularCek['appDate'];
        $newDate = strtotime($againDay.' day',strtotime($tarih));
        $newDate = date('Y-m-d' ,$newDate );

        if($suan==$newDate && $againDay!='0'){
            if($settings['smsSystem']=='1'){ //sms bildirim
        
            $smsSettings = $DB->prepare("select * from sms_settings where id=?");
            $smsSettings->execute(array('1'));
            $sms = $smsSettings->fetch(PDO::FETCH_ASSOC);
            $username = $sms['username'];
            $password = $sms['password'];
            $title = $sms['title'];
            $number = $uyeKontrolDeger['phone'];
            $siteadresi = "https://".$_SERVER['SERVER_NAME'];
            $siteAdi = $settings['siteName'];
            $musteriAdiNe = $uyeKontrolDeger['name'];
            
            $sablon = $DB->prepare("select * from notification_settings where id=?");
            $sablon->execute(array('3'));
            $sablonCek = $sablon->fetch(PDO::FETCH_ASSOC);
            $messageSablon = $sablonCek['template'];
           
            $hizmetNe = $serviceKontrolDeger['serviceName'] ;
           
            $messageSablon = str_replace('{siteAdi}', $siteAdi, $messageSablon);
            $messageSablon = str_replace('{uyeAdi}', $musteriAdiNe, $messageSablon);
            $messageSablon = str_replace('{hizmet}', $hizmetNe, $messageSablon);
            
            $message = $messageSablon;
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
            $ekle -> execute(array($hangiuye,$number,$message,$time));
            $guncelle = $DB->prepare("UPDATE appointments set rememberNoti=? WHERE id=?");
            $guncelle -> execute(array('1',$randevuID));

                    
            }
         }


    }


}



//Tekrarlama Sms

//Randevu Hatırlatma Çalışan Sms
if($settings['providerSmsSystem']=='1'){
$tarih = date('Y-m-d');
//$newDate = strtotime('1 day',strtotime($tarih));
//$newDate = date('Y-m-d' ,$newDate );
$saat = $settings['providerSmsTime'];
$timestamp = time() + $saat*60*60;
$newTime = date('H' ,$timestamp);
$newTime = $newTime.':00:00';
$randevular = $DB->query("SELECT * from appointments WHERE appDate='$tarih' and startTime='$newTime' and providerNoti='0' order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($randevular as $randevularCek) {
$randevuID = $randevularCek['id'];
$hangiprovider = $randevularCek['providerID'];
$providerKontrol = $DB->prepare("SELECT * FROM provider WHERE id=?");
$providerKontrol->execute(array($hangiprovider));
$providerKontrolDeger = $providerKontrol ->fetch(PDO::FETCH_ASSOC);

$randevuTarih = $randevularCek['appDate'];
$saat = $randevularCek['startTime'];
$service = $randevularCek['service'];
$serviceKontrol = $DB->prepare("SELECT * FROM services WHERE id=?");
$serviceKontrol->execute(array($service));
$serviceKontrolDeger = $serviceKontrol ->fetch(PDO::FETCH_ASSOC);

//mutlucell
if($settings['smsSystem']=='1'){ //sms bildirim
    if($providerKontrolDeger['smsNoti']=='1'){
        $smsSettings = $DB->prepare("select * from sms_settings where id=?");
        $smsSettings->execute(array('1'));
        $sms = $smsSettings->fetch(PDO::FETCH_ASSOC);
        $username = $sms['username'];
        $password = $sms['password'];
        $title = $sms['title'];
        $number = $providerKontrolDeger['smsNumber'];
        $siteadresi = "https://".$_SERVER['SERVER_NAME'];
        $siteAdi = $settings['siteName'];
        $musteriAdiNe = $uyeKontrolDeger['name'];
        $calisanAdiNe = $providerKontrolDeger['name'];
        
        $tarihNe = $randevuTarih;
        $saatNe = $saat;
        $hizmetNe = $serviceKontrolDeger['serviceName'] ;
        setlocale(LC_TIME,'turkish');
        $tarihNe = iconv('latin5','utf-8',strftime(' %d %B %Y %A ',strtotime($tarihNe)));
        $saatNe = new DateTime($saatNe);
        $saatNe = $saatNe->format("H:i");
        
    
        $messageSablon = "Merhaba, ".$calisanAdiNe." 1 saat sonra randevunuz var. Müşteri: ".$musteriAdiNe." Hizmet: ". $hizmetNe;
        
        $message = $messageSablon;
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
        $ekle -> execute(array($hangiuye,$number,$message,$time));
        $guncelle = $DB->prepare("UPDATE appointments set providerNoti=? WHERE id=?");
        $guncelle -> execute(array('1',$randevuID));
        }
        }


}

}
//Randevu Hatırlatma Çalışan Sms



//Doğum günü kampanya mesajı
$timestamp = time();
$nowTime = date('H' ,$timestamp);
$nowTime = $nowTime.':00:00';
$tarih = date('m-d');
if($settings['birthdaySystem']=='1'){
$notification_settings = $DB->query("select * from notification_settings where id=5")->fetch(PDO::FETCH_ASSOC);
if($notification_settings['status']=='1'){
$dogumgunu = $DB->query("SELECT * from members WHERE MONTH(birthday) = MONTH(CURDATE()) and DAY(birthday) = DAY(CURDATE()) and birthdayTime='$nowTime' order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($dogumgunu as $dogumgunuVeri) {
if($settings['smsSystem']=='1'){ //sms bildirim
$smsSettings = $DB->prepare("select * from sms_settings where id=?");
$smsSettings->execute(array('1'));
$sms = $smsSettings->fetch(PDO::FETCH_ASSOC);
$username = $sms['username'];
$password = $sms['password'];
$title = $sms['title'];


$siteAdi = $settings['siteName'];
$hangiuye = $dogumgunuVeri['id'];
$name = $dogumgunuVeri['name'];
$number = $dogumgunuVeri['phone'];
$siteadresi = "https://".$_SERVER['SERVER_NAME'];

$sablon = $DB->prepare("select * from notification_settings where id=?");
$sablon->execute(array('5'));
$sablonCek = $sablon->fetch(PDO::FETCH_ASSOC);
$messageSablon = $sablonCek['template'];

$messageSablon = str_replace('{uyeAdi}', $name, $messageSablon);
$messageSablon = str_replace('{siteAdres}', $siteadresi, $messageSablon);
$messageSablon = str_replace('{siteAdi}', $siteAdi, $messageSablon);
$message = $messageSablon;
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
$ekle -> execute(array($hangiuye,$number,$message,$time));
}
} 
}
}
//Doğum günü kampanya mesajı



//Memnuniyet
$tarih = date('Y-m-d');
//$newDate = strtotime('1 day',strtotime($tarih));
//$newDate = date('Y-m-d' ,$newDate );
$memnuniyet = $DB->query("SELECT * from notification_settings where id=6")->fetch(PDO::FETCH_ASSOC);
$saat = $memnuniyet['rememberTime'];
$timestamp = time() - $saat*60*60;
$newTime = date('H' ,$timestamp);
$newTime = $newTime.':00:00';
$randevular = $DB->query("SELECT * from appointments WHERE appDate='$tarih' and startTime='$newTime' and memnuniyetNoti='0' order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($randevular as $randevularCek) {
$randevuID = $randevularCek['id'];
$hangiuye = $randevularCek['member'];
$uyeKontrol = $DB->prepare("SELECT * FROM members WHERE id=?");
$uyeKontrol->execute(array($hangiuye));
$uyeKontrolDeger = $uyeKontrol ->fetch(PDO::FETCH_ASSOC);

$randevuTarih = $randevularCek['appDate'];
$saat = $randevularCek['startTime'];
$service = $randevularCek['service'];
$serviceKontrol = $DB->prepare("SELECT * FROM services WHERE id=?");
$serviceKontrol->execute(array($service));
$serviceKontrolDeger = $serviceKontrol ->fetch(PDO::FETCH_ASSOC);

//mutlucell
    if($settings['smsSystem']=='1'){ //sms bildirim
        $notification_settings = $DB->query("select * from notification_settings where id=6")->fetch(PDO::FETCH_ASSOC);
        if($notification_settings['status']=='1'){
            $smsSettings = $DB->prepare("select * from sms_settings where id=?");
            $smsSettings->execute(array('1'));
            $sms = $smsSettings->fetch(PDO::FETCH_ASSOC);
            $username = $sms['username'];
            $password = $sms['password'];
            $title = $sms['title'];
            $number = $uyeKontrolDeger['phone'];
            $siteadresi = "https://".$_SERVER['SERVER_NAME'];
            $siteAdi = $settings['siteName'];
            $musteriAdiNe = $uyeKontrolDeger['name'];
            
            $sablon = $DB->prepare("select * from notification_settings where id=?");
            $sablon->execute(array('6'));
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
            $messageSablon = str_replace('{siteAdres}', $siteadresi, $messageSablon);
         
            $message = $messageSablon;
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
            $ekle -> execute(array($hangiuye,$number,$message,$time));
            $guncelle = $DB->prepare("UPDATE appointments set memnuniyetNoti=? WHERE id=?");
            $guncelle -> execute(array('1',$randevuID));
            }
            }


}

//Memnuniyet
?>