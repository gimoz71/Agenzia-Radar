<div style="" id="form_info" >
<?php
session_start(); 
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
	$_POST['richiesta']='';	
}
 
?>
<form action="<?php echo $url;?>" method="post">
<table style="float: left; margin: 10px;width: 300px;">
<tr>
<th><?=NOME?></th>
<td><input type="text" name="nome" value="<?=$_POST['nome']?>"  <?php echo $classe['nome']?> /><?=$hidden?></td>
</tr>
<tr>
<th><?=COGNOME?></th>
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
<th>Email</th>
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
<table style="float: left; margin: 10px;width: 300px;">
<tr>
<th><?=NOTE?></th>
<td><textarea rows="10" cols="25" name="note"  <?php echo $classe['note']?>><?=stripslashes($_POST['note'])?></textarea> </td>
</tr>
<tr>
<th colspan="2"><?php echo LETTO;?><a href="<?php echo TOTALPATH;?>privacy-disclaimer_casa_vacanze_residence_toscana.php"  <?php echo $classe['privacy']?> target="_blank" title="<?php echo INFORMATIVA;?>"><?php echo INFORMATIVA; ?></a>.</span><input type="checkbox" name="privacy" value="1" checked="checked" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input class="bottone" type="submit" name="invio" value="<?=INVIA?>" /></td>
</tr>
</table>
</form>
</div>