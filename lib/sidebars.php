<?

function _themename_sidebar_widgets() {
    register_sidebar( array(
        'id' => 'primary-sidebar',
        'name' => esc_html__( 'Primary Sidebar', '_themename' ),
        'description' => esc_html__( 'This sidebar appears in the blog posts page.', '_themename' ),
        'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20" %2$s>',
        'after_widget' => '</section>',
        'before_title' => '<div class="c-sidebar-widget__title">',
        'after_title' => '</div>'
    ) );
}
add_action( 'widgets_init', '_themename_sidebar_widgets' );

$footer_layout = '3,3,3,3';
$columns = explode(',', $footer_layout);
$footer_bg = 'dark';

foreach ($columns as $i => $column) {
    register_sidebar( array( 
        'id' => 'footer-sidebar-' . ($i + 1),
        'name' => esc_html__( 'Footer Sidebar #' . ($i + 1), '_themename' ),
        'description' => esc_html__( 'This sidebar appears in the footer, column #' . ($i + 1), '_themename' ),
        'before_widget' => '<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20" %2$s>',
        'after_widget' => '</section>',
        'before_title' => '<div class="c-sidebar-widget__title">',
        'after_title' => '</div>'
    ));
}