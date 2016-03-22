<?php
class box{
    var $_properties;
    var $desPrezzo; 
    var $periodi=array('maggio','giugno','luglio','agosto','settembre','altro'); 
    var $tradPer=array(
    		'maggio'=>MAGGIO,
    		'giugno'=>GIUGNO,
    		'luglio'=>LUGLIO,
    		'agosto'=>AGOSTO,
    		'settembre'=>SETTEMBRE,
    		'altro'=>ALTRO_PERIODO	
    );
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
    	if($cosa!='news')
    	{	
    	$pathImmo=LANFOLDER.$cosa.'-'.$immo['categoria_immobile'].'-'.stripslashes(str_replace(' ','_',$immo['localita']));
    	if(isset($immo['nome_tipo_'.$lan2]) && $immo['nome_tipo_'.$lan2]!='')
    		$pathImmo.='-'.strtolower(decodificaTitolo($immo['nome_tipo_'.$lan2]));
    	$pathImmo.='-'.$immo['contratto'].'/'.$immo['id_immobili'].'_'.decodificaTitolo($immo['nome_immobile_'.$lan2]).'.html';
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
    		$immobili=mysql_query("select * from immobili i, localita l, tipi t where t.id_tipi=i.id_tipi and l.id_localita=i.id_localita and pubblicato=1 order by last_minute desc, rand() limit 0,6")or die(mysql_error());
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
    	elseif ($tipo='vacanze')
    	{
    		$immobili=mysql_query("select * from immobili i, localita l, tipi t where t.id_tipi=i.id_tipi and l.id_localita=i.id_localita and (offerta=1 or residence=1)and pubblicato=1 order by home desc,rand() limit 0,4")or die(mysql_error());
    		$cosa='casa_vacanza';
    	}
    	$classeDe='';
    	if($lan=='de')
    	{
    		$classeDe=' dettagli_alt';
    	}
    	$j=1;
    	while($immo=mysql_fetch_array($immobili))
    	{
    	    $url=$this->costruisciPath($cosa, $immo,$lan);
    	    $titolo=stripslashes($immo['localita']).' '.stripslashes($immo['nome_immobile_'.$lan]).' ';
    	    $ultimo='';
    	    if(($j%2)==0)
    	        $ultimo=' col_last';
            ?>
            
            <div class="col_half <?php echo $ultimo;?>" data-class-lg="col_half" data-class-md="col_half" data-class-sm="col_full" data-class-xs="col_half" data-class-xxs="col_full">
                <div class="ipost center clearfix">
                    <div class="entry-image nomargin">
                    <?php if($immo['offerta']==1){?>
                        <i class="icon-deal i-circled i-small icon-thumbs-up2"></i>
                        <?php }?>
                        <a href="<?php echo $url;?>" class="thumbnail"><div  style="background: url('<?php echo TOTALPATHREMOTE;?>images/thbn/<?php echo $immo['foto_g_immobile']?>') no-repeat center center; background-size: cover;" data-height-lg="100" data-height-md="90" data-height-sm="140" data-height-xs="280" data-height-xxs="200"><img class="image_fade hidden" src="<?php echo TOTALPATHREMOTE;?>images/thbn/<?php echo $immo['foto_g_immobile']?>" alt="Image"></div></a>
                    </div>
                    <div class="entry-content" style="overflow: hidden" data-height-lg="100" data-height-md="100" data-height-sm="100" data-height-xs="50" data-height-xxs="70">
                        <p><?php echo stripslashes($immo['localita']);?> <?php if($cosa!='residence'){ echo stripslashes(strtolower($immo['nome_tipo_'.$lan]));} ?> <?php echo stripslashes($immo['nome_immobile_'.$lan]);?> </p>
                    </div>
                    <div class="entry-title">
                        <h3><?php if($immo['prezzo']>0 && $immo['prezzo_visibile']==1){ echo '&euro; '.number_format($immo['prezzo'],0,',','.');}?></h3>
                    </div>
                    <form action="<?php echo $url;?>" class="nomargin">
                    <button class="button button-blue btn-block button-mini button-rounded nomargin">dettagli <i class="icon-chevron-right"></i></button>
                    </form>
                </div>
            </div>	
            <?php 
        $j++;
    	}
    	
    }
    
