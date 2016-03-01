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
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo TOTALPATH;?>js/jquery.gmap.js"></script>


</head>

<body class="stretched">
<div id="wrapper" class=" clearfix">
	<?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>

        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?=TITOLO_DOVE?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?=TOTALPATH?>">Home</a></li>
                    <li class="active"><?=ucfirst(TITOLO_DOVE)?></li>
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
                                <h3><?=TITOLO_DOVE2?></h3>
                                <img src="<?=TOTALPATH?>images/custom/castiglioncello2.jpg" class="thumbnail fleft rightmargin-xs" alt=""><?php echo CONTENUTODOVESIAMO;?> 
                            <div class="line"></div>
                          
                                <div class="gmap" id="google-map2" style="height: 300px"></div>
  <script type="text/javascript">

                                    $('#google-map2').gMap({

                                        address: 'Via Aurelia N° 548 Castiglioncello',
                                        maptype: 'HYBRID',
                                        zoom: 12,
                                        markers: [
                                            {
                                                address: "Via Aurelia N° 548 Castiglioncello"
                                            }
                                        ],
                                        doubleclickzoom: false,
                                        controls: {
                                            panControl: true,
                                            zoomControl: true,
                                            mapTypeControl: false,
                                            scaleControl: false,
                                            zoom: 17,
                                            streetViewControl: false,
                                            overviewMapControl: false
                                        }

                                    });

                                </script>
                          
                            
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