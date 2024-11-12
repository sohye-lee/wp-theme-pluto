<?php get_header(); ?>

<main>

    <?php 
    if (have_posts()) {
        while (have_posts()) {
            the_post();

?>
    <article>
        <?php pluto_post_title(); ?>
        <p><?php the_excerpt(); ?></p>
        <?php pluto_readmore_link(); ?>
    </article>
    <?php
        }
        the_posts_pagination();
    } else { ?>
    <p>Sorry, no posts matched your criteria.</p>
    <?php
    }
?>

</main>

<?php get_footer(); ?>