<?php include('config.php');
$n=mysql_fetch_assoc(mysql_query("select * from news where id_news=".$_GET['id']));
$titolo=stripslashes($n['titolo_news_'.$_SESSION['lan']]).' Agenzia Immobiliare Radar';
$descrizione=IMMO.' '.elencoLocalita();
$keywords=elencoLocalita().elencoTipi($_SESSION['lan']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include(INCLUDEPATH.'header.php')?>
</head>
<body>
<?php 
include(INCLUDEPATH.'testata.php')
?>
<div id="body" class="clearfix">
    <div id="content_header"></div>
    <div id="content" class="clearfix">
    	<!-- Colonna SX -->
        <div id="colsx" class="clearfix">
        	<div class="slideup">
                <?php 
                include (INCLUDEPATH.'menu.php');
                ?>
               <?php 
               include (INCLUDEPATH.'news.php');
               ?>                
            </div>
        </div>
        <!-- Colonna DX -->
        <div id="coldx">
        <div class="briciole">
        	<a href="<?php echo LANFOLDER?>news.php" title="News" class="grassetto"><?php echo LISTA;?> news</a> ><?php echo stripslashes($n['titolo_news_'.$_SESSION['lan']])?><br />
        	</div>
        	<div class="frame_large section">
                <h2><img class="icona" src="<?php echo IMAGESPATH;?>icon_intro.png" width="32" height="33" alt="News" /><?php echo stripslashes($n['titolo_news_'.$_SESSION['lan']])?></h2>
               <div class="testo"> 
               <?php echo str_replace('../images',TOTALPATH.'images',stripslashes($n['descrizione_news_'.$_SESSION['lan']]));?>
               </div>
                </div>
            <div class="clearer twenty"></div>
            
         </div>
        <div class="clearer twenty"></div>
        <?php 
        include(INCLUDEPATH.'footer.php');
        ?>
    </div>
   <?php 
    include (INCLUDEPATH.'sub_footer.php');
    ?>
</div>
</body>
</html>
