<?php
/***
 * If we're not on the home page, show the page children
 * If we're on the home page, display a carousel
 ***/
if(!is_front_page())
  {
    require_once("Arctos_Submenu_Walker.php");
    $parent = array_reverse(get_post_ancestors($post->ID));
    # While this doesn't work right with random test hierarchies,
    # this should be right on release.
    $first_parent = get_page($parent[0]);
    # ".$first_parent->post_name."
    $menu_buffer =  "<nav id='submenu-navigation' class='menu-submenu'>\n\t<h4 id='submenu-nav-header'>Subtopics:</h4>\n\t";
    $menu_main = wp_nav_menu( array('theme_location' => 'primary-header', "echo"=>false, "walker"=> new sub_nav_walker ) );
    if(!empty($menu_buffer) 
       && strpos($menu_main,"sub-menu") !== false 
       && strpos($menu_main,"<li>") !== false )
      {
        $menu_buffer .= $menu_main . "\n</nav>";
        echo $menu_buffer;
      }
  }
  else
    {
      # On the home page, instead display a carousel
      # As per http://getbootstrap.com/javascript/#carousel
      $cdata = file_get_contents(dirname(__FILE__)."/homepage-carousel-data.json");
      $cd = json_decode($cdata,true);
      if(sizeof($cd) > 0) {
?>

<div id="arctos_homepage_carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
<?php
    $i = 0;
    while ($i < sizeof($cd))
      {
        if($i === 0)
          {
            echo "\n    <li data-target=\"#arctos_homepage_carousel\" data-slide-to=\"0\" class=\"active\"></li>";
          }
        else echo "\n    <li data-target=\"#arctos_homepage_carousel\" data-slide-to=\"".$i."\"></li>";
        $i++;
      }
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
<?php
    $i = 0;
    foreach($cd as $slide)
      {
        $caption = $slide["caption"];
        $image = get_template_directory_uri() . "/" . $slide["image"];
        $alt = $slide["image-description"];
        if($i === 0)
          {
            echo "\n    <div class=\"item active\">
      <img src=\"".$image."\" alt=\"".$alt."\">
      <div class=\"carousel-caption\">
        ".$caption."
      </div>
    </div>";
          }
        else
          {
            echo "\n    <div class=\"item\">
      <img src=\"".$image."\" alt=\"".$alt."\">
      <div class=\"carousel-caption\">
        ".$caption."
      </div>
    </div>";
          }
        $i++;
      }
?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#arctos_homepage_carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#arctos_homepage_carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php
  }
      # else echo "<!-- Carousel is of length ".sizeof($cd)." and skipped \n got -->".print_r($cd,true)."\n from ".$cdata." -->";
    }
?>
