<?php include('config.php'); 
$titolo=TITOLO_BASE_INDEX;
$descrizione=DESCRIZIONE_INDEX;
$keywords=KEY_INDEX;

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
	 minDate: 0,
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
	  minDate: 0,
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

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class=" clearfix">
        
        <?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>

        <section id="slider" class="slider-parallax swiper_wrapper clearfix" style="border-bottom: solid 1px rgba(255,255,255,.25)" data-class-lg="nothidden" data-class-md="nothidden" data-class-sm="nothidden" data-class-xs="hidden" data-class-xxs="hidden">
            <div class="center dark" style="color: #fff; position: absolute; top: 10px; z-index: 100; width: 100%;">
                <h1 style="font-family: 'Kaushan Script';text-shadow: 2px 2px rgba(0,0,0,.5); font-size: 40px">Costa degli Etruschi Toscana</h1>
            </div>

			<div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
					<div class="swiper-slide dark" style="background-image: url('<?=TOTALPATH?>images/custom/slider-1.jpg'); background-position: center center;"></div>
					<div class="swiper-slide dark" style="background-image: url('<?=TOTALPATH?>images/custom/slider-2.jpg'); background-position: center center;"></div>
					<div class="swiper-slide dark" style="background-image: url('<?=TOTALPATH?>images/custom/slider-3.jpg'); background-position: center center;"></div>
					<div class="swiper-slide dark" style="background-image: url('<?=TOTALPATH?>images/custom/slider-4.jpg'); background-position: center center;"></div>
					<div class="swiper-slide dark" style="background-image: url('<?=TOTALPATH?>images/custom/slider-5.jpg'); background-position: center center;"></div>
					<!-- <div class="swiper-slide dark" style="background-image: url('<?=TOTALPATH?>images/custom/slider-6.jpg'); background-position: center center;"></div> -->
				</div>
				<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
			</div>

			<script>
                jQuery(document).ready(function($){
                    var swiperSlider = new Swiper('.swiper-parent',{
                        paginationClickable: false,
                        slidesPerView: 1,
                        autoplay: 5000,
						effect: 'flip',
                        loop: true,
                        speed: 5000,
                        progress: true,
                        grabCursor: false
                    });

                    $('#slider-arrow-left').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipePrev();
                    });

                    $('#slider-arrow-right').on('click', function(e){
                        e.preventDefault();
                        swiperSlider.swipeNext();
                    });
                });
			</script>

		</section>

		<!-- Content
		============================================= -->
		<section id="content">
            <div class="content-wrap nopadding">
               <div class="section nomargin " style="padding: 40px 0 ; background: url('<?=TOTALPATH?>images/custom/bg-small-area.jpg') no-repeat center center; background-size: cover" data-class-xxs="nothidden" data-class-xs="nothidden" data-class-sm="hidden" data-class-md="hidden" data-class-lg="hidden">
                   <div class="container clearfix nopadding">
                        <div class="coll_full custom-col-padding notoppadding nobottompadding">
                            <form action="<?=LANFOLDER?>immobili.php" class="nomargin">
                                <button class="button button-blue button-3d btn-block button-rounded nomargin"><?=IMMOBILIVENDITA?></button>
                            </form>  
                            <div class="divider" style="margin: 10px 0"></div>
                            <form action="<?=LANFOLDER?>residence.php" class="nomargin">
                                <button class="button button-blue button-3d btn-block button-rounded nomargin"><?=PRENOTAVACANZA?> <?php echo ESTATE?> <?php echo indicaAnno();?></button>
                            </form>
                            <div class="divider" style="margin: 10px 0"></div>
                            <form action="<?=LANFOLDER?>offerte.php" class="nomargin">
                                <button class="button button-blue button-3d btn-block button-rounded nomargin"><?=ALTREOFFERTE?></i></button>
                            </form>
                            <div class="divider" style="margin: 10px 0"></div>
                            <a href="tel:+390586752596"><button class="button button-blue button-3d btn-block button-rounded nomargin"><i class="icon-call"></i> <?=CHIAMA?> </button></a>
                        </div>
                    </div>
                </div>
                <div class="container clearfix nobottommargin nopadding"  data-class-xxs="hidden" data-class-xs="hidden" data-class-sm="nothidden" data-class-md="nothidden" data-class-lg="nothidden" style="padding-top: 30px !important;">
                    <div class="col_one_third">
                        <div class="panel panel-default divcenter rounded sell-lighter">
                            <div class="fancy-title center nomargin" style="padding: 10px 15px;" data-height-lg="40" data-height-md="65" data-height-sm="65" data-height-xs="auto" data-height-xxs="auto">
                                <h4 class="sell" style="background: transparent"><i class="icon-home2"></i> <?=IMMOBILIVENDITA?> </h4>
                            </div>

                            <div class="divider divider-border divider-darker divider-center nomargin">
                                <i class="icon-arrow-down2"></i>
                            </div>
                            <div class="panel-body rounded" style="padding: 20px; padding-top: 10px">
                                <div class="panel panel-default divcenter rounded " style="background: rgba(255,255,255,.8)">
                                    <div class="panel-body rounded" style="padding: 20px;">
                                        <form action="<?=TOTALPATH?>immobili.php" method="get" class="nomargin">
                                            <div class="col_full">
                                                <input  type="text" name="rif" size="4"  class="form-control required" placeholder="Rif." />
                                                </div>
                                            <div class="col_full">
                                                <select id="register-form-category" name="categoria"  class="form-control required">
                                                    <option  value=""> <?=CATEGORIA_IMMO?> </option>
                                                    <option value="residenziale" <?php if($_GET['categoria']=='residenziale') echo ' selected="selected" ';?>><?=RIC_RESIDENZIALE?></option>
                                                    <option value="commerciale" <?php if($_GET['categoria']=='commerciale') echo ' selected="selected" ';?>><?=RIC_COMMERCIALE?></option>
                                                    <option value="industriale" <?php if($_GET['categoria']=='industriale') echo ' selected="selected" ';?>><?=RIC_CAPANNONI?></option>
                                                    <option value="posto_barca" <?php if($_GET['categoria']=='posto_barca') echo ' selected="selected" ';?>><?=RIC_BARCA?></option>
                                                </select>
                                            </div>
                                            <div class="col_full">
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
                                              </select>
                                            </div>
                                            <div class="col_full">
                                                <select name="prezzo"  class="form-control required">
                                                    <option  value=""> <?=PREZZO?> </option>
                                                    <option value="0-250000"><?=FINO?> 250.000 &euro;</option>
                                                    <option value="250001-350000">250.000 - 350.000 &euro;</option>
                                                    <option value="350001-700000">350.000 - 700.000 &euro;</option>
                                                    <option value="700001-100000000"><?=OLTRE?> 700.000 &euro;</option>
                                                </select>
                                            </div>
                                            <div class="text-lg-right text-md-right text-sm-right text-xs-center">
                                                <button class="button button-blue btn-block button-small button-rounded nomargin" type="submit" name="cerca" value="<?php echo CERCA;?>"><?php echo CERCA;?> <i class="icon-arrow-right2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php 
                                    $box->immobiliHome('immobili', $_SESSION['lan']);
                                ?>
                                <form action="<?=LANFOLDER?>immobili.php" class="nomargin" method="GET">
                                    <button class="button button-blue  button-rounded btn-block button-small nomargin"><?=ALTREPROPOSTE?> <i class="icon-arrow-right2"></i></button>
                                </form>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col_one_third">
                        <div class="panel panel-default divcenter rounded summer-lighter" style="background-image: url('<?=TOTALPATH?>images/custom/beach.png'); background-repeat: no-repeat; background-position: top center; background-size: contain;">
                            <div class="fancy-title center nomargin" style="padding: 10px 15px;" data-height-lg="40" data-height-md="65" data-height-sm="65" data-height-xs="auto" data-height-xxs="auto">
                                <h4 class="dark" style="background: transparent"><?=PRENOTAVACANZA?> <?php echo ESTATE?> <?php echo indicaAnno();?></h4>
                            </div>
                            <div class="divider divider-border divider-center nomargin">
                                <i class="icon-arrow-down2"></i>
                            </div>
                            <div class="panel-body rounded" style="padding: 20px; padding-top: 10px">
                                <div class="panel panel-default divcenter rounded " style="background: rgba(255,255,255,.8)">
                                    <div class="panel-body rounded" style="padding: 20px;">
                                        <form class="nomargin" action="booking_online.php" id="booking_online" method="get">
                                            <div class="col_full">
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
                                            </div>
                                            
                                            <div class="col_full">
                                                <div class="">
                                                    <input type="text" id="from" name="DateFrom" value="" class="form-control required " placeholder="<?php echo DAL;?>" />
                                                </div>
                                            </div>
                                            <div class="col_full">
                                                <div class="">
                                                    <input type="text" id="to" name="DateTo" value="" class="form-control required" placeholder="<?php echo AL;?>" />
                                                </div>
                                            </div>
                                             <div class="line" style="margin: 42px 0 41px 0"></div>
                                            <div class="text-lg-right text-md-right text-sm-right  text-xs-center">
                                                <button class="button btn-block button-amber button-small button-rounded nomargin" rel="2" id="next" name="dati" value="next"><?=RICERCAONLINE?> <i class="icon-arrow-right2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php 
                                    $box->immobiliHome('vacanze', $_SESSION['lan']);
                                ?>
								<form action="<?=LANFOLDER?>residence.php" method="GET">
                                <button class="button button-amber button-rounded btn-block button-small nomargin"><?=ALTREPROPOSTE?> <i class="icon-arrow-right2"></i></button>
							</form>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col_one_third col_last">
                        <div class="panel panel-default divcenter rounded sell-lighter">
                            <div class="fancy-title center nomargin" style="padding: 10px 15px;" data-height-lg="40" data-height-md="65" data-height-sm="65" data-height-xs="auto" data-height-xxs="auto">
                                <h4 class="sell" style="background: transparent"><i class="icon-line2-tag"></i> <?=ALTREPROPOSTE?></h4>
                            </div>

                            <div class="divider divider-border divider-darker divider-center nomargin">
                                <i class="icon-arrow-down2"></i>
                            </div>
                            <div class="panel-body rounded" style="padding: 20px; padding-top: 10px">
                                <?php 
                                    $box->immobiliHome('last_minute', $_SESSION['lan']);
                                ?>
								<form action="<?=LANFOLDER?>offerte.php" method="GET">
                                <button class="button button-blue button-rounded btn-block button-small nomargin"><?=ALTREPROPOSTE?> <i class="icon-arrow-right2"></i></button>
							</form>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
					<div class="clear"></div>
				</div>
                <?php 
                include INCLUDEPATH.'blog.php';
                ?>
			</div>

		</section><!-- #content end -->

       <?php include(INCLUDEPATH.'footer.php');?>
        <script>
            $('.input-group.date').datepicker({
            });
        </script>
</body>
</html>