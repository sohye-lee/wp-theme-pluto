<?php 

    function pluto_post_meta() {
        echo '<div class="post-meta">';
        printf( esc_html__('Posted on %s', 'pluto'), '<time datetime="'. esc_attr( get_the_date('c') ) .'">' . esc_html( get_the_date() ) . '</time>'); 
        printf( esc_html__(' by %s', 'pluto'),'by <a href="'. esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) .'">' . esc_html( get_the_author() ) . '</a>');
        echo '</div>';
    }


    function pluto_post_title() {
        echo '<h2 class="post-title">';
        echo '<a href="' . esc_url( get_permalink() ) . '" title="'. esc_attr( the_title_attribute(['echo' => false]) ) .'">' . esc_html__( get_the_title(), 'pluto' ) . '</a>';
        echo '</h2>';
    }

    function pluto_post_tags() {
        $terms = get_terms();
        if ($terms) {
            echo '<div class="">';
            foreach($terms as $term) {
                echo '<a class="term">'. esc_html__( $term, 'pluto' ) .'</a>';
            }
            echo '</div>';
        }
    }

    function pluto_readmore_link () {
        echo '<div><a href="'. esc_url( get_permalink() ) .'" class="btn btn-outline btn-dark">';
        printf( wp_kses(__('Read More <span class="sr-only"> about %s</span>' , 'pluto' ), 
            [
                'span' => [
                    'class' => []
                ]
            ]
            ) ,  get_the_title()
        );
        echo '</a></div>';
    }

?>