<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mitalent
 */

get_header();
?>
<div class="main-contact">
    <div class="wrapper">
        <div>
            <h2 class="main-contact-title">
                <?php echo get_theme_mod('contact_title') ?>
            </h2>
            <span>
                <?php echo get_theme_mod('contact_subtitle') ?>
            </span>
        </div>
    </div>
</div>
<?php
get_footer();