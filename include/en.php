<?php
/*Array utili*/

$desPrezzo=array(
		'trattabili'=>'Negotiable',
        'partire'=>'From',
        'fissato'=>'Set at',
        'privata'=>'private negotiation',
        'agenzia'=>'Prices and information at the agency'
);
$affitto='for rent';
$vendita='for sale';
$desCategorie=array(
		'residenziale'=>'residential',
        'commerciale'=>'commercial',
        'posto_barca'=>'berth',
        'industriale'=>'industrial'
);
$caratteristicheImmobili=array(
    'contratto'=>'Contract',
	'prezzo'=>'Price',
    'nome_tipo_it'=>'Type',
    'mq'=>'Square meters',
    'n_vani'=>'Number of Rooms',
    'piano'=>'Floor',
    'dis_negozi'=>'Distance from stores  (m)',	
	'dis_stazione'=>'Distance from the train station  (m)',
	'dis_mare'=>'Distance from the sea  (m)',
	'IPE'=>'Classe Energetica'
);
$caratteristicheCaseVacanza=array(
    'prezzo'=>'Price',
    'nome_tipo_it'=>'Type',
    'mq'=>'Square meters',
    'n_vani'=>'Sleeps',
    'piano'=>'Floor',
   'dis_negozi'=>'Distance from stores (m)',	
	'dis_stazione'=>'Distance from the train station  (m)',
	'dis_mare'=>'Distance from the sea  (m)',
	'IPE'=>'Classe Energetica'
);
/*Menu*/
define('AGENZIA',"THE AGENCY");
define('SERVIZI','SERVICES');
define('PROPOSTE','REAL ESTATE PROPERTIES FOR SALE');
define('VACANZE','VACATION HOMES FOR RENT');
define('RESIDENCE','WEEKLY VACATION RENTAL');
define('DINTORNI','THE SURROUNDINGS');
define('INFORMAZIONI','LOCATION');               
define('CONTATTI','CONTACTS');          
define('LINK','WEATHER WEBCAM');    
define('LANHTML','en-US');
define('AFFITTOESTESO','Affitti residenziali e commerciali');
define('ALTREOFFERTE','ALTRE OFFERTE');

/*Menu FOOTER*/

define('HOME_FOOTER','Homepage');
define('AGENZIA_FOOTER',"The Agency");
define('SERVIZI_FOOTER','Services');
define('PROPOSTE_FOOTER','Real Estate Properties for Sale');
define('VACANZE_FOOTER','Vacation Homes for Rent');
define('RESIDENCE_FOOTER','Vacation Residences for Rent');
define('DINTORNI_FOOTER','The Surroundings');
define('INFORMAZIONI_FOOTER','Location');               
define('CONTATTI_FOOTER','Contacts');          
define('LINK_FOOTER','Weather Webcam');    
define('PAGAMENTI_FOOTER','Payments');
define('RESIDENCESULMARE_FOOTER','Residence on the Tuscan seaside');
define('PRIVACY_FOOTER','Disclaimer - Privacy');



/*Tipi*/
define('ALTRE','View other options');
define('T_CASE_VACANZA','vacation homes');
define('IMMOBILI','buildings');
define('RESIDENCE','residences');
define('LAST_MINUTE','last minute');
define('POSTI_LETTO','Sleeps');
define('APPARTAMENTI','Types of apartments');

/*Campi form*/
define('NOME','Name');
define('COGNOME','Surname');
define('TELEFONO','Phone');
define('CELLULARE','Mobile');
define('STATO','State');
define('CITTA','City');
define('NOTE','Request');
define('PROPOSTA','Proposal');
define('INVIA','Send');
define('RICHIEDI','Request information on this building');
define('LETTO','Read and approved ');
define('INFORMATIVA','information on the privacy policy');
define('PAGAMENTI','Payments');
define('FAX','Fax');
define('INDIRIZZO','Address');
define('CAP','Zip Code');
define('PROVINCIA','Province/Region');
define('EMAIL','Email');
define('IMPORTO','Amount');
define('CONFERMA','Confirmation');
define('ORDINAPREZZO','Oridina per prezzo');

/*Keywords*/
define('KEY_CASE1','vacation homes');
define('KEY_IMMOBILE','building');
define('KEY_RESIDENCE','residence');
define('KEY_LAST','offers, last minute');

/*Titoli*/
define('DETTAGLI','Go to details');
define('RICERCA','Advanced search');
define('IMMO','Real Estate Properties for Sale');
define('RES','vacation residences and apartments for  weekly rental');
define('CAS','Vacation Homes');
define('OFF','Offers and Last Minute');
define('ESTATE','Summer');
define('ESTATE_LOC','Properties for rent');
define('LISTA','List');
define('VENDITA','For Sale');
define('AFFITTO','For Rent');
define('PROP_VACANZE','Other vacation options');

