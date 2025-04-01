<?php 
date_default_timezone_set('Europe/Istanbul');
$timestamp = time();
$nowTime = date('H' ,$timestamp);
$nowTime = $nowTime.':00:00';
echo $nowTime;