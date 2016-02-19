<?php
class box{
    var $_properties;
    var $desPrezzo; 

    function __construct($desPrezzo='') {
        $this->_properties= array();
        $this->desPrezzo=$desPrezzo;
    }

function costruisciPathLan($cosa,$immo,$lan)
    {
    	$lan2=$lan;
    	if($lan=='ru')
    		$lan2='en';
    	if($cosa!='news')
    	{	
    	$pathImmo=TOTALPATH.$lan.'/'.$cosa.'-'.$immo['categoria_immobile'].'-'.stripslashes(str_replace(' ','_',$immo['localita']));
    	if(isset($immo['nome_tipo_'.$lan2]) && $immo['nome_tipo_'.$lan2]!='')
    		$pathImmo.='-'.strtolower(decodificaTitolo($immo['nome_tipo_'.$lan2]));
    	$pathImmo.='-'.strtolower($this->desPrezzo[$immo['contratto']]).'/'.$immo['id_immobili'].'_'.decodificaTitolo($immo['nome_immobile_'.$lan2]).'.html';
    	}
    	else
    		{
    		$pathImmo=LANFOLDER.$cosa.'/'.$immo['id_news'].'_'.decodificaTitolo($immo['titolo_news_'.$lan2]).'.html';		
    	}
    	return $pathImmo;
    }
    
 	function costruisciPath($cosa,$immo,$lan)
    {
    	$lan2=$lan;
    	if($lan=='ru')
    		$lan2='en';
    	if($cosa!='news')
    	{	
    	$pathImmo=LANFOLDER.$cosa.'-'.$immo['categoria_immobile'].'-'.stripslashes(str_replace(' ','_',$immo['localita']));
    	if(isset($immo['nome_tipo_'.$lan2]) && $immo['nome_tipo_'.$lan2]!='')
    		$pathImmo.='-'.strtolower(decodificaTitolo($immo['nome_tipo_'.$lan2]));
    	$pathImmo.='-'.strtolower($this->desPrezzo[$immo['contratto']]).'/'.$immo['id_immobili'].'_'.decodificaTitolo($immo['nome_immobile_'.$lan2]).'.html';
    	}
    	else
    		{
    		$pathImmo=LANFOLDER.$cosa.'/'.$immo['id_news'].'_'.decodificaTitolo($immo['titolo_news_'.$lan2]).'.html';		
    	}
    	return $pathImmo;
    }
    
    function elencoNewsHome($lan)
    {
    	$news=mysql_query("select * from news where pubblicata=1 order by data_news desc limit 0,5");
    	if(mysql_num_rows($news)==0)
    	{
    		echo '<p>Non sono presenti news in questo momento</p>';
    	}
    	else 
    		{
	    	while($n=mysql_fetch_assoc($news))
	    	{
	    	    $url=$this->costruisciPath('news', $n, $lan);
	    		?>
	    		<h3><a href="<?php echo $url; ?>" title="<?php echo stripslashes($n['titolo_news_'.$lan]);?>"><?php echo stripslashes($n['titolo_news_'.$lan]);?></a></h3>
                <p class="date"><?php echo norm_date($n['data_news']);?></p>
                <p><?php echo trunc_text(strip_tags(stripslashes($n['descrizione_news_'.$lan])), 7, $url);?></p>
                <hr />
	    		<?php
	    	}
    	}
    }
    
