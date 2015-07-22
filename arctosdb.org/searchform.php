<form role="search" method="get" id="sidebar-search-form" class="search-form" action="<?php echo home_url( '/' ); ?>" onsubmit="event.preventDefault()">
  <label for="s" class="screen-reader-text">Search for:</label>
  <paper-input id='s' name='s' label="Search this"></paper-input>
  <paper-fab class='mini foundersrock' id='searchsubmit' icon='icons:search' raisedButton></paper-fab>
</form>
<form role="search" method="get" id="arctos-search-form" class="search-form" action="http://arctos.database.museum/SpecimenResults.cfm" onsubmit="event.preventDefault()">
  <label for="arctos-search" class="screen-reader-text">Arctos Quick Search:</label>
  <paper-input id='arctos-search' name='arctos-search' label="Search Arctos database"></paper-input>
  <paper-fab class='mini foundersrock' id='searchsubmit-arctos' icon='icons:search' raisedButton></paper-fab>
</form>
