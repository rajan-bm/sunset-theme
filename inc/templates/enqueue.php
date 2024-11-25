<?php

/*
@package sunsettheme

    ========================
        ADMIN ENQUEUE FUNCTIONS
    ========================
*/

function sunset_load_admin_scripts($hook){
    if($hook != 'toplevel_page_rajan_sunset') return;
    wp_register_style( 'sunset-admin', get_template_directory_uri() . '/css/sunset.admin.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'sunset-admin' );
}
add_action( 'admin_enqueue_scripts', 'sunset_load_admin_scripts' );