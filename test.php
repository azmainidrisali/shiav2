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