<?php
/*
$log='glorydb';
$pswd='pschiara';
$url='gloryacht.com';
$db='glory1_';
*/
$log='Sql815747';
$pswd='x5p8n2194u';
$url='62.149.150.179';
$db='Sql815747_1';

/*
$log='root';
$pswd='admin';
$url='localhost';
$db='radar';
*/

mysql_connect($url,$log, $pswd) or die(mysql_error());
mysql_select_db($db) or die("DB non trovato");
?>
