<?php
// Read the incoming JSON data
$inputData = file_get_contents('php://input');
$jsonData = json_decode($inputData, true);

// Check if 'name' and 'email' parameters exist
if (isset($jsonData['name']) && isset($jsonData['email']) && isset($jsonData['phone']) && isset($jsonData['trades']) && isset($jsonData['message'])) {
    $name = $jsonData['name'];
    $email = $jsonData['email'];
    $phone = $jsonData['phone'];
    $trades = $jsonData['trades'];
    $message = $jsonData['message'];

    $message = "Name: " .$name . "<br \>Phone: ". $phone . "<br \>Email: ". $email ."<br \>Trades: ". $trades ."<br \>Message: ". $message;

    // Set your SMTP server details
    $smtpHost = 'artisantradesnetwork.com';
    $smtpPort = 465; // Use the provided SMTP port
    $smtpUsername = 'contact@artisantradesnetwork.com';
    $smtpPassword = '1PgB_MQh;2=Q';

    // Set email details
    $fromEmail = $email;
    $toEmail = $smtpUsername;

    // Create the email headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $fromEmail\r\n";

    // Attempt to send the email
    if (mail($toEmail, $subject, $message, $headers)) {
        echo 'OK';
    } else {
        echo 'Error sending the message.';
    }
} else {
    // Invalid input
    http_response_code(400); // Bad Request
    echo "Invalid input.";
}
