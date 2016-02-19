<?php session_start();
include('conf.php');
require_once(INCLUDEPATH.'cd.php');
require_once(INCLUDEPATH.'array.php');
require_once('utilita.php');
if(isset($_SESSION['utente']))
{
	$dove='amministrazione';
}
elseif(isset($_SESSION['cliente']))
{
	$dove='users';
}
if(isset($_GET['nomeF']))
{
	$foto=mysql_fetch_row(mysql_query("select ".$_GET['nomeF']." from ".$_GET['cosa']." where id_".$_GET['cosa']."=".$_GET['id']))or die(mysql_error());
	mysql_query("update ".$_GET['cosa']." set ".$_GET['nomeF']."='' where id_".$_GET['cosa']."=".$_GET['id']);
	@unlink('../../images/big/'.$foto[0]);
	@unlink('../../images/medie/'.$foto[0]);
	@unlink('../../images/thbn/'.$foto[0]);
	header("Location: ../../amministrazione/modifica.php?cosa=".$_GET['cosa']."&id=".$_GET['id']);
	exit();
}
elseif(isset($_POST['modifica']))
{
  $query="update ".$_GET['cosa']." set ";
  $i=0;
  $foto=array();
  foreach($$_GET['cosa'] as $s)
  {
    if($s['tipo']!='file' && $s['tipo']!='tab' && $s['tipo']!='tabs' && $s['tipo']!='titolo')
    {
      if($s['tipo']=='checkbox')
      {
        if(isset($s['unico']) && $_POST[$s['nome']]=='1')
        {
          $query2="update ".$_GET['cosa']." set ".$s['nome']."=0";
        }
        if($_POST[$s['nome']]!='1')
          $_POST[$s['nome']]=0;
        else
          $_POST[$s['nome']]=1;
      }
      elseif($s['tipo']=='textarea' || $s['tipo']=='text')
      {
          if($s['controllo']=='data')
      	 {
      	 	 $_POST[$s['nome']]=my_date($_POST[$s['nome']]);
      	 }
      	else
      	 {
      	 	$_POST[$s['nome']]=addslashes($_POST[$s['nome']]);
      	 }
      }
      if($i==0)
      {
        $query.=$s['nome'].'='."'".$_POST[$s['nome']]."'";

        $i++;
      }
      else
      {
        $query.=','.$s['nome'].'='."'".$_POST[$s['nome']]."'";

      }
    }
   elseif (isset($s['genere']))
    {
    	$file[]=$s;
    }
    elseif(!isset($s['onsubmit']))
    {
        $foto[]=$s;
    }
  }
  if($_GET['cosa']!='home')
  {
    if(isset($query2))
    {
      mysql_query($query2)or die(mysql_error());
    }

      $query.=' where id_'.$_GET['cosa']."='".$_GET['id']."'";
      //print $query;
      mysql_query($query)or die(mysql_error());
      $id_modello=$_GET['id'];


    $i=1;
    foreach($foto as $f)
    {
      $descrizione=$id_modello.$f['nome'];
      $nome='';
      if($_FILES[$f['nome']]['tmp_name']!=''  && !isset($f['diretta']))
      {
         $foto_inserite=mysql_fetch_assoc(mysql_query("select * from ".$_GET['cosa']." where id_".$_GET['cosa']."='".$id_modello."'"));
         $nome=ins_foto($_FILES[$f['nome']],$_GET['cosa'],$descrizione);

      }
      elseif($_FILES[$f['nome']]['tmp_name']!='' && isset($f['diretta']))
	  {
        $foto_inserite=mysql_fetch_assoc(mysql_query("select * from ".$_GET['cosa']." where id_".$_GET['cosa']."='".$id_modello."'"));
        $nome=ins_file($_FILES[$f['nome']],$_GET['cosa'].$i,$descrizione);

	  }
      else
      {
        $nome='';
      }
      if(strstr($nome,$_GET['cosa']) || $nome=='')
      {
          $i++;
          if($nome!='')
        	{
        	  //print $nome.'--'.$foto_inserite[$f['nome']].'<br />';
        	  if($foto_inserite[$f['nome']]!=$nome)
        	  {
        	  @unlink('../../images/thbn/'.$foto_inserite[$f['nome']]);
	          @unlink('../../images/big/'.$foto_inserite[$f['nome']]);
        	  }
        	  //print "update ".$_GET['cosa']." set ".$f['nome']."='".$nome."' where id_".$_GET['cosa']."='".$id_modello."'";
	          mysql_query("update ".$_GET['cosa']." set ".$f['nome']."='".$nome."' where id_".$_GET['cosa']."='".$id_modello."'")or die(mysql_error());
        	}
      }
    }
   if(isset($file))
   {
	  foreach ($file as $fi)
	  {
	  	if($_FILES[$fi['nome']]['tmp_name']!='')
	  	{
	  	$newName='tool'.$id_modello;
	  	$file_inserite=mysql_fetch_assoc(mysql_query("select * from ".$_GET['cosa']." where id_".$_GET['cosa']."='".$id_modello."'"));
	    unlink(FILEPATH.$file_inserite[$fi['nome']]);
	  	$nome=copyFile($_FILES[$fi['nome']],$newName);
	  	if($nome!==false)
	  	{
	  		$i++;
	  		mysql_query("update ".$_GET['cosa']." set ".$fi['nome']."='".$nome."' where id_".$_GET['cosa']."='".$id_modello."'")or die(mysql_error());
	  	}
	  	}
	  	else
	  	{
	  		$i++;
	  	}
	  }
    }
  }

 if(isset($_REQUEST['url']))
  {
    header("Location: ../../".$dove."/".$_REQUEST['url']."&ins=ok");
    exit();
  }
  else
  {
  	header("Location: ../../".$dove."/modifica.php?ins=ok&cosa=".$_GET['cosa']."&id=".$_GET['id']."&db=".$_GET['db']);
    exit();
  }
}
elseif(isset($_POST['cancella']))
{

    $ris=mysql_fetch_assoc(mysql_query("select * from ".$_GET['cosa']." where id_".$_GET['cosa']."='".$_GET['id']."'"));
    foreach($$_GET['cosa'] as $s)
    {
      if($s['tipo']=='file')
      {
        @unlink('../../images/thbn/'.$ris[$s['nome']]);
        @unlink('../../images/grandi/'.$ris[$s['nome']]);
      }
    }
    mysql_query("delete from ".$_GET['cosa']." where id_".$_GET['cosa']."=".$_GET['id']);
    if(isset($_REQUEST['url']))
	  {
	    header("Location: ../../".$dove.'/'.$_REQUEST['url']);
	    exit();
	  }
	  elseif($_GET['cosa']=='immobili')
	  {
	  	header("Location: ../../".$dove."/elenco.php");
	    exit();
	  }
	  else
	  {
	  	header("Location: ../../".$dove."/lista.php?cosa=".$_GET['cosa']."&nome=".$_GET['nome']);
	    exit();
	  }

}
?>
