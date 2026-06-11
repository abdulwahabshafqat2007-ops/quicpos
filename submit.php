<?php
// submit.php — Handles Contact Form POST
// [POS-501] Form submission processing

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if (empty($name) || empty($email) || empty($message)) {
    $error = urlencode('All fields are required. Please fill in your name, email, and message.');
    header("Location: index.php?error=$error#contact");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = urlencode('Please enter a valid email address.');
    header("Location: index.php?error=$error#contact");
    exit;
}

// ✅ Validation passed - redirect to thank you
header('Location: thankyou.html');
exit;
?>