<?php get_header(); ?>

<div class="o-container">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12  o-row">
            <main>
                <h1>BLOG</h1>
                <?php 
                if (have_posts()) {
                    echo '<div class="o-row">';
                    while (have_posts()) {
                        the_post();
                ?>
                <article onclick="window.location.replace(<?php the_permalink(); ?>)"
                    <?php post_class('c-post o-row__column o-row__column--span-12 o-row__column--span-6@medium'); ?>>
                    <a href="<?php the_permalink();?>" class="c-post__thumbnail"><?php the_post_thumbnail('full') ?></a>
                    <?php _themename_post_tags(); ?>
                    <?php _themename_post_title(); ?>
                    <p><?php the_excerpt(); ?></p>
                </article>
                <?php
                    }
                    echo '</div>';
                        the_posts_pagination();
                    } else { ?>
                <p><?php  _e('Sorry, no posts matched your criteria.', '_themename'); ?></p>
                <?php
                    }
                ?>
            </main>
        </div>
        <!-- <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
            <?php get_sidebar(); ?>
        </div> -->
    </div>

</div>

<?php get_footer(); ?>