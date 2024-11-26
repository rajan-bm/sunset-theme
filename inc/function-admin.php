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
	add_submenu_page('rajan_sunset', 'Sunset Sidebar options', 'Sidebar', 'manage_options', 'rajan_sunset', 'sunset_theme_create_page');
	add_submenu_page('rajan_sunset', 'Sunset Theme Options', 'Theme Options', 'manage_options', 'rajan_sunset_theme', 'sunset_theme_support_page');
	add_submenu_page('rajan_sunset', 'Sunset CSS options', 'Custom CSS', 'manage_options', 'rajan_sunset_css', 'sunset_theme_settings_page');

	// Activate Custom Settings
	add_action('admin_init', 'sunset_custom_settings');
}
add_action('admin_menu', 'sunset_add_admin_page');

function sunset_custom_settings()
{
	// SideBar Options
	register_setting('sunset-settings-group', 'profile_picture');
	register_setting('sunset-settings-group', 'first_name');
	register_setting('sunset-settings-group', 'middle_name');
	register_setting('sunset-settings-group', 'last_name');
	register_setting('sunset-settings-group', 'user_description');
	register_setting('sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
	register_setting('sunset-settings-group', 'facebook_handler');
	register_setting('sunset-settings-group', 'instagram_handler');

	add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'rajan_sunset');
	add_settings_field('sunset-profile-picture', 'Profile Picture', 'sunset_profile_picture', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-name', 'Full Name', 'sunset_sidebar_name', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-description', 'Description', 'sunset_sidebar_description', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-twitter', 'Twitter Handler', 'sunset_sidebar_twitter', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-facebook', 'Facebook Handler', 'sunset_sidebar_facebook', 'rajan_sunset', 'sunset-sidebar-options');
	add_settings_field('sidebar-instagram', 'Instagram Handler', 'sunset_sidebar_instagram', 'rajan_sunset', 'sunset-sidebar-options');


	// Theme Support Options
	register_setting('sunset-theme-support', 'post_formats', 'sunset_post_formats_callback');

	add_settings_section('sunset-theme-options', 'Theme Options', 'rajan_theme_options', 'rajan_sunset_theme');

	add_settings_field( 'post-formats', 'Post Formats', 'sunset_post_formats', 'rajan_sunset_theme', 'sunset-theme-options' );

}


// post formats callback function
function sunset_post_formats_callback($input)
{
	return $input;
}
function rajan_theme_options()
{
	echo 'Activate and Deactivate specific Theme Support Options.';
}
function sunset_post_formats() {
	$options = get_option('post_formats');
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ) {
		$checked = ( isset( $options[$format] ) && $options[$format] == '1' ) ? 'checked' : '';
		$output .= '<label><input type="checkbox" id="' . $format . '", name="post_formats[' . $format . ']" value="1" ' . $checked . '>' .  $format . '</label><br>';
	}
	echo $output;
}


// Sidebar Options Functions
function sunset_sidebar_options()
{
	echo 'Manage Sidebar Options here';
}
function sunset_profile_picture()
{
	$profile_picture = esc_attr(get_option('profile_picture'));
	echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="' . $profile_picture . '" placeholder="Profile Picture">';
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
	echo '<p>Write something about yourself.</p><textarea type="description" name="user_description" value="' . $description . '" rows="5" class="large-text code"></textarea>';
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



// template submenu function
function sunset_theme_support_page()
{
	require_once(get_template_directory() . '/inc/templates/sunset-theme-support.php');
}
