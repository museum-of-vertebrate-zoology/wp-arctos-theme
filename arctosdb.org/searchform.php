<form role="search" method="get" id="sidebar-search-form" class="search-form" action="<?php echo home_url( '/' ); ?>" onsubmit="event.preventDefault()">
  <label for="s" class="screen-reader-text">Search for:</label>
  <paper-input id='s' name='s' label='Search' floatingLabel></paper-input>
  <paper-fab class='mini materialblue' id='searchsubmit' icon='search' raisedButton></paper-fab>
</form>
