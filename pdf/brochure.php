<?php session_start();
require_once('../include/classi/tcpdf/config/lang/eng.php');
require_once('../include/classi/tcpdf/tcpdf.php');
if($_SESSION['lan']=='ru')
	$fontLan='arialunicid0';
else
	$fontLan='helvetica';	
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
    }

    // Page footer
    public function Footer() {
        $this->setFontSubsetting(false);
    	// Position at 1.5 cm from bottom

    	$this->SetY(280);
        // Set font
        
       	$this->SetFont($fontLan, 'I', 10);
   
        // Page number
        $this->Image(IMAGESPATH.'logo-pdf.jpg',5,280);
        $this->MultiCell(130, 5, "Tel +39 0586 752596 - Web www.agenziaradar.it - Email info@agenziaradar.it", 0,'L',0,1,74,288);
        $this->SetFont($fontLan, 'BI', 10);
        $this->MultiCell(100, 5, 'Pag. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0,'C',0,1,54,280);
    }
}
include('config.php');
include(INCLUDEPATH.'cd.php');
include(INCLUDEPATH.'array.php');
$lan=$_SESSION['lan'];
$im=mysql_fetch_assoc(mysql_query("
	select 
		*
	from
		immobili i,
		localita l,
		tipi t
	where
	    i.id_tipi=t.id_tipi and
	    i.id_localita=l.id_localita and
	    id_immobili=".$_GET['id']))or die(mysql_error());
$titolo='';
if($im['rif']!='')
	$titolo='Rif.:'.$im['rif'].' - ';
$titolo.=stripslashes($im['localita']).' '.$im['contratto'].' '.stripslashes($im['nome_tipo_'.$_SESSION['lan']]).' '.stripslashes($im['nome_immobile_'.$_SESSION['lan']]);
$pdf=new MYPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Beatrice Bartoli');
$pdf->SetTitle($titolo);
$pdf->SetSubject('Brochure di '.$titolo);
$pdf->SetKeywords($im['nome_tipo_'.$lan].','.$im['localita'].','.$im['nome_immobile']);
$pdf->setFontSubsetting(false);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->setPrintFooter(true);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
/*
$pdf->AddPage();
$pdf->SetFont($fontLan,'',10);
$pdf->Image(IMAGESPATH.'logo_radar.pdf',33,20);
$pdf->SetY(85);
$pdf->SetX(33);
$pdf->Cell(145,0,'Via Aurelia, 548 - 57012 Castiglioncello (LI) - Italy',0,2,'C');
$pdf->SetY(90);
$pdf->SetX(33);
$pdf->Cell(145,0,'Tel +39 0586 752596 - Web www.agenziaradar.it - Email info@agenziaradar.it',0,2,'C');
$pdf->SetFont($fontLan,'B',18);
$pdf->SetY(120);
$pdf->SetX(33);
$pdf->Cell(145,0,$titolo,0,2,'C');
$pdf->SetX(0);
$pdf->SetY(150);
if(is_file('../../images/medie/'.$im['foto_g_immobile']))
{
	$pdf->WriteHTML('<table align="center" width="100%"><tr><td align="center" valign="middle"><img src="../images/medie/'.$im['foto_g_immobile'].'" /></td></tr></table>',false);
}
else 
{
	$pdf->WriteHTML('<table align="center" width="100%"><tr><td align="center" valign="middle"><img src="../images/medie/imagenotavailable_big.gif" /></td></tr></table>',false);
}
$pdf->SetFont($fontLan,'',10);
//Pagina della descrizione
 * 
 */
$pdf->AddPage();

$pdf->setPrintHeader(true);
$pdf->SetFont($fontLan, 'B', 14);
$pdf->SetY(5);
$pdf->SetX(33);
$pdf->Cell(145,0,$titolo,0,2,'C');
$pdf->SetY(10);

if($prezzo>0)
{
$pdf->WriteHTML('<div align="center">&euro; '.number_format($im['prezzo'],0,',','.').'</div>',false);
}
if($im['foto_g_immobile']!='')
{
	$pdf->Image(IMAGESPATH.'medie/'.$im['foto_g_immobile'],13,15,0,80,'','','C');
}	
else 
{
	$pdf->Image(IMAGESPATH.'medie/imagenotavailable_big.gif',5,17);
}
$pdf->SetY(100);
$pdf->SetX(10);
 
        	$pdf->SetFont($fontLan, '', 12);

$pdf->WriteHTML('<table align="center" width="520"><tr><td align="left">'.stripslashes($im['descrizione_'.$lan]).'</td></tr></table>',false);

if($im['residence']==1)
{
	$appartamenti=mysql_query("select * from immobili i, tipi t where i.id_tipi=t.id_tipi and id_residence=".$im['id_immobili'].' order by ordine');
	if(mysql_num_rows($appartamenti)>0)
	{
		$testoHtml='<ul>';
		while($app=mysql_fetch_array($appartamenti))
		{
			$testoHtml.='<h4>'.stripslashes($app['nome_tipo_'.$lan]).' '.stripslashes($app['nome_immobile_'.$lan]).' ('.$app['n_vani'].' '.POSTI_LETTO.')</h4>';
			$testoHtml.=strip_tags(stripslashes($app['descrizione_'.$lan]));
		}
		$testoHtml.='</ul>';
		$pdf->AddPage();
	    //$this->SetFont($fontLan, 'I', 10);
       
		$pdf->SetFont($fontLan,'B',12);
		$pdf->SetY(5);
		$pdf->SetX(33);
		$pdf->Cell(145,0,'Tipologie appartamenti',0,2,'C');
		$pdf->SetFont($fontLan,'',10);
		$pdf->SetY(10);
		$pdf->SetX(33);
		$pdf->WriteHTML($testoHtml,false);
		
	}
}

$pdf->Output();


?>
