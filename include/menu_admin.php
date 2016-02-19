<ul id="menu_primario">
      <li><a class="home voci" href="index.php">Home</a></li>
			<li><a  class="voci" href="#">Immobili</a>
			<ul class="sub_menu">
				<li><a href="inserisci.php?cosa=immobili" class="inserisci">Inserisci immobili</a></li>
				<li><a href="lista.php?cosa=immobili&amp;nome=ordine-nome_immobile_it-rif" class="modifica">Modifica/Cancella Immobili</a></li>
				<li><a href="elenco.php" class="modifica">Elenco Immobili</a></li>
		    </ul>
			</li>
			<li><a  class="voci" href="#">Tipo immobile</a>
			<ul class="sub_menu">
				<li><a href="inserisci.php?cosa=tipi" class="inserisci">Inserisci tipi</a></li>
				<li><a href="lista.php?cosa=tipi&amp;nome=nome_tipo_it" class="modifica">Modifica/Cancella Tipi</a></li>
		    </ul>
			</li>
			<li><a  class="voci" href="#">Localita</a>
			<ul class="sub_menu">
				<li><a href="inserisci.php?cosa=localita" class="inserisci">Inserisci località</a></li>
				<li><a href="lista.php?cosa=localita&amp;nome=localita" class="modifica">Modifica/Cancella Località</a></li>
		    </ul>
			</li>
			<li><a  class="voci" href="#">News</a>
			<ul class="sub_menu">
				<li><a href="inserisci.php?cosa=news" class="inserisci">Inserisci news</a></li>
				<li><a href="lista.php?cosa=news&amp;nome=titolo_news_it" class="modifica">Modifica/Cancella news</a></li>
		    </ul>
			</li>
			<li><a  class="voci" href="../index.php" target="_blank">Apri Sito</a></li>
			<li><a  class="voci" href="<?=FUNCTIONPATH?>login.php?logout=1">Logout</a></li>
</ul>
