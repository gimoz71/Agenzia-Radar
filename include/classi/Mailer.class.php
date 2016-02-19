<?php
class Mailer{
	var $_properties=array();
	var $_fileAll=array();
	var $_messaggio;
	var $_oggetto;
	
    
	/*Costruttore*/
	function Mailer($elenco) {
        $this->_properties= array();
        foreach($elenco as $e)
        {
          if($e['tipo']=='file')
          {
          	print ('file inserito');
          	$this->_fileAll[]=$e;
          }
          elseif($e['tipo']!='label') 
          {
          	$this->_properties[]=$e;
          }	
        }
    }
	
    function creaTestoMail($cosa)
    {
    	$this->_messaggio='';
    	
    	if($cosa=='contatti')
    	{
    		$this->_messaggio="E' stata inviata un arichiesta di contatto dal sito web. I dati sono i seguenti <br />";
    	}
    	elseif($cosa=='lavoro')
    	{
    		$this->_messaggio="E' stato inviato un curriculum con i seguanti dati: <br />";
    	}
    
    	foreach($this->_properties as $m)
    	{
    		if($m['nome']!='privacy')
	    			$this->_messaggio.=html_entity_decode(stripslashes(str_replace('*','',$m['label']))).": ".html_entity_decode(stripslashes($_POST[$m['nome']]))." <br />";
		}
		
	}
	
    function creaOggetto($cosa)
    {
    	$this->_oggetto='';
    	if($cosa=='contatti')
    		$this->_oggetto='Richiesta di contatto';
    	elseif($cosa=='lavoro')
    		$this->_oggetto='Cussiculum Vitae';	
    }
}
?>