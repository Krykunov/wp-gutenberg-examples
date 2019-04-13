<?php
/*
Plugin Name: Gutenberg examples 01
*/
function gutenberg_examples_01_register_block()
{
    wp_register_script(
        'gutenberg-examples-01',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-element'),
        filemtime( plugin_dir_path( __FILE__ ) . 'block.js')
    );

    register_block_type('gutenberg-examples/example-01-basic', array(
        'editor_script' => 'gutenberg-examples-01',
    ));

}

add_action('init', 'gutenberg_examples_01_register_block');