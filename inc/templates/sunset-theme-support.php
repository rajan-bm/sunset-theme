<h1>Sunset Theme Support</h1>
<?php 
settings_errors();
// $picture = esc_attr(get_option('profile_picture'));
?>

<form action="options.php" method="POST" class="sunset-general-form">
    <?php
    settings_fields('sunset-theme-support');
    do_settings_sections('rajan_sunset_theme');
    submit_button();
    ?>
</form>