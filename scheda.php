<?php include('config.php');
$immobile=mysql_fetch_assoc(mysql_query("
	select 
		*
	from
		immobili i,
		localita l,
		tipi t
	where
	    i.id_tipi=t.id_tipi and
	    i.id_localita=l.id_localita and
	    id_immobili=".$_GET['id']));
$titolo=stripslashes($immobile['localita']).' '.$immobile['contratto'].' '.stripslashes($immobile['nome_tipo_'.$_SESSION['lan']]).' '.stripslashes($immobile['nome_immobile_'.$_SESSION['lan']]);
$descrizione=creaDescription($immobile['descrizione_'.$_SESSION['lan']]);
$keywords=stripslashes(generaKeywords($immobile, $_SESSION['lan'], $desCategorie));
$nomeResidence='';
$res=FALSE;
if($immobile['residence']==1 || $immobile['id_residence']>0)
{
	$cosa='residence';
	$icona='<img class="icona" src="'.IMAGESPATH.'icon_vacancy.png" width="52" height="50" alt="News" />';
	$classe=' orange_large';
	$pagina='residence.php';
	$car=$caratteristicheCaseVacanza;
	if( $immobile['id_residence']>0)
	{
		$residence=mysql_query("select * from immobili i where i.id_immobili=".$immobile['id_residence'])or die(mysql_error());
		$res=mysql_fetch_assoc($residence);
		$nomeResidence='('.stripslashes($res['nome_immobile_'.$_SESSION['lan']]).')';
	}
}
elseif($immobile['last_minute']==1)
{
	$cosa='last_minute';
	$icona='<img class="icona" src="'.IMAGESPATH.'icon_last_minute.png" width="52" height="50" alt="News" />';
	$classe='';
	$pagina='last-minute.php';
	$car=$caratteristicheCaseVacanza;
}
elseif($immobile['offerta']==1)
{
	$cosa='case_vacanza';
	$icona='<img class="icona" src="'.IMAGESPATH.'icon_vacancy.png" width="52" height="50" alt="News" />';
	$classe=' orange_large';
	$pagina='case-vacanze.php';
	$car=$caratteristicheCaseVacanza;
}
else
{
	$cosa='immobili';
	$icona='<img class="icona" src="'.IMAGESPATH.'icon_sale.png" width="53" height="47" alt="News" />';
	$classe='';
	$pagina='immobili.php';
	$car=$caratteristicheImmobili;
}
$titoloRu=$box->costruisciPathLan($cosa, $immobile, 'ru');
$titoloEn=$box->costruisciPathLan($cosa, $immobile, 'en');
$titoloDe=$box->costruisciPathLan($cosa, $immobile, 'de');
$titoloIt=$box->costruisciPathLan($cosa, $immobile, 'it');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include(INCLUDEPATH.'header.php');?>
<script type="text/javascript">
$(document).ready(function(){
	//Examples of how to assign the Colorbox event to elements
	
	//$(".elencoImmagini").colorbox({rel:'group4', slideshow:true});
	//$(".iframe").colorbox({iframe:true, width:"700px", height:"400px"});
	
});
</script>

</head>

<body class="stretched">
<div id="wrapper" class=" clearfix">
	<?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>
		<!-- Page Title
        ============================================= -->
        <section id="page-title">
           <div class="container clearfix">
                <h1><?=$immobile['localita']?></h1>
                <span><?=ucfirst($$immobile['contratto'])?> <?=stripslashes($immobile['nome_tipo_'.$_SESSION['lan']])?> <?=stripslashes($immobile['nome_immobile_'.$_SESSION['lan']])?></span>
        <?php echo creaBriciole($cosa, $immobile, $pagina, $_SESSION['lan'],$res);?>
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
                                <div class="entry clearfix" data-lightbox="gallery">

                                    <?php $box->boxImmobile($cosa,$_SESSION['lan'],$_GET['id'],$immobile,$car,$res,$_GET['CdR']);?>
                                    <div class="col_full nomargin">
                                    <?php $box->boxFoto($_SESSION['lan'], $immobile)?>
                                     <?php $box->boxDescrizione($_SESSION['lan'], $immobile);?>
									 <div class="line"></div>
                             
									 <?php $box->boxResidence($cosa,$_SESSION['lan'],$_GET['id'],$immobile,$car,$res,$_GET['CdR']);
                                     
                                     ?>
                                        
                                        
                                    </div>
                                </div>
                                 <a href="<?php echo LANFOLDER;?>form.php?idim=<?php echo $immobile['id_immobili'];?>" class="button btn-block center button-blue button-rounded nomargin iframe" title="<?php echo RICHIEDI;?>"><?php echo RICHIEDI;?> <i class="icon-chevron-right"></i></a>
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