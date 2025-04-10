<?php
header('Content-Type: application/json');

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';  
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

$name = filter_var($name, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);  
$phone = filter_var($phone, FILTER_SANITIZE_STRING);
$message = filter_var($message, FILTER_SANITIZE_STRING);

if (!preg_match("/^[0-9+\-\(\) ]*$/", $phone)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid phone number format.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
    exit;
}

$to = "deenis.group2000@gmail.com, deepakdahiya021@gmail.com";
$subject = "Deenis Law Chamber - Contact Form Submission";

$txt = "Name: " . $name . "\r\nEmail: " . $email . "\r\nPhone: " . $phone . "\r\nMessage: " . $message;

$headers = "From: no-reply@yourdomain.com" . "\r\n" .
    "Reply-To: " . $email . "\r\n" .  
    "Content-Type: text/plain; charset=UTF-8";

if (mail($to, $subject, $txt, $headers)) {
    echo json_encode(['status' => 'success', 'message' => 'Thank you! Your message has been sent.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: Unable to send email.']);
}
?>
