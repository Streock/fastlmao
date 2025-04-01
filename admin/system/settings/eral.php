<?php

date_default_timezone_set('Europe/Istanbul');
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php'; 
$settings = $DB->query("select * from settings where id=1")->fetch(PDO::FETCH_ASSOC);

if($settings['langSystem']=='1'){
if(empty($_COOKIE['lang'])){
$language = $settings['defaultLang'];    
setcookie("lang", $language, time() + 31556926,'/');    
}else{
$language = $_COOKIE['lang']; 
}
}else{
$language = $settings['defaultLang'];    
}

$lang = $DB->prepare("SELECT key_name, value FROM translations WHERE language = :language");
$lang->bindParam(':language', $language);
$lang->execute();
$translations = [];
while ($row = $lang->fetch(PDO::FETCH_ASSOC)) {
$translations[$row['key_name']] = $row['value'];
}

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
if (isset($_POST['login'])) {
    session_start();
    $email   = htmlspecialchars(trim($_POST['email']));
    $password   = htmlspecialchars(trim($_POST['password']));
    $login = $DB->prepare("select * from provider where email=?");
    $login->execute(array($email));
    $exp = $login->fetch(PDO::FETCH_ASSOC);
    $check = $login->rowCount();
    $checkdate = date("d-m-Y H:i:s");
    if($login->rowCount()=='0'){
echo '<meta http-equiv="refresh" content="0; url=login?err=5&mail='.$email.'">'; //Mail sistemde yoksa
} else {

$dbPassword = $exp['password'];
if (password_verify($password, $dbPassword)) {
    session_start();
   $_SESSION["memberLogin"] = "true";
$_SESSION['memberId'] = 1; // Admin ID'si
    setcookie("memberLogin", "true");
//beni hatırla bas
    if ( isset($_POST['remember-me']) ) {
$UserID = $exp['id']; 
$delete = $DB->exec("DELETE FROM remember_me WHERE user_id = '$UserID' "); 
$NewToken = bin2hex(openssl_random_pseudo_bytes(32));

$Insert2 = $DB->prepare("INSERT INTO remember_me SET
    user_id = :bir,
    remember_token = :iki,
    expired_time = :uc,
    user_browser = :dort");
$insert = $Insert2->execute(array(
    "bir" => $UserID,
    "iki" => $NewToken,
    "uc" => time()+31556926,
    'dort' => md5($_SERVER['HTTP_USER_AGENT'])
));

setcookie("ERAL", $NewToken, time() + 31556926,'/');
}
//beni hatırla bitis
echo '<meta http-equiv="refresh" content="0; url=home">';
} else {
echo '<meta http-equiv="refresh" content="0; url=login?err=5&mail='.$email.'">'; //Şifre doğru değil ise
}
}
}



if (isset($_POST['randevuEkle']) ) {

}


if (isset($_POST['randevuSil'])) {

}
if (isset($_POST['rDuzenle'])) {
}
if (isset($_POST['rIptal'])) {

}

if (isset($_POST['randevuDuzenle'])) {

}




if (isset($_POST['hizmetEkle'])) {
}



if (isset($_POST['hizmetDuzenle'])) {
}

if (isset($_POST['hizmetSil'])) {

}


if (isset($_POST['calisanEkle'])) {
}

if (isset($_POST['calisanDuzenle'])) {

}


if (isset($_POST['providerSil'])) {
}



if (isset($_POST['uyeEkle'])) {
}

if (isset($_POST['uyeDuzenle'])) {
}

if (isset($_POST['uyeSil'])) {
}


if (isset($_POST['alindiEdit'])) {
}
if (isset($_POST['hatirlatmaEdit'])) {
}

if (isset($_POST['ayarKaydet'])) {
}


if (isset($_POST['smsayarKaydet'])) {

}


if (isset($_POST['profilDuzenle'])) {

}

if (isset($_POST['urunEkle'])) {
}

if (isset($_POST['urunDuzenle'])) {
}

if (isset($_POST['urunSil'])) {
}


if (isset($_POST['orderEkle'])) {
}


if($settings['vestedSystem']=='1'){
}

if($settings['caseSystem']=='1'){

}

if($settings['caseSystem']=='1'){

}


if (isset($_POST['orderUpdate'])) {
}

if (isset($_POST['orderDelete'])) {
}

if (isset($_POST['caseAdd'])) {
}

if (isset($_POST['caseEdit'])) {
}



if (isset($_POST['caseSil'])) {
}
    


if (isset($_POST['bankAdd'])) {
}
    
if (isset($_POST['bankEdit'])) {
}
    
    
    
if (isset($_POST['bankSil'])) {
}
   
  
if (isset($_POST['vestedPayed'])) {
}



 
if (isset($_POST['langAdd'])) {

}

if (isset($_POST['langUpdate'])) {
}


if (isset($_POST['langSil'])) {


}


?>