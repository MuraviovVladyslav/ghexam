<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mitalent
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mitalent' ); ?></a>
<div class="wrapper">
	<header id="masthead" class="site-header">

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '', 'akad' ); ?>
                <i class="fas fa-align-justify"></i>
            </button>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </nav><!-- #site-navigation -->

		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$mitalent_description = get_bloginfo( 'description', 'display' );
			if ( $mitalent_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $mitalent_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

        <!--search -->
        <form role="search" method="get" id="searchform" class="header-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div>
                <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
                <input type="text" class="header-searchform-input" placeholder="search posts" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                <button type="submit" id="searchsubmit" class="header-searchform-btn" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>


	</header><!-- #masthead -->
</div>



	<div id="content" class="site-content">
