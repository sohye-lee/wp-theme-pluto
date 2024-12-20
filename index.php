<?php get_header(); ?>

<div class="o-container">
    <div class="o-row">
        <div
            class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar( 'primary-sidebar' ) ? '8' : '12'; ?>@medium">
            <main>
                <?php 
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                ?>
                <article>
                    <?php the_post_thumbnail('full') ?>
                    <?php _themename_post_meta(); ?>
                    <?php _themename_post_title(); ?>
                    <p><?php the_excerpt(); ?></p>
                    <?php _themename_readmore_link(); ?>
                </article>
                <?php
                    }
                        the_posts_pagination();
                    } else { ?>
                <p><?php  _e('Sorry, no posts matched your criteria.', '_themename'); ?></p>
                <?php
                    }
                ?>
            </main>
        </div>
        <?php if ( is_active_sidebar( 'primary-sidebar' ) ) { ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
            <?php get_sidebar(); ?>
        </div>
        <?php } ?>
    </div>

</div>

<?php get_footer(); ?>