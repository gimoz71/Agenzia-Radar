<?php include('config.php');
$titolo=TITOLO_BASE_DOVE;
$keywords=KEY_DOVE;
$descrizione=DESCRIZIONE_DOVE;
$menu['dove']='class="selezionato"';
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?=LANHTML?>">
<head>
<?php include(INCLUDEPATH.'header.php');?>
    
<script language="JavaScript" type="text/javascript">
	//<![CDATA[
	function checkForm()
	{
		var err ='';
		var reg = /^[a-z0-9._-]+\@[a-z0-9._-]+\.[a-z0-9]{2,4}$/;
		if (document.getElementById('cognome').value =="") 		err += 'Inserire un valore nel campo Cognome.\n';
		if (document.getElementById('nome').value =="") 		err += 'Inserire un valore nel campo Nome.\n';
		//if (ilForm.Telefono.value =="") 	err += 'Inserire un valore nel campo Telefono.\n';
		//if (document.getElementById('messaggio').value =="") 	err += 'Inserire un valore nel campo Messaggio.\n';
		//if (document.getElementById('oggetto').value =="") 	err += 'Inserire un valore nel campo Oggetto.\n';
		if (!reg.test(document.getElementById('email').value)) err += "La mail inserita non e\' una mail valida.\n";
		if (!document.getElementById('privacy').checked) err += 'E\' necessario marcare la casella per la tutela della privacy.\n';	
		//if (document.getElementById('email').value != document.getElementById('confermaemail').value) err += 'La email inserita e quella confermata non combaciano.\n';
		if (err!='') 	alert(err);
		return (err=='');			
	}
	//]]>
	</script>	
  
  

</head>

<body class="stretched">
<div id="wrapper" class=" clearfix">
	<?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>

        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?php echo PAGAMENTI;?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?=TOTALPATH?>">Home</a></li>
                    <li class="active"><?php echo PAGAMENTI;?></li>
                </ol>
            </div>

        </section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
            <div class="content-wrap nopadding " style="padding-top: 30px !important;">

                <div class="container clearfix nobottommargin nopadding">
                    <div class="panel panel-default divcenter rounded">
                        <div class="panel-body rounded tjustify" style="padding: 20px;">
                            <div class="col_full">
                                <h3><?php echo PAGAMENTI;?></h3>
                               <form name="attivazione" action="<?php echo TOTALPATH?>include/imposta.php" method="post"  name="imposta" onsubmit="return  checkForm()" id="imposta">
		<table width="50%">
		<tbody>
		<tr>
		  <td width="45%"><?php echo COGNOME;?></td>
		  <td width="45%"><input name="cognome" id="cognome" value="<?php echo $_REQUEST['cognome'];?>" size="30" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo NOME;?></td>
		  <td><input name="nome"  id="nome" value="<?php echo $_REQUEST['nome'];?>" size="30" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo INDIRIZZO;?></td>
		  <td><input name="indirizzo"  id="indirizzo" value="<?php echo $_REQUEST['indirizzo'];?>" size="50" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo CAP;?></td>
		  <td><input name="cap"  id="cap" value="<?php echo $_REQUEST['cap'];?>" size="5" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo CITTA;?></td>
		  <td><input name="citta"  id="citta" value="<?php echo $_REQUEST['citta'];?>" size="30" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo PROVINCIA?></td>
		  <td><input name="provincia"  id="provincia" value="<?php echo $_REQUEST['provincia'];?>" size="2" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo TELEFONO?></td>
		  <td><input name="telefono"  id="telefono"  value="<?php echo $_REQUEST['telefono'];?>" size="30" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo FAX;?></td>
		  <td><input name="fax"  id="fax"  value="<?php echo $_REQUEST['fax'];?>" size="30" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo CELLULARE;?></td>
		  <td><input name="cellulare" id="cellulare"  value="<?php echo $_REQUEST['cellulare'];?>" size="30" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo EMAIL;?></td>
		  <td><input name="email"  id="email" value="<?php echo $_REQUEST['email'];?>" size="50" type="text"></td>
		  </tr>
		<tr>
		  <td><?php echo IMPORTO;?></td>
		  <td><input name="importo"  id="importo" value="<?php echo $_REQUEST['importo'];?>" size="10" type="text"></td>
		  </tr>
		
		<tr>
		  <td>&nbsp;</td>
<td> <?php echo LETTO;?> <a href="<?php echo TOTALPATH;?>privacy-disclaimer_casa_vacanze_residence_toscana.php"  <?php echo $classe['privacy']?> target="_blank" title="Informativa sulla privacy"><?php echo INFORMATIVA;?></a>.</span><input type="checkbox" id="privacy" name="privacy" value="1" /></td>
</tr>
		<tr>
		  <td>&nbsp;</td>
			<td>&nbsp;<input name="s_id"  id="s_id"  value="<?php echo $_REQUEST['s_id'];?>" type="hidden"></td>
		</tr>
		</tbody>		
		</table>
		
    	<br><input value="<?php echo CONFERMA;?>" type="submit" name="conferma">
		
		
		
		</form>
                            
                            </div>
                            
                        </div>
                    </div>
				</div>
                

      <?php 
                include INCLUDEPATH.'blog.php';
                ?>
			</div>

		</section><!-- #content end -->
<?php include(INCLUDEPATH.'footer.php');?>
</body>
</html>