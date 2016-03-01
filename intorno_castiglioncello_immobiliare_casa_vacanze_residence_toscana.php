<?php include('config.php');
$titolo=TITOLO_BASE_INTORNO;
$keywords=KEY_INTORNO;
$descrizione=DESCRIZIONE_INTORNO;
$menu['dintorni']='class="selezionato"';
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
                <h1><?=TITOLO_INTORNO?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?=TOTALPATH?>">Home</a></li>
                    <li class="active"><?=TITOLO_INTORNO?></li>
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
                                <h3><?=TITOLO_INTORNO?></h3>
                        <?php echo CONTENUTOINTORNO;?> 
				        <p><img src="<?=TOTALPATH?>images/custom/romito.jpg" class="thumbnail"  alt="Panorama di Castiglioncello"></p>
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