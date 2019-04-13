<?php
/*
Plugin Name: Gutenberg Examples 04 - Controls
*/

function gutenberg_examples_04_register_block() {
    wp_register_script(
        'gutenberg-examples-04',
        plugins_url( 'block.js', __FILE__ ),
        array(
            'wp-blocks',
            'wp-element',
            'wp-editor'    // Note the addition of wp-editor to the dependencies
        ),
        filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
    );  

    wp_register_style(
        'gutenberg-examples-04-controls',
        plugins_url( 'editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
    );

    wp_register_style(
        'gutenberg-examples-04',
        plugins_url( 'style.css', __FILE__ ),
        array( ),
        filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
    );

    register_block_type( 'gutenberg-examples/example-04-controls', array(
        'style' => 'gutenberg-examples-04',
        'editor_style' => 'gutenberg-examples-04-controls',
        'editor_script' => 'gutenberg-examples-04',
    ) );
}
add_action( 'init', 'gutenberg_examples_04_register_block' );