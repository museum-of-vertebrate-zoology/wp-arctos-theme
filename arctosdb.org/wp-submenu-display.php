<?php
$my_theme = wp_get_theme();
echo "Theme version " . $my_theme->get( 'Version' );
/***
 * If we're not on the home page, show the page children
 ***/
if(!is_home())
  {
    # Need to wrap in paper-menu
    echo "<ul>";
    wp_list_pages(array("child_of"=>get_the_id()));
    echo "</ul>";
  }
$my_wp_query = new WP_Query();
$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
echo print_r(get_page_children(get_the_id(),$all_wp_pages),true);
# http://pastebin.com/Jk7n20mB
# https://wordpress.org/support/topic/wp_nav_menu-list-only-2nd-level-separate-submenu/page/2#post-1973991
# Another
# http://pastebin.com/Hxnf3WWb
?>