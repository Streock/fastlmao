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
$provider = $DB->query("select * from provider WHERE working='1' order by id desc")->fetchAll(PDO::FETCH_ASSOC); 
foreach ($provider as $providerVeri) {
if(empty($providerVeri['photo'])){
$providerVeri['photo']="no-photo.png";
}
$deger[] = array(
"id" => $providerVeri['id'],
"title" => $providerVeri['name'],
"html"=> '<span class="avatar"><img class="round" src="app-assets/images/profile/'.$providerVeri['photo'].'" alt="avatar" height="40" width="40"></span>',
);
}

echo json_encode($deger);
?>
