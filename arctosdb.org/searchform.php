<form role="search" method="get" id="sidebar-search-form" class="search-form" action="<?php echo home_url( '/' ); ?>" onsubmit="event.preventDefault()">
  <label for="s" class="screen-reader-text">Search for:</label>
  <paper-input id='s' name='s' label='Search ArctosDB.org' floatingLabel></paper-input>
  <paper-fab class='mini berkeleyblue' id='searchsubmit' icon='search' raisedButton></paper-fab>
</form>
<form role="search" method="get" id="arctos-search-form" class="search-form" action="http://arctos.database.museum/SpecimenResults.cfm" onsubmit="event.preventDefault()">
  <label for="arctos-search" class="screen-reader-text">Arctos Quick Search:</label>
  <paper-input id='arctos-search' name='arctos-search' label='Search Arctos' floatingLabel></paper-input>
  <paper-fab class='mini berkeleyblue' id='searchsubmit-arctos' icon='search' raisedButton></paper-fab>
</form>
