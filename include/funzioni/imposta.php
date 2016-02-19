<?php 
include('conf.php');
include('../cd.php');
//onload="document.getElementById('attivazione').submit();"
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type"
 content="text/html; charset=iso-8859-1">
  <title>Pagamento sicuro Key-Client</title>

</head>



<body >

<!--<body>-->


<?php 

$i_imp = "";
$d_imp = "";

$s_id = $_REQUEST["s_id"];
$nome=$_REQUEST["nome"];
$cognome=$_REQUEST["cognome"];
$indirizzo=$_REQUEST["indirizzo"];
$cap=$_REQUEST["cap"];
$citta=$_REQUEST["citta"];
$provincia=$_REQUEST["provincia"];
$telefono=$_REQUEST["telefono"];
$fax=$_REQUEST["fax"];
$cellulare=$_REQUEST["cellulare"];
$email=$_REQUEST["email"];
$codTrans=$s_id.time();


$email=mysql_query("SELECT * FROM users WHERE email_address = '". $email."' ")or die(mysql_error());
$esisteEmail=mysql_num_rows($email);

$importo=trim($_REQUEST["importo"]);
$d_imp=$importo;
$i_imp=explode(',',$importo);
$floatP=false;
if(count($i_imp)==2)
{
	$d_imp=$i_imp[0].substr($i_imp[1],0,2);
	$floatP=true;
}
$i_imp=explode('.',$importo);
if(count($i_imp)==2)
{
	$d_imp=$i_imp[0].substr($i_imp[1],0,2);
	$floatP=true;
}
if($floatP===false)
{
	$d_imp=$d_imp.'00';
}
//print $d_imp;



$divisa="EUR";
$divisa1="divisa=EUR";
$importo2="importo=".$d_imp;
$chiave= "eKvxg2qDEYBXMLSEZwASPkB8lb0JsWHTTW1SKu9mda24wvaaKbSnNM5FBnFH3q097pjqqKcCt3dHfgIN9O3iCKwUp86Q43AYQLtjxAEtW1zzRFD2Wv3DTj3SDViE9l2uXU89tBo1Cw6BEQZ7rE0muHJ214AVE13FfBV3eObFWZ5sBD1O5UCqvnkdMkDsIPyheZVPnBwLlqxcQjuE1q2gYPhpucEp3VWOggKRyN7GikDJL64mxouvl39MJpLXGrF1";
$codT= "codTrans=".$codTrans;
$hash=md5($codT.$divisa1.$importo2.$chiave);
$b64=base64_encode($hash);
$urlencode=urldecode($b64);
$mac=urldecode($b64);

if($esisteEmail==0)
{
	$query="insert into users (group_id,signup_date,firstname,lastname,email_address) values (1,".time().",'".$_POST['nome']."','".$_POST['cognome']."','".$_POST['email']."')";
	mysql_query($query)or die(mysql_error());
}

?>
<form name="attivazione" action="https://ecommerce.cim-italia.it/ecomm/DispatcherServlet" method="post"  name="attivazione" id="attivazione">
<input name="cognome" value="<?php echo $_REQUEST['cognome'];?>" type="hidden">
<input name="nome" value="<?php echo $_REQUEST['nome'];?>" type="hidden">
<input name="mail" value="<?php echo $email;?>" type="hidden">
<input name="importo" value="<?php echo $d_imp;?>" type="hidden">
<input name="codTrans" value="<?php echo $codTrans;?>" type="hidden">
<input name="chiave" value="<?php echo $chiave;?>" type="hidden">
<input name="mac" value="<?php echo $mac;?>" type="hidden">
<input name="url" size="50" value="http://www.agenziaradar.it/<?php echo $_SESSION['lan'];?>/pagamenti_risposta.php" type="hidden">
<input name="divisa" value="<?php echo $divisa;?>" type="hidden">
<input name="languageId" value="ITA" size="3" type="hidden">
<input name="alias" value="payment_testm_urlmac" type="hidden">
<!--<input name="alias" value="payment_194545" type="hidden">-->
<input name="session_id" value="<?php echo $_REQUEST['s_id'];?>" type="hidden">
<input name="conferma" type="submit" value=" ">

</form>

</body>
</html>
