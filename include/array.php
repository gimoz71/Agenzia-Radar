<?php
$news=array(
array(
      nome=>'tabs',
      label=>'Generale',
      tipo=>'tabs',
      voci=>array(
      		'generali'=>'Generale',
            'traduzioni'=>'Traduzioni'
      )      
   ),
   array(
    nome=>'generali',
    label=>'Generali',
    tipo=>'tab',
    primo=>1
   ),
 array(
      nome=>'data_news',
      label=>'Data (Es. 15/12/2007)',
      tipo=>'text',
      controllo=>'data'
    ),
  array(
      nome=>'titolo_news_it',
      label=>'Titolo italiano',
      tipo=>'text',
      controllo=>'*'
    ),
   array(
      nome=>'descrizione_news_it',
      label=>'Testo italiano',
      tipo=>'textarea',
      editor=>1
    ),  
  array(
      nome=>'foto_news',
      label=>'Foto',
      tipo=>'file'
    ),
   array(
      nome=>'pubblicata',
      label=>'Pubblica',
      tipo=>'checkbox'
    ),    
  array(
    nome=>'traduzioni',
    label=>'Traduzioni',
    tipo=>'tab'
   ),  
  array(
      nome=>'titolo_news_en',
      label=>'Titolo inglese',
      tipo=>'text'
    ),
   array(
      nome=>'descrizione_news_en',
      label=>'Testo inglese',
      tipo=>'textarea',
      editor=>1
    ),
    array(
      nome=>'titolo_news_de',
      label=>'Titolo tedesco',
      tipo=>'text'
    ),
   array(
      nome=>'descrizione_news_de',
      label=>'Testo tedesco',
      tipo=>'textarea',
      editor=>1
    ),  
  array(
      nome=>'titolo_news_ru',
      label=>'Titolo russo',
      tipo=>'text'
    ),
   array(
      nome=>'descrizione_news_ru',
      label=>'Testo russo (<a href="http://translate.google.it/?hl=&ie=UTF-8&sl=it&tl=ru#" target="_blank">Traduttore di Google</a>)',
      tipo=>'textarea',
      editor=>1
    )    
  );
