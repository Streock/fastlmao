<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
session_start();
if ( !isset($_SESSION['memberLogin']) || $_SESSION['memberLogin'] != 'true' ) {
if ( isset($_COOKIE['ERAL']) and $_COOKIE['ERAL'] != 'false' ) {

$CookieToken = $_COOKIE['ERAL'];
$Browser     = md5($_SERVER['HTTP_USER_AGENT']); 
$time        = time(); 
$query = $DB->query("SELECT * FROM remember_me WHERE remember_token = '{$CookieToken}' and user_browser = '$Browser' and expired_time > $time ")->fetch(PDO::FETCH_ASSOC);

if ($query) {

$CookieUser = $query['user_id'];
$CheckUser = $DB->query("SELECT * FROM provider WHERE id = '{$CookieUser}' ")->fetch(PDO::FETCH_ASSOC); 

if ( $CheckUser ) {

  $_SESSION["memberLogin"] = "true";
  $_SESSION['memberId'] = $CheckUser['id'];
  echo '<meta http-equiv="refresh" content="0; url=/admin/appointments">';

} else {
  setcookie("ERAL", 'false', time() -3600,'/');
  header("Location:/admin/login");
  exit;

}

} else {
  setcookie("ERAL", 'false', time() -3600,'/');
  header("Location:/admin/login");
  exit;

}

}else{
  setcookie("ERAL", 'false', time() -3600,'/');
  header("Location:/admin/login");
  exit;
}
}