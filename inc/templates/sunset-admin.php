<h1>Sunset Theme Options</h1>
<?php settings_errors();

    $firstName = esc_attr(get_option('first_name'));
    $middleName = esc_attr(get_option('middle_name'));
    $lastName = esc_attr(get_option('last_name'));
    $fullName = $firstName . ' ' . $middleName . ' ' . $lastName;
    $userDescription = esc_attr(get_option('user_description'));
    $twitterHandler = esc_attr(get_option('twitter_handler'));
    $facebookHandler = esc_attr(get_option('facebook_handler'));
    $instagramHandler = esc_attr(get_option('instagram_handler'));

    function sunset_social_icons($twitterHandler, $facebookHandler, $instagramHandler)
    {
        $icons = '';
        if (!empty($twitterHandler)) {
            $icons .= '<a href="https://twitter.com/' . $twitterHandler . '" target="_blank"><i class="fa fa-twitter"></i></a>';
        }
        if (!empty($facebookHandler)) {
            $icons .= '<a href="https://www.facebook.com/' . $facebookHandler . '" target="_blank"><i class="fa fa-facebook"></i></a>';
        }
        if (!empty($instagramHandler)) {
            $icons .= '<a href="https://www.instagram.com/' . $instagramHandler . '" target="_blank"><i class="fa fa-instagram"></i></a>';
        }
        return $icons;
    }
?>
<div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
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