$immobili=array(
   array(
      nome=>'tabs',
      label=>'Generale',
      tipo=>'tabs',
      voci=>array(
      		'generali'=>'Generali',
             'caratteristiche'=>'Caratteristiche',
            'proprietario'=>'Dati proprietario',           
            'foto'=>'Foto',
            'periodi'=>'Periodi'
      )      
   ),
   array(
    nome=>'generali',
    label=>'Generali',
    tipo=>'tab',
    primo=>1
   ),
    array(
      nome=>'rif',
      label=>'Riferimento',
      tipo=>'text'
    ),
    array(
      nome=>'ordine',
      label=>'Ordine (ordinamento dal numero più basso al più alto)',
      tipo=>'text'
    ),
    array(
      nome=>'residence',
      label=>"E' un residence (spuntare solo per i residence e NON per gli appartamenti dei residence)",
      tipo=>'checkbox'
    ),
    array(
      nome=>'id_residence',
      label=>'Nome residence',
      tipo=>'select',
      facoltativo=>1,
      db=>'immobili',
      campi=>array(
              1=>'nome_immobile_it'
            ),
      condizione=>' residence=1 '

    ),
     array(
      nome=>'categoria_immobile',
      label=>'Categoria immobile',
      tipo=>'select',
      voci=>array(
             'residenziale'=>'Residenziale',
             'commerciale'=>'Commerciale',  
			 'industriale'=>'Industriale',
             'posti_barca'=>'Posti barca'  
			 )
    ),
    array(
      nome=>'id_tipi',
      label=>'Tipo immobile',
      tipo=>'select',
      db=>'tipi',
      campi=>array(
              1=>'nome_tipo_it'
            )
    ),
     array(
      nome=>'contratto',
      label=>'Contratto',
      tipo=>'select',
      voci=>array(
             'affitto'=>'Affitto',
			 'vendita'=>'Vendita'  
			 )
    ),
     array(
      nome=>'tipo_affitto',
      label=>'Tipo affitto',
      tipo=>'select',
      facoltativo=>1,
      voci=>array(
             'mensile'=>'Mensile',
			 'settimanale'=>'Settimanale',
             'stagionale'=>'Stagionale',
             'annuale'=>'Annuale'  
             )
    ),
     array(
      nome=>'descrizione_prezzo',
      label=>'Specifiche prezzo',
      tipo=>'select',
      facoltativo=>1,
      voci=>array(
             'trattabili'=>'Trattabili',
			 'partire'=>'A partire da',
             'fissato'=>'Prezzo fissato a',
             'privata'=>'Trattativa riservata',
             'agenzia'=>'Info e costi in agenzia'
             )
    ),
    array(
      nome=>'prezzo',
      label=>'Prezzo',
      tipo=>'text'
    ),
   array(
      nome=>'prezzo_visibile',
      label=>'Prezzo visibile',
      tipo=>'checkbox'
    ),    
    array(
      nome=>'mq',
      label=>'Mq',
      tipo=>'text'
    ),
    array(
      nome=>'nome_immobile_it',
      label=>'Nome Italiano',
      tipo=>'text',
      controllo=>'*'
    ),
   array(
      nome=>'descrizione_it',
      label=>'Descrizione Italiano',
      tipo=>'textarea'
    ),
    array(
      nome=>'nome_immobile_en',
      label=>'Nome Inglese',
      tipo=>'text'
    ),
   array(
      nome=>'descrizione_en',
      label=>'Descrizione Inglese (<a href="http://translate.google.it/?hl=&ie=UTF-8&sl=it&tl=en#" target="_blank">Traduttore di Google</a>)',
      tipo=>'textarea',
      editor=>'full'
    ),
     array(
      nome=>'nome_immobile_de',
      label=>'Nome Tedesco',
      tipo=>'text'
    ),
   array(
      nome=>'descrizione_de',
      label=>'Descrizione Tedesco (<a href="http://translate.google.it/?hl=&ie=UTF-8&sl=it&tl=de#" target="_blank">Traduttore di Google</a>)',
      tipo=>'textarea',
      editor=>'full'
    ),
     array(
      nome=>'nome_immobile_ru',
      label=>'Nome Russo',
      tipo=>'text'
    ),
   array(
      nome=>'descrizione_ru',
      label=>'Descrizione Russo (<a href="http://translate.google.it/?hl=&ie=UTF-8&sl=it&tl=ru#" target="_blank">Traduttore di Google</a>)',
      tipo=>'textarea',
      editor=>'full'
    ),
    array(
      nome=>'id_localita',
      label=>'Localita immobile',
      tipo=>'select',
      db=>'localita',
      campi=>array(
              1=>'localita',
              2=>'comune',
              3=>'provincia'
            )
    ),
    array(
    nome=>'caratteristiche',
    label=>'Caratteristiche',
    tipo=>'tab'
   ),
    array(
      nome=>'piano',
      label=>'Piano',
      tipo=>'text'
    ),    
     array(
      nome=>'n_vani',
      label=>'Numero vani/Posti letto (solo per appartamenti residence)',
      tipo=>'text',
      siz=>2
    ),
   
     array(
      nome=>'googlemap',
      label=>'Googlemap',
      tipo=>'text'
    ),
    array(
      nome=>'youtube',
      label=>'Youtube',
      tipo=>'text'
    ),
    array(
      nome=>'dis_stazione',
      label=>'Distanza stazione (m)',
      tipo=>'text'
    ),
    array(
      nome=>'dis_negozi',
      label=>'Distanza negozi (m)',
      tipo=>'text'
    ),
    array(
      nome=>'dis_mare',
      label=>'Distanza mare (m)',
      tipo=>'text'
    ),
    array(
      nome=>'home',
      label=>'Home',
      tipo=>'checkbox'
    ),
    array(
      nome=>'last_minute',
      label=>'Offerte e Last minute',
      tipo=>'checkbox'
    ),
    array(
      nome=>'offerta',
      label=>'Case vacanza',
      tipo=>'checkbox'
    ),
   array(
      nome=>'pubblicato',
      label=>'Visualizza inserzione',
      tipo=>'checkbox',
      checked=>1
    ),
    array(
    nome=>'proprietario',
    label=>'Dati proprietario',
    tipo=>'tab'
   ),
    array(
      nome=>'cognome_proprietario',
      label=>'Cognome proprietario',
      tipo=>'text'
    ),
   array(
      nome=>'dati_proprietario',
      label=>'Dati proprietario',
      tipo=>'textarea',
      editor=>'full'
    ),
   array(
    nome=>'foto',
    label=>'Foto',
    tipo=>'tab'
   ),
   array(
      nome=>'foto_g_immobile',
      label=>'Foto principale',
      tipo=>'file'
    ),   
    array(
      nome=>'foto1_immobile',
      label=>'Foto 1',
      tipo=>'file'
    ),
    array(
      nome=>'foto2_immobile',
      label=>'Foto 2',
      tipo=>'file'
    ),
    array(
      nome=>'foto3_immobile',
      label=>'Foto 3',
      tipo=>'file'
    ),
    array(
      nome=>'foto4_immobile',
      label=>'Foto 4',
      tipo=>'file'
    ),
    array(
      nome=>'foto5_immobile',
      label=>'Foto 5',
      tipo=>'file'
    ),
    array(
      nome=>'foto6_immobile',
      label=>'Foto 6',
      tipo=>'file'
    ),
    array(
      nome=>'foto7_immobile',
      label=>'Foto 7',
      tipo=>'file'
    ),
    array(
      nome=>'foto8_immobile',
      label=>'Foto 8',
      tipo=>'file'
    ),
    array(
      nome=>'foto9_immobile',
      label=>'Foto 9',
      tipo=>'file'
    ),
    array(
      nome=>'foto10_immobile',
      label=>'Foto 10',
      tipo=>'file'
    ),
    array(
    nome=>'periodi',
    label=>'Periodi',
    tipo=>'tab'
   ),
   
    array(
        nome=>'maggio_p',
        label=>'Prezzo mese di maggio',
        tipo=>'text'
    ),
    array(
        nome=>'maggio_1',
        label=>'1a maggio',
        tipo=>'checkbox'
    ),
    array(
        nome=>'maggio_p_1',
        label=>'Prezzo 1a di maggio',
        tipo=>'text'
    ),
    array(
        nome=>'maggio_2',
        label=>'2a maggio',
        tipo=>'checkbox'
    ),
    array(
        nome=>'maggio_p_2',
        label=>'Prezzo 2a di maggio',
        tipo=>'text'
    ),
    array(
      nome=>'testo_maggio',
      label=>'Testo maggio',
      tipo=>'textarea'
    ),
   
    array(
        nome=>'giugno_p',
        label=>'Prezzo mese di giugno',
        tipo=>'text'
    ),
    array(
        nome=>'giugno_1',
        label=>'1a giugno',
        tipo=>'checkbox'
    ),
    array(
        nome=>'giugno_p_1',
        label=>'Prezzo 1a di giugno',
        tipo=>'text'
    ),
    array(
        nome=>'giugno_2',
        label=>'2a giugno',
        tipo=>'checkbox'
    ),
    array(
        nome=>'giugno_p_2',
        label=>'Prezzo 2a di giugno',
        tipo=>'text'
    ),
    array(
      nome=>'testo_giugno',
      label=>'Testo Giugno',
      tipo=>'textarea'
    ),
    
    array(
        nome=>'luglio_p',
        label=>'Prezzo mese di luglio',
        tipo=>'text'
    ),
    array(
        nome=>'luglio_1',
        label=>'1a luglio',
        tipo=>'checkbox'
    ),
    array(
        nome=>'luglio_p_1',
        label=>'Prezzo 1a di luglio',
        tipo=>'text'
    ),
    array(
        nome=>'luglio_2',
        label=>'2a luglio',
        tipo=>'checkbox'
    ),
    array(
        nome=>'luglio_p_2',
        label=>'Prezzo 2a di luglio',
        tipo=>'text'
    ),
    array(
      nome=>'testo_luglio',
      label=>'Testo Luglio',
      tipo=>'textarea'
    ),
   
    array(
        nome=>'agosto_p',
        label=>'Prezzo mese di agosto',
        tipo=>'text'
    ),
    array(
        nome=>'agosto_1',
        label=>'1a agosto',
        tipo=>'checkbox'
    ),
    array(
        nome=>'agosto_p_1',
        label=>'Prezzo 1a di agosto',
        tipo=>'text'
    ),
    array(
        nome=>'agosto_2',
        label=>'2a agosto',
        tipo=>'checkbox'
    ),
    array(
        nome=>'agosto_p_2',
        label=>'Prezzo 2a di agosto',
        tipo=>'text'
    ),
    array(
      nome=>'testo_agosto',
      label=>'Testo Agosto',
      tipo=>'textarea'
    ),
   
    array(
        nome=>'settembre_p',
        label=>'Prezzo mese di settembre',
        tipo=>'text'
    ),
    array(
        nome=>'settembre_1',
        label=>'1a settembre',
        tipo=>'checkbox'
    ),
    array(
        nome=>'settembre_p_1',
        label=>'Prezzo 1a di settembre',
        tipo=>'text'
    ),
    array(
        nome=>'settembre_2',
        label=>'2a settembre',
        tipo=>'checkbox'
    ),
    array(
        nome=>'settembre_p_2',
        label=>'Prezzo 2a di settembre',
        tipo=>'text'
    ),
    array(
      nome=>'testo_settembre',
      label=>'Testo Settembre',
      tipo=>'textarea'
    ),
    array(
      nome=>'testo_altro',
      label=>'Testo Altro',
      tipo=>'textarea'
    ),
    array(
        nome=>'note_listino',
        label=>'Note listino',
        tipo=>'textarea'
    ),
);

