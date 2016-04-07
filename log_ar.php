<?php include('config.php');
include(CLASSPATH.'interfaccia.class.php');
$int=new interfaccia(array());
$titolo=TITOLO_BASE_DOVE;
$keywords=KEY_DOVE;
$descrizione=DESCRIZIONE_DOVE;
$menu['dove']='class="selezionato"';
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?=LANHTML?>">
<head>
<?php include(INCLUDEPATH.'header.php');?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo TOTALPATH;?>js/jquery.gmap.js"></script>


</head>

<body class="stretched">
<div id="wrapper" class=" clearfix">
	<?php include INCLUDEPATH.'testata.php';?>
        
		<?php include INCLUDEPATH.'menu.php';?>

        <!-- Page Title
        ============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1><?=TITOLO_DOVE?></h1>
                <ol class="breadcrumb">
                    <li><a href="<?=TOTALPATH?>">Home</a></li>
                    <li class="active"><?=ucfirst(TITOLO_DOVE)?></li>
                </ol>
            </div>

        </section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
            <div class="content-wrap nopadding " style="padding-top: 30px !important;">

                <div class="container clearfix nobottommargin nopadding">
                    <div class="panel panel-default divcenter rounded">
                        <div class="panel-body rounded tjustify" style="padding: 20px;">
                            <div class="col_full nomargin">
                                <h3>Area riservata</h3>
                                 <?php echo $int->genera_messaggi();
                            ?>
					<form action="<?=FUNCTIONPATH?>login.php" method="post">
					<table>
					<tr>
					<th>Username</th>
					<td><input type="text" name="username" /></td>
					</tr>
					<tr>
					<th>Password</th>
					<td><input type="password" name="passwd" /></td>
					</tr>
					<tr>
					<th colspan="2"><input type="submit" name="login" value="Login" /></th>
					</tr>
					</table>				
				</form>
                            
                            </div>
                            
                        </div>
                    </div>
				</div>
				
			</div>

		</section><!-- #content end -->
<?php include(INCLUDEPATH.'footer.php');?>
</body>
</html>


