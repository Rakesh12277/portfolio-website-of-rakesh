<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $message = strip_tags(trim($_POST["message"]));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please go back and enter a valid email.";
        exit;
    }

    // Email recipient
    $to = "boharadipak310@gmail.com";
    
    // Email subject
    $subject = "New Contact Form Submission from $name";
    
    // Email body
    $body = "You have received a new message from your portfolio contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    $mailSent = mail($to, $subject, $body, $headers);

    if ($mailSent) {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>Message Sent</title>
            <style>
                body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: linear-gradient(135deg, #1a1a2e, #16213e); }
                .container { text-align: center; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
                .checkmark { color: #4CAF50; font-size: 50px; }
                h1 { color: #4CAF50; margin: 20px 0 10px; }
                p { color: #666; }
                .btn { display: inline-block; margin-top: 20px; padding: 12px 30px; background: linear-gradient(135deg, #667eea, #764ba2); color: white; text-decoration: none; border-radius: 25px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='checkmark'>✓</div>
                <h1>Message Sent!</h1>
                <p>Thank you for contacting me. I'll get back to you soon!</p>
                <a href='contact.html' class='btn'>Back to Contact</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Sorry, something went wrong. Please try again or email me directly at boharadipak310@gmail.com";
    }
} else {
    header("Location: contact.html");
    exit;
}
?>
