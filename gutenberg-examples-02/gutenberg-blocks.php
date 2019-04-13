<?php
/*
Plugin Name: Gutenberg Examples 02 - Stylesheets
*/

function gutenberg_examples_02_register_block() {
    wp_register_script(
        'gutenberg-examples-02',
        plugins_url( 'block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
    );

    wp_register_style(
        'gutenberg-examples-02-editor',
        plugins_url( 'editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
    );

    wp_register_style(
        'gutenberg-examples-02',
        plugins_url( 'style.css', __FILE__ ),
        array( ),
        filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
    );

    register_block_type( 'gutenberg-examples/example-02-stylesheets', array(
        'style' => 'gutenberg-examples-02',
        'editor_style' => 'gutenberg-examples-02-editor',
        'editor_script' => 'gutenberg-examples-02',
    ) );
}
add_action( 'init', 'gutenberg_examples_02_register_block' );