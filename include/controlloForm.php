<?php
session_start();
$email='info@agenziaradar.it';

$contatti=array(    
    array(
      'nome'=>'nome',
      'label'=>'Nome',
      'tipo'=>'text'
    ),
   array(
      'nome'=>'cognome',
      'label'=>'Cognome',
      'tipo'=>'text'
    ), 
     array(
      'nome'=>'telefono',
      'label'=>'Telefono',
      'tipo'=>'text'
    ),
    array(
      'nome'=>'cellulare',
      'label'=>'Cellulare',
      'tipo'=>'text'
    ),
    array(
      'nome'=>'email',
      'label'=>'E-mail',
      'tipo'=>'text'
    ),
    array(
      'nome'=>'stato',
      'label'=>'Stato',
      'tipo'=>'text'
    ),
    array(
      'nome'=>'citta',
      'label'=>'Citta',
      'tipo'=>'text'
    ),
     array(
      'nome'=>'note',
      'label'=>'Note',
      'tipo'=>'text'
    )
  );

    $classe=array();
	if($_POST['privacy']!='1')
	{
		$classe['privacy']=' style="color:red;" ';
	}
	if ($_POST['nome']=='' && $_POST['nome']=='')
	{
		$classe['nome']=' class="bordoRosso" ';
	}
    if ($_POST['cognome']=='' && $_POST['cognome']=='')
	{
		$classe['cognome']=' class="bordoRosso" ';
	}
	if ($_POST['note']=='')
	{
		$classe['note']=' class="bordoRosso" ';
	}
	if(md5(strtoupper($_POST['jpg_captcha']))!=$_POST['captcha'])
	{
		$classe['jpg_captcha']=' class="bordoRosso" ';
		$msg=$msg.'Violazione capcha';
	}
	if ($_POST['email']=='' || !eregi("[a-z0-9][_\.a-z0-9-]+@([a-z0-9][0-9a-z-]+\.)+([a-z]{2,4})", $_POST['email']))
	{
		$classe['email']=' class="bordoRosso" ';;
	}
	
    if(count($classe)==0)
	{
		unset($_POST['invia']);
		unset($_POST['privacy']);
		$query="insert into users (group_id,signup_date,firstname,lastname,email_address) values (2,".time().",'".$_POST['nome']."','".$_POST['cognome']."','".$_POST['email']."')";
		//print $query;
		if(invioRichiesta($_POST,$contatti,$email,$msg))
		{
			$esiste=mysql_query("select * from users where email_address='".$_POST['email']."'");
			if(mysql_num_rows($esiste)==0)
			{
				mysql_query("insert into users (group_id,signup_date,firstname,lastname,email_address) values (2,".time().",'".$_POST['nome']."','".$_POST['cognome']."','".$_POST['email']."')")or die(mysql_error());
			}
			echo('<p class="successo"><img src="'.IMAGESPATH.'/check.png" width="29" height="29" /> Richiesta inviata con successo</p>');
			unset($_POST);
		}
		else
		{
			echo("<p style=\"color: red;\">ATTENZIONE: Invio della richiesta momentaneamente sospesa: si prega di riprovare pi&ugrave; tardi</p>");
		}
	}
	else 
	{
		echo '<p class="errore""><img src="'.IMAGESPATH.'/error.png" width="29" height="29" /> ATTENZIONE: i campi evidenziati in rosso sono obbligatori.</p>';
	}
?>