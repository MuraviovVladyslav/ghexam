<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mitalent
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="wrapper">

            <div class="footer-header">
                <div class="footer-logo">
                    <?php the_custom_logo(); ?>
                </div>
                <?php echo do_shortcode( '[contact-form-7 id="15" title="Untitled"]' ); ?>
            </div>


            <div class="footer-content">
                <span class="footer-copyright">
                    <?php echo get_theme_mod('footer_copyright') ?>
                </span>
                <div>
                    <?php if(get_theme_mod('facebook_url', 'https://www.facebook.com') != '') : ?>
                        <a class="footer-social-link"
                           href="<?php echo get_theme_mod('facebook_url', 'https://www.facebook.com'); ?>" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_theme_mod('instagram_url', 'https://www.instagram.com') != '') : ?>
                        <a class="footer-social-link"
                           href="<?php echo get_theme_mod('instagram_url', 'https://www.instagram.com'); ?>" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_theme_mod('youtube_url', 'https://www.youtube.com') != '') : ?>
                        <a class="footer-social-link"
                           href="<?php echo get_theme_mod('youtube_url', 'https://www.youtube.com'); ?>" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_theme_mod('twitter_url', 'https://twitter.com') != '') : ?>
                        <a class="footer-social-link"
                           href="<?php echo get_theme_mod('twitter_url', 'https://twitter.com'); ?>" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_theme_mod('linkedin_url', 'https://www.linkedin.com') != '') : ?>
                        <a class="footer-social-link"
                           href="<?php echo get_theme_mod('linkedin_url', 'https://www.linkedin.com'); ?>" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_theme_mod('pinterest_url', 'https://www.pinterest.com') != '') : ?>
                        <a class="footer-social-link"
                           href="<?php echo get_theme_mod('pinterest_url', 'https://www.pinterest.com'); ?>" target="_blank">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
