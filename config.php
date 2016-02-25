<?php session_start();
$lg='';
if(isset($_GET))
{
	foreach ($_GET as $k=>$v)
	{
		if($k!='lan')
			$lg.=$k.'='.$v.'&';
	}
	if($lg!='')
		$lg='?'.$lg;
}
    //define('TOTALPATH','http://');
    define('TOTALPATH','http://local.radar.it/');
    define('TOTALPATHREMOTE','http://local.radar.it/');
	define('INCLUDEPATH','include/');
	define('CLASSPATH','include/classi/');
	define('FUNCTIONPATH','include/funzioni/');
	define('CSSPATH',TOTALPATH.'css/');
	define('JSPATH',TOTALPATH.'js/');
	define('IMAGESPATH',TOTALPATH.'images/');
	define('REMOTEIMAGESPATH',TOTALPATHREMOTE.'images/');
	define('LAN_INCLUDEPATH','../include/funzioni/');
	define('PATHROOT','../');
  if(!isset($_SESSION['lan']))    
    $_SESSION['lan']='it';
   if(isset($_GET['lan']))
   	$_SESSION['lan']=$_GET['lan']; 
   define('LANFOLDER',TOTALPATH.$_SESSION['lan'].'/');
   include('include/'.$_SESSION['lan'].'.php');
   include(INCLUDEPATH.'cd.php');
   include(FUNCTIONPATH.'utilita.php');
   include(CLASSPATH.'box.class.php');
   include(CLASSPATH.'bncscripts_rss.php');
   $box=new box($desPrezzo);
   ?>
