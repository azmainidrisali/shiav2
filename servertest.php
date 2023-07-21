<?php

// Set up the request URL and headers
$url = 'http://localhost/shiacomputer/wp-json/wp/v2/posts';
$headers = array(
    'Content-Type: application/json',
    'Authorization: Basic ' . base64_encode('admin1:admin')
);

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve post data from the form
    $title = $_POST['title'];
    $content = $_POST['content'];

    
    // Set up the post data
    $post_data = array(
        'title' => $title,
        'content' => $content,
        'status' => 'publish',
        'author' => 14, // Use the authenticated user as the author
    );

    // Send the POST request to create the new post
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get the HTTP status code
    curl_close($ch);

    // Check the response
    if ($response === false) {
        echo 'Error creating post: ' . curl_error($ch);
    } else {
        // Display the full response
        echo 'API Response: ' . $response;
        
        // Decode the response and handle errors
        $data = json_decode($response, true);
        if ($http_status === 201 && isset($data['id'])) {
            echo 'Post created successfully. ID: ' . $data['id'];
        } else {
            echo 'Error creating post: ' . $data['message'];
        }
    }
    exit(); // Terminate script execution after processing the request
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create a New Post</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br><br>
        
        <label for="content">Content:</label>
        <textarea name="content" id="content" required></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
