<?php
// api/send-contact.php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

// Helper: sanitize input
function clean($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

$name = clean($_POST['fullname'] ?? '');
$email = clean($_POST['email'] ?? '');
$subject = clean($_POST['subject'] ?? '');
$message = clean($_POST['message'] ?? '');

// Validation
$errors = [];
if (empty($name)) $errors[] = 'Name is required';
if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}
if (empty($subject)) $errors[] = 'Subject is required';
if (empty($message)) $errors[] = 'Message is required';

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => implode(', ', $errors)]);
    exit;
}

// Prepare email
$to = 'admin@hometour.example'; // 👈 CHANGE TO YOUR EMAIL
$subject_line = "HomeAs Tour Contact: $subject";
$body = "
New contact form submission:

Name: $name
Email: $email
Subject: $subject

Message:
$message

Submitted on: " . date('Y-m-d H:i:s');

$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
if (mail($to, $subject_line, $body, $headers)) {
    // Log to file (optional)
    file_put_contents('../logs/contact.log', "[" . date('Y-m-d H:i:s') . "] $name ($email): $subject\n", FILE_APPEND);

    echo json_encode([
        'status' => 'success',
        'message' => '✅ Message sent successfully! We’ll get back to you soon.'
    ]);
} else {
    error_log("Mail failed to send to $to");
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to send message. Please try again or email us directly.'
    ]);
}