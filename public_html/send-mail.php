<?php
/**
 * Contact Form Mail Handler
 * Nagashree English School — send-mail.php
 *
 * Accepts POST from contact.html form and sends an email to the school inbox.
 */

header('Content-Type: application/json; charset=utf-8');

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// --- Input sanitisation ---
$name    = trim(htmlspecialchars(strip_tags($_POST['name']    ?? ''), ENT_QUOTES, 'UTF-8'));
$email   = trim(filter_var($_POST['email']   ?? '', FILTER_SANITIZE_EMAIL));
$subject = trim(htmlspecialchars(strip_tags($_POST['subject'] ?? ''), ENT_QUOTES, 'UTF-8'));
$message = trim(htmlspecialchars(strip_tags($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8'));

// --- Validation ---
$errors = [];

if ($name === '') {
    $errors[] = 'Name is required.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
}
if ($subject === '') {
    $errors[] = 'Subject is required.';
}
if ($message === '') {
    $errors[] = 'Message is required.';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// --- Send email ---
$to       = 'nagashreeschoolcrp@gmail.com';
$mailSubject = 'Website Enquiry: ' . $subject;
$body     = "You have received a new enquiry from the Nagashree English School website.\n\n"
          . "Name    : {$name}\n"
          . "Email   : {$email}\n"
          . "Subject : {$subject}\n\n"
          . "Message :\n{$message}\n";

$headers  = "From: website@nagashreeschoolcrp.in\r\n"
          . "Reply-To: {$email}\r\n"
          . "X-Mailer: PHP/" . phpversion();

$sent = mail($to, $mailSubject, $body, $headers);

if ($sent) {
    echo json_encode(['success' => true, 'message' => 'Thank you! Your message has been sent. We will get back to you shortly.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Sorry, your message could not be sent. Please try calling us directly.']);
}