    function immobiliHome($tipo,$lan)
    {
    	if($tipo=='residence')
    	{
    		$immobili=mysql_query("select * from immobili i, localita l, tipi t where t.id_tipi=i.id_tipi and l.id_localita=i.id_localita and residence = 1 and pubblicato=1 order by home desc,rand() limit 0,4")or die(mysql_error());
    		$cosa='residence';
    	}
    	elseif($tipo=='last_minute')
    	{
    		$immobili=mysql_query("select * from immobili i, localita l, tipi t where t.id_tipi=i.id_tipi and l.id_localita=i.id_localita and last_minute= 1 and pubblicato=1 order by home desc,rand() limit 0,4")or die(mysql_error());
    		$cosa='offerte';
    	}
    	elseif($tipo=='case_vacanza')
    	{
    		$immobili=mysql_query("select * from immobili i, localita l, tipi t where t.id_tipi=i.id_tipi and l.id_localita=i.id_localita and offerta=1 and pubblicato=1 order by home desc,rand() limit 0,4")or die(mysql_error());
    		$cosa='casa_vacanza';
    	}
        elseif($tipo=='immobili')
    	{
    		$immobili=mysql_query("select * from immobili i, localita l, tipi t where t.id_tipi=i.id_tipi and l.id_localita=i.id_localita and last_minute=0 and  offerta=0 and last_minute=0 and residence=0 and id_residence=0 and contratto='vendita' and pubblicato=1 order by home desc,rand() limit 0,4")or die(mysql_error());
    		$cosa='immobile';
    	}
    	$classeDe='';
    	if($lan=='de')
    	{
    		$classeDe=' dettagli_alt';
    	}
    	while($immo=mysql_fetch_array($immobili))
    	{
    	    $url=$this->costruisciPath($cosa, $immo,$lan);
    	    $titolo=stripslashes($immo['localita']).' '.stripslashes($immo['nome_immobile_'.$lan]).' ';
    		?>
    	<div class="item"> 
    		<a href="<?php echo $url;?>" class="cornice_foto" style="background-image: url(<?php echo TOTALPATH;?>images/thbn/<?php echo $immo['foto_g_immobile']?>);"><img src="<?php echo IMAGESPATH;?>cornice_foto.png" width="150" height="116" alt="thumb" /></a>
            <h3><a href="<?php echo $url;?>" title=""><?php echo stripslashes($immo['localita']);?> <?php if($cosa!='residence'){ echo stripslashes(strtolower($immo['nome_tipo_'.$lan]));} ?> <?php echo stripslashes($immo['nome_immobile_'.$lan]);?> <?php if($immo['prezzo']>0 && $immo['prezzo_visibile']==1){ echo '<br /><strong>&euro; '.number_format($immo['prezzo'],0,',','.').'</strong>';}?></a></h3>
            <p></p>
            <a class="details <?php echo $classeDe?>" href="<?php echo $url;?>" title="<?php echo DETTAGLI;?>" ><?php echo DETTAGLI;?></a>
       </div>
    		<?php 
    	}
    	
    }
    
