<?php 
include_once CLASSPATH.'box.class.php';
$box=new box();
$resid=mysql_query("select * from immobili i,localita l, tipi t where residence=1 and pubblicato=1  and t.id_tipi=i.id_tipi and l.id_localita=i.id_localita ");
echo '<ul>';
while($r=mysql_fetch_assoc($resid))
{
	echo '<li><a href="'.$box->costruisciPath('residence', $r, $_SESSION['lan']).'" title="'.stripslashes($r['nome_immobile_'.$_SESSION['lan']]).'">'.stripslashes($r['nome_immobile_'.$_SESSION['lan']]).'</a></li>';
}
echo '</ul>';
?>
