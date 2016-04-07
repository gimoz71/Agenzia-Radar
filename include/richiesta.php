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
<div class="col_full">
    <label><?=NOME?>*</label>
    <input type="text" name="nome" value="<?=$_POST['nome']?>" class="form-control required <?php echo $classe['nome']?>"  /><?=$hidden?>
</div>
    
<div class="col_half">
    <label><?=TELEFONO?></label>
    <input type="text" name="telefono" value="<?=$_POST['telefono']?>" class="form-control required <?php echo $classe['telefono']?>"  />
</div>

<div class="col_half col_last">
    <label>Email*</label>
    <input type="text" name="email" value="<?=$_POST['email']?>" class="form-control required <?php echo $classe['email']?>" />
</div>

<div class="col_full">
    <label><?=NOTE?>*</label>
    <textarea rows="10" cols="25" name="note" class="form-control required <?php echo $classe['note']?>" ><?=stripslashes($_POST['note'])?></textarea>
</div>
<div class="col_full">
    <label>Codice di sicurezza*</label><br>
    <?php $captcha=gen_password(5);?>
    <img style="margin-bottom: 10px" src="<?php echo TOTALPATH;?>captcha.php?code=<?php echo $captcha?>" class="fleft"/><br><br>
    <input type="text" name="jpg_captcha" style="margin-top: 15px;" class="form-control required <?php echo $classe['jpg_captcha']?>"  id="jpg_captcha" value=""  ><input type="hidden" name="captcha" value="<?php echo md5(strtoupper($captcha));?>">
</div>
<div class="col_full">
    <input type="checkbox" name="privacy" value="1" class="required" checked="checked" style="margin-right: 20px;" /> <label><?php echo LETTO;?>*</label>
    <a href="<?php echo TOTALPATH;?>privacy-disclaimer_casa_vacanze_residence_toscana.php"  <?php echo $classe['privacy']?> target="_blank" title="<?php echo INFORMATIVA;?>"><?php echo INFORMATIVA; ?></a>.</span>
</div>
<div class="col_full">
    <input class="button button-primary" type="submit" name="invio" value="<?=INVIA?>" />
</div>
</form>
</div>