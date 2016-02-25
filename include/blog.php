<div class="section nomargin notoppadding clearfix"  data-class-xxs="hidden" data-class-xs="hidden" data-class-sm="nothidden" data-class-md="nothidden" data-class-lg="nothidden">
    <div class="container clearfix">
        <div class="fancy-title title-center title-dotted-border topmargin">
            <h3>Ultime dal Blog</h3>
        </div>

        <div id="oc-posts" class="owl-carousel posts-carousel">
<?php 
            $rss = new BncRSS('https://immobiliarecasaweb.wordpress.com/feed/');
            if($rss->Error) {die('Error :' . $rss->Error);}
            while($rss->fetch())
            {
            ?>
            <div class="oc-item">
                <div class="ipost clearfix">
                    <div class="entry-image">
                        <div class="fslider" data-arrows="false" data-lightbox="gallery">
                            <div class="flexslider">
                                <div class="slider-wrap">
                                    <div class="slide"><a href="<?php echo IMAGESPATH?>custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo IMAGESPATH?>custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                    <div class="slide"><a href="<?php echo IMAGESPATH?>custom/placeholder2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo IMAGESPATH?>custom/placeholder2.jpg" alt="Standard Post with Gallery"></a></div>
                                    <div class="slide"><a href="<?php echo IMAGESPATH?>custom/placeholder1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo IMAGESPATH?>custom/placeholder1.jpg" alt="Standard Post with Gallery"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry-title">
                        <h3><a href="<?=$rss->Item['link']?>"><?=$rss->Item['title']?></a></h3>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i><?=$rss->Item['date']?></li>
                    </ul>
                    <div class="entry-content">
                        <p><?=$rss->Item['description']?></p>
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