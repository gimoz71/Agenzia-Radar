<?php include('fpdf.php');
class PDF extends FPDF
{
//Funzione di creazione codici a barre
function creaBin($cod)
{
	include('../include/cd.php');
	$codici=chunk_split($cod,2);
    $risu=split("\n",$codici);
    $binari=array();
    $codLeng=strlen($cod);
    for ($i=0;$i<$codLeng;$i++)
    {
    	if(!isset($binari[$cod[$i]]['cod']))
    	{
    		$bina=mysql_fetch_row(mysql_query('select * from binari where numero='.$cod[$i]));
    		$binari[$cod[$i]]['cod']=$bina[1];
    	}
    }
    $binTot='';
    foreach($risu as $r)
    {
        $binTot.=$this->inrelacciaBinario($binari[$r[0]]['cod'],$binari[$r[1]]['cod']);
    }
    return $binTot;
}

function inrelacciaBinario($bin1,$bin2)
{
	$binario='';
	for($i=0;$i<5;$i++)
	{
		$binario.=$bin1[$i].$bin2[$i];
	}
	return $binario;
}


function CreaCod($x,$y,$bin)
{
   $p=0.35;
   $pv=0.35;
   $gv=1;
   $g=1;
   $l=0.45;
   $a=10;
  $this->Rect($x,$y,$p,$a,'F');
  $x=$x+$l+$p;
  $this->Rect($x,$y,$p,$a,'F');
  $x=$x+$l+$p;
  for($i=0;$i<strlen($bin);$i++)
	  {   $s=$i+1;
	    if($bin[$i]=='0')
		   {
		     if(($s%2)==0)
			     {
				   $x=$x+$l+$pv;
				 }
		      elseif(($s%2)==1)
			     {
				   $l=0.45;
                   $this->Rect($x,$y,$p,$a,'F');
				}
		   }
		 elseif($bin[$i]=='1')
		   {
		      if(($s%2)==0)
			     {
				  $x=$x+$l+$gv;
				 }
		      elseif(($s%2)==1)
			     {
				  $l=$g;
                  $this->Rect($x,$y,$g,$a,'F');
				 }

		    }
	  }
	   $l=0.45;
	   $this->Rect($x,$y,$g,$a,'F');
       $x=$x+$l+$g;
       $this->Rect($x,$y,$p,$a,'F');
       return $x+$p;
   }
}
?>