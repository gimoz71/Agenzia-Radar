<?php include('config.php');
$msg = "Il pagamento è stato ricevuto con successo.";
if($_REQUEST['esito']=="KO"){
    $msg = "Si è verificato un'errore durante il pagamento: contatta i nostri uffici per ulteriori informazioni.";
}
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
                <h1><?php echo FINE_PAGAMENTI;?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?=TOTALPATH?>">Home</a></li>
                    <li class="active"><?php echo FINE_PAGAMENTI;?></li>
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
                                <h3><?php echo FINE_PAGAMENTI;?></h3>
                               <p>
              <?php echo $msg;?>
              </p>
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