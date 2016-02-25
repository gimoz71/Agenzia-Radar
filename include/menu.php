<?php 
$classeLan='';
if($_SESSION['lan']!='it')
{
	$classeLan=' class="alt_menu" ';
}
?>

<!-- Header
		============================================= -->
        <header id="header" class="dark sticky-style-2">
            
            <div class="container clearfix">
                <!-- Logo
                ============================================= -->
                <div id="logo" class="divcenter">
                    <a href="index.html" class="standard-logo" data-dark-logo="<?php echo TOTALPATH;?>images/custom/logo_radar.png"><img class="divcenter" src="<?php echo TOTALPATH;?>images/custom/logo_radar.png" alt="Radar Logo"></a>
                    <a href="index.html" class="retina-logo" data-dark-logo="<?php echo TOTALPATH;?>images/custom/logo_radar@2x.png"><img class="divcenter" src="<?php echo TOTALPATH;?>images/custom/logo_radar@2x.png" alt="Radar Logo"></a>
                </div><!-- #logo end -->
            </div>
            
            <div id="header-wrap">
                
                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-2 center">
                    <div class="container clearfix">
                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
                        <ul>
                            <li><a href="<?=LANFOLDER?>index.php"><div><i class="icon-home2"></i>Home page</div></a></li>
                            <li><a href="<?=LANFOLDER?>agenzia_immobiliare_casa_vacanze_toscana.php"><div><?php echo AGENZIA; ?><i class="icon-chevron-down"></i></div></a>
                                <ul>
                                    <li><a href="<?=TOTALPATH?>Servizi_immobiliare_casa_vacanze_residence_toscana.php"><div><?php echo SERVIZI;?></div></a></li>
                                    <li><a href="<?=LANFOLDER?>dove_immobiliare_casa_vacanze_toscana.php"><div><?php echo INFORMAZIONI;?></i></div></a>
                                </ul>
                            </li>
                            
                            <li><a href="<?=LANFOLDER?>castiglioncello_immobiliare_casa_vacanze_residence_toscana.php"><div>Castiglioncello</i></div></a>
                            <li><a href="<?=LANFOLDER?>intorno_castiglioncello_immobiliare_casa_vacanze_residence_toscana.php"><div><?php echo DINTORNI;?></div></a></li>
                            <li><a href="<?=LANFOLDER?>ventida_immobili_castiglioncello.php"><div>Vendite</div></a></li>
                            <li><a href="<?=LANFOLDER?>affitto_immobili_castiglioncello.php"><div>Affitti <i class="icon-chevron-down"></i></div></a>
                                <ul>
                                    <li><a href="<?=LANFOLDER?>residence.php"><div><?php echo RESIDENCE;?></div></a></li>
                                    <li><a href="<?=LANFOLDER?>case-vacanze.php"><div><?php echo VACANZE;?></div></a></li>
                                </ul>
                            <li><a href="http://www.agenziaradar.it/it/webcam_meteo_castiglioncello_immobiliare_casa_vacanze_residence_toscana.php"><div><?php echo LINK;?></div></a></li>
                            <li><a href="blog/"><div>Blog</div></a></li>
                            <li><a href="<?php echo LANFOLDER?>contatti.php"><div><?php echo CONTATTI;?></div></a></li>
                        </ul>
                    </div>
                </nav><!-- #primary-menu end -->
                
            </div>

		</header><!-- #header end -->


                