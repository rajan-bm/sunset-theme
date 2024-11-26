jQuery(document).ready(function ($) {
    var mediaUploader;
    $('#upload-button').on('click', function (e) {
        e.preventDefault();
        // If the media uploader instance already exists, reopen it.
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        // Create the media uploader instance.
        mediaUploader = wp.media({
            title: 'Choose Images',
            button: {
                text: 'Choose Images',
            },
            multiple: false,
        });
        // check if something has been selected
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
            $('#profile-picture-preview').css('background-image', 'url("' + attachment.url + '")');
        });
    });
});
