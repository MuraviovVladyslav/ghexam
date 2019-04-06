<?php
/**
 * mitalent Theme Customizer
 *
 * @package mitalent
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mitalent_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'mitalent_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'mitalent_customize_partial_blogdescription',
		) );
	}

    $wp_customize->add_section('footer_setting', array(
        'title'=>__('Footer setting', 'mitalent'),
        'description'=>sprintf(__('Options for partnership', 'mitalent')),
        'priority'=>30,
    ));
    $wp_customize->add_setting('footer_copyright', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'=>__('Copyright', 'mitalent'),
        'section'=>'footer_setting',
        'priority'=>20,
    ));
//    Social footer link
    $wp_customize->add_setting('facebook_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('facebook_url', array(
        'label'=>__('Facebook URL', 'mitalent'),
        'section'=>'footer_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('twitter_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('twitter_url', array(
        'label'=>__('Twitter URL', 'mitalent'),
        'section'=>'footer_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('youtube_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('youtube_url', array(
        'label'=>__('YouTube URL', 'mitalent'),
        'section'=>'footer_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('linkedin_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label'=>__('LinkedIn URL', 'mitalent'),
        'section'=>'footer_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('pinterest_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label'=>__('Pinterest URL', 'mitalent'),
        'section'=>'footer_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('instagram_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('instagram_url', array(
        'label'=>__('Instagram URL', 'mitalent'),
        'section'=>'footer_setting',
        'priority'=>20,
    ));




    $wp_customize->add_section('banner_setting', array(
        'title'=>__('Banner setting', 'mitalent'),
        'description'=>sprintf(__('Options for banner', 'mitalent')),
        'priority'=>30,
    ));
    $wp_customize->add_setting('banner_facebook_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('banner_facebook_url', array(
        'label'=>__('Facebook URL', 'mitalent'),
        'section'=>'banner_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('banner_instagram_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('banner_instagram_url', array(
        'label'=>__('LinkedIn URL', 'mitalent'),
        'section'=>'banner_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('banner_youtube_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('banner_youtube_url', array(
        'label'=>__('YouTube URL', 'mitalent'),
        'section'=>'banner_setting',
        'priority'=>20,
    ));
    $wp_customize->add_setting('banner_twitter_url', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('banner_twitter_url', array(
        'label'=>__('Twitter URL', 'mitalent'),
        'section'=>'banner_setting',
        'priority'=>20,
    ));


    $wp_customize->add_section('news_heading', array(
        'title'=>__('News settings', 'akad'),
        'description'=>sprintf(__('Options for news', 'mitalent')),
        'priority'=>30,
    ));
    $wp_customize->add_setting('news_heading', array(
        'default'=>_x('Heading', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('news_heading', array(
        'label'=>__('Heading', 'mitalent'),
        'section'=>'news_heading',
        'priority'=>20,
    ));



    $wp_customize->add_section('contact_header', array(
        'title'=>__('Contact setting', 'mitalent'),
        'description'=>sprintf(__('Options', 'mitalent')),
        'priority'=>30,
    ));
    $wp_customize->add_setting('contact_title', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('contact_title', array(
        'label'=>__('heading', 'mitalent'),
        'section'=>'contact_header',
        'priority'=>20,
    ));
    $wp_customize->add_setting('contact_subtitle', array(
        'default'=>_x('', 'mitalent'),
        'type'=>'theme_mod'
    ));
    $wp_customize->add_control('contact_subtitle', array(
        'label'=>__('Sub heading', 'mitalent'),
        'section'=>'contact_header',
        'priority'=>20,
    ));


}
add_action( 'customize_register', 'mitalent_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mitalent_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mitalent_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mitalent_customize_preview_js() {
	wp_enqueue_script( 'mitalent-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mitalent_customize_preview_js' );

function background_to_css(){ ?>
    <style type="text/css">
        .hero {
            background: #ffffff url("<?php the_post_thumbnail_url() ?>") no-repeat scroll right top;
        }
        .main-contact {
            background: #ffffff url("<?php the_post_thumbnail_url() ?>") no-repeat scroll left top;
        }
    </style>
<?php }
add_action('wp_head', 'background_to_css');
