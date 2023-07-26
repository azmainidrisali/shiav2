jQuery(document).ready(function($) {
    // Get all users using the function from PHP
    var allUsers = <?php echo json_encode(get_all_users()); ?>;

    // Find the main author dropdown and modify its options
    $('#post_author_override option').remove();

    // Add all users as options to the dropdown
    $('#post_author_override').append('<option value="0"><?php _e('(no author)'); ?></option>');
    $.each(allUsers, function(key, user) {
        $('#post_author_override').append('<option value="' + user.ID + '">' + user.display_name + '</option>');
    });
});
