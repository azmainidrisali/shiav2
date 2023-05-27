jQuery(document).ready(function($) {
    $('.redux-group-field-options .redux-group-field-add').click(function(e) {
        e.preventDefault();

        var $container = $(this).parents('.redux-group-tab').find('.redux-group-container');

        var option = '<div class="redux-field-container">';
        option += '<div class="redux-field"><input type="text" name="redux_demo[options][]" /></div>';
        option += '<div class="redux-field-remove"><a href="#" class="redux-group-field-remove">Remove</a></div>';
        option += '</div>';

        $container.append(option);
    });

    $('.redux-group-field-options').on('click', '.redux-group-field-remove', function(e) {
        e.preventDefault();
        $(this).parents('.redux-field-container').remove();
    });
});