<?php include('config.php'); 
$titolo=TITOLO_BASE_INDEX;
$descrizione=DESCRIZIONE_INDEX;
$keywords=KEY_INDEX;

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include(INCLUDEPATH.'header.php');?>
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
					<div class="swiper-slide dark" style="background-image: url('images/custom/slider-1.jpg');">
<!--
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp" style="text-shadow: 2px 2px rgba(0,0,0,.5) !important;">Prenota ora la tua vacanza!</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow: 1px 1px rgba(0,0,0,1) !important;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus tempor ex placerat convallis. In quam dui, pulvinar sit amet fermentum non, semper at felis</p>
							</div>
						</div>
-->
					</div>
					<div class="swiper-slide dark" style="background-image: url('images/custom/slider-2.jpg'); background-position: center center;">
<!--
						<div class="container clearfix">
							<div class="slider-caption">
                                <h2 data-caption-animate="fadeInUp" style="text-shadow: 2px 2px rgba(0,0,0,.5) !important;">Immobili a Castiglioncello</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow: 1px 1px rgba(0,0,0,1) !important;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dapibus tempor ex placerat convallis. In quam dui, pulvinar sit amet fermentum non, semper at felis</p>
							</div>
						</div>
-->
					</div>
				</div>
				<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
				<div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
			</div>

			<script>
				jQuery(document).ready(function($){
					var swiperSlider = new Swiper('.swiper-parent',{
						paginationClickable: false,
						slidesPerView: 1,
                        autoplay: 5000,
                        loop: true,
						grabCursor: false,
						onSwiperCreated: function(swiper){
							$('[data-caption-animate]').each(function(){
								var $toAnimateElement = $(this);
								var toAnimateDelay = $(this).attr('data-caption-delay');
								var toAnimateDelayTime = 0;
								if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 750; } else { toAnimateDelayTime = 750; }
								if( !$toAnimateElement.hasClass('animated') ) {
									$toAnimateElement.addClass('not-animated');
									var elementAnimation = $toAnimateElement.attr('data-caption-animate');
									setTimeout(function() {
										$toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
									}, toAnimateDelayTime);
								}
							});
						},
						onSlideChangeStart: function(swiper){
							$('#slide-number-current').html(swiper.activeIndex + 1);
							$('[data-caption-animate]').each(function(){
								var $toAnimateElement = $(this);
								var elementAnimation = $toAnimateElement.attr('data-caption-animate');
								$toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
							});
						},
						onSlideChangeEnd: function(swiper){
							$('#slider .swiper-slide').each(function(){
								if($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
							});
							$('#slider .swiper-slide:not(".swiper-slide-active")').each(function(){
								if($(this).find('video').length > 0) {
									if($(this).find('video').get(0).currentTime != 0 ) $(this).find('video').get(0).currentTime = 0;
								}
							});
							if( $('#slider .swiper-slide.swiper-slide-active').find('video').length > 0 ) { $('#slider .swiper-slide.swiper-slide-active').find('video').get(0).play(); }

							$('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function(){
								var $toAnimateElement = $(this);
								var toAnimateDelay = $(this).attr('data-caption-delay');
								var toAnimateDelayTime = 0;
								if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ) + 300; } else { toAnimateDelayTime = 300; }
								if( !$toAnimateElement.hasClass('animated') ) {
									$toAnimateElement.addClass('not-animated');
									var elementAnimation = $toAnimateElement.attr('data-caption-animate');
									setTimeout(function() {
										$toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
									}, toAnimateDelayTime);
								}
							});
						}
					});

					$('#slider-arrow-left').on('click', function(e){
						e.preventDefault();
						swiperSlider.swipePrev();
					});

					$('#slider-arrow-right').on('click', function(e){
						e.preventDefault();
						swiperSlider.swipeNext();
					});

					$('#slide-number-current').html(swiperSlider.activeIndex + 1);
					$('#slide-number-total').html(swiperSlider.slides.length);
				});
			</script>

		</section>

		<!-- Content
		============================================= -->
		<section id="content">
            <div class="content-wrap nopadding " style="padding-top: 30px !important;">
               <div class="section nomargin " style="padding: 40px 0 ; background: url('images/custom/bg-small-area.jpg') no-repeat center center; background-size: cover" data-class-xxs="nothidden" data-class-xs="nothidden" data-class-sm="hidden" data-class-md="hidden" data-class-lg="hidden">
                    <div class="container clearfix nopadding">
                        <div class="coll_full custom-col-padding notoppadding nobottompadding">
                            <form action="vendite.php" class="nomargin">
                                <button class="button button-blue button-3d btn-block button-rounded nomargin">Immobili in vendita</button>
                            </form>  
                            <div class="divider" style="margin: 10px 0"></div>
                            <form action="#" class="nomargin">
                                <button class="button button-blue button-3d btn-block button-rounded nomargin">Vacanze Estate 2016</button>
                            </form>
                            <div class="divider" style="margin: 10px 0"></div>
                            <form action="#" class="nomargin">
                                <button class="button button-blue button-3d btn-block button-rounded nomargin">Altre Offerte</i></button>
                            </form>
                            <div class="divider" style="margin: 10px 0"></div>
                            <a href="tel:+390586752596"><button class="button button-blue button-3d btn-block button-rounded nomargin"><i class="icon-call"></i> Chiama ora </button></a>
                        </div>
                    </div>
                </div>
                <div class="container clearfix nobottommargin nopadding">
                    
                    <div class="col_one_third">
                        <div class="panel panel-default divcenter rounded sell-lighter">
                            <div class="fancy-title center nomargin" style="padding: 5px 15px;">
                                <h4 class="sell" style="background: transparent"><i class="icon-home2"></i> Immobili in vendita</h4>
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
                                            <div class="col_full nobottommargin text-lg-right text-md-right text-sm-right  text-xs-center">
                                            <button class="button button-blue btn-block button-small button-rounded nomargin" type="submit" name="cerca" value="<?php echo CERCA;?>"><?php echo CERCA;?> <i class="icon-arrow-right2"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php 
                                    $box->immobiliHome('immobili', $_SESSION['lan']);
                                ?>
                                <form action="" class="nomargin">
                                    <button class="button button-blue  button-rounded btn-block button-small nomargin">Vedi le altre proposte <i class="icon-arrow-right2"></i></button>
                                </form>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col_one_third">
                        <div class="panel panel-default divcenter rounded summer-lighter" style="background-image: url('images/custom/beach.png'); background-repeat: no-repeat; background-position: top center; background-size: contain;">
                            <div class="fancy-title center nomargin" style="padding: 5px 15px;">
                                <h4 class="dark" style="background: transparent">Prenota la tua vacanza ESTATE 2016</h4>
                            </div>

                            <div class="divider divider-border divider-center nomargin">
                                <i class="icon-arrow-down2"></i>
                            </div>
                            <div class="panel-body rounded" style="padding: 20px; padding-top: 10px">
                                <div class="panel panel-default divcenter rounded " style="background: rgba(255,255,255,.8)">
                                    <div class="panel-body rounded" style="padding: 20px;">

                                        <div class="col_full">
                                            <select id="register-form-category" name="register-form-category" class="form-control required">
                                                <option value="">Posti letto</option>
                                                <option value="sassofono">1</option>
                                                <option value="piano">2</option>
                                                <option value="batteria">3</option>
                                            </select>
                                        </div>
                                        <div class="col_half">
                                            <input type="text" id="register-form-name" name="register-form-name" value="" class="form-control required" placeholder="dal" />
                                        </div>
                                        <div class="col_half  col_last">
                                            <input type="text" id="register-form-surname" name="register-form-surname" value="" class="form-control required" placeholder="al" />
                                        </div>

                                        <div class="col_full nobottommargin text-lg-right text-md-right text-sm-right  text-xs-center">
                                            <button class="button btn-block button-amber button-small button-rounded nomargin" rel="2" id="next" name="dati" value="next">Ricerca online <i class="icon-arrow-right2"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <?php 
                	$box->immobiliHome('vacanze', $_SESSION['lan']);
                	?>
                                
                                <button class="button button-amber button-rounded btn-block button-small nomargin">Vedi le altre proposte <i class="icon-arrow-right2"></i></button>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col_one_third col_last">
                        <div class="panel panel-default divcenter rounded sell-lighter">
                            <div class="fancy-title center nomargin" style="padding: 5px 15px;">
                                <h4 class="sell" style="background: transparent"><i class="icon-line2-tag"></i> Altre Offerte &amp; Last Minute</h4>
                            </div>

                            <div class="divider divider-border divider-darker divider-center nomargin">
                                <i class="icon-arrow-down2"></i>
                            </div>
                            <div class="panel-body rounded" style="padding: 20px; padding-top: 10px">
                              <?php 
                	$box->immobiliHome('last_minute', $_SESSION['lan']);
                	?>
                                
                                <button class="button button-blue button-rounded btn-block button-small nomargin">Vedi le altre proposte <i class="icon-arrow-right2"></i></button>
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

</body>
</html>