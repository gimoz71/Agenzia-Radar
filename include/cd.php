<?php
/*
$log='glorydb';
$pswd='pschiara';
$url='gloryacht.com';
$db='glory1_';
*/
$log='root';
$pswd='l0v3cr4ft';
$url='localhost';
$db='radar';

/*
$log='root';
$pswd='admin';
$url='localhost';
$db='radar';
*/

mysql_connect($url,$log, $pswd) or die(mysql_error());
mysql_select_db($db) or die("DB non trovato");
?>
