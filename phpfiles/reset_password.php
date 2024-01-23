<?php
// Start the session
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        // die('Passwords do not match.');
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: ../ResetPassword.php");
    }

    // Query to select the user with the token
    $query = "SELECT * FROM password_resets WHERE token = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found with the token
        $user = $result->fetch_assoc();

        // Retrieve the email from the password_resets table
        $email = $user['email'];

        // Query to select the user with the email
        $query = "SELECT * FROM student_info WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found with the email
            $user = $result->fetch_assoc();

            // Update the user's password
            $query = "UPDATE student_info SET password = ? WHERE student_no = ?";
            $stmt = $conn->prepare($query);

            // Check if the UPDATE query is being prepared correctly
            if ($stmt === false) {
                die('Failed to prepare the UPDATE query: ' . $conn->error);
            }

            $stmt->bind_param('ss', $password, $user['student_no']);

            if ($stmt->execute()) {
                // Delete the token from the password_resets table
                $query = "DELETE FROM password_resets WHERE token = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('s', $token);
                $stmt->execute();

                // Redirect to a success page
                header("Location: ../index.php");
                $_SESSION['success'] = "Password reset successful. You can now login with your new password.";
            } else {
                // Print an error message
                // echo "Error updating record: " . $stmt->error;
                $_SESSION['error'] = "Error updating record: " . $stmt->error . ".";
                header("Location: ../ResetPassword.php");
            }
        } else {
            die('No user found with this email.');
        }
    } else {
        // No user found with the token
        $_SESSION['error'] = "Invalid token.";
        header("Location: ../ResetPassword.php");
    }
}