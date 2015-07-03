<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo" class="row">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info" class="col-md-9 col-xs-12">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
                                |
                                <paper-icon-button id='twitter-link' icon="social:post-twitter" onclick="openLink('https://twitter.com/arctosdb')"></paper-icon-button>
                                <paper-icon-button id='arctos-link' src="<?php echo get_template_directory_uri(); ?>/images/icons/arctos/arctos.svg" onclick="openLink('http://arctos.database.museum/')"></paper-icon-button>
                                <paper-icon-button id='google-code-link' src="<?php echo get_template_directory_uri(); ?>/images/icons/googlecode/googlecode.svg" onclick="openLink('https://code.google.com/p/arctos/')"></paper-icon-button>
			</div><!-- #site-info -->

			<div id="site-generator" class="col-md-3 hidden-sm hidden-xs">
                          Written with <iron-icon icon="icons:polymer"></iron-icon>
			</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
