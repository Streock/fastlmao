<?php
session_start();
ob_start();
session_destroy();
setcookie("ERAL", 'false', time() -3600,'/');
$cookieayar = array(
	'expires' => time() + (86400 * 3000),
	'path' => '/'
);
setcookie("memberLogin", "false", $cookieayar); // 86400 = 1 day
echo " <meta http-equiv='refresh' content='0; url=login'>";
ob_end_flush();
?>