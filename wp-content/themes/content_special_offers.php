<?php
/**
 * @package Sydney
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php // Display blog posts on any page @ http://m0n.co/l
/*$temp = $wp_query; $wp_query= null;
$wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);*/
//while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <?php if (has_post_thumbnail() && (get_theme_mod('index_feat_image') != 1)) : ?>
        <div class="entry-thumb">
            <span class="custom-size" href="<?php the_permalink(); ?>"
                  title="<?php the_title(); ?>"><?php the_post_thumbnail('sydney-large-thumb'); //, array('class' => 'miniature') ?></span>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="title-post"><span style="color: #0088e7;" href="%s" rel="bookmark">', esc_url(get_permalink())), '</span></h2>'); ?>

        <!--		--><?php //if ( 'post' == get_post_type() && get_theme_mod('hide_meta_index') != 1 ) : ?>
        <!--		<div class="meta-post">-->
        <!--			--><?php //sydney_posted_on(); ?>
        <!--		</div><!-- .entry-meta -->
        <!--		--><?php //endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-post">
        <?php if ((get_theme_mod('full_content_home') == 1 && is_home()) || (get_theme_mod('full_content_archives') == 1 && is_archive())) : ?>
            <?php the_content(); ?>
        <?php else : ?>
            <?php the_excerpt(); ?>
        <?php endif; ?>

        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'sydney'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-post -->

    <footer class="entry-footer">
        <?php //sydney_entry_footer(); ?>
        <div class="tprice"> <!-- for tags the_tags() --> <!-- for date the_date('d.m.y') -->
            <!--fot link to record the_permalink()-->
            <!-- для сокращенной записи the_excerpt();-->
            <div>от <strong><b><?php the_tags('<style>b a {color: #0088e7;}</style>'); ?></b></strong> $</div>
            <a href="#tour" class="btnprice modal-link product-link"
               data-order="AMC Royal Hotel 5*" country="Египет">Еще цены</a>
        </div>
    </footer><!-- .entry-footer -->
<?php //endwhile; ?>
</article><!-- #post-## -->