/*Ricerca*/
define('TIPO','Type');
define('PREZZO','Price');
define('FINO','up to');
define('OLTRE','more than');
define('CONTRATTO','Contract');
define('CERCA','Search');
define('NOIMMO','No results were found under these parameters');
define('CATEGORIA_IMMO','Property Type');
define('LOCALITA','Place');
define('RIC_RESIDENZIALE','Residential Properties');
define('RIC_COMMERCIALE','Business');
define('RIC_BARCA','Berth');
define('RIC_CAPANNONI','Sheds');

/*Varie*/


define('SCHEDA_PDF','Download the PDF information sheet');
define('DESCRIZIONE','Description');
define('ALTRE_FOTO','More pictures');
define('DETTAGLIO','Vai al dettaglio');
define('DISPONIBILE','Available');
define('NON_DISPONIBILE','Not available');
/*Contatti*/

define('CONTATTACI','Request information');


define('CONTENUTOCONTATTI','Real Estate Agency RADAR<br /> Via Aurelia, 548 - 57012 Castiglioncello (LI)<br />
Tel. +39.0586.752596 - Fax +39.0586.759935 <br />
email: info@agenziaradar.it ');

/* Home index.php*/

define('TITOLO_BASE_INDEX','Real Estate Agency Radar of Castiglioncello - summer rentals in Castiglioncello - Livorno, Tuscany');

define('DESCRIZIONE_INDEX','The Radar real estate agency, which has 35 years of experience in the business, is available for the selling and purchasing of real estate properties, but also for the management of residences, apartments and vacation villas - free consultation');

define('KEY_INDEX','Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers, summer rentals Castiglioncello');


define('TITOLO_INDEX','WELCOME TO AGENZIARADAR.IT');  
define('CONTENUTO_INDEX',' 

Welcome to the Radar Agency\'s homepage! Here you\'ll find our wide range of attractive real estate offers – both if you\'re interested in <a href="'.LANFOLDER.'immobili.php?contratto=affitto&cerca=Cerca">renting</a> and <a href="'.LANFOLDER.'immobili.php?contratto=vendita&amp;cerca=Cerca">buying</a> one! Please, click on the menu on the left of this page to navigate our website and discover our great offers.<br>
<br>
If you are looking for a place to spend your vacation, look on the right side of each page, where you can have easy access to our <a href="'.LANFOLDER.'residence.php">residence section</a>.  In fact, we have numerous structures that can satisfy your every need.
');


/*DOVE SIAMO */

define('TITOLO_BASE_DOVE','Real Estate Agency Radar of Castiglioncello - Livorno, Tuscany');

define('DESCRIZIONE_DOVE','The Radar real estate agency, which has 35 years of experience in the business, is available for the selling and purchasing of real estate properties, but also for the management of residences, apartments and vacation villas - free consultation');

define('KEY_DOVE','Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers');


define('TITOLO_DOVE','LOCATION');  
define('TITOLO_DOVE2','How to get to Castiglioncello');
define('CONTENUTODOVESIAMO',' 

<p><strong>How to get to Castiglioncello</strong></p><br>
<p>
Castiglioncello is easy to find no matter what means of transportation you have chosen. For those who travel by car and who are coming from the North, take the highway A12 in direction of Genova-Rosignano Marittimo all the way to the castle of Rosignano Marittimo.  At this point, follow the SS1 Aurelia in direction of Livorno until the Castiglioncello exit.  While those coming from the South, should take the SS1 Aurelia in direction of Grosseto-Livorno until the Castiglioncello exit. </p>
<p>&nbsp;</p>
<p> 
Those who prefer to travel by train can take a train to the train station town that is located on the Tyrrhenian line Genova-Pisa-Roma, since Castiglioncello can only be reached with the regional trains. For those who are coming from further away, the stations of Rosignano, only 2 km from here, Cecina, which is 17 km away, and Livorno, which is 25 km away, can be considered. Finally, the nearest airport is in the city of Pisa, which is about 30 km from here.  Once in Pisa, Castiglioncello can be reached by taxi, train or with a car rental. </p>
<p><br>
  Castiglioncello is located in a central position, within reach of the privileged Etruscan Coast and of the most beautiful Tuscan art cities, where one can start discovering the beauties of this land.
<p>&nbsp;</p>
<p><strong>By car:  </strong>freeway SS1 Castiglioncello exit  <br>
  <strong>By train:</strong> Rosignano Marittimo Station<br>
  <strong>Address:</strong> Via Aurelia N&deg; 548<br>
<strong>Contact:</strong> +39.0586.752596</p><br>

');
/*agenzia_immobiliare_casa_vacanze_toscana.php*/

define('TITOLO_BASE_CHISIAMO','Profile - Real Estate Agency Radar of Castiglioncello - Livorno, Tuscany');

define('DESCRIZIONE_CHISIAMO','The Radar real estate agency, which has 35 years of experience in the business, is available for the selling and purchasing of real estate properties, but also for the management of residences, apartments and vacation villas - free consultation');

define('KEY_CHISIAMO','Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers');




define('TITOLO_AGENZIA','ABOUT US');    
define('TITOLO_AGENZIA2','RADAR AGENCY');   
define('CONTENUTOAGENZIA','


Castiglioncello is a renown tourist location on the coast of Livorno. It is in this enchanting setting of the Etruscan Coast that our real estate agency offers its customers a highly professional, reliable and very confidential service to all those who wish to receive a quality service when buying, or selling, a real estate property or even when choosing an apartment for the summer holidays.<br>

The Radar Agency has matured over forty years of experience in the real estate sector and proudly sells any type of property (seaside studios, two-room apartments, three-room apartments; apartments in bourgeois buildings, condos with gardens, villas, newly built homes, luxury villas and properties).<br>

Buying a second home in the tourist town of Castiglioncello, renown as the Pearl of the Tyrrhenian Sea, means acquiring a refuge on the Tuscan sea. We are ready to accomodate your every need. In fact, we are available to help you find, or choose, the most suitable seaside apartment for your needs and committed to assist you in making the best investment possible. We are also fully available to provide you with a free evaluation, or estimate, of those real estate properties you wish to incorporate into our seaside home sale circuit. We also deal with funds, deposits, shops, warehouses and businesses.<br><br>

Furthermore, we are available to manage residences, apartments and villas. By relying on our professionalism, you will be able to make your seaside investment profitable without any effort. In fact, we will take care of everything for you.<br>

Our real estate agency, which is specialized in renting vacation homes and apartments on the Tuscan sea, takes care of the weekly, monthly or seasonal rents. We have a huge selection of holiday homes from which to choose: apartments in a residence with swimming pool, two-room apartments with garden, small villas with garden, spacious apartments with terrace and the opportunity to choose a home with a sea view or even immersed in the green of nature. We follow strict quality standards, which our agency has committed itself to provide at low cost, when selecting our properties; for both the most economic solutions to the most luxurious ones. Our last-minute offers should not be missed.<br>

The Radar agency of Giorgio Costagli also deals with the sale, purchase and leasing of berths, parking spaces, parking areas or garages in Marina Cala dè Medici di Rosignano Marittimo, a marina in the province of Livorno and in-between Castiglioncello and Rosignano Solvay. The berth is equipped with a complete service platform.<br>

We look forward to meeting you in our office, which is also open on Saturdays and Sundays and where we can show you our deals.<br>
<p>&nbsp;</p>
<p><strong>Giorgio Costagli </strong></p>');



/*Castiglioncello castiglioncello_immobiliare_casa_vacanze_residence_toscana.php*/

define('TITOLO_BASE_INDEX','Summer rentals castiglioncello Castiglioncello Livorno, Tuscany - Real Estate Agency Radar');

define('DESCRIZIONE_INDEX','summer rentals castiglioncello, vacation homes residences berths purchasing and selling of real estate properties in Castiglioncello, management of residences, apartments and vacation villas - free consultation');

define('KEY_INDEX','summer rentals, castiglioncello, Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers');



define('TITOLO_CASTIGLIONCELLO','CASTIGLIONCELLO TOSCANA');    

define('CONTENUTOCASTIGLIONCELLO','
<strong>CASTIGLIONCELLO (LI) Toscana</strong><br><br>
<p>Castiglioncello is an ancient Etruscan village and a renown tourist destination of great international fame.
It is called "the pearl of the Tyrrhenian Sea" because of its unique charm.  It has always been enclosed in the nature of a protected area, which has contributed to its elegance and purity over the years.  It is surrounded by luxuriant pine forests, spectacular cliffs, sheltered bays and beaches that are washed by the clear waters that characterize this part of the coast.</p>
<p>This location has ancient origins.</p>
<p>&nbsp;</p>
<p><strong>Brief historical background: </strong></p>
<p>&nbsp;</p>
<p>Already in the second half of the 800\'s, the art critic and patron, Diego Martelli, built his home here. His home is now better known as the Castello Pasquini.  It his here that he hosted the famous Macchiaioli group of painters (with Abbati, Fattori, Borrani, Cabianca, etc...) who started the "School of Castiglioncello". To this day, the Castello Pasquini is the center of many cultural activities; from dance to theater.  It hosts of the traditional Festival of Dance and holds the award ceremony for the "Literary Prize of Castiglioncello\'s Coast of the Etruscans". We also must not forget that this little town was made famous thanks to artists such as Gassman, Mastroianni, Sordi and others who enjoyed staying here.  In fact, it was the cinematographic setting chosen to make the famous movie "The Easy Life", in which Vittorio Gassman starred. The Medici Tower is also noteworthy.  It was built in the middle of the sixteenth century to defend the town from the Saracen pirates who threatened the Tyrrhenian sea. Finally, this historical overview would not be complete if we did not suggest a visit to the National Archeological Museum, which is especially renown for the numerous Etruscan tombs that were discovered in the area.</p>
<p>&nbsp;</p>
<p><strong>Castiglioncello is, in many ways, one of the most inviting settings.  An ideal location for summer holidays.</strong></p>
<p>It is located in the heart of Tuscany, on the border of the Ligurian and Tyrrhenian Sea.  It has a luxuriant vegetation.  Its pines and oaks provide its coast with shade and its coastline is filled with tourists who are in search of relaxation and a mild climate. The Marradi Pine Forest is situated on the seaside.  Here, the air is filled with iodine and wood essences.  It feels like an inviting place where one can take relaxing walks; several children areas are found in this forest and so is the famous open-air movie theater, which is open during the summer months.  In the summer, a small market also settles in this pine forest on every Thursday of the week.</p>
<div  style="float:right;margin: 15px 0px 15px 15px;" >
  <iframe title="YouTube video player" width="350" height="293" src="http://www.youtube.com/embed/mJDTIPxtrL8?rel=0" frameborder="4" allowfullscreen></iframe>   
</div>


<p >On the central Plaza, or Piazza della Vittoria, there are a series of classy stores where one can even shop at night and the different historical bars, which surround the plaza, are filled with people during the aperitif hours. The Quercetano Bay is an attractive cove.  In fact, it was a source of inspiration for Gabriele D\'Annunzio. This welcoming atmosphere, of ancient origin, offers many different accommodation opportunities, as numerous restaurants offer quality recipes thanks the the freshness of the fish, which is caught on a daily basis.</p><br>

<p >There is a seaside path, called the Lungomare Colombo, where one can take walks and over a stretch of about 4 kilometers.  On this path, one can walk along the various creeks, which follow each other, and breath the sea air.  The path starts in Punta Righini, which is one of the most wild and rocky settings of the coastal area and continues to the marina of Cala dè Medici. There are 650 berths (10% of which are reserved for transit), a shipyard and a yacht club in this harbor.  There is also a big parking lot and a shopping area. Those who arrive at the marina of Cala dè Medici contribute in their own way to the mosaic scenery of boats, faces and languages that animate this lively and vital area throughout the year. The Rotta del Vino, the gourmet race of the Etruscan Coast, is one the most important fests for which this Harbor is renown.  This fest is held during the second week of September and the boats race against each other at sea while chefs are busy making dishes, which are judged by a super-specialized jury on the basis of their originality and wine combination, on board! One can practice all of the various water sports, such as sea-watching, diving, fishing, sailing and windsurf in some of our facilities. The Yacht Club of Castiglioncello is also noteworthy.  It was established in 1946.  Here, people of all ages can take sailing lessons or rent sail boats and motorboats to explore the wonders of the coast. The most famous summer festival, the Fish Fest, is held in June at the Caletta Bay.</p>
<p><br>
</p>
<p>Castiglioncello has a pleasantly dry climate that could make anyone fall in love: many sunny days throughout the year and always mild temperatures are the secret to a perfect holiday. Here, the average temperature for the month of January, which is the coldest month of the year, ranges from a minimum of 10°C to a maximum of 20°C.  In August, however, it ranges from a minimum of 23°C to a maximum of 32°C. Although it generally almost never rains, most of the rainfalls occur between the months of October and December.  Nonetheless, the climate stays mild and is always recommended for those who suffer from respiratory diseases.
</p>
<p>&nbsp;</p>
<p><strong>How to reach Castiglioncello</strong></p>
<p><A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=55&lan=ita" target="_blank">Castiglioncello</A> is easy to find no matter what means of transportation you have chosen. For those who travel by car and who are coming from the North, take the highway A12 in direction of Genova-Rosignano Marittimo all the way to the castle of <A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=54&lan=ita">Rosignano Marittimo</A>.  At this point, follow the SS1 Aurelia in direction of <A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=34&lan=ita">Livorno</A> until the <A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=55&lan=ita">Castiglioncello</A> exit. While those coming from the South, should take the SS1 Aurelia in direction of Grosseto-Livorno until the Castiglioncello exit. 
Those who prefer to travel by train can take a train to the train station town that is located on the Tyrrhenian line Genova-Pisa-Roma, since Castiglioncello can only be reached with the regional trains. </p>
<p>For those who are coming from further away, the stations of Rosignano, only 2 km from here, <A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=45&lan=ita">Cecina</A>, which is 17 km away, and Livorno, which is 25 km away can be considered. Finally, the nearest airport is in the city of Pisa, which is about 30 km from here.  Once in <A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=11&lan=ita">Pisa</A>, <A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=55&lan=ita">Castiglioncello</A> can be reached by taxi, train or with a car rental.
  <A HREF="http://www.ilturista.info/guide.php?cat1=4&cat2=8&cat3=5&cat4=55&lan=ita">Castiglioncello</A> is located in a central position, within reach of the privileged Etruscan Coast and of the most beautiful Tuscan art cities, where one can start discovering the beauties of this land.<br><br>
</p>

'); 



/*Dintorni intorno_castiglioncello_immobiliare_casa_vacanze_residence_toscana*/


define('TITOLO_INTORNO','THE SURROUNDING AREAS OF THE ETRUSCAN COAST OF TUSCANY');    

define('CONTENUTOINTORNO','

<br>

<p><strong>Bolgheri (30 Km)</strong>: a typical medieval village developed around a castle and famous for its long Cypress path, which was praised by the poet, Carducci. This place is renown for its magnificent environmental setting and for its fine red wines. The Sassicaia, the native Sangiovese and the numerous wines of the Ornellaia estate, as well as those of the Guado Tasso estate, are ranked among the most renown wines of the area. Bolgheri is, thus, an internationally renown culinary destination; many events are organized in this town, but we would like to mention the Bolgheri Melody fest and the <A HREF="http://www.eventiesagre.it/Eventi_Enogastronomici/2287_Bolgheri+jazz.html" target="_blank">Bolgheri Jazz</A> fest, which are respectively held in July and September, and where many of the most well-known wine producers of the area open their cellars to the public for wine tasting events that are combined to the pleasures of food, music and art.  The towns of Castagneto Carducci, Casale Marittima, Bibbona, Montescudaio, Guardistallo and many other fascinating towns of Tuscany are located but a few kilometers away.</p>
<p>&nbsp;</p>


<p><strong>Rosignano Marittimo and the White Beaches</strong> (2 Km): the part of the coast between Rosignano and Vada is very Caribbean-like: the White Beaches and white colored sand appear reminiscent of a Polynesian atoll.<br><br>




Ample parking and equipped beaches, as well as large public beaches for tourists.</p><br>
  
  
<p><strong>Volterra (50 Km)</strong>: has characteristically become a typical medieval city where one can still enjoy the atmosphere of an ancient village since it is completely isolated from industrial and commercial development. Volterra is entirely surrounded by a thirteenth-century wall and has a perfectly well-preserved medieval center where the famous Piazza dei Priori, the Roman Theater of Vallebuona and the Etruscan Museum can be found.  The Etruscan Museum is a must see attraction for all tourist and a great source of pride for this ancient Etruscan. Volterra is a little place in Tuscany where there many events are organized, especially in the summertime; from lyrical music to jazz, from theater to medieval re-enactments in enchanted locations that are filled with history and charm.</p><br><br>




<p><img src="http://agenziaradar.it/images/80_5_fotoImmobile 2.jpg" width="424" height="282" hspace="4" align="left" title="residence posti barca il Romito Livorno foto by Luca Caponi"  /><strong>Baratti and Populonia ( 65 Km):</strong> Baratti is a unique natural harbor where all of the beauty of the sea, the beaches and the picturesque archeological ruins of the ancient Etruscan necropolis are harmoniously blended together. A scenic road runs along the beach of the Gulf. The sand is thick enough and has a special silver-blue reflection. A winding road connects Baratti to the ancient fortified village of Populonia, which dominates the Gulf. Populonia is a unique seaside Etruscan city.  It was originally built to favor the processing of iron that came from the Elba Island.</p>




<br><br>
<p><strong>The thermal town of Venturina - the Calidario lake (53 Km):</strong> Venturina is immersed in the green vegetation of a beautiful pine forest and Calidario is a small lake with hot springs of water at 36 degrees, which flow directly into a tub; an embracing spring from which one can enjoy the benefits of water and steam baths. These springs were already renown during the Etruscan and Roman period.  They offer visitors a warm embrace of natural well-being..</p>

<br><br>



<p><strong>Pisa (48 Km):</strong> is a city of ancient origins.  In fact, it was built by an Etruscan settlement, which later became a Roman colony whose influence can still be seen in the architectural designs of the religious and civil buildings, of the narrow alleys and of the city squares. The city, through which passes the Arno river, reached its zenith in the eleventh century, when it was an important naval base and because of the trade market it established throughout the Mediterranean territory. Its most important monuments are undoubtedly the Leaning Tower and the Cathedral.  However, the Church of Santa Maria della Spina and the ancient Church of S. Paolo a Ripa d\'Arno, which is a classical example of Romanesque architecture,  are also worth visiting.</p>


<br><br>

<p><strong>Florence ( 128 Km): </strong>The Arno river also passes through Florence.  This city is surrounded by olives and vines.  It is undoubtedly the most renown and captivating city of Tuscany. 
Florence was founded by the Romans in the first century BC.  In the fifteenth century, period during which it reached its zenith, the city was dominated by the Medici family. Since then, the most famous artists such as Giotto, Cimabue, Michelangelo, Brunelleschi and Botticelli have left an unforgettable imprint, which can still be admired thanks to their paintings, sculptures and impressive works of art such as the Cathedral, the Palazzo Vecchio and others. The most renown museums of Florence are the Uffizi Gallery, the Accademia Gallery, the Medici Chapels and the National Museum of Bargello. </p>
<br><br>



<p><strong>Siena (180 Km): </strong>is an ancient Etruscan city that is situated right in the middle of Tuscany.  This city reached its zenith in the Middle Ages. We can still admire the ancient walls and structure of the medieval village, which is made up of narrow alleys and noble palaces. The Cathedral, which dates back to the fourteenth century, the Piazza del Campo - where the Palio of Siena takes place - and the surrounding buildings as well as 15 museums, including the Palace and Civic Museum, the National Art Gallery and the Tablet Museum, are of definite artistic interest. <br><br>
<strong>Lucca (70 Km): </strong>is one of the few Tuscan cities that managed to preserve its walls, which were built between 1504 and 1645 and which were never used for defense. It became famous in the fifteenth century for its silk art, which was its primary source of income. Today, one can admire the Palazzo della Signoria, the Church of Santi Giovanni and Reparata and the San Martino plazza where the Cathedral, which was dedicated to San Martino, is located.  In fact, the Cathedral is the most important religious building of the city.</p>
<br><br>

<p><strong>San Gimignano (116 Km):</strong> is famous on an international level for its 14 towers.  San Gimignano is located in the heart of the Tuscan country fields, between Florence and Siena and at 334 meters above sea level on a hill that dominates the Elsa Valley.</p>


<br><br>


<p><strong>The Islands of the Tuscan Archipelago:</strong> it is said that when the Venus of the Tyrrhenian Sea emerged from the waters of our sea to embrace the horizon, she lost seven pearls from the necklace that adorned her white neck.  These pearls fell into the water and transformed themselves into the Islands of the Tuscan Archipelago.   Indeed, it is composed of 7 islands: <A HREF="http://www.vacanzeinversilia.com/arcipelago/gorgona.html" target="_blank">Gorgona</A>, <A HREF="http://www.vacanzeinversilia.com/arcipelago/capraia.html" target="_blank">Capraia,</A> <A HREF="http://www.vacanzeinversilia.com/arcipelago/elba.html" target="_blank">Elba</A>, <A HREF="http://www.vacanzeinversilia.com/arcipelago/pianosa.html" target="_blank">Pianosa</A>, <A HREF="http://www.vacanzeinversilia.com/arcipelago/montecristo.html" target="_blank">Montecristo</A>,<A HREF="http://www.vacanzeinversilia.com/arcipelago/giglio.html" target="_blank">Giglio</A> and <A HREF="http://www.vacanzeinversilia.com/arcipelago/giannutri.html" target="_blank">Giannutri</A>.. The uniqueness and beauty of these pearls represent the largest European marine park, which safeguards 56.766 hectares of sea and 17.887 hectares of land that can be enjoyed all year long. In fact, if you are looking to spend a summer weekend, or holiday, on these islands, you will certainly find the welcoming atmosphere of the history, culture and nature it possess throughout the year. Each island is different than the other. Each island has an enchanting and captivating story, or legend, ready to be told.</p>

'); 





/*DOVE SIAMO */

define('TITOLO_BASE_SERVIZI','Real Estate Agency Radar of Castiglioncello - Livorno, Tuscany');

define('DESCRIZIONE_SERVIZI','The Radar real estate agency, which has 35 years of experience in the business, is available for the selling and purchasing of real estate properties, but also for the management of residences, apartments and vacation villas - free consultation');

define('KEY_SERVIZI','Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers');


define('TITOLO_SERVIZI','SERVICES');  
define('TITOLO_SERVIZI2','Services');
define('CONTENUTOSERVIZI',' 


<strong>Services Offered</strong><br><br><br>

Free estimates for your real estate property<br>

Taking care of all the necessary paperwork involved when buying or selling property. 
<br><br>
Accurate background check of the properties that are on sale (mortgages, cadastral issues and urban compliance, as to ensure a "safe buy")
<br><br>
Free consulting service
<br><br>
We can also manage and rent the property of those who are looking "to make a seaside investment" in accordance with your needs.
<br><br>
Our agency is open all year, even on Saturdays and Sundays, and it provides its customers with a full service of assistance for their summer vacation needs, but also for the sale of real estate properties of any kind.
<br><br>
Investing in a seaside home can mean investing in studios, in two-room apartments within a residential building, in smaller or bigger apartments that are located in more central areas, in villas or smaller villas on the seaside or in the hills.
<br><br>
We prefer not to dwell too much on this point since we realize that our customers, whom have used our services for the past forty years already, are our best advertisers.
<br><br>
Our main goals are: professionalism, confidentiality and the pleasure of developing a "personal" relationship with our customers.
<br><br>
We are thus waiting for you, or a person you know, to visit us so that you can experience our services personally..</p><br><br>
');

/* ERROR */

define('TITOLO_BASE_ERROR',' 404 Error Page - Real Estate Agency Radar of Castiglioncello - Livorno, Tuscany');

define('DESCRIZIONE_SERVIZI','The Radar real estate agency, which has 35 years of experience in the business, is available for the selling and purchasing of real estate properties, but also for the management of residences, apartments and vacation villas - free consultation');

define('KEY_SERVIZI','Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers');


define('TITOLO_ERROR','404 Error Page');  



/*residence.php*/



define('TITOLO_RESIDENCE','THE SPECIALISTS OF YOUR VACATION NEEDS');    

define('CONTENUTORESIDENCE','
The Radar Agency, specialized in tourism within the renown Castiglioncello area, has been taking care of your vacations on the Tuscan seaside for years. We are committed to find the best residence apartments, or small villas, that best satisfy the needs of the families who wish to spend their holidays at the sea. We offer various solutions, such as apartments, villas with gardens, villas on the seaside, studios, two-room apartments, three-room apartments in residences and more. The accommodation facilities and residences we suggest fit the needs of the families who are looking for the best, even at low-cost and with the comforts of the various services that are offered, such as: -swimming pool, near the sea, private garage, reserved parking space, terrace with sea view, balcony, garden. Furnished with: -washing machine, TV, dishwasher, air-conditioning.<br>
<br>
 In Castigliocello, one can rent boats, take sailing lessons, since it is in the vacinity of the Yacht Club of Marina Cala dé Medici and of the Sail Club of Pietrabianca, rent a car, scuba dive, thanks to the diving center of the Chioma club or of the Marina Cala dè Medici club, play tennis, go horseback riding and enjoy umbrellas, sun loungers and beach chairs at the various beach establishments of the area. ');







/*residence_castiglioncello_casa_vacanze_residences_toscana.php */

define('TITOLO_BASE_RESIDENCE2',' Residences and your vacation homes in Tuscany - summer rentals in castiglioncello');

define('DESCRIZIONE_RESIDENCE2','Residences seaside vacation homes with swimming pool in Castiglioncello, Tuscany, and on the Etruscan coast, summer rentals in castiglioncello');

define('KEY_RESIDENCE2','Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers');




define('TITOLO_RESIDENCE2','THE SPECIALISTS OF YOUR VACATION NEEDS');    

define('CONTENUTORESIDENCE2','


The Radar Agency, specialized in tourism within the renown Castiglioncello area, has been taking care of your vacations on the Tuscan seaside for years. We are committed to find the best residence apartments, or small villas, that best satisfy the needs of the families who wish to spend their holidays at the sea. We offer various solutions, such as apartments, villas with gardens, villas on the seaside, studios, two-room apartments, three-room apartments in residences and more. The accommodation facilities and residences we suggest fit the needs of the families who are looking for the best, even at low-cost and with the comforts of the various services that are offered, such as: -swimming pool, near the sea, private garage, reserved parking space, terrace with sea view, balcony, garden. Furnished with: -washing machine, TV, dishwasher, air-conditioning. In Castigliocello, one can rent boats, take sailing lessons, since it is in the vacinity of the Yacht Club of Marina Cala dé Medici and of the Sail Club of Pietrabianca, rent a car, scuba dive, thanks to the diving center of the Chioma club or of the Marina Cala dè Medici club, play tennis, go horseback riding and enjoy umbrellas, sun loungers and beach chairs at the various beach establishments of the area.<br><br>
Payment by credit card, online payments. We are waiting to welcome you in one of our seaside residences in Tuscany.
  ');

/*PRIVACY E DISCLAIMER */


define('TITOLO_BASE_PRIVACY',' Privacy e Disclaimer - Residences and your vacation homes in Tuscany - summer rentals in castiglioncello');

define('DESCRIZIONE_PRIVACY','Residences seaside vacation homes with swimming pool in Castiglioncello, Tuscany, and on the Etruscan coast, summer rentals in castiglioncello');

define('KEY_PRIVACY','Agency, Radar, real estate, residence, residences, apartments, villa, villas, Castiglioncello, vacation, summer, sea, two-room apartment, studio, three-room apartment, free consultation, estimates, home, berth, Etruscan coast, Tuscany, summer home, seaside home, house at the sea, residence on the sea, berths, Etruscan coast, Livorno, Rosignano Marittimo, offers');




define('TITOLO_PRIVACY','PRIVACY E DISCLAIMER');    

define('CONTENUTOPRIVACY','


<strong>PRIVACY E DISCLAIMER</strong><br><br>


The real estate agency RADAR will handle any information or data provided for promotional or contact purposes according to the Italian Legislative Decree 196/2003.
Moreover, Dig.it Solution informs that according to the Italian Legislative Decree n. 196/2003 any data provided by the customers upon signing purchasing contracts and/or filling out invoices are excluded from the user\'s consent since they have been collected according to the fiscal obligations foreseen by the law, by the communitarian rules and provisions and, in any case, with the aim of meeting the obligations of the purchasing agreement which the customer is a party of and/or for the acquisition of the necessary contractual informative always and exclusively activated upon the user\'s request. (art. 24, let. A and B, Italian Legislative Decree n. 196/2003).
Personal data cancellation request.
Personal data are collected with the aim of registering the customers and carrying out the procedures for the execution of the agreement and any other contract-related communication; such data are processed electronically and according to the law and will be disclosed to third only upon request of the qualified authorities. The data subject shall have the right, according to art. 7 of the Italian Legislative Decree n. 196/2003, to: ask Dig.it Solution to confirm of the existence of his/her data; be informed of the logic and aim of their treatment; obtain the updating, rectification or integration of the data; ask for the cancellation, transformation in anonymous form or blocking of data that have been processed unlawfully; object on legitimate grounds, to the processing of the personal data, where this is carried out for the purpose of sending advertising materials, market studies, direct selling or any other form of advertising.
The cancellation of the personal data can be requested through written communication by fax (+39 0586 759935) or mail to the company head office.
The real estate agency Radar, owned by Giorgio Costagli, Via Aurelia, 548 – IT57016 Castiglioncello (LI), is the subject entitled to the collection and handling of the personal data.<br><br>

<strong>DISCLAIMER</strong><br><br>


The website www.agenziaradar.it  and any other associated website are owned by the real estate agency Radar, owned by Giorgio Costagli. Graphics, pictures and texts contained in the website are protected under copyright law and cannot be reproduced in any format nor be used for any purpose without permission from the owner.

  ');
  
define('DAL','From');
define('AL','To');

define('LUGLIO','July');
define('MAGGIO','May');
define('GIUGNO','June');
define('AGOSTO','August');
define('SETTEMBRE','September');
define('GENNAIO','January');                              
define('FEBBRAIO','February');                           
define('MARZO','March');                                   
define('APRILE','April');                       
define('OTTOBRE','October');
define('NOVEMBRE','November');
define('DICEMBRE','December');

define('LISTINO','Prices and availability');
define('NOTE_ALTRO_PERIODO','Upon request');
define('ALTRO_PERIODO','Other periods');
define('PERIODO','Period');
define('VAC_SETT','Weekly holiday (Saturday/Saturday)');
define('VAC_MENS','Long stay (monthly/15 days )');

define('PAGINA_LAVORAZIONE','Page in process');
define('PRENOTA','Book now');

/* aggiunto da tommaso vietina */
/* help ricerca */
define('RICPOPUNO','Weekly holiday – In this section you can book apartments in residence for weekly periods (please note that in high season the rental period is from Saturday to Saturday).  If you do not find what you are looking for, please visit long stay holiday section with AFFORDABLE PRICES ( rental periods, in this case, are available from 1st to the 15th  or from 16th to the 31st of each month or for 1st to 31st of the month).');
define('RICPOPDUE','Long holiday – In this section you can book vacation homes and apartments for a  minum stay of 15 days. The rental periods are available from 1st to 15th or 16th to 31st of each month or from 1st to 31st of the month). If you do not find what you are looking for, please visit also the weekly holiday section where you can find many other offers with rental  periods from Saturday to Saturday.');
/*BANNER*/
define('BANNERH','style="background-image:url(../images/banner-en.png);"');
define('BANNERP','style="background-image:url(../images/banner-vacanza-lunga-en.png);"');
define('BANNERP_DUE','style="background-image:url(../images/banner-vacanza-settimanale-en.png);"');




define('RISULTATI_VACANZA_LUNGA','You are in: Long holiday - SEARCH RESULTS:');
define('RISULTATI_VACANZA_CORTA','You are in: Weekly holiday - SEARCH RESULTS:');


?>