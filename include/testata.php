<?php 
$scheda=true;
if($titoloRu=='')
{
	$titoloRu=TOTALPATH.'ru/'.nomePagina($_SERVER[PHP_SELF]);
	$scheda=false;
}	
if($titoloEn=='')
{
	$titoloEn=TOTALPATH.'en/'.nomePagina($_SERVER[PHP_SELF]);
	$scheda=false;
}	
if($titoloDe=='')
{
	$titoloDe=TOTALPATH.'de/'.nomePagina($_SERVER[PHP_SELF]);
	$scheda=false;
}	
if($titoloIt=='')
{
	$titoloIt=TOTALPATH.'it/'.nomePagina($_SERVER[PHP_SELF]);	
	$scheda=false;
}			
if($scheda)
	$lg='';
?>

<!-- Top Bar
        ============================================= -->
        <div id="top-bar" class="dark  sell-light">

            <div class="container clearfix">

                

                <div class="col_half fleft nobottommargin">

                    <!-- Top Social
                    ============================================= -->
                    <div id="top-social">
                        <ul>
                            <li><a href="http://www.facebook.com/pages/Agenzia-immobiliare-Radar-Castiglioncello/164745546906074" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                            <!--  <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>  -->
                            <li><a href="http://www.youtube.com/user/agenziaradar" class="si-youtube"><span class="ts-icon"><i class="icon-youtube"></i></span><span class="ts-text">YouTube</span></a></li>
                            <li><a href="tel:+39.0586.752596" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+39.0586.752596</span></a></li>
                            <li><a href="mailto:info@agenziaradar.it" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@agenziaradar.it</span></a></li>
                        </ul>
                    </div><!-- #top-social end -->

                </div>
                
                <div class="col_half fright col_last nobottommargin">

                    <!-- Top Links
                    ============================================= -->
                    <div class="top-links">
                        <ul style="border: solid 1px rgba(255,255,255,.15)">
                            <li><a href="<?=$titoloIt?><?=$lg?>"><img src="<?php echo IMAGESPATH;?>icons/flags/italian.png" alt="Italiano"></a>
                            <li><a href="<?=$titoloDe?><?=$lg?>"><img src="<?php echo IMAGESPATH;?>icons/flags/german.png" alt="Deutsch"></a></li>
                            <li><a href="<?=$titoloEn?><?=$lg?>"><img src="<?php echo IMAGESPATH;?>icons/flags/french.png" alt="English"></a></li>
                        </ul>
                      
                    </div><!-- .top-links end -->

                </div>
            </div>

        </div><!-- #top-bar end -->

