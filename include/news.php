	<div class="frame_small_colsx">
                    <h2>News</h2>
                    <div class="body news">
                    	<?php 
                    	try{
                    	$box->elencoNewsHome($_SESSION['lan']);
                    	}
                    	catch(Exception $e)
                    	{
                    		echo '';
                    	}
                    	?>
                        <a class="button_orange" href="<?php echo LANFOLDER.'news.php';?>">VAI ALLE NEWS</a>
                    </div>
                    <div class="footer"></div>
                </div>
                <div class="frame_small_colsx"><br />
                	<div>
                	  <p><img src="<?php echo IMAGESPATH;?>fiaip.jpg" width="164" height="60"></p>
                	</div><br>
                 <p  align="center"> <a href=<?php echo IMAGESPATH;?>bandiere_blu_2010_spiagge.jpg class="colorbox"><img src="<?php echo IMAGESPATH;?>bandiera-blu.png" width="152" height="123" align="middle"></a> </p><br>
</div>
