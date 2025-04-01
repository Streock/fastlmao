<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/system/settings/db.php';
session_start();
$user_id = $_SESSION['memberId'];
$providerCheckSite= $DB->prepare("select * from provider where id=?");
$providerCheckSite->execute(array($user_id));
$providerChk = $providerCheckSite->fetch(PDO::FETCH_ASSOC);
?>
<?php if($providerChk['isAdmin']!='1'){ ?>
<meta http-equiv="refresh" content="0; url=<?php echo "https://" . $_SERVER['SERVER_NAME']; ?>"> 
<?php die(); }?>