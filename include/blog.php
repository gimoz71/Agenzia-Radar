<div class="section nomargin notoppadding clearfix"  data-class-xxs="hidden" data-class-xs="hidden" data-class-sm="nothidden" data-class-md="nothidden" data-class-lg="nothidden">
    <div class="container clearfix">
        <div class="fancy-title title-center title-dotted-border topmargin">
            <h3>Ultime dal Blog</h3>
        </div>

        <div id="oc-posts" class="owl-carousel posts-carousel">
<?php 
				$root = realpath($_SERVER["DOCUMENT_ROOT"]);
				@include_once $root."/blog/wp-load.php";
    			
    			setlocale(LC_ALL,'it_IT');
    			$recent_posts = wp_get_recent_posts(array('numberposts' => '4','post_status' => 'publish'));
    			foreach( $recent_posts as $recent ){
    			   //var_dump($recent);
    			    $postLink=get_permalink($recent["ID"]);
					$recent['post_content']=strip_shortcodes($recent['post_content']);
					?>
            <div class="oc-item">
                <div class="ipost clearfix">
                    <div class="entry-image">
                        <div class="fslider" data-arrows="false">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <div class="slide">
										<a href="<?=$postLink?>" title="<?=$recent["post_title"]?>">
											<img class="image_fade" src="<?=get_the_post_thumbnail( $recent['ID'],'medium')?>
										</a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-title">
                        <h3><a href="<?=$postLink?>"><?=$recent["post_title"]?></a></h3>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i><?=date_format(date_create($recent["post_date"]),"d F Y");?></li>
                    </ul>
                    <div class="entry-content">
                        <p><?php echo trunc_text($recent['post_content'],30,$postLink);?></p>
                    </div>
                </div>
            </div>

            <?php 

            }	

            ?>

        </div>
        <div class="divider divider-center "><i class="icon-chevron-down"></i></div>
        <div class="col_full center nomargin text-lg-right text-md-right text-sm-right  text-xs-center">
            <form action="http://www.agenziaradar.it/blog">
            <button class="button button-blue button-rounded nomargin" rel="2" id="next" name="dati" value="next">Vai al blog <i class=""></i></button>
            </form>
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