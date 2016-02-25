<?php 
include('config.php');
$query="
	select 
		*
	from
		immobili i,
		localita l,
		tipi t
	where
	    i.id_tipi=t.id_tipi and
	    i.id_localita=l.id_localita and
	    id_immobili=".$_GET['idim'];
$immobile=mysql_fetch_assoc(mysql_query($query))or die($query.mysql_error());
$lan2=$_SESSION['lan'];
if($_SESSION['lan']=='ru')
	$lan2='en';
if($immobile['id_residence']!=0)
{
	$nomeR=mysql_query("select * from immobili where id_immobili=".$immobile['id_residence']);
	$nr=mysql_fetch_assoc($nomeR);
	$nomeResidence=$nr['nome_immobile_it'];
}

$msg="Richiesta da agenziaradar.it per l'immobile ".$immobile['rif'].' '.stripslashes($immobile['localita']).' ('.$immobile['provincia'].')'.' - '.strtolower(stripslashes($immobile['nome_tipo_'.$lan2])).' '.stripslashes($immobile['nome_immobile_'.$lan2]).' '.$nomeResidence;
//Parte di controllo e stampa degli errori da mettere all'interno della pagina dove si vuole che appaiano

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Richiesta informazioni Agenzia Radar</title>
<!--  <link href="css/style.css" rel="stylesheet" type="text/css" />-->
<link href="<?php echo CSSPATH;?>popup.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="corpo">
<h3>Richiesta informazioni</h3>
<div style="" id="form_info" >
<?php 
if(isset($_POST['invio']))
{
	include(INCLUDEPATH.'controlloForm.php');
}
else
{
	$_POST['nome']='';
	$_POST['cognome']='';
	$_POST['telefono']='';
	$_POST['cellulare']='';
	$_POST['stato']='';
	$_POST['citta']='';
	$_POST['email']='';
	$_POST['note']='';
	
} 
?>
<form action="<?php echo LANFOLDER;?>form.php?idim=<?php echo $_GET['idim'];?>" method="post">
<table style="float: left; margin: 10px;width: 250px;">
<tr>
<th><?=NOME?>*</th>
<td><input type="text" name="nome" value="<?=$_POST['nome']?>"  <?php echo $classe['nome']?> /><?=$hidden?></td>
</tr>
<tr>
<th><?=COGNOME?>*</th>
<td><input type="text" name="cognome" value="<?=$_POST['cognome']?>"  <?php echo $classe['cognome']?> /></td>
</tr>
<tr>
<th><?=TELEFONO?></th>
<td><input type="text" name="telefono" value="<?=$_POST['telefono']?>"  <?php echo $classe['telefono']?> /></td>
</tr>
<tr>
<th><?=CELLULARE?></th>
<td><input type="text" name="cellulare" value="<?=$_POST['cellulare']?>"  <?php echo $classe['cellulare']?>/></td>
</tr>
<tr>
<th>Email*</th>
<td><input type="text" name="email" value="<?=$_POST['email']?>"  <?php echo $classe['email']?>/></td>
</tr>
<tr>
<th><?=STATO?></th>
<td><input type="text" name="stato" value="<?=$_POST['stato']?>"  <?php echo $classe['stato']?>/></td>
</tr>
<tr>
<th><?=CITTA?></th>
<td><input type="text" name="citta" value="<?=$_POST['citta']?>"  <?php echo $classe['citta']?>/></td>
</tr>
<tr>
<th>Codice di sicurezza:<?php $captcha=gen_password(5);?>*</th>
<td><img src="<?php echo TOTALPATH;?>captcha.php?code=<?php echo $captcha?>" class="fleft"/></td>
</tr>
<tr>
<td></td><td align="left"><input type="text" name="jpg_captcha"  id="jpg_captcha" value="" <?php echo $classe['jpg_captcha']?> ><input type="hidden" name="captcha" value="<?php echo md5(strtoupper($captcha));?>"></td>
</tr>
</table>
<table style="float: left; margin: 10px;width: 350px;">
<tr>
<th><?=NOTE?>*</th>
<td><textarea rows="10" cols="25" name="note"  <?php echo $classe['note']?>><?=stripslashes($_POST['note'])?></textarea> </td>
</tr>
<tr>
<th colspan="2"><input type="checkbox" name="privacy" value="1" checked="checked" /><?php echo LETTO;?><a href="<?php echo TOTALPATH;?>privacy-disclaimer_casa_vacanze_residence_toscana.php"  <?php echo $classe['privacy']?> target="_blank" title="<?php echo INFORMATIVA;?>"><?php echo INFORMATIVA; ?></a>.</td>
</tr> 
<td colspan="2" align="center"><input class="bottone" type="submit" name="invio" value="<?=INVIA?>" /></td>
</tr>
<tr><td colspan="2">* Campi obbligatori</td></tr>
</table>
</form>
</div>
<div class="clear"></div>
</div>

</body>
</html>