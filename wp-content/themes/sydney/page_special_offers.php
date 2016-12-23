<?php
/*
Template Name: Temlate_special_offers
*/
?>
<?php
get_header_for_special_offers();
?>


    <div id="primary" class="content-area col-md-9">
        <main id="main" class="post-wrap" role="main">
            <?php
            $temp = $wp_query; $wp_query= null;
            $wp_query = new WP_Query(); $wp_query->query('showposts=999999' . '&paged='.$paged);
            if (have_posts()) : ?>

                <?php /* Start the Loop */ ?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('content', get_post_format());
                    ?>

                <?php endwhile; ?>

                <?php the_posts_navigation(); ?>

            <?php else : ?>

                <?php get_template_part('content', 'none'); ?>

            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer_for_special_offers(); ?>