    function elencoImmobili($tipo,$lan,$getor=false,$ordinePrezzo=false)
    {
		var_dump($ordinePrezzo);
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
		elseif($tipo=='affitti')
    	{
    		$query="select * from immobili i,localita l, tipi t where last_minute=0 and  offerta=0 and last_minute=0 and residence=0 and id_residence=0 and contratto='affitto' and pubblicato=1";
    		$cosa='immobile';
    		$pagina='affitti.php';
    	}
    	$query.=' and t.id_tipi=i.id_tipi and l.id_localita=i.id_localita ';
    	if($getor!==false)
    	{
			var_dump($getor);
	    	if($getor['tipo']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and t.id_tipi='.$getor['tipo'];
				$get.='tipo='.$getor['tipo'];
			}
		if($getor['ordinaPrezzo']!='')
			{
				print 'pippo';
				if($get!='')
				{
					$get.='&amp;';
				}
				$ordinePrezzo=true;
				$get.='ordinaPrezzo=1';
			}		
    	if($getor['rif']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and UPPER(REPLACE(rif," ","")) like \'%'.strtoupper(str_replace(' ', '',$getor['rif']))."%'";
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
		if($odinePrezzo)
		{
			print 'pippo2';
			$ordine=" order by prezzo asc";
			
		}	
			
		$totImm=mysql_query($query);
		$tot=mysql_num_rows($totImm);
		$query=$query.' '.$ordine.$limit;
		//print $query;
		$immobili=mysql_query($query)or die(mysql_error());
		if(mysql_num_rows($immobili)==0)
		{
			print ' <div id="posts" class="small-thumbs"><div class="item_large"> '.NOIMMO.'</div></div>';
		}
		else
		{
		    print ' <div id="posts" class="small-thumbs">';
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
                <div class="entry noborder nomargin nopadding clearfix">
                    <div class="entry-image">
                     <?php if($immo['offerta']=='1'){?>
                        <i class="icon-deal i-circled icon-thumbs-up2"></i>
                        <?php }?>
                        <a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>" data-lightbox="image">
							<span class="prezzo-float label label-success"><?php echo visPrezzo($immo['prezzo'], $immo['prezzo_visibile'],$immo['descrizione_prezzo'], $this->desPrezzo);?></span>
							<img class="image_fade thumbnail" src="<?php echo REMOTEIMAGESPATH;?>medie/<?php echo $immo['foto_g_immobile'];?>" alt="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>">
						</a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h2><a href="<?php echo $url;?>"><?php echo $titolo;?></a></h2>
                            <h4><?php visRiferimento($immo['rif']);?> <span class="prezzo label label-success"><?php echo visPrezzo($immo['prezzo'], $immo['prezzo_visibile'],$immo['descrizione_prezzo'], $this->desPrezzo);?></span></h4>
                        </div>
                        <div class="entry-content">
                            <p><?php echo trunc_text(strip_tags(stripslashes($immo['descrizione_'.$lan])),60,$url);?></p>
                            <a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>" class="button button-blue button-mini button-rounded nomargin"><?php echo DETTAGLI;?> <i class="icon-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="divider divider-center "><i class="icon-circle"></i></div>
	        	<?php
	        }
	        ?>
	        </div>
	        <?php 
	        $this->boxPagine($tot, $getor['pag'], $get, 10,$pagina);
	    
	        if($cosa=='residence')
                echo '<div class="button button-light fright"><a href="'.LANFOLDER.'case-vacanze.php" title="'.PROP_VACANZE.'">'.PROP_VACANZE.' <i class="icon-chevron-right"></i></a></div>';
	        if($cosa=='casa_vacanza')
                echo '<div class="button button-light fright"><a href="'.LANFOLDER.'residence.php"  title="'.PROP_VACANZE.'">'.PROP_VACANZE.' <i class="icon-chevron-right"></i></a></div>';
	        	
		}
    }

    function ottData($data)
    {
    	$data=explode('-',$data);
    	$data=$data[2].$data[1].$data[0];
    	return $data;
    }
    function disponibile($alloggio)
    {
    	
    	$disponibile=$alloggio['@attributes']['Code'];
    	foreach ($alloggio['Day'] as $day)
    	{
    		if(trim($day['Availability'])!='A')
    		{
    			$disponibile=false;
    			break;
    		}
    	}
    	return $disponibile;
    }
    function elencoBookingOnline($post, $lan,$getor=false)
    {
        $ricercaCasaVacanza = false;
		$_POST = ($post) ? $post : $_POST;
    	$query="select * from immobili i,localita l, tipi t where (offerta=1 or residence=1 or id_residence>0) and pubblicato=1";
    	$query.=' and t.id_tipi=i.id_tipi and l.id_localita=i.id_localita ';
    	$cosa='casa_vacanza';
    	$pagina='booking_online.php';
    	$partenza=$_POST['DateTo'];
    	$arrivo=$_POST['DateFrom'];
   		require_once(CLASSPATH.'ParseXml.class.php');
		if($_POST['DateFrom']!='' && $_POST['DateTo']!='')
  		{  		
			$_POST['DateFrom']=$this->ottData($_POST['DateFrom']);	
			$_POST['DateTo']=$this->ottData($_POST['DateTo']);
  		}
  		$da = strtotime($_POST['DateFrom']);
  		$a = strtotime($_POST['DateTo']);
  		if(($a - $da) >= 1209600)
  		{
  		    $ricercaCasaVacanza=true;
  		}    
  		$_POST['UserCode']='110519F4FF1';
		$_POST['SCode']='2B9';
		$_POST['Function']='Resources';
		$_POST['Version']='1.6';
		$get='?';
		foreach ($_POST as $k=>$v)
		{
			$get.=$k.'='.$v.'&';
		}
		
		$get.='Restrictions=S';
		
		
		//print $url;
		
		$RCode='RCode=';
		if($_POST['DateFrom']!='' && $_POST['DateTo']!='')
		{
		    //Controllo la disponibilità per il periodo indicato
			$_POST['Function']='RADAR';
			$get='?';
			foreach ($_POST as $k=>$v)
			{
				$get.=$k.'='.$v.'&';
			}
			$RCode=trim($RCode,'|').'&';
			$new_get=$get.'&Restrictions=S';
			$url=trim('http://www.bookingeasy.it/pubblica/XML/resources.aspx'.$new_get,'&'); 
			
			$xml_disponibili=simplexml_load_file($url);
			
	 		$RCode='RCode=';
	 		if($xml_disponibili->Resource)
	 		{
	 		    foreach($xml_disponibili->Resource as $dis)
				{
				    
				   $attr=$dis[0]->attributes();
				   
				   $RCode.=$attr['Code'].'|';
				}
				//Cerco i prezzi
			 	$_POST['Function']='Estimates';
    			$get='?';
    			foreach ($_POST as $k=>$v)
    			{
    				$get.=$k.'='.$v.'&';
    			}
    			$RCode=trim($RCode,'|');
    			$new_get=$get.'&'.$RCode;
    			$url=trim('http://www.bookingeasy.it/pubblica/XML/resources.aspx'.$new_get,'&'); 
    			$xml_prezzi=simplexml_load_file($url);
    			if($xml_prezzi->Resource)
    		    {
    		        $RCode='RCode=';
    		        $elencoImmobili=array();
    				foreach ($xml_prezzi->Resource as $cd)
        			{   
        			    $attr=$cd[0]->attributes();
        			   
        				if(trim($attr['Code'])!='' && $cd->Treatment->Price !='')
        				{
        				    $prezzo = intval($cd->Treatment->Price);
        				    $codice = (string)$attr['Code'];
        				    $elencoImmobili[$codice] = $prezzo;
        					$RCode.=$attr['Code'].'|';
        					
        				}		
        			}
    			    if(count($elencoImmobili)>0)
    			    {    
            			//Cerco i dettagli dell'immobile
            			$_POST['Function']='resourceDetails';
            			$_POST['Fields']='codice,codicerisorsa,nomerisorsa';
            			$get='?';
            			foreach ($_POST as $k=>$v)
            			{
            			    $get.=$k.'='.$v.'&';
            			}
            			$RCode=trim($RCode,'|');
            			$new_get=$get.'&'.$RCode.'&Restrictions=S';
            			$url=trim('http://www.bookingeasy.it/pubblica/XML/resources.aspx'.$new_get,'&');
            			//print $url;
            			$xml_elenco=simplexml_load_file($url);
        			
        			
        			    $codi=' and (';
        			    
        			    foreach ($xml_elenco->Resource as $cd)
        			    {
        			        if(trim($cd->codice)!='')
        			        {
        			            $codi.=' id_immobili=\''.$cd->codice.'\' or';
        			            $c=(string)$cd->codicerisorsa;
        			            $d=(string) $cd->codice;
        			            $codici[$c]=$d;
        			        }
        			    }
    			
    			        $codi=trim($codi,'or').') ';
    		  
            			if($codi!=' and ()')
            			{
                		    if($_POST['posti']!='')
        					{
        					    $posti=$_POST['posti']+2;
        						$codi.= ' and i.n_vani>='.$_POST['posti'].' and i.n_vani<='.$posti; 
        						if($get!='')
        						{
        							$get.='&amp;';
        						}
        						$get.='posti='.$_POST['posti'];
        					}
    		  
            		  		$ordine=" order by i.n_vani asc, home desc ,ordine asc";
            				$query=$query.$codi;
            				$totImm=mysql_query($query);
            				$tot=mysql_num_rows($totImm);
            				$query=$query.' '.$ordine;
            				//print $query;
            				$immobili=mysql_query($query)or die(mysql_error().$query);
            				if(@mysql_num_rows($immobili)==0)
            				{
            					print '<div class="item_large"> '.NOIMMO.'</div>';
            				}
            				else
            				{
            				    print ' <div id="posts" class="small-thumbs">';
            					if($lan=='de')
            			    	{
            			    		$classeDe=' dettagli_alt';
            			    	}
            			    	$immobiliEle=array();
            			        while($immob=mysql_fetch_assoc($immobili))
            			        {
            			            $immobiliEle[$immob['id_immobili']]=$immob; 
            			        }    
            			        
            			        asort($elencoImmobili);
            			        /*print '<pre>';
            			        var_dump($immobiliEle);
            			        print '</pre>';*/
            			        foreach ($elencoImmobili as $value=>$key)
            			        {    
            			            if(isset($immobiliEle[$codici[$value]]))
            			            {    
            			            $immo=$immobiliEle[$codici[$value]];
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
                			        	<div class="entry clearfix">
                                <div class="entry-image">
                                    <a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>" ><img class="image_fade thumbnail" src="<?php echo REMOTEIMAGESPATH;?>medie/<?php echo $immo['foto_g_immobile'];?>" alt="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h2><a href="<?php echo $url;?>"><?php echo stripslashes($immo['nome_immobile_'.$lan])?></a> </h2>
                                        <h4><?php visRiferimento($immo['rif']);?> <span class="prezzo label label-success"><?php echo '€'.$elencoImmobili[$value];?><?php echo visPrezzo($immo['prezzo'], $immo['prezzo_visibile'],$immo['descrizione_prezzo'], $this->desPrezzo);?></span></h4>
                                    </div>
                                    <div class="entry-content">
                                        <p style="margin-bottom: 2px;"><?php echo trunc_text(strip_tags(stripslashes($immo['descrizione_'.$lan])),60,$url);?></p>
                                        <a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>" class="button button-blue button-small button-rounded nomargin"><?php echo DETTAGLI;?> <i class="icon-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
           		        	<?php
            			            }
            			        }
            			   }
            	       }
        			}
        			if($ricercaCasaVacanza)
        			{
        			    $_POST['DateFrom']!='' && $_POST['DateTo']!='';
        			    $da=explode('-',$arrivo);
        			    $a=explode('-',$partenza);
        			    $periodo=$da[1];
        			     
        			    $periodi=array(
        			        '05'=>'maggio',
        			        '06'=>'giugno',
        			        '07'=>'luglio',
        			        '08'=>'agosto',
        			        '09'=>'settembre',
        			        '01'=>'altro',
        			        '02'=>'altro',
        			        '03'=>'altro',
        			        '04'=>'altro',
        			        '10'=>'altro',
        			        '11'=>'altro',
        			        '12'=>'altro',
        			    );
        			    if($da[1]!=$a[1])
        			    {
        			        if($da[0]>20)
        			        {
        			            $periodo=$a[1];
        			        }
        			    }
        			     
        			    $ric['periodo'] = $periodi[$periodo];
        			    $ric['posti'] = $_GET['posti'];
        			    ?>
			     	<div class="fancy-title title-left title-dotted-border">
            <h3>Per periodi più lunghi ricerca anche tra le nostre case vacanza</h3>
            </div>
			     	<nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <span class="navbar-brand"><strong>Ricerca avanzata</strong></span>
                                    </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                         <form action="<?=TOTALPATH?>case-vacanze.php" method="get" class="navbar-form navbar-left" role="search">
                                            <div class="form-group">
												<input name="rif" placeholder="Rif" class="form-control required" size="8"/>
                                                <select name="posti" id="register-form-category" class="form-control required">
                                                    <option value=""><?=POSTI_LETTO?></option>
                                                     <?php
                                            		for ($i=1;$i<=10;$i++)
                                            		{
                                            		?>
                                                         <option value="<?=$i?>" <?php if(isset($_GET['posti']) && $_GET['posti']!='' && $_GET['posti']==$i) echo ' selected="selected" ';?>><?=$i?></option>
                                                   <?php
                                            		}
                                            		?>
                                                </select>
                                               <select name="periodo" class="form-control required">
                                                    <option value=""> <?php echo PERIODO?> </option>
                                                    <option value="maggio" <?php if($periodo=='05') {echo ' selected="selected"';}?>> <?php echo MAGGIO?></option>
                                                    <option value="giugno" <?php if($periodo=='06') {echo ' selected="selected"';}?>> <?php echo GIUGNO?></option>
                                                    <option value="luglio" <?php if($periodo=='07') {echo ' selected="selected"';}?>> <?php echo LUGLIO?></option>
                                                    <option value="agosto" <?php if($periodo=='08') {echo ' selected="selected"';}?>> <?php echo AGOSTO?></option>
                                                    <option value="settembre" <?php if($periodo=='09') {echo ' selected="selected"';}?>><?php echo SETTEMBRE?></option>
                                                    <option value="altro" <?php if($periodi[$periodo]=='altro') {echo ' selected="selected"';}?>> <?php echo ALTRO_PERIODO?></option>
                                                  </select>
                                            </div>
                                            <button type="submit" name="cerca" class="btn btn-primary"><?php echo CERCA;?></button>
                                        </form>
                                    </div>
                                </div>
                            </nav>
			     	   <?php  
			     	}    
			     	?>
			     	</div>
			     	<?php 
			     	$this->elencoImmobiliVacanze('case_vacanza',$_SESSION['lan'],$ric);
			     	
			     }
			    }
				else
				{
					print '<div class="item_large"> '.NOIMMO.'</div>';
				}	 
		    }
			else
			{
				print '<div class="item_large"> '.NOIMMO.'</div>';
			}
			
    }
    
    function elencoImmobiliVacanze($tipo,$lan,$getor=false)
    {
       
    
    		$query="select * from immobili i,localita l, tipi t where (offerta=1) and pubblicato=1";
    		$cosa='casa_vacanza';
    		$pagina='case-vacanze.php';
    	$get='';
    	$query.=' and t.id_tipi=i.id_tipi and l.id_localita=i.id_localita ';
    	if($getor!==false)
    	{
	    	
    	if($getor['rif']!='')
			{
				if($get!='')
				{
					$get.='&amp;';
				}
				$query.=' and UPPER(REPLACE(rif," ",""))like \'%'.strtoupper(str_replace(' ', '',$getor['rif']))."%'";
				$get.='tipo='.$tipo;
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
				$query.= ' and i.n_vani>='.$getor['posti'].' and i.n_vani<='.$posti; 
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='posti='.$getor['posti'];
			}
    	    if($getor['periodo']!='')
			{
			    $query.=' and ('.$getor['periodo'].'_1=1 or '.$getor['periodo'].'_2=1)'; 
				if($get!='')
				{
					$get.='&amp;';
				}
				$get.='periodo='.$getor['periodo'];
			}
			
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
		$ordine=" order by i.n_vani asc, home desc ,ordine asc";
	  // print $query;
		$totImm=mysql_query($query);
		$tot=mysql_num_rows($totImm);
		$query=$query.' '.$ordine.$limit;
		//print $query;
		$immobili= mysql_query($query)or die(mysql_error());
		if(mysql_num_rows($immobili)==0)
		{
			print '<div class="item_large"> '.NOIMMO.'</div>';
		}
		else
		{
		    print ' <div id="posts" class="small-thumbs">';
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
	        	<div class="entry clearfix">
                    <div class="entry-image">
                        <a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>" ><img class="image_fade thumbnail" src="<?php echo REMOTEIMAGESPATH;?>medie/<?php echo $immo['foto_g_immobile'];?>" alt="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>"></a>
                    </div>
                    <div class="entry-c">
                        <div class="entry-title">
                            <h2><a href="<?php echo $url;?>"><?php echo stripslashes($immo['nome_immobile_'.$lan])?></a></h2>
                            <h4><?php visRiferimento($immo['rif']);?> <?php echo visPrezzo($immo['prezzo'], $immo['prezzo_visibile'],$immo['descrizione_prezzo'], $this->desPrezzo);?></h4>
                        </div>
                        <div class="entry-content">
                            <p style="margin-bottom: 2px;"><?php echo trunc_text(strip_tags(stripslashes($immo['descrizione_'.$lan])),60,$url);?></p>
                            <div id="legenda" class="fright">
                                <table>
                                    <tr><td><div class="quad_verde"></div></td><td> <?php echo DISPONIBILE;?></td><td><div class="quad_rosso"></div></td><td> <?php echo NON_DISPONIBILE;?></td></tr>
                                </table>
                            </div>
                            <table class="tab_periodi elencoRis">
                                <tr>
                                <th><?php echo MAGGIO?></th>
                                <th><?php echo GIUGNO?></th>
                                <th><?php echo LUGLIO?></th>
                                <th><?php echo AGOSTO?></th>
                                <th><?php echo SETTEMBRE?></th>
                                <th><?php echo ALTRO_PERIODO?></th>
                                </tr>
                                <tr>
                                <?php 
                                foreach ($this->periodi as $per)
                                {
                                    $classeQuad1='quad_rosso';
                                    $classeQuad2='quad_rosso';
                                    if($per=='altro' && $immo[$per]==1)
                                    {
                                        $classeQuad1='quad_verde';
                                        $classeQuad2='quad_verde';
                                    }	
                                    elseif($per!='altro') 
                                    {
                                        if($immo[$per.'_1']==1)
                                            $classeQuad1='quad_verde';
                                        if($immo[$per.'_2']==1)
                                            $classeQuad2='quad_verde';
                                    }

                                    ?>
                                <td>
                                <div class="quad_periodo">
                                <div class="<?php echo $classeQuad1?>"></div>
                                <div class="<?php echo $classeQuad2?>"></div>
                                <div class="clear"></div>
                                </div>
                                </td>
                                <?php 
                                }
                                ?>
                                </tr>
                                </table>
                                <a href="<?php echo $url;?>" title="<?php echo stripslashes($immo['nome_immobile_'.$lan])?>" class="button button-blue button-small button-rounded nomargin"><?php echo DETTAGLI;?> <i class="icon-chevron-right"></i></a>
                       
                        </div>
                    </div>
                </div>
	        	
	        	
	        	<?php
	        }
	        print '</div>';
	        $this->boxPagine($tot, $getor['pag'], $get, 10,$pagina);
	        
	        if($cosa=='residence')
	        	echo '<div class="button button-light fright"><a href="'.LANFOLDER.'case-vacanze.php" title="'.PROP_VACANZE.'"> > '.PROP_VACANZE.'</a></div>';
	        if($cosa=='casa_vacanza')
	        	echo '<div class="button button-light fright"><a href="'.LANFOLDER.'residence.php"  title="'.PROP_VACANZE.'"> > '.PROP_VACANZE.'</a></div>';	
	        ?>
	        
	        <?php 	
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
                        <td style="border: 1px solid #cccccc;<?=$sfondo?>" align="center"><form action="modifica.php?cosa=immobili&id=<?php echo $r['id_immobili']?>" method="post" class="nomargin"><input type="submit" value="Modifica" name="modifica" /></form></td>
                        <td style="border: 1px solid #cccccc;<?=$sfondo?>" align="center"><form action="<?php echo FUNCTIONPATH?>modifica.php?cosa=immobili&id=<?php echo $r['id_immobili']?>&nome=nome_immobile_it" method="post" onsubmit="return confirm('Si vuole procedere con la cancellazione di questo oggetto?');" class="nomargin"><input type="submit" name="cancella" value="Cancella" /></form></td>
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
    
    function boxFoto($lan,$im)
    { 
        $foto='';
        for($i=1;$i<=10;$i++)
        {
        if(is_file(PATHROOT.'images/big/'.$im['foto'.$i.'_immobile']))
        {
            $foto.="\n".'<div class="oc-item"><a href="'.REMOTEIMAGESPATH.'big/'.$im['foto'.$i.'_immobile'].'"  data-lightbox="gallery-item" class="thumbnail elencoImmagini" title="'.$titolo.'" "><img src="'.REMOTEIMAGESPATH.'thbn/'.$im['foto'.$i.'_immobile'].'" width="150" height="116" alt="thumb" alt="'.$titolo.'" title="'.$titolo.'"/></a></div>';
        }
        }
                if($foto!='')
                {
                ?>
        
        
        <div class="fancy-title title-left title-dotted-border">
         <h3><?php echo ALTRE_FOTO?></h3>
        </div>
        
        <div id="oc-images" class="owl-carousel image-carousel" data-lightbox="gallery">
       <?php echo $foto;?>
        
        </div>
        
        <script type="text/javascript">
        
        jQuery(document).ready(function($) {
        
            var ocImages = $("#oc-images");
        
            ocImages.owlCarousel({
                margin: 20,
                nav: true,
                navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                autoplay: false,
                autoplayHoverPause: true,
                dots: false,
                navRewind: false,
                responsive:{
                    0:{ items:2 },
                    600:{ items:3 },
                    1000:{ items:4 },
                    1200:{ items:5 }
                }
            });
        
        });
        
            </script> <?php
                }
    }
        
     function boxDescrizione($lan,$im) 
     {
       ?>  <div class="fancy-title title-left title-dotted-border">
                                            <h3><?php echo DESCRIZIONE;?></h3>
                                        </div>
                                        <!-- Entry Content
                                        ============================================= -->
                                        <div class="entry-content notopmargin">
                                    <?= str_replace('</p>', '<br>', str_replace('<p>', '',stripslashes($im['descrizione_'.$lan])))?>
                                        </div><!-- .entry end -->
         <?php 
     }          
                
   
    function boxResidence($tipo,$lan,$id,$im,$car=false,$res=false,$cdr='')
        {
            if($tipo=='residence' && $im['id_residence']>0 )
            {
                $residence=mysql_fetch_assoc(mysql_query("
								select
									*
								from
									immobili i,
									localita l,
									tipi t
								where
								    i.id_tipi=t.id_tipi and
								    i.id_localita=l.id_localita and
								    id_immobili=".$im['id_residence']));
                $url_res=$this->costruisciPath('residence',$residence, $lan);
                ?>
            			    <div class="bottone_residence_<?php echo $_SESSION['lan']?>">
                            <a href="<?php echo $url_res;?>" title="<?php echo RESIDENCE;?>" ></a>
                            </div>
            			    	<?php 
            			    	
            			    } ?>
            				
				 <div class="fancy-title title-left title-dotted-border">
				<?php 
				if($tipo=='case_vacanza' && $cdr=='')
			    {
			            $noteMese=array();
			        ?>
			    <h3><?php echo LISTINO;?></h3>    
			    </div>
			    <div class="periodi">
			    <div id="legenda" style="width:200px; float: right;margin: 7px 0px 0px 10px;">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="quad_verde"></div>
                                                            </td>
                                                            <td><?php echo DISPONIBILE;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="quad_rosso"></div>
                                                            </td>
                                                            <td><?php echo NON_DISPONIBILE;?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                
                <div class="table-responsive">
			    <table class="tab_periodi">
                    <tbody>
                        <tr>
	                        <th><?php echo MAGGIO; if($im['testo_maggio']!=''){echo '*'; $notaMese[]=array('label'=>MAGGIO,'testo'=>stripslashes($im['testo_maggio']));}?></th>
	                        <th><?php echo GIUGNO; if($im['testo_giugno']!=''){echo '*'; $notaMese[]=array('label'=>GIUGNO,'testo'=>stripslashes($im['testo_giugno']));}?></th>
	                        <th><?php echo LUGLIO; if($im['testo_luglio']!=''){echo '*'; $notaMese[]=array('label'=>LUGLIO,'testo'=>stripslashes($im['testo_luglio']));}?></th>
	                        <th><?php echo AGOSTO; if($im['testo_agosto']!=''){echo '*'; $notaMese[]=array('label'=>AGOSTO,'testo'=>stripslashes($im['testo_agosto']));}?></th>
	                        <th><?php echo SETTEMBRE; if($im['testo_settembre']!=''){echo '*'; $notaMese[]=array('label'=>SETTEMBRE,'testo'=>stripslashes($im['testo_settembre']));}?></th>
	                        <th><?php echo ALTRO_PERIODO; if($im['testo_altro']!=''){echo '*'; $notaMese[]=array('label'=>ALTRO_PERIODO,'testo'=>stripslashes($im['testo_altro']));}?></th>
	                        </tr>
	                        <tr>
	                        <?php 
	                        $prezzo='';
	                        foreach ($this->periodi as $per)
	                        {
	                            $fineMese=31;
	                            $finePrima=15;
	                            if($per=='giugno' || $per=='settembre')
	                                $fineMese=30;
	                            if($per=='agosto')
	                                $finePrima=16;
	                        	$classeQuad1='quad_rosso';
	                        	$classeQuad2='quad_rosso';
	                        	if($per=='altro' && $im[$per]==1)
								{
									$classeQuad1='quad_verde';
									$classeQuad2='quad_verde';
								}	
	                        	elseif($per!='altro') 
								{
	                        		if($im[$per.'_1']==1)
	                            		$classeQuad1='quad_verde';
	                            	if($im[$per.'_2']==1)
	                                	$classeQuad2='quad_verde';
	                        	}
	                        	?>
	                        <td>
	                        <div class="quad_periodo">
	                        <div class="<?php echo $classeQuad1?>"></div>
	                        <div class="<?php echo $classeQuad2?>"></div>
	                        <div class="clear"></div>
	                        </div>
	                        </td>
	                      <?php 
    	                      if($per=='altro')
    	                      {
    	                          $prezzo.='<td>'.NOTE_ALTRO_PERIODO.'</td>';
    	                      }    
    	                      else 
    	                      {    
                                $prezzo.='  <td><ul>';
                                if($im[$per.'_p']>0)
                                    $prezzo.='<li><div class="periodo">1-'.$fineMese.' </div>€ '.number_format($im[$per.'_p'],0,',','.').'</li>';
                                if($im[$per.'_p_1']>0)
    	                            $prezzo.='<li><div class="periodo">1-'.$finePrima.' </div>€ '.number_format($im[$per.'_p_1'],0,',','.').'</li>';
    	                        if($im[$per.'_p_2']>0)
    	                           $prezzo.='<li><div class="periodo">16-'. $fineMese.' </div>€ '.number_format($im[$per.'_p_2'],0,',','.').'</li>';
    	                        $prezzo.='</ul>
    	                        </td>';
    	                      }
	                      }
	                        ?>
	                        </tr>
	                        <tr>
	                        <?php echo $prezzo;?>
	                        </tr>
	                        </tbody>
	                        </table>
	                        </div>
	                   <div style="float: left;width: 450px;margin: 7px 0px 0px 10px;">
	                   <?php 
	                   echo stripslashes($im['note_listino']);
	                   ?>
	                   </div>     
                         
				<div class="clear"></div> 
				<?php 
				if(count($notaMese)>0)
				{   
				?> 
				<div id="note_mesi" class="">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <?php 
                                foreach ($notaMese as $nm)
                                {    
                                ?>
                                <tr><th>*<?php echo $nm['label']?></th><td><?php echo $nm['testo']?></td></tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
				</div>  
			    	<?php 
				}	
			    	foreach ($this->periodi as $per)
			    	{
			    		if($im[$per]==1 && $im['testo_'.$per]!='')
			    		{
			    			print '<h4>'.$this->tradPer[$per].'</h4>';
			    			print stripslashes($im['testo_'.$per]);
			    		}
			    	}
			    	?>
			    	<div style="margin-top: 25px;">
			    	<div class="bottone_prenota_vac_<?php echo $_SESSION['lan']?>">
                <a href="<?php echo LANFOLDER;?>form.php?idim=<?php echo $im['id_immobili'];?>" title="<?php echo RICHIEDI;?>" class="form_esterno"></a>
                </div>
                </div>
			    	<?php 
			    }
			    elseif($tipo=='residence' && $im['id_residence']>0 ) 
			    {?>
			    <div class="bottone_prenota_<?php echo $_SESSION['lan']?>">
                <a href="https://www.bookingeasy.it/pubblica/booking/booking2/frmBookingR.aspx?CR=110519F4FF1&CdR=<?php echo $im['id_immobili'];?>&PrimoGiorno=si&categoria=01" title="<?php echo PRENOTA;?>" class="form_esterno"></a>
                </div>
			    	<?php 
			    }
			    elseif($tipo=='residence' && $im['id_residence']==0)
			    {?>
			    <div class="bottone_prenota_<?php echo $_SESSION['lan']?>">
                <a href="https://www.bookingeasy.it/pubblica/booking/booking2/frmBooking2.aspx?CR=110519F4FF1&CdG=<?php echo $im['id_immobili'];?>&categoria=01" title="<?php echo PRENOTA;?>" class="form_esterno"></a>
                </div>
			    	<?php 
			    }
			    ?>
			    <div class="clear"></div>
			    </div>
			    </div>
				
				<?php 
			    if($tipo=='residence' && $im['id_residence']==0)
			    {
			    	$appartamenti=mysql_query("select * from immobili i, tipi t where i.id_tipi=t.id_tipi and id_residence=".$im['id_immobili'].' order by ordine');
				?>
					<div class="fancy-title title-left title-dotted-border">
         <h3><?php echo APPARTAMENTI;?></h3>
        </div>
					
                <div class="elenco_radar">
					<?php 
				   while($app=mysql_fetch_assoc($appartamenti))
				   {?>
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h4 class="nomargin fleft"><a href="<?php echo $this->costruisciPath('residence',$app, $lan);?>" title="<?php echo $app['nome_tipo_'.$lan];?> <?php echo stripslashes($app['nome_immobile_'.$lan]);?> (<?php echo $app['n_vani'].' '.POSTI_LETTO;?> )" ><?php echo $app['nome_tipo_'.$lan];?> <?php echo stripslashes($app['nome_immobile_'.$lan]);?> (<?php echo $app['n_vani'].' '.POSTI_LETTO;?> )</a></h4>
                            <a href="<?php echo $this->costruisciPath('residence',$app, $lan);?>" title="<?php echo $app['nome_tipo_'.$lan];?> <?php echo stripslashes($app['nome_immobile_'.$lan]);?> (<?php echo $app['n_vani'].' '.POSTI_LETTO;?> )" class="button button-rounded button-mini nomargin fright" data-class-lg="not-hidden" data-class-md="hidden" data-class-sm="hidden" data-class-xs="hidden" data-class-xxs="hidden">dettaglio <i class="icon-chevron-right"></i></a></div>
                        <div class="panel-body"><?=str_replace('</p>', '<br>', str_replace('<p>', '',stripslashes($app['descrizione_'.$lan])))?></div>
                    </div>
				   <?php 
				   }
				   ?>
                </div>
				   
				   <?php 
			    }
				$foto='';		
				for($i=1;$i<=10;$i++)
				{
					if(is_file('images/big/'.$im['foto'.$i.'_immobile']))
					{
						$foto.="\n".'<a href="'.IMAGESPATH.'big/'.$im['foto'.$i.'_immobile'].'" data-lightbox="gallery-item" class="cornice_foto left colorbox" title="'.$titolo.'" rel="colorbox"  style="margin: 5px 2px;background-image: url('.IMAGESPATH.'thbn/'.$im['foto'.$i.'_immobile'].');"><img src="'.IMAGESPATH.'cornice_foto.png" width="150" height="116" alt="thumb" alt="'.$titolo.'" title="'.$titolo.'"/></a>';
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
                <div class="box-telemutuo">
                <hr class="divisorio clear"/>
				<h3>Telemutuo</h3>
                <script language="JavaScript" type="text/javascript">colore="tema_a";dimensione=[715,90];provincia="LI";id_partner="agerad04793"</script><script language="JavaScript" type="text/javascript" src="http://www.telemutuo.it/widget/widget-js/widget.js"></script>
                </div>
				<?php 
				if($im['googlemap']!='')
				{
				?>
				<div class="caratteristiche_2 clear"><?php echo stripslashes($im['googlemap']);?></div>
				<?php 
				}
				
				}
            			           
        }                   
    
    function boxImmobile($tipo,$lan,$id,$im,$car=false,$res=false,$cdr='')
    {   
    	$titolo=stripslashes($im['localita']).' '.$$im['contratto'].' '.stripslashes($im['nome_tipo_'.$_SESSION['lan']]).' '.stripslashes($im['nome_immobile_'.$_SESSION['lan']]);
    	$url=TOTALPATH.'scheda.php?id='.$im['id_immobili'].'&lan='.$_SESSION['lan'];
        //$url=TOTALPATH.'immobili/'.$_SESSION['lan'].'/'.str_replace('\&','',str_replace(' ','-',$im['nome_tipo_'.$_SESSION['lan']])).'/'.$im['id_immobili'].'_'.str_replace('\.','',str_replace(' ','-',$im['nome_immobile'])).'.html';
    	?>
    	<div class="col_three_fifth nobottommargin">
                <!-- Entry Image
                ============================================= -->
			   	<?php
                if(true)
                {
                    //list($width, $height, $type, $attr) = getimagesize(PATHROOT."images/big/".$im['foto_g_immobile']);
                    ?>
                    <div class="entry-image" data-lightbox="gallery">
                        <a href="<?php echo REMOTEIMAGESPATH;?>big/<?=$im['foto_g_immobile']?>" data-lightbox="gallery-item" class="thumbnail elencoImmagini" title="<?php echo $titolo?>"><img src="<?php echo REMOTEIMAGESPATH;?>big/<?=$im['foto_g_immobile']?>" alt="<?php echo $titolo?>"></a>
                    </div><!-- .entry-image end -->

                    <?php
                }
				?>
				</div>
                <div class="col_two_fifth col_last nobottommargin">
            
				<?php 
				if($car!==false)
				{
			    ?>		   
			    <div class="fancy-title title-left title-dotted-border">
                    <h3>Caratteristiche <?php visRiferimento($im['rif']);?></h3>
                </div>
			   <table class="table table-striped">
        <tbody>
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
                	<tr><td><strong><?php echo $v;?></strong></td><td><?php echo stripslashes($valore);?></td></tr>
                <?php
					} 
				}
                ?>
               </tbody>
                </table> 
                
                <?php 
				}
				?>
				<h5><a href="<?php echo LANFOLDER?>pdf/brochure.php?id=<?php echo $im['id_immobili'];?>" target="_blank" title="<?php echo SCHEDA_PDF;?>"><?php echo SCHEDA_PDF;?> <img src="<?php echo IMAGESPATH?>custom/logo_pdf.jpg" alt="<?php echo SCHEDA_PDF;?>"></a></h5>
				<a href="<?php echo LANFOLDER;?>form.php?idim=<?php echo $im['id_immobili'];?>" data-lightbox="iframe" class="button center button-blue button-rounded nomargin iframe" title="<?php echo RICHIEDI;?>"><?php echo RICHIEDI;?> <i class="icon-chevron-right"></i></a>
                </div>
				
				<?php 
				
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
    		echo '<ul class="pagination nobottommargin">';
    		if($pag!='' && $pag>1)
    		{
    			$li=$pag-1;
    			$frecciasx=' <li><a href="'.LANFOLDER.$nomePag.'?'.$get.'&pag='.$li.'" title="Pag. '.$li.'"><</a></li> ';
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
    			$frecciadx=' <li><a href="'.LANFOLDER.$nomePag.'?'.$get.'&pag='.$li.'" title="Pag. '.$li.'">></a></li> ';
    		}
    		if($get!='')
    		{
    			$get.='&amp;';
    		}
    		print $frecciasx;
    		for($i=1;$i<=$p;$i++)
    		{
    			$fine='';
    			
    			if($i==$pag || ($i==1 && $pag==''))
    			{
    				print $fine.'<li><span style="color: #666666;font-weight: bold;">'.$i.'</span></li>';
    			}
    			else
    			{
    				print $fine.'<li><a href="'.LANFOLDER.$nomePag.'?'.$get.'pag='.$i.'" title="Pag. '.$i.'">'.$i.'</a></li>';
    			}
    		}
    		print $frecciadx;
    		print '</ul>';
    	}
    }



}
?>