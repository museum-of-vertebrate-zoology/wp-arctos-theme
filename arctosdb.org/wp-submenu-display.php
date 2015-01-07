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
    # While this doesn't work right with random test heierarchies,
    # this should be right on release.
    $first_parent = get_page($parent[0]);
    echo "<nav id='submenu-navigation' class='menu-submenu'><h4 id='submenu-nav-header'>".$first_parent->post_name." Subtopics:</h4>";
    wp_nav_menu( array('theme_location' => 'primary-header', "walker"=> new sub_nav_walker ) );
    echo "</nav>";
  }
/* $my_wp_query = new WP_Query(); */
/* $all_wp_pages = $my_wp_query->query(array('post_type' => 'page')); */
/* echo print_r(get_page_children(get_the_id(),$all_wp_pages),true); */
?>