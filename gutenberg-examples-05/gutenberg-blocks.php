<?php
/*
Plugin Name: Gutenberg examples 05 - Dynamic render
*/

function gutenberg_examples_05_dynamic_render_callback( $attributes, $content ) {
    $recent_posts = wp_get_recent_posts( array(
        'numberposts' => 1,
        'post_status' => 'publish',
    ) );
    if ( count( $recent_posts ) === 0 ) {
        return 'No posts';
    }
    $post = $recent_posts[ 0 ];
    $post_id = $post['ID'];
    return sprintf(
        '<a class="wp-block-my-plugin-latest-post" href="%1$s">%2$s</a>',
        esc_url( get_permalink( $post_id ) ),
        esc_html( get_the_title( $post_id ) )
    );
}

function gutenberg_examples_05_dynamic() {
    wp_register_script(
        'gutenberg-examples-05',
        plugins_url( 'block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-data' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'block.js')
    );

    register_block_type( 'gutenberg-examples/example-05-dynamic', array(
        'editor_script' => 'gutenberg-examples-05',
        'render_callback' => 'gutenberg_examples_05_dynamic_render_callback'
    ) );

}
add_action( 'init', 'gutenberg_examples_05_dynamic' );