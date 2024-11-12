<?php 

    function pluto_post_meta() {
        echo '<div class="post-meta"><time datetime="'. get_the_date('c') .'">' . get_the_date() . '</time></div>';
    }


    function pluto_post_title() {
        echo '<h2 class="post-title">';
        echo '<a href="' . get_the_permalink() . '" title="'. the_title_attribute(['echo' => false]) .'">' . get_the_title() . '</a>';
        echo '</h2>';
    }

    function pluto_post_tags() {
        $terms = get_terms();
        if ($terms) {
            echo '<div class="">';
            foreach($terms as $term) {
                echo '<a class="term">'. $term .'</a>';
            }
            echo '</div>';
        }
    }

    function pluto_readmore_link () {
        echo '<div>'; 
        echo '<a href="'. get_the_permalink() .'" class="btn btn-outline btn-dark">Read More <span class="sr-only">'. get_the_title() . '</span></a>';
        echo '</div>';
    }

?>