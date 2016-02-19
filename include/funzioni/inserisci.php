<?php session_start();
include('conf.php');
require_once(INCLUDEPATH.'cd.php');
require_once(INCLUDEPATH.'array.php');
require_once('utilita.php');
require_once(CLASSPATH.'interfaccia.class.php');
if(isset($_POST['inserisci']))
{
  $dove='amministrazione';
  if(isset($_SESSION['cliente']))
  		{
  			$dove='users';
  		}
  if(isset($_GET['url']))
  	{
  		$url='../../'.$_GET['url'].'?cosa='.$_GET['cosa'];

  	}
  	elseif (isset($_POST['url']))
  	{

  		$url='../../'.$dove.'/'.$_POST['url'];
   	}
  	else
  	{
   	    $url="../../".$dove."/inserisci.php?cosa=".$_GET['cosa'];
   	}
  $int=new interfaccia($$_GET['cosa']);
  $int->genera_controlli_php($url);
  $query="insert into ".$_GET['cosa']." (";
  $value=" values(";
  $i=0;
  $foto=array();
  foreach($$_GET['cosa'] as $s)
  {
    if($s['tipo']!='file'  && $s['tipo']!='tab' && $s['tipo']!='tabs' && $s['tipo']!='titolo')
    {
      if($s['tipo']=='checkbox')
      {
        if(isset($s['unico']) && $_POST[$s['nome']]=='1')
        {
          $fine='';
          $query2="update ".$_GET['cosa']." set ".$s['nome']."=0".$fine;
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
      elseif ($s['tipo']=='password')
      {
      	$_POST[$s['nome']]=md5($_POST[$s['nome']]);
      }
      if($i==0)
      {
        $query.=$s['nome'];
        $value.="'".$_POST[$s['nome']]."'";
        $i++;
      }
      else
      {
        $query.=','.$s['nome'];
        $value.=",'".$_POST[$s['nome']]."'";
      }
    }
    elseif (isset($s['genere']) && !isset($s['onsubmit']))
    {
    	$file[]=$s;
    }
    elseif(!isset($s['onsubmit'])  && $s['tipo']!='tab' && $s['tipo']!='tabs' && $s['tipo']!='titolo')
    {
        $foto[]=$s;
    }
  }
  if(isset($query2))
  {
    mysql_query($query2)or die(mysql_error());
  }
  if($_GET['cosa']!='foto_usato')
  {
    $query.=')';
    $value.=')';
    mysql_query($query.$value)or die(mysql_error());
    $id_modello=mysql_insert_id();
  }
  $i=$id_modello;
  foreach($foto as $f)
  {
  	$descrizione=$id_modello.$f['nome'];
    if($_FILES[$f['nome']]['tmp_name']!='' && !isset($f['diretta']))
    {
    	$nome=ins_foto($_FILES[$f['nome']],$_GET['cosa'].$i,$descrizione);
    }
    elseif($_FILES[$f['nome']]['tmp_name']!='' && isset($f['diretta']))
    {
    	$nome=ins_file($_FILES[$f['nome']],$_GET['cosa'].$i,$descrizione);
    }
    else
    {
      	$nome='';
    }

    if(substr($_GET['cosa'],$nome) || $nome=='')
    {
      $i++;
      mysql_query("update ".$_GET['cosa']." set ".$f['nome']."='".$nome."' where id_".$_GET['cosa']."='".$id_modello."'")or die(mysql_error());
    }
  }
  if (isset($file))
  {
  foreach ($file as $fi)
  {
  	$newName='file_'.$id_modello;
  	$nome=copyFile($_FILES[$fi['nome']],$newName);
  	if($nome!==false)
  	{
  		$i++;
  		mysql_query("update ".$_GET['cosa']." set ".$fi['nome']."='".$nome."' where id_".$_GET['cosa']."='".$id_modello."'")or die(mysql_error());
  	}
  }
  }

  if($i==(count($foto)+count($file)))
  {
  	if(isset($_GET['url']))
  	{
  		header('Location: ../../'.$_GET['url'].'?ins=ok&cosa='.$_GET['cosa']);
  		exit();
  	}
  	elseif (isset($_POST['url']))
  	{
  		header('Location: ../../'.$dove.'/'.$_POST['url']);
  		exit();
  	}
  	else
  	{
	    header("Location: ../../".$dove."/inserisci.php?ins=ok&cosa=".$_GET['cosa']);
	    exit();
  	}
  }
  else
  {
    header("Location: ../../".$dove."/inserisci.php?ins=err&cosa=".$_GET['cosa']);
    exit();
  }
}
?>