    function elencoImmobili($tipo,$lan,$getor=false)
    {
        if($tipo=='residence')
        {
        	$query="select * from immobili i,localita l, tipi t where residence=1 and id_residence=0 and pubblicato=1 ";
        	$cosa="residence";
        	$pagina='residence.php';
        }
    	elseif($tipo=='last_minute')
    	{
    		$query="select * from immobili i,localita l, tipi t where last_minute= 1 and pubblicato=1";
    		$cosa='offerte';
    		$pagina='last-minute.php';
    	}
    	elseif($tipo=='case_vacanza')
    	{
    		$query="select * from immobili i,localita l, tipi t where offerta=1 and pubblicato=1";
    		$cosa='casa_vacanza';
    		$pagina='case-vacanze.php';
    	}
        elseif($tipo=='immobili')
    	{
    		$query="select * from immobili i,localita l, tipi t where last_minute=0 and  offerta=0 and last_minute=0 and residence=0 and id_residence=0 and contratto='vendita' and pubblicato=1";
    		$cosa='immobile';
    		$pagina='immobili.php';
    	}
    	$query.=' and t.id_tipi=i.id_tipi and l.id_localita=i.id_localita ';
    	if($getor!==false)
    	{
	    	if($getor['tipo']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and t.id_tipi='.$getor['tipo'];
				$get.='tipo='.$getor['tipo'];
			}
    	if($getor['rif']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and UPPER(REPLACE(rif," ",""))like \'%'.strtoupper(str_replace(' ', '',$getor['rif']))."%'";
				$get.='tipo='.$getor['tipo'];
			}	
    	if($getor['contratto']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and i.contratto=\''.$getor['contratto']."'";
				$get.='contratto='.$getor['contratto'];
			}
    	if($getor['categoria']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and i.categoria_immobile=\''.$getor['categoria']."'";
				$get.='categoria='.$getor['categoria'];
			}
			if($getor['localita']!='')
			{
				$query.=' and l.id_localita='.$getor['localita'];
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='localita='.$getor['localita'];
			}
    	if($getor['posti']!='')
			{
			    $posti=$getor['posti']+2;
				$query.=' and i.n_vani='.$posti; 
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='posti='.$getor['posti'];
			}
			if($getor['zona']!='')
			{
				$query.=' and z.id_zone='.$getor['zona'];
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='zona='.$getor['zona'];
			}
			if($getor['camere']!='')
			{
				if($getor['camere']>10)
				{
					$query.=' and i.n_camere>10';
				}
				else
				{
				$query.=' and i.n_camere='.$getor['camere'];
				}
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='camere='.$getor['camere'];
			}
			if($getor['prezzo']!='')
			{
				$pr=split('-',$getor['prezzo']);
				$query.=' and prezzo>'.$pr[0].' and prezzo<='.$pr[1];
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='prezzo='.$getor['prezzo'];
			}
			/*if($getor['rif']!='' && $getor['rif']!=RIF)
			{
				$query.=" and rif like '%".strtoupper($getor['rif'])."%'";
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='rif='.$getor['rif'];
			}*/
	  	}
    		if(!isset($getor['pag']) || $getor['pag']==1)
			{
				$limit=' limit 0,10';
			}
			else
			{
				$start=10*($getor['pag']-1);
				$stop=10;
				$limit=' limit '.$start.','.$stop;
			}
		$ordine=" order by home desc ,ordine asc, i.n_vani asc";
	
		$totImm=mysql_query($query);
		$tot=mysql_num_rows($totImm);
		$query=$query.' '.$ordine.$limit;
		//print $query;
		$immobili=mysql_query($query)or die(mysql_error());
		if(mysql_num_rows($immobili)==0)
		{
			print '<div class="item_large"> '.NOIMMO.'</div>';
		}
		else
		{
			if($lan=='de')
	    	{
	    		$classeDe=' dettagli_alt';
	    	}
	        while($immo=mysql_fetch_assoc($immobili))
	        {
	        	$url=$this->costruisciPath($cosa, $immo,$lan);
	        	$titolo=stripslashes($immo['localita']).' '.ucfirst($$immo['contratto']).' '.stripslashes(strtolower($immo['nome_tipo_'.$lan])).' '.stripslashes($immo['nome_immobile_'.$lan]);
	        	if($cosa=='casa_vacanza')
	        	{
	        		$titolo.=' ('.$immo['n_vani'].' '.POSTI_LETTO.')';
	        	}
	        	if($immo['residence']==1)
	        	{
	        		$titolo=stripslashes($immo['localita']).' '.stripslashes($immo['nome_immobile_'.$lan]);
	        	}
	        	
	        	?>
	        	<div class="item_large"> <a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>" class="foto_principale cornice_foto" class="cornice_foto" style="background-image: url(<?php echo TOTALPATH;?>images/thbn/<?php echo $immo['foto_g_immobile'];?>);"><img src="<?php echo IMAGESPATH;?>cornice_foto.png" width="150" height="116" alt="thumb" /></a>
	                	   <div class="testo">
	                        <h3><a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>"><?php echo $titolo;?> </a></h3>
	                        <p>
							 <strong><?php visRiferimento($immo['rif']);?> <?php echo visPrezzo($immo['prezzo'], $immo['prezzo_visibile'],$immo['descrizione_prezzo'], $this->desPrezzo);?></strong>
							</p>
	                        <p style="margin-bottom: 2px;"><?php echo trunc_text(strip_tags(stripslashes($immo['descrizione_'.$lan])),60,$url);?></p>
	                        <a class="details <?php echo $classeDe;?>" href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>"><?php echo DETTAGLI;?></a>
	                        </div>
	                        <div style="clear:both"></div>
	                    </div>
	        	<?php
	        }
	        $this->boxPagine($tot, $getor['pag'], $get, 10,$pagina);
	      
	        if($cosa=='residence')
	        	echo '<div class="fright" style="float:right;"><a href="'.LANFOLDER.'case-vacanze.php" title="'.PROP_VACANZE.'"> > '.PROP_VACANZE.'</a></div>';
	        if($cosa=='casa_vacanza')
	        	echo '<div class="fright" style="float: right;"><a href="'.LANFOLDER.'residence.php"  title="'.PROP_VACANZE.'"> > '.PROP_VACANZE.'</a></div>';	
		}
    }
      function elencoImmobiliAdmin($tipo,$lan='it',$getor=false)
    {  
 		if($tipo=='residence')
        {
        	$query="select * from immobili i,localita l, tipi t where (residence=1 or id_residence>0)";
        	$cosa="residence";
        	$pagina='residence.php';
        }
    	elseif($tipo=='last_minute')
    	{
    		$query="select * from immobili i,localita l, tipi t where last_minute= 1";
    		$cosa='offerte';
    		$pagina='last-minute.php';
    	}
    	elseif($tipo=='case_vacanza')
    	{
    		$query="select * from immobili i,localita l, tipi t where offerta=1";
    		$cosa='casa_vacanza';
    		$pagina='case-vacanze.php';
    	}
        elseif($tipo=='immobili')
    	{
    		$query="select * from immobili i,localita l, tipi t where last_minute=0 and  offerta=0 and last_minute=0 and residence=0 and id_residence=0";
    		$cosa='immobile';
    		$pagina='immobili.php';
    	}
    	$query.=' and t.id_tipi=i.id_tipi and l.id_localita=i.id_localita ';
    	if($getor!==false)
    	{
	    	if($getor['ordina']=='tipo')
			{
				if($order!='')
				{
					$order.=',';
				}
				$order.='nome_tipo_it';
		    }
    		elseif($getor['ordina']=='prezzo')
			{
				if($order!='')
				{
					$order.=',';
				}
				$order.='prezzo';
		    }
    	   elseif($getor['ordina']=='ordine')
			{
				if($order!='')
				{
					$order.=',';
				}
				$order.='ordine asc';
		    }
    	   elseif($getor['ordina']=='tipo')
			{
				if($order!='')
				{
					$order.=',';
				}
				$order.='nome_tipo_it';
		    }
    		elseif($getor['ordina']=='localita')
			{
				if($order!='')
				{
					$order.=',';
				}
				$order.='localita';
		    }
    		if($getor['rif']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and UPPER(REPLACE(rif," ",""))like \'%'.strtoupper(str_replace(' ', '',$getor['rif']))."%'";
     		}	
     	}
     	if($order!='')
     		$order=' order by '.$order;
    	$query=$query.' '.$order;
		//print $query;
		$immobili=mysql_query($query)or die(mysql_error());
		if(mysql_num_rows($immobili)==0)
		{
			print '<div class="item_large"> Non sono stati trovati immobili pe la ricerca selezionata</div>';
		}
		else
		{
			
				?>
		<table align="center" style="width: 100%;margin-top: 10px;">
		<tr>
		    <th>Rif.</th>
		    <th>Tipo</th>
		    <th>Nome</th>
		    <th>Ordine</th>
			<th>Prezzo</th>
			<th>Proprietario</th>
			<th>Modifica</th>
		    <th>Cancella</th>
		</tr>
<?php
	        while($r=mysql_fetch_assoc($immobili))
	        {
	        		if($sfondo=='')
					{
						$sfondo='background-color: #eeeeee;';
					}
					else
					{
						$sfondo='';
					}
				?>
					<tr >
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="left"><?=$r['rif']?></td>
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="left"><?=stripslashes($r['nome_tipo_it']);?></td>
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="left"><a href="dati.php?id=<?=$r['id_immobili']?>" title="Dati"  class="lightbox" ><?=stripslashes($r['nome_immobile_it']);?> <?php echo $this->nomeResidence($r['id_immobili'])?></a></td>
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="left"><?=$r['ordine']?></td>
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="left"><?=$r['prezzo']?></td>
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="left"><?=$r['cognome_proprietario']?></td>
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="center"><form action="modifica.php?cosa=immobili&id=<?php echo $r['id_immobili']?>" method="post"><input type="submit" value="Modifica" name="modifica" /></form></td>
					<td style="border: 1px solid #cccccc;<?=$sfondo?>" align="center"><form action="<?php echo FUNCTIONPATH?>modifica.php?cosa=immobili&id=<?php echo $r['id_immobili']?>&nome=nome_immobile_it" method="post" onsubmit="return confirm('Si vuole procedere con la cancellazione di questo oggetto?');"><input type="submit" name="cancella" value="Cancella" /></form></td>
					</tr>
					<?php
			  }
			?>
			</table>
		  	<?php
	     }
    }
function nomeResidence($id)
{
	$immobile=mysql_query("select i2.nome_immobile_it from immobili i1, immobili i2 where i1.id_immobili=".$id."  and i1.id_residence=i2.id_immobili")or die(mysql_error());
	if(mysql_num_rows($immobile)==0)
	{
		return '';
	}
	else
	{
		$im=mysql_fetch_assoc($immobile);
		return '('.stripslashes($im['nome_immobile_it']).')';
	}
	
}    
function elencoNews($tipo,$lan,$getor=false)
    {
       
        	$query="select * from news where pubblicata=1 ";
        	$cosa="news";
        	$pagina='news.php';
      		
        	if(!isset($getor['pag']) || $getor['pag']==1)
			{
				$limit=' limit 0,10';
			}
			else
			{
				$start=10*($getor['pag']-1);
				$stop=10;
				$limit=' limit '.$start.','.$stop;
			}
		$ordine=" order by data_news desc";	
		$totImm=mysql_query($query);
		$tot=mysql_num_rows($totImm);
		$query=$query.' '.$ordine.$limit;
		//print $query;
		$immobili=mysql_query($query)or die(mysql_error());
		if(mysql_num_rows($immobili)==0)
		{
			print '<div class="item_large"> '.NOIMMO.'</div>';
		}
		else
		{
	        while($immo=mysql_fetch_assoc($immobili))
	        {
	        	$url=$this->costruisciPath($cosa, $immo,$lan);
	        	$titolo=stripslashes($immo['titolo_news_'.$lan]);
	        	?>
	        	<div class="item_large"> 
	                	   <div class="testo">
	                        <h3><a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['titolo_news_'.$lan])?>"><?php echo $titolo;?> </a></h3>
	                        <p style="margin-bottom: 2px;"><?php echo trunc_text(strip_tags(stripslashes($immo['descrizione_news_'.$lan])),60,$url);?></p>
	                        </div>
	                        <div style="clear:both"></div>
	                    </div>
	        	<?php
	        }
	        $this->boxPagine($tot, $getor['pag'], $get, 10,$pagina);
	    
	     }
    }
    
   
    
    function boxImmobile($tipo,$lan,$id,$im,$car=false,$res=false)
    {   
    	$titolo=stripslashes($im['localita']).' '.$$im['contratto'].' '.stripslashes($im['nome_tipo_'.$_SESSION['lan']]).' '.stripslashes($im['nome_immobile_'.$_SESSION['lan']]);
    	$url=TOTALPATH.'scheda.php?id='.$im['id_immobili'].'&lan='.$_SESSION['lan'];
        //$url=TOTALPATH.'immobili/'.$_SESSION['lan'].'/'.str_replace('\&','',str_replace(' ','-',$im['nome_tipo_'.$_SESSION['lan']])).'/'.$im['id_immobili'].'_'.str_replace('\.','',str_replace(' ','-',$im['nome_immobile'])).'.html';
    	?>
    	
			   	<?php
				if(is_file('images/big/'.$im['foto_g_immobile']))
				{
					list($width, $height, $type, $attr) = getimagesize("images/big/".$im['foto_g_immobile']);
				?>
				<div class="fotoImm" style=";background-image:url(<?php echo IMAGESPATH;?>medie/<?=$im['foto_g_immobile']?>);">
					<a href="<?php echo IMAGESPATH;?>big/<?=$im['foto_g_immobile']?>" title="<?php echo $titolo;?>" class="colorbox" rel="colorbox"><img src="<?php echo IMAGESPATH?>cornice_foto_g.png" alt=" " width="537px" height="360px"  alt="<?php echo $titolo?>" title="<?php echo $titolo?>" /></a>
			  	</div>		    
			    <?php
				}
				elseif($im['id_residence']>0 && is_file('images/big/'.$res['foto_g_immobile']))
				{?>
				<div class="fotoImm" style=";background-image:url(<?php echo IMAGESPATH;?>medie/<?=$res['foto_g_immobile']?>);">
					<a href="<?php echo IMAGESPATH;?>big/<?=$res['foto_g_immobile']?>" title="<?php echo $titolo;?>" class="colorbox" rel="colorbox"><img src="<?php echo IMAGESPATH?>cornice_foto_g.png" alt=" " width="537px" height="360px"  alt="<?php echo $titolo?>" title="<?php echo $titolo?>" /></a>
			  	</div>		    
			    <?php				
				}
				?>
                 <div class="caratteristiche">
				<?php 
				if($car!==false)
				{
			    ?>		   
			    <h3 style="margin: 0px 0px 15px 0px;">Caratteristiche  <?php visRiferimento($im['rif']);?></h3>
				<table>
				<?php 
				foreach ($car as $k=>$v)
				{
					if($im[$k]!=0 && $im[$k]!='')
					{
						$valore=$im[$k];
						if($k=='prezzo')
						{
							$valore=visPrezzo($im[$k], $im['prezzo_visibile'], $im['descrizione_prezzo'], $this->desPrezzo);
						}
				?>
                	<tr><th style="padding: 3px;border: 1px solid #e5e5e5;"><?php echo $v;?></th><td style="padding: 3px;border: 1px solid #e5e5e5;"><?php echo stripslashes($valore);?></td></tr>
                <?php
					} 
				}
                ?>
                </table>    
                
                <?php 
				}
				?>
				<div class="brochure"><a href="<?php echo LANFOLDER?>pdf/brochure.php?id=<?php echo $im['id_immobili'];?>" target="_blank" title="<?php echo SCHEDA_PDF;?>"><?php echo SCHEDA_PDF;?> <img src="<?php echo IMAGESPATH?>logo_pdf.jpg" alt="<?php echo SCHEDA_PDF;?>" /></a></div> 
				<div class="clear"> </div>
				</div>
				<div class="caratteristiche_2 clear">
				<h3  style="margin: 0px 0px 15px 0px;"><?php echo DESCRIZIONE;?></h3>
				<?=stripslashes($im['descrizione_'.$lan])?>
				<br />
				
				</div>
				<?php 
			    if($tipo=='residence' && $im['id_residence']==0)
			    {
			    	$appartamenti=mysql_query("select * from immobili i, tipi t where i.id_tipi=t.id_tipi and id_residence=".$im['id_immobili'].' order by ordine');
				?>
					<hr class="divisorio clear"/>
					<h3><?php echo APPARTAMENTI;?></h3>
					<ul class="elenco_radar">
					<?php 
				   while($app=mysql_fetch_assoc($appartamenti))
				   {?>
				   <li>
				   <h4><a href="<?php echo $this->costruisciPath('residence',$app, $lan);?>" title="<?php echo $app['nome_tipo_'.$lan];?> <?php echo stripslashes($app['nome_immobile_'.$lan]);?> (<?php echo $app['n_vani'].' '.POSTI_LETTO;?> )"><?php echo $app['nome_tipo_'.$lan];?> <?php echo stripslashes($app['nome_immobile_'.$lan]);?> (<?php echo $app['n_vani'].' '.POSTI_LETTO;?> )</a></h4>
				   <?php echo stripslashes($app['descrizione_'.$lan]);?>
				   </li>
				   <?php 
				   }
				   ?>
				   </ul>
				   <?php 
			    }
				$foto='';		
				for($i=1;$i<=10;$i++)
				{
					if(is_file('images/big/'.$im['foto'.$i.'_immobile']))
					{
						$foto.="\n".'<a href="'.IMAGESPATH.'big/'.$im['foto'.$i.'_immobile'].'" class="cornice_foto left colorbox" title="'.$titolo.'" rel="colorbox"  style="margin: 5px 2px;background-image: url('.IMAGESPATH.'thbn/'.$im['foto'.$i.'_immobile'].');"><img src="'.IMAGESPATH.'cornice_foto.png" width="150" height="116" alt="thumb" alt="'.$titolo.'" title="'.$titolo.'"/></a>';
					}
				}
				if($foto!='')
				{
				?>
				<hr class="divisorio clear"/>
				<h3><?php echo ALTRE_FOTO?></h3>
				<div class="altreFoto">
				<?php echo $foto;?>
				<div class="clear"></div>
				</div>
				<?php 
				if($im['googlemap']!='')
				{
				?>
				<div class="caratteristiche_2 clear"><?php echo stripslashes($im['googlemap']);?></div>
				<?php 
				}
				?>
				<?php
				}
    }
    function boxPagine($tot,$pag,$get,$num,$nomePag)
    {
    	if($tot<=$num)
    	{
    		return '';
    	}
    	else
    	{
    		$li='';
    		if($pag!='' && $pag>1)
    		{
    			$li=$pag-1;
    			$frecciasx=' <a href="'.LANFOLDER.$nomePag.'?'.$get.'pag='.$li.'" title="Pag. '.$li.'"><</a> ';
    		}

    		$p=ceil($tot/$num);
    		$li='';
    		if($pag<$p)
    		{
    			if($pag=='')
    			{
    				$li=2;
    			}
    			else
    			{
    				$li=$pag+1;
    			}
    			$frecciadx=' <a href="'.LANFOLDER.$nomePag.'?'.$get.'pag='.$li.'" title="Pag. '.$li.'">></a> ';
    		}
    		if($get!='')
    		{
    			$get.='&amp;';
    		}
    		print $frecciasx;
    		for($i=1;$i<=$p;$i++)
    		{
    			$fine='';
    			if($i>1)
    			{
    				$fine=' - ';
    			}
    			if($i==$pag || ($i==1 && $pag==''))
    			{
    				print $fine.'<span style="color: #666666;font-weight: bold;">'.$i.'</span>';
    			}
    			else
    			{
    				print $fine.'<a href="'.LANFOLDER.$nomePag.'?'.$get.'pag='.$i.'" title="Pag. '.$i.'">'.$i.'</a>';
    			}
    		}
    		print $frecciadx;
    	}
    }



}
?>