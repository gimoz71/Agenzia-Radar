<?php include('config.php');
$get=false;
if(isset($_GET['cerca']) || isset($_GET['pag']))
{
	$get=$_GET;
}
	
$titolo=CAS.' '.elencoLocalita().' Agenzia Immobiliare Radar';
$descrizione=CAS.' '.elencoLocalita();
$keywords=elencoLocalita().elencoTipi($_SESSION['lan']);
$menu['vacanze']='class="selezionato"';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include(INCLUDEPATH.'header.php');?>
<script type="text/javascript" src="<?php echo TOTALPATH;?>js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?php echo TOTALPATH;?>js/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo TOTALPATH;?>js/jquery-ui.structure.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo TOTALPATH;?>js/jquery-ui.theme.min.css" type="text/css" />    
<script type="text/javascript" >
$(function() {
	
  $( "#from" ).datepicker({
	  numberOfMonths: 1,
      showButtonPanel: false,
      dateFormat: 'dd-mm-yy',
		monthNames: [
				'<?php echo GENNAIO ?>',
				'<?php echo FEBBRAIO ?>',
				'<?php echo MARZO ?>',
				'<?php echo APRILE ?>',
				'<?php echo MAGGIO ?>',
				'<?php echo GIUGNO ?>',
				'<?php echo LUGLIO ?>',
				'<?php echo AGOSTO ?>',
				'<?php echo SETTEMBRE ?>',
				'<?php echo OTTOBRE ?>',
				'<?php echo NOVEMBRE ?>',
				'<?php echo DICEMBRE ?>'],  
    onClose: function( selectedDate ) {
      $( "#to" ).datepicker( "option", "minDate", selectedDate );
    }
  });
  $( "#to" ).datepicker({
	  numberOfMonths: 1,
      showButtonPanel: false,
      dateFormat: 'dd-mm-yy',
		monthNames: [
				'<?php echo GENNAIO ?>',
				'<?php echo FEBBRAIO ?>',
				'<?php echo MARZO ?>',
				'<?php echo APRILE ?>',
				'<?php echo MAGGIO ?>',
				'<?php echo GIUGNO ?>',
				'<?php echo LUGLIO ?>',
				'<?php echo AGOSTO ?>',
				'<?php echo SETTEMBRE ?>',
				'<?php echo OTTOBRE ?>',
				'<?php echo NOVEMBRE ?>',
				'<?php echo DICEMBRE ?>'],
    onClose: function( selectedDate ) {
      //$( "#from" ).datepicker( "option", "maxDate", selectedDate );
    }
  });
});
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
                <h1>Immobili in vendita</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Immobili</li>
                </ol>
            </div>

        </section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
            <div class="content-wrap nopadding " style="padding-top: 30px !important;">
                <div class="container clearfix nobottommargin nopadding">
                    <div class="panel panel-default divcenter rounded">
                        <div class="panel-body rounded" style="padding: 20px;">
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <span class="navbar-brand"><strong><?php echo RICERCA;?></strong></span>
                                    </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                         <form action="<?=TOTALPATH?>booking_online.php" method="get" class="navbar-form navbar-left" role="search">
                                            <div class="form-group">
                                                <select name="posti" id="register-form-category" class="form-control required">
                                                    <option value=""><?=POSTI_LETTO?></option>
                                                         <?php
                                                    		for ($i=1;$i<=10;$i++)
                                                    		{?>
                                                                    	      <option value="<?=$i?>" <?php if(isset($_GET['posti']) && $_GET['posti']!='' && $_GET['posti']==$i) echo ' selected="selected" ';?>>
                                                                   	          <?=$i?>
                                                                   	          </option>
                                                                    	      <?php
                                                    		}
                                                    		?>
                                                </select>
                                                <select name="periodo" class="form-control required">
                                                    <option value=""> <?php echo PERIODO?> </option>
                                                    <option value="maggio"> <?php echo MAGGIO?></option>
                                                    <option value="giugno"> <?php echo GIUGNO?></option>
                                                    <option value="luglio"> <?php echo LUGLIO?></option>
                                                    <option value="agosto"> <?php echo AGOSTO?></option>
                                                    <option value="settembre"><?php echo SETTEMBRE?></option>
                                                    <option value="altro"> <?php echo ALTRO_PERIODO?></option>
                                                  </select>
                                            </div>
                                            <button type="submit" name="cerca" class="btn btn-primary"><?php echo CERCA;?></button>
                                        </form>
                                    </div>
                                </div>
                            </nav>

                            <div class="line"></div>
                           
                            <?php 
                                           
                	$box->elencoImmobiliVacanze('case_vacanza',$_SESSION['lan'],$get);
                ?>
                        
                           
                        </div>
                    </div>
				</div>
                <?php include INCLUDEPATH.'blog.php';?>
			</div>

		</section><!-- #content end -->
<?php include INCLUDEPATH.'footer.php';?>
</body>
</html>