<?php get_header(); ?>

<main>

    <?php 
    if (have_posts()) {
        while (have_posts()) {
            the_post();

?>
    <article>
        <hr>
        <?php pluto_post_meta(); ?>
        <?php pluto_post_title(); ?>
        <p><?php the_excerpt(); ?></p>
        <?php pluto_readmore_link(); ?>
    </article>
    <?php
        }
        the_posts_pagination();
    } else { ?>
    <p><?php  _e('Sorry, no posts matched your criteria.', 'pluto'); ?></p>
    <?php
    }
?>

</main>

<?php get_footer(); ?>