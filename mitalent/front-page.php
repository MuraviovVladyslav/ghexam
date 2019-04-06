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
<div class="wrapper">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="hero">

                <?php
                $args = array( 'post_type' => 'banner', 'posts_per_page' => 1 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <div class="banner-social">
                        <?php if(get_theme_mod('banner_facebook_url', 'https://www.facebook.com') != '') : ?>
                            <a class="banner-social-link"
                               href="<?php echo get_theme_mod('banner_facebook_url', 'https://www.facebook.com'); ?>" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(get_theme_mod('banner_instagram_url', 'https://www.instagram.com') != '') : ?>
                            <a class="banner-social-link"
                               href="<?php echo get_theme_mod('banner_instagram_url', 'https://www.instagram.com'); ?>" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(get_theme_mod('banner_youtube_url', 'https://www.youtube.com') != '') : ?>
                            <a class="banner-social-link"
                               href="<?php echo get_theme_mod('banner_youtube_url', 'https://www.youtube.com'); ?>" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        <?php endif; ?>
                        <?php if(get_theme_mod('banner_twitter_url', 'https://twitter.com') != '') : ?>
                            <a class="banner-social-link"
                               href="<?php echo get_theme_mod('banner_twitter_url', 'https://twitter.com'); ?>" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="banner">
                        <div class="banner-img">
                            <div class="banner-image">
                                <?php the_post_thumbnail( ); ?>
                            </div>
                            <div class="banner-content">
                                <?php
                                echo '<h3 class="banner-title">';
                                the_title();
                                echo '</h3>';
                                echo '<div class="banner-text">';
                                the_content();
                                echo '</div>';
                                ?>
                            </div>
                        </div>
                    </div>
                <div class="banner-link">
                    <a href="<?php the_permalink(); ?>" class="banner-link-post">VIEW PROFILE</a>

                    <a href="#" class="banner-link-media"><i class="fas fa-play"></i></a>
                </div>
                <?php
                endwhile;
                ?>

            </section>
            <div class="main-gallery">
                <ul class="gallery-menu">
                    <li class="gallery-menu-item"><a href="#">actor</a></li>
                    <li class="gallery-menu-item"><a href="#">musician</a></li>
                    <li class="gallery-menu-item"><a href="#">comedian</a></li>
                    <li class="gallery-menu-item"><a href="#">model</a></li>
                </ul>
                <div class="gallery-block">
                    <?php
                    $args = array( 'post_type' => 'gallery', 'posts_per_page' => 8 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
                        <div class="main-gallery-item">
                            <?php the_post_thumbnail( ); ?>
                            <div class="gallery-content">
                                <h3 class="gallery-content-header">
                                    <?php echo the_title() ?>
                                </h3>
                                <span class="gallery-content-text">
                                    <?php echo the_content() ?>
                                </span>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
                <a href="#" class="gallery-btn">explore more</a>
            </div>
            <section class="news">
                <h2 class="news-title">
                    <?php echo get_theme_mod('news_heading') ?>
                </h2>
                <div class="news-content">
                    <?php
                    $args = array( 'post_type' => 'news', 'posts_per_page' => 3 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
                    <div class="news-item">
                        <div class="news-item-img">
                            <?php the_post_thumbnail( ); ?>
                        </div>
                        <div class="news-block">
                            <a href="<?php the_permalink() ?>" class="news-item-title">
                                <?php the_title(); ?>
                            </a>
                            <div class="news-item-date">
                                <?php the_time('j F, Y'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php
get_footer();