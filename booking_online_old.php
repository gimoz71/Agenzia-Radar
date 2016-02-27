<?php
include('config.php');
	
$titolo=CAS.' '.elencoLocalita().' Agenzia Immobiliare Radar';
$descrizione=CAS.' '.elencoLocalita();
$keywords=elencoLocalita().elencoTipi($_SESSION['lan']);
$menu['vacanze']='class="selezionato"';
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include(INCLUDEPATH.'header.php');?>
</head>

<body class="stretched">
<?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>

        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1>Booking online</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Booking online</li>
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
                                        <form action="<?=TOTALPATH?>booking_online.php" method="get" class="navbar-form navbar-left" role="search">
                                            <div class="form-group">
                                                <select name="Beds" id="register-form-category" class="form-control required">
                                                    <option value=""><?=POSTI_LETTO?></option>
                                                    <option value="sassofono">1</option>
                                                    <option value="piano">2</option>
                                                    <option value="batteria">3</option>
                                                </select>
                                                <input type="text" id="from" name="DateFrom" value="" class="form-control required " placeholder="<?php echo DAL;?>" />
                                                <input type="text" id="to" name="DateTo" value="" class="form-control required" placeholder="<?php echo AL;?>" />
                                            </div>
                                            <button type="submit" name="cerca" class="btn btn-primary"><?php echo CERCA;?></button>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                            <div class="line"></div>
                            <?php 
                             	$box->elencoBookingOnline($_GET, $_SESSION['lan'],$get);
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