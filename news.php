<?php include('config.php');
$get=false;
if(isset($_GET['cerca']) || isset($_GET['pag']))
{
	$get=$_GET;
}
$titolo='News ed eventi a castiglioncello  ';
$descrizione= 'Residence, immobili in vendita, affitti estivi, le tue vacanze a castiglioncello e in toscana ';
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
                <h1>News</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">News</li>
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
							
                            
                            <?php $box->elencoNews('news',$_SESSION['lan'],$get); 
                            ?>
                           
                        </div>
                    </div>
				</div>
                <?php include INCLUDEPATH.'blog.php';?>
			</div>

		</section><!-- #content end -->
<?php include INCLUDEPATH.'footer.php';?>
</body>
</html>
