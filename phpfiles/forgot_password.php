<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Include your database connection file
session_start();
include("connection.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in your database
    $query = "SELECT * FROM student_info WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // The email exists in the database

        // Generate a random token
        $token = bin2hex(random_bytes(50));

        // Store the token in your database
        $query = "INSERT INTO password_resets (email, token) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $email, $token);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
            exit();
        }

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.sendgrid.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'apikey';
            $mail->Password   = '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';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('gerodiazrogel0@gmail.com', 'Lyceum of Alabang');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body    = "You are requesting to reset your password. <br><br> Click on this link to reset your password: <a href='http://localhost/Grade%20View%20System/ResetPassword.php?token=$token'>Reset Password</a>";
            $mail->AltBody = "Copy and paste this link into your browser to reset your password: http://localhost/Grade%20View%20System/ResetPassword.php?token=$token";

            $mail->send();
            $_SESSION['success'] = "Password reset link has been sent to your email.";
        } catch (Exception $e) {
            $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // The email does not exist in the database
        $_SESSION['error'] = "This email is not registered.";
    }

    header("Location: ../index.php");
    exit();
}