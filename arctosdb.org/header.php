<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
# Ensure error reporting is off for production
error_reporting(0);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

      ?></title>
    <meta http-equiv="Content-Type" content="application/xhtml+xml;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#003262"/>
    <script src="<?php echo get_template_directory_uri(); ?>/bower_components/webcomponentsjs/webcomponents.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/bower_components/picturefill/dist/picturefill.min.js" aysnc></script>
    <script src="<?php echo get_template_directory_uri(); ?>/bower_components/touch-imagelightbox/dist/touch-imagelightbox.min.js"></script>
    <!-- <script src="<?php echo get_template_directory_uri(); ?>/js/purl.min.js"></script> -->
    <!-- <script src="<?php echo get_template_directory_uri(); ?>/bower_components/sticky/jquery.sticky.js"></script> -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/sticky.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/c.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/bower_components/bootstrap/dist/css/bootstrap-theme.min.css"/>
    <link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/font-roboto/roboto.html"/>
    <link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/polymer/polymer.html"/>
    <link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-elements/paper-elements.html"/>
    <link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/core-elements/core-elements.html"/>
    <link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/core-icons/social-icons.html"/>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel='shortcut icon' type='image/vnd.microsoft.icon' sizes='16x16' href='<?php echo get_template_directory_uri(); ?>/images/favicon.ico' />

    <link rel='icon' type='image/png' sizes='16x16' href='<?php echo get_template_directory_uri(); ?>/images/favicon16.png' />

    <link rel='icon' type='image/png' sizes='32x32' href='<?php echo get_template_directory_uri(); ?>/images/favicon32.png' />

    <link rel='icon' type='image/png' sizes='64x64' href='<?php echo get_template_directory_uri(); ?>/images/favicon64.png' />

    <link rel='icon' type='image/png' sizes='128x128' href='<?php echo get_template_directory_uri(); ?>/images/favicon128.png' />

    <link rel='icon' type='image/png' sizes='256x254' href='<?php echo get_template_directory_uri(); ?>/images/favicon256.png' />

    <link rel='icon' type='image/png' sizes='512x512' href='<?php echo get_template_directory_uri(); ?>/images/favicon512.png' />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300|Open+Sans:400italic,600italic,700italic,400,700,600,Slabo+13px' rel='stylesheet' type='text/css'/>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
  </head>

  <body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed container">
      <header id="header" class="row">
	<div id="masthead">
	  <div id="branding" role="banner">
            <img src="<?php echo get_template_directory_uri(); ?>/images/headers/wp-banner-02.svg" alt="" />
            <!-- Insert a polyfill here for
                 backward compatibility wihtout SVG -->
	  </div><!-- #branding -->
	  <div id="access" role="navigation">
	    <?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
	    <div class="skip-link screen-reader-text">
              <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a>
            </div>
	    <?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
	    <?php
               require_once("Arctos_Paper_Nav_Menu.php");
               wp_nav_menu( array( "container"=>"nav","container_id"=>"primary-navigation", 'container_class' => 'menu-header berkeleyblue', 'theme_location' => 'primary-header', "walker"=> new Arctos_Paper_Nav_Menu, "items_wrap" => '<paper-tabs id="%1$s" class="%2$s berkeleyblue" noink>%3$s</paper-tabs>',"depth" => 1 ) );
            ?>
	  </div><!-- #access -->
	</div><!-- #masthead -->
      </header>
      <div id="main" class="row">