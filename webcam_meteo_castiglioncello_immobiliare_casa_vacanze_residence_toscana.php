<?php include('config.php');
$titolo=TITOLO_BASE_WEBCAM;
$keywords=KEY_WEBCAM;
$descrizione=DESCRIZIONE_WEBCAM;
$menu['dove']='class="selezionato"';
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?=LANHTML?>">
<head>
<?php include(INCLUDEPATH.'header.php');?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo TOTALPATH;?>js/jquery.gmap.js"></script>

  

</head>

<body class="stretched">

	<?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>

        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?=TITOLO_WEBCAM?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?=TOTALPATH?>">Home</a></li>
                    <li class="active"><?=TITOLO_WEBCAM?></li>
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
                                <h3><?=TITOLO_WEBCAM?></h3>
                        <p><strong>Telecamera posizionata a cura dell'AGENZIA RADAR sulla baia di Portovecchio a CASTIGLIONCELLO in direzione W</strong><br />
                	    vista stabilimento balneare Etruria e bagni Tre scogli<br />
                	   </p>
                	  <div style="margin: 5px auto"><img align="center" src="http://www.agenziaradar.it/webcam/000.jpg" /></div>
                	  <div><iframe src="http://portali.3bmeteo.com/3bm_meteo.php?loc=8193&tm=lbigor&new=1&c1=ffffff&c2=888888&b1=93c1db&b2=3a8ebd&b3=f0f0f0" width="455" height="195" frameborder="0"></iframe><br/><a href="http://www.3bmeteo.com/meteo/castiglioncello" target="_blank" >Previsioni Meteo Castiglioncello</a></div>
           
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