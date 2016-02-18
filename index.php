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

        <section id="slider" class="slider-parallax swiper_wrapper clearfix" data-class-sm="" data-class-xs="hidden" style="border-bottom: solid 1px rgba(255,255,255,.25)">
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
                                         <form action="<?=TOTALPATH?>immobili.php" method="get">
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

                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>
                                <button class="button button-blue  button-rounded btn-block button-small nomargin">Vedi le altre proposte <i class="icon-arrow-right2"></i></button>
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

                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-amber btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-amber btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-amber btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-amber btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-amber btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-amber btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>
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

                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>
                                <div class="col_half">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>

                                <div class="col_half col_last">
                                    <div class="ipost center clearfix">
                                        <div class="entry-image nomargin">
                                            <a href="#" class="thumbnail"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Image"></a>
                                        </div>
                                        <div class="entry-content">
                                            <p>Castiglioncello appartamento al piano terra con giardino -50 metri dal mare.</p>
                                        </div>
                                        <div class="entry-title">
                                            <h3>€ 250.000</h3>
                                        </div>
                                        <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                                    </div>
                                </div>
                                <button class="button button-blue button-rounded btn-block button-small nomargin">Vedi le altre proposte <i class="icon-arrow-right2"></i></button>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
					<div class="clear"></div>
				</div>
                <div class="section nomargin notoppadding clearfix">
                    <div class="container clearfix">
                        <div class="fancy-title title-center title-dotted-border topmargin">
                            <h3>Ultime dal Blog</h3>
                        </div>

                        <div id="oc-posts" class="owl-carousel posts-carousel">

                            <div class="oc-item">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="#">Debitis nihil placeat, illum est nisi</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-item">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="#">Debitis nihil placeat, illum est nisi</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-item">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="#">Debitis nihil placeat, illum est nisi</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-item">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="#">Debitis nihil placeat, illum est nisi</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-item">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="#">Debitis nihil placeat, illum est nisi</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-item">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="#">Debitis nihil placeat, illum est nisi</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="oc-item">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                                    <div class="slide"><a href="images/custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="#">Debitis nihil placeat, illum est nisi</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                        <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider divider-center "><i class="icon-chevron-down"></i></div>
                        <div class="col_full center nomargin text-lg-right text-md-right text-sm-right  text-xs-center">
                            <button class="button button-blue button-rounded nomargin" rel="2" id="next" name="dati" value="next">Vai al blog <i class=""></i></button>
                        </div>
                    </div>
                    <script type="text/javascript">

                        jQuery(document).ready(function($) {

                            var ocPosts = $("#oc-posts");

                            ocPosts.owlCarousel({
                                margin: 20,
                                nav: true,
                                navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                                autoplay: false,
                                autoplayHoverPause: true,
                                dots: false,
                                responsive:{
                                    0:{ items:1 },
                                    600:{ items:2 },
                                    1000:{ items:3 },
                                    1200:{ items:4 }
                                }
                            });

                        });

                    </script>
                </div>
			</div>

		</section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="widget clearfix">

                            <img src="images/custom/footer-logo.png" alt="Radar logo" class="alignleft" style="margin-top: 8px; padding-right: 18px; border-right: 1px solid #4A4A4A;">

                            <p><strong>Agenzia Radar Immobiliare</strong> - Via Aurelia, 548 - 57016 Castiglioncello (LI)<br>Tel. +39.0586.752596 - Fax +39.0586.759935 - Email: <a href="info@agenziaradar.it">info@agenziaradar.it</a><br>P.iva 01169600499</p>

                            <div class="line" style="margin: 30px 0;"></div>

                            <div class="row">

                                <div class="col-md-3 col-xs-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Home Page</a></li>
                                        <li><a href="#">L'Agenzia</a></li>
                                        <li><a href="#">Servizi</a></li>
                                        <li><a href="#">Immobili in vendita Castiglioncello</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-xs-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Affitto Residence Castiglioncello</a></li>
                                        <li><a href="#">Affitto Case Vacanze Castiglioncello</a></li>
                                        <li><a href="#">I Dintorni Castigliooncello</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-xs-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Residance Sul Mare Castiglioncello</a></li>
                                        <li><a href="#">Residance Castiglioncello</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-xs-6 bottommargin-sm widget_links">
                                    <ul>
                                        <li><a href="#">Disclaimer Privacy</a></li>
                                        <li><a href="#">Cookie Policy</a></li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix" style="margin-bottom: -20px;">
                            <div class="row">
                                <div class="col-md-6 bottommargin-sm">
                                    <img src="images/custom/fiaip.jpg">
                                </div>
                                <div class="col-md-6 bottommargin-sm">
                                    <img src="images/custom/bandiera-blu.png">
                                </div>
                            </div>
                        </div>

                        <div class="widget subscribe-widget clearfix">
                            <h5><strong>Iscriviti</strong> alla nostra newsletter e tieniti aggiornato sulle nostre proposte:</h5>
                            <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                            <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                                <div class="input-group divcenter">
                                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Inserisci la tua email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">Iscriviti</button>
                                    </span>
                                </div>
                            </form>
                            <script type="text/javascript">
                                $("#widget-subscribe-form").validate({
                                    submitHandler: function(form) {
                                        $(form).find('.input-group-addon').find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                        $(form).ajaxSubmit({
                                            target: '#widget-subscribe-form-result',
                                            success: function() {
                                                $(form).find('.input-group-addon').find('.icon-line-loader').removeClass('icon-line-loader icon-spin').addClass('icon-email2');
                                                $('#widget-subscribe-form').find('.form-control').val('');
                                                $('#widget-subscribe-form-result').attr('data-notify-msg', $('#widget-subscribe-form-result').html()).html('');
                                                SEMICOLON.widget.notifications($('#widget-subscribe-form-result'));
                                            }
                                        });
                                    }
                                });
                            </script>
                        </div>


                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        <div class="copyrights-menu copyright-links clearfix">
                            <a href="#">Home page</a>/<a href="#">Dove siamo</a>/<a href="#">Contatti</a>
                        </div>
                        Copyrights &copy; 2015 - Tutti i diritti riservati Agenzia Radar Srl.
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon si-small si-borderless nobottommargin si-youtube">
                                <i class="icon-youtube"></i>
                                <i class="icon-youtube"></i>
                            </a>
                            
                        </div>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>