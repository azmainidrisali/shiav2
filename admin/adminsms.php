<?php
require_once(get_template_directory(). '/admin/header.php');
// Include the Twilio PHP library
require_once(get_template_directory(). '/plugins/twilio-php-main/src/Twilio/autoload.php');

// Set your Twilio credentials
$accountSid = 'AC39354d8c6ccb1c25f8e775853156e072';
$authToken = 'c0a770a06ae1edc6d1e0fcba0fe7d5b1';
$twilioNumber = '+18312152270';

// Create a new Twilio client
$client = new Twilio\Rest\Client($accountSid, $authToken);

// Set the recipient's phone number and the message to send
$recipientNumber = '+8801798192491';
$message = 'Your Admission is Successfull REG : 92386, ROLL : 3298, UserName : shiaTest, Pass: 1234567890 login link: https://app.shiacomputer.com';

try {
    // Send the SMS message
    $client->messages->create(
        $recipientNumber,
        [
            'from' => $twilioNumber,
            'body' => $message
        ]
    );

    echo "SMS sent successfully!";
} catch (Exception $e) {
    echo "Error sending SMS: " . $e->getMessage();
}

require_once(get_template_directory(). '/admin/footer.php');
?>
