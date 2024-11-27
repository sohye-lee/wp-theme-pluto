<?php get_header(); ?>

<main>

    <?php 
    if (have_posts()) {
        while (have_posts()) {
            the_post();

?>
    <article>
        <hr>
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

<?php get_footer(); ?>