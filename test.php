?>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Execute the SendSMS function when the form is submitted
        $StudentPhoneNumber = '8801798192491';
        $textSms = 'welcome';
        SendSMS($StudentPhoneNumber, $textSms);
    }
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit">Send SMS</button>
    </form>



    // Generate and save unique roll number combined with sequential number when a new post is published
function save_custom_roll_number($post_id) {
    // Check if the post is of your custom post type and if it is published
    $post_type = get_post_type($post_id);
    $post_status = get_post_status($post_id);
    if ($post_type !== 'admissions' || $post_status !== 'publish') {
        return;
    }

    // Get the total number of published posts for your custom post type
    $args = array(
        'post_type'      => 'admissions', // Replace with your custom post type slug
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $posts = get_posts($args);
    $post_count = count($posts);

    // Determine the sequential number with leading zeros
    $sequential_number = $post_count;
    if ($sequential_number < 10) {
        $sequential_number = sprintf('%04d', $sequential_number);
    }

    // Generate the roll number with the '2022' prefix
    $roll_number = '2022';

    // Append the sequential number
    $roll_number .= $sequential_number;

    // Save the roll number
    update_post_meta($post_id, 'custom_roll_number', $roll_number);
}
add_action('save_post', 'save_custom_roll_number');


//registration number End
function add_custom_roll_number_meta_box() {
    add_meta_box(
        'custom_roll_number_meta_box', // Meta box ID
        'Roll Number', // Meta box title
        'generate_custom_roll_number_meta_box', // Callback function to render meta box content
        'admissions', // Replace with your custom post type slug
        'normal', // Meta box position (normal, side, advanced)
        'default' // Meta box priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_custom_roll_number_meta_box');

// Callback function to render meta box content
function generate_custom_roll_number_meta_box($post) {
    $roll_number = get_post_meta($post->ID, 'custom_roll_number', true);
    ?>
    <p><strong>Roll Number: </strong><?php echo $roll_number; ?></p>
    <?php
}
// Generate and save unique roll number combined with sequential number when a new post is published
function save_custom_roll_number($post_id) {
    // Check if the post is of your custom post type and if it is published
    $post_type = get_post_type($post_id);
    $post_status = get_post_status($post_id);
    if ($post_type !== 'admissions' || $post_status !== 'publish') {
        return;
    }

    // Get the total number of published posts for your custom post type
    $args = array(
        'post_type'      => 'admissions', // Replace with your custom post type slug
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $posts = get_posts($args);
    $post_count = count($posts);

    // Determine the sequential number with leading zeros
    $sequential_number = $post_count;
    if ($sequential_number < 10) {
        $sequential_number = sprintf('%04d', $sequential_number);
    }

    // Generate the roll number with the '2022' prefix
    $roll_number = '2022';

    // Append the sequential number
    $roll_number .= $sequential_number;

    // Save the roll number
    update_post_meta($post_id, 'custom_roll_number', $roll_number);
}
add_action('save_post', 'save_custom_roll_number');














function add_custom_roll_number_meta_box() {
    add_meta_box(
        'custom_roll_number_meta_box', // Meta box ID
        'Roll Number', // Meta box title
        'generate_custom_roll_number_meta_box', // Callback function to render meta box content
        'admissions', // Replace with your custom post type slug
        'normal', // Meta box position (normal, side, advanced)
        'default' // Meta box priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_custom_roll_number_meta_box');

// Callback function to render meta box content
function generate_custom_roll_number_meta_box($post) {
    $roll_number = get_post_meta($post->ID, 'custom_roll_number', true);
    ?>
    <p><strong>Roll Number: </strong><?php echo $roll_number; ?></p>
    <?php
}

// Generate and save unique roll number combined with sequential number when a new post is published
function save_custom_roll_number($post_id) {
    // Check if the post is of your custom post type and if it is published
    $post_type = get_post_type($post_id);
    $post_status = get_post_status($post_id);
    if ($post_type !== 'admissions' || $post_status !== 'publish') {
        return;
    }

    // Check if the roll number has already been generated for this post
    $existing_roll_number = get_post_meta($post_id, 'custom_roll_number', true);
    if (!empty($existing_roll_number)) {
        return; // Roll number already exists, no need to generate again
    }

    // Get the total number of published posts for your custom post type
    $args = array(
        'post_type'      => 'admissions', // Replace with your custom post type slug
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $posts = get_posts($args);
    $post_count = count($posts);

    // Determine the sequential number with leading zeros
    $sequential_number = $post_count;
    if ($sequential_number < 10) {
        $sequential_number = sprintf('%04d', $sequential_number);
    }

    // Generate the roll number with the '2022' prefix and sequential number
    $roll_number_prefix = '2022';
    $roll_number = $roll_number_prefix . $sequential_number;

    // Save the roll number and sequential number
    update_post_meta($post_id, 'custom_roll_number', $roll_number);
    update_post_meta($post_id, 'sequential_number', $sequential_number);
}
add_action('save_post', 'save_custom_roll_number');