<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "floridapoodlerescu@gmail.com";
    $subject = "New Adoption Application Submission";

    // Start the email message body
    $message = "You have received a new application form submission:\n\n";

    // Loop through each POST field and add it to the message
    foreach ($_POST as $key => $value) {
        // Handle arrays (checkboxes, multiple selects)
        if (is_array($value)) {
            $value = implode(", ", $value);
        }
        $message .= ucfirst($key) . ": " . htmlspecialchars($value) . "\n";
    }

    // Email headers
    $headers = "From: no-reply@floridapoodlerescue.org\r\n";
    $headers .= "Reply-To: no-reply@floridapoodlerescue.org\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Application submitted successfully!";
    } else {
        echo "There was an error sending your application. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
