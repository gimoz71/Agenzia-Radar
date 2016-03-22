<?php include('config.php');
$get=false;
if(isset($_GET['cerca']) || isset($_GET['pag']))
{
	$get=$_GET;
}
$titolo=IMMO.' '.elencoLocalita().' Agenzia Immobiliare Radar';
$descrizione=IMMO.' '.elencoLocalita();
$keywords=elencoLocalita().elencoTipi($_SESSION['lan']);
$menu['immobili']='class="selezionato"';
$stringaGet=generaGet($_GET);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include(INCLUDEPATH.'header.php');?>
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
                                        <span class="navbar-brand"><strong>Ricerca avanzata</strong></span>
                                    </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                        <form action="<?=TOTALPATH?>immobili.php" method="get" class="navbar-form navbar-left" role="search">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Rif." name="rif">&nbsp;
                                                <select name="categoria"  class="form-control required">
                                                    <option  value=""> <?=CATEGORIA_IMMO?> </option>
                                                    <option value="residenziale" <?php if($_GET['categoria']=='residenziale') echo ' selected="selected" ';?>><?=RIC_RESIDENZIALE?></option>
                                                    <option value="commerciale" <?php if($_GET['categoria']=='commerciale') echo ' selected="selected" ';?>><?=RIC_COMMERCIALE?></option>
                                                    <option value="industriale" <?php if($_GET['categoria']=='industriale') echo ' selected="selected" ';?>><?=RIC_CAPANNONI?></option>
                                                    <option value="posto_barca" <?php if($_GET['categoria']=='posto_barca') echo ' selected="selected" ';?>><?=RIC_BARCA?></option>
                                                </select>&nbsp;
                                                <select name="localita"  class="form-control required">
                                                    <option  value=""><?=LOCALITA;?></option>
                                                    	<?php
                                                    	$zone=mysql_query("select distinct l.id_localita, localita from localita l,immobili i where i.id_localita=l.id_localita and i.pubblicato=1");
                                                    	while ($z=mysql_fetch_assoc($zone))
                                                    	{?>
                                                    	<option value="<?=$z['id_localita']?>" <?php if($_GET['localita']==$z['id_localita']) echo ' selected="selected" ';?> ><?=$z['localita']?></option>
                                                    		<?php
                                                    	}
                                                    	?>
                                                </select>&nbsp;
                                                <select  name="prezzo" class="form-control required">
                                                    <option  value=""> <?=PREZZO?> </option>
                                                		<option value="0-250000"><?=FINO?> 250.000 &euro;</option>
                                                		<option value="250001-350000">250.000 - 350.000 &euro;</option>
                                                		<option value="350001-700000">350.000 - 700.000 &euro;</option>
                                                		<option value="700001-100000000"><?=OLTRE?> 700.000 &euro;</option>
                                                </select>&nbsp;
                                            </div>
                                            <button type="submit" name="cerca" class="btn btn-primary"><?php echo CERCA;?></button>
                                        </form>
										
                                    </div>
                                </div>
								
                            </nav>
							<div class="container-fluid">
								<form method="post" action="<?=TOTALPATH?>immobili.php?<?=$stringaGet?>ordinaPrezzo=1">
												<div class="form-group">
												<button type="submit" name="cerca" value="1" class="btn btn-primary"><?php echo ORDINAPREZZO;?></button>
											</div>
										</form>
									</div>
                            <div class="line"></div>
                           
                            <?php 
							$ordina=false;
							if(isset($_GET['ordinaPrezzo']) && $_GET['ordinaPrezzo']==1)
							{
								print 'ordina';
								$ordina=true;
							};
                                $box->elencoImmobili('immobili',$_SESSION['lan'],$get,$ordina);
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