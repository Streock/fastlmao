<?php 
ob_start(); 
error_reporting(0);
//error_reporting(E_ALL);
session_start();
define('DB_DRIVER', 'mysql');
define('DB_SERVER', '{[DB_HOST]}');
define('DB_SERVER_USERNAME', '{[DB_USER]}');
define('DB_SERVER_PASSWORD', '{[DB_PASS]}');
define('DB_DATABASE', '{[DB_NAME]}');
$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}
?>