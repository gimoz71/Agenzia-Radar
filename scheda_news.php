<?php include('config.php');
$n=mysql_fetch_assoc(mysql_query("select * from news where id_news=".$_GET['id']));
$titolo=stripslashes($n['titolo_news_'.$_SESSION['lan']]).' Agenzia Immobiliare Radar';
$descrizione=IMMO.' '.elencoLocalita();
$keywords=elencoLocalita().elencoTipi($_SESSION['lan']);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include(INCLUDEPATH.'header.php');?>


</head>

<body class="stretched">
<div id="wrapper" class=" clearfix">
	<?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>
		<!-- Page Title
        ============================================= -->
        <section id="page-title">
           <div class="container clearfix">
                <h1><?php echo stripslashes($n['titolo_news_'.$_SESSION['lan']])?></h1>
                <ol class="breadcrumb">
				    <li><a href="<?=LANFOLDER?>">Home</a></li>
					<li><a href="<?=LANFOLDER?>news.php">News</a></li>
					<li><?php echo ucfirst(stripslashes($n['titolo_news_'.$_SESSION['lan']]))?></li>
						
				</ol>
			</div>
        </section><!-- #page-title end -->
		<!-- Content
		============================================= -->
		<section id="content">
            <div class="content-wrap nopadding " style="padding-top: 30px !important;">

                <div class="container clearfix nobottommargin nopadding">
                    <div class="panel panel-default divcenter rounded">
                        <div class="panel-body rounded" style="padding: 20px;">
                            
                            <div class="single-post nobottommargin">

                                <!-- Single Post
                                ============================================= -->
                                <div class="entry clearfix">
									
								<div class="col_two_fifth nobottommargin">
									<?php if(is_file('images/thbn/'.$n['foto_news'])){?>
									<img src="<?php echo TOTALPATH;?>images/big/<?php echo $n['foto_news']?>" title="<?php echo stripslashes($n['titolo_news_'.$_SESSION['lan']])?>" class="thumbnail" />
									<?php }?>
								</div>	
								<div class="col_three_fifth col_last nobottommargin">
									<?php echo stripslashes($n['descrizione_news_'.$_SESSION['lan']]);?>
								</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
				</div>
                <?php 
               // include INCLUDEPATH.'blog.php';
                ?>
			</div>

		</section><!-- #content end -->
<?php include(INCLUDEPATH.'footer.php');?>
</body>
</html>


