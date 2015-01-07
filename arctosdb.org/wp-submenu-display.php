<?php
/* $my_theme = wp_get_theme(); */
/* echo "Theme version " . $my_theme->get( 'Version' ); */
/***
 * If we're not on the home page, show the page children
 ***/
if(!is_home())
  {
    require_once("Arctos_Submenu_Walker.php");
    $parent = array_reverse(get_post_ancestors($post->ID));
    # While this doesn't work right with random test hierarchies,
    # this should be right on release.
    $first_parent = get_page($parent[0]);
    # ".$first_parent->post_name." 
    $menu_buffer =  "<nav id='submenu-navigation' class='menu-submenu'>\n\t<h4 id='submenu-nav-header'>Subtopics:</h4>\n\t";
    $menu_main = wp_nav_menu( array('theme_location' => 'primary-header', "echo"=>false, "walker"=> new sub_nav_walker ) );
    if(!empty($menu_buffer) && strpos($menu_main,"sub-menu") !== false)
      {
        $menu_buffer .= $menu_main . "\n</nav>";
        echo $menu_buffer;
      }
  }
/* $my_wp_query = new WP_Query(); */
/* $all_wp_pages = $my_wp_query->query(array('post_type' => 'page')); */
/* echo print_r(get_page_children(get_the_id(),$all_wp_pages),true); */
?>