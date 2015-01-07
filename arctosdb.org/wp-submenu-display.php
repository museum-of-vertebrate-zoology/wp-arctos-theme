<?php
/* $my_theme = wp_get_theme(); */
/* echo "Theme version " . $my_theme->get( 'Version' ); */
/***
 * If we're not on the home page, show the page children
 ***/
if(!is_home())
  {
    require_once("Arctos_Submenu_Walker.php");

    wp_nav_menu( array( "container"=>"nav","container_id"=>"submenu-navigation", 'container_class' => 'menu-submenu col-md-9 col-s-12', 'theme_location' => 'primary-header', "walker"=> new sub_nav_walker ) );

  }
/* $my_wp_query = new WP_Query(); */
/* $all_wp_pages = $my_wp_query->query(array('post_type' => 'page')); */
/* echo print_r(get_page_children(get_the_id(),$all_wp_pages),true); */
?>