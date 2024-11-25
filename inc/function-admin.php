<?php

/*	
@package sunsettheme
	
	========================
		ADMIN PAGE
	========================
*/

function sunset_add_admin_page()
{
	// generate sunset admin page
	add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'rajan_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110);

	// generate sunset admin sub pages
	add_submenu_page('rajan_sunset', 'Sunset Theme options', 'General', 'manage_options', 'rajan_sunset', 'sunset_theme_create_page');
	add_submenu_page('rajan_sunset', 'Sunset CSS options', 'Custom CSS', 'manage_options', 'rajan_sunset_css', 'sunset_theme_settings_page');

	// Activate Custom Settings
	add_action('admin_init', 'sunset_custom_settings');
}
add_action('admin_menu', 'sunset_add_admin_page');

function sunset_custom_settings()
{
	register_setting('sunset-settings-group', 'first_name');
	register_setting('sunset-settings-group', 'middle_name');
	register_setting('sunset-settings-group', 'last_name');
	register_setting('sunset-settings-group', 'user_description');
	register_setting('sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
	register_setting('sunset-settings-group', 'facebook_handler');
	register_setting('sunset-settings-group', 'instagram_handler');

	add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'rajan_sunset');
	add_settings_field('sidebar-name', 'Full Name', 'sunset_sidebar_name', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-description', 'Description', 'sunset_sidebar_description', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-twitter', 'Twitter Handler', 'sunset_sidebar_twitter', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-facebook', 'Facebook Handler', 'sunset_sidebar_facebook', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-instagram', 'Instagram Handler', 'sunset_sidebar_instagram', 'rajan_sunset', 'sunset-sidebar-options');
}

function sunset_sidebar_options()
{
	echo 'Manage Sidebar Options here';
}

function sunset_sidebar_name()
{
	$firstName = esc_attr(get_option('first_name'));
	$lastName = esc_attr(get_option('last_name'));
	$middleName = esc_attr(get_option('middle_name'));
	echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name"><input type="text" name="middle_name" value="' . $middleName . '" placeholder="Middle Name"><input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name">';
}

function sunset_sidebar_description()
{
	$description = esc_attr(get_option('user_description'));
	echo '<input type="textarea" name="user_description" value="' . $description . '" placeholder="Description" rows="5"><p>Write something about yourself.</p>';
}

function sunset_sidebar_twitter()
{
	$twitter = esc_attr(get_option('twitter_handler'));
	echo '<input type="text" name="twitter_handler" value="' . $twitter . '" placeholder="Twitter Handler"><p class="description">Input your twitter handle without @ symbol</p>';
}

function sunset_sidebar_facebook()
{
	$facebook = esc_attr(get_option('facebook_handler'));
	echo '<input type="text" name="facebook_handlesr" value="' . $facebook . '" placeholder="Facebook Handler">';
}

function sunset_sidebar_instagram()
{
	$instagram = esc_attr(get_option('instagram_handler'));
	echo '<input type="text" name="instagram_handler" value="' . $instagram . '" placeholder="Instagram Handler">';
}

// sanitization settings
function sunset_sanitize_twitter_handler($input)
{
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}

function sunset_theme_create_page()
{
	require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_theme_settings_page()
{
	echo '<h2>Sunset Theme Custom CSS</h2>';
}
