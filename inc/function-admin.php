<?php

/*
	
@package sunsettheme
	
	========================
		ADMIN PAGE
	========================
*/

function sunset_add_admin_page() {
	// generate sunset admin page
	add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'rajan_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );

	// generate sunset admin sub pages
	add_submenu_page( 'rajan_sunset', 'Sunset Theme options', 'General', 'manage_options', 'rajan_sunset', 'sunset_theme_create_page' );

	add_submenu_page( 'rajan_sunset', 'Sunset CSS options', 'Custom CSS', 'manage_options', 'rajan_sunset_css', 'sunset_theme_settings_page' );
	
}
add_action( 'admin_menu', 'sunset_add_admin_page' );

function sunset_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_theme_settings_page() {
	echo '<h2>Sunset Theme Custom CSS</h2>';
}