$localita=array(
    array(
      nome=>'localita',
      label=>'Localita',
      tipo=>'text'
    ),
	array(
      nome=>'comune',
      label=>'Comune',
      tipo=>'text',
      controllo=>'*'
    ),
    array(
      nome=>'provincia',
      label=>'Provincia',
      tipo=>'text',
      controllo=>'*'
    ),
    array(
      nome=>'regione',
      label=>'Regione',
      tipo=>'text',
      controllo=>'*'
    )
);
$tipi=array(
	 array(
      nome=>'nome_tipo_it',
      label=>'Nome tipo italiano',
      tipo=>'text'
    ),
     array(
      nome=>'nome_tipo_en',
      label=>'Nome tipo inglese',
      tipo=>'text'
    ),
     array(
      nome=>'nome_tipo_de',
      label=>'Nome tipo tedesco',
      tipo=>'text'
    ),
     array(
      nome=>'nome_tipo_ru',
      label=>'Nome tipo russo',
      tipo=>'text'
    ),
);
$contatti=array(
    array(
      nome=>'rif',
      label=>'Riferimento immobile',
      tipo=>'text'
    ),
    array(
      nome=>'nome',
      label=>'Nome',
      tipo=>'text'
    ),
    array(
      nome=>'cognome',
      label=>'Cognome',
      tipo=>'text'
    ),
   array(
      nome=>'stato',
      label=>'Stato',
      tipo=>'text'
    ),
   array(
      nome=>'citta',
      label=>'Citt&agrave;',
      tipo=>'text'
    ),
    array(
      nome=>'telefono',
      label=>'Telefono',
      tipo=>'text'
    ),
     array(
      nome=>'cellulare',
      label=>'Cellulare',
      tipo=>'text'
    ),
     array(
      nome=>'email',
      label=>'E-mail',
      tipo=>'text'
    ),
    array(
      nome=>'richiesta',
      label=>'Richiesta',
      tipo=>'textarea'
    )
  );
  $risposta=array(
    array(
      nome=>'ann',
      label=>'Risposta per segnalazione immobili',
      tipo=>'text'
    ),
    array(
      nome=>'nome',
      label=>'Nome',
      tipo=>'text'
    ),
    array(
      nome=>'cognome',
      label=>'Cognome',
      tipo=>'text'
    ),
   array(
      nome=>'stato',
      label=>'Stato',
      tipo=>'text'
    ),
   array(
      nome=>'citta',
      label=>'Citt&agrave;',
      tipo=>'text'
    ),
    array(
      nome=>'telefono',
      label=>'Telefono',
      tipo=>'text'
    ),
     array(
      nome=>'cellulare',
      label=>'Cellulare',
      tipo=>'text'
    ),
     array(
      nome=>'email',
      label=>'E-mail',
      tipo=>'text'
    ),
    array(
      nome=>'richiesta',
      label=>'Richiesta',
      tipo=>'textarea'
    )
  );
  $pagine=array(
   array(
      nome=>'menu_ita',
      label=>'Voce Menu Italiano',
      tipo=>'text'
    ),
   array(
      nome=>'menu_eng',
      label=>'Voce Menu Inglese',
      tipo=>'text'
    ),
   array(
      nome=>'titolo_pagina_ita',
      label=>'Titolo Italiano',
      tipo=>'text'
    ),
   array(
      nome=>'titolo_pagina_eng',
      label=>'Titolo Inglese',
      tipo=>'text'
    ),
  array(
      nome=>'descrizione_pagina_ita',
      label=>'Descrizione Italiano',
      tipo=>'textarea'
    ),
  array(
      nome=>'descrizione_pagina_eng',
      label=>'Descrizione Inglese',
      tipo=>'textarea'
    ),
  array(
      nome=>'testo_pagina_ita',
      label=>'Testo Italiano',
      tipo=>'textarea',
      editor=>'full'
    ),
   array(
      nome=>'testo_pagina_eng',
      label=>'Testo Inglese',
      tipo=>'textarea',
      editor=>'full'
    ),
    array(
      nome=>'ordine',
      label=>'Ordine pagina',
      tipo=>'text',
      size=>'2'
    ),
    array(
      nome=>'orizzontale',
      label=>'Menu orizzontale',
      tipo=>'checkbox'
    )
  );
  $titoli=array(
  	'eng'=>'Agenzia Immobiliare Radar',
  	'ita'=>'Agenzia Immobiliare Radar '
  );
  $annunci=array(
    array(
      nome=>'testo_annuncio_ita',
      label=>'Testo italiano (Max. 255 caratteri)',
      tipo=>'textarea',
      editor=>'full'
    ),
    array(
      nome=>'testo_annuncio_eng',
      label=>'Testo inglese (Max. 255 caratteri)',
      tipo=>'textarea',
      editor=>'full'
    ),
     array(
      nome=>'pubblicato',
      label=>'Pubblica',
      tipo=>'checkbox'
    )
);
?>