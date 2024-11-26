<h1>Sunset Sidebar Options</h1>
<?php settings_errors();
    $picture = esc_attr(get_option('profile_picture'));
    $firstName = esc_attr(get_option('first_name'));
    $middleName = esc_attr(get_option('middle_name'));
    $lastName = esc_attr(get_option('last_name'));
    $fullName = $firstName . ' ' . $middleName . ' ' . $lastName;
    $userDescription = esc_attr(get_option('user_description'));
    $twitterHandler = esc_attr(get_option('twitter_handler'));
    $facebookHandler = esc_attr(get_option('facebook_handler'));
    $instagramHandler = esc_attr(get_option('instagram_handler'));

    function sunset_social_icons($twitterHandler, $facebookHandler, $instagramHandler){
        $icons = '<div class="icons-wrapper">';
        if (!empty($twitterHandler)) {
            $icons .= '<a href="https://twitter.com/' . $twitterHandler . '" target="_blank">Twitter</i></a>';
        }
        if (!empty($facebookHandler)) {
            $icons .= '<a href="https://www.facebook.com/' . $facebookHandler . '" target="_blank">Facebook</i></a>';
        }
        if (!empty($instagramHandler)) {
            $icons .= '<a href="https://www.instagram.com/' . $instagramHandler . '" target="_blank">Instagram</i></a>';
        }
        $icons .= '</div>';
        return $icons;
    }
?>
<div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url('<?php echo $picture; ?>');"></div>
        </div>
        <h1 class="sunset-username"><?php echo $fullName; ?></h1>
        <h2 class="sunset-userdescription"><?php echo $userDescription; ?></h2>
        <div class="icons-wrapper"><?php echo sunset_social_icons($twitterHandler, $facebookHandler, $instagramHandler); ?></div>
    </div>
</div>
<form action="options.php" method="POST" class="sunset-general-form">
    <?php settings_fields('sunset-settings-group');
    do_settings_sections('rajan_sunset');
    submit_button(); ?>
</form>