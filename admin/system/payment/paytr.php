<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/eral.php';
$settingsCheck = $DB->prepare("select * from settings where id=?");
$settingsCheck->execute(array('1'));
$settings = $settingsCheck->fetch(PDO::FETCH_ASSOC);
    $post = $_POST;
    $merchant_key   = $settings['paytrKey'];
    $merchant_salt  = $settings['paytrSalt'];
    $hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
    if( $hash != $post['hash'] )
        die('PAYTR notification failed: bad hash');
    if( $post['status'] == 'success' ) {
        $paymentID = $post['merchant_oid'];
        $guncelle = $DB->prepare("UPDATE appointments SET paymentStatus=? where paymentID=?");
        $guncelle -> execute(array('1',$paymentID));
    } else {

    }
    echo "OK";
    exit;
?>