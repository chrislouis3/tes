<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $to = "chrislouis3010@gmail.com"; 
        $subject = "New Message from $name";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

     
        $body = "Name: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message\n";

       
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you, $name. Your message has been sent successfully.";
        } else {
            echo "Sorry, there was an error sending your message. Please try again.";
        }
    } else {
        echo "Invalid form input. Please fill out the form correctly.";
    }
} else {
    echo "Invalid request method.";
}
?>
