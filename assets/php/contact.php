<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = htmlspecialchars(trim($_POST["name"]));
    $phone  = htmlspecialchars(trim($_POST["phone"]));
    $email  = htmlspecialchars(trim($_POST["email"]));

    if ($name == "" || $phone == "" || $email == "") {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        echo "Invalid phone number.";
        exit;
    }

    // EMAIL CONTENT
    $to = "vinaykunduru@gmail.com";  // change to your receiving email
    $subject = "New Contact Request";
    $message = "
        Name: $name\n
        Phone: $phone\n
        Email: $email\n
    ";
    $headers = "From: no-reply@example.com";

    // send email
    mail($to, $subject, $message, $headers);

    echo "Thank you! We will contact you shortly.";
}
?>
