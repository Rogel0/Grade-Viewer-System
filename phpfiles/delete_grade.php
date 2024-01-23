<?php
session_start();  // Start the session at the beginning of your script

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Connect to the database
    include('connection.php');

    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare the DELETE statement
    $stmt = $conn->prepare('DELETE FROM grades WHERE id = ?');
    $stmt->bind_param('i', $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set the success message
        $_SESSION['success'] = 'The grade was deleted successfully.';
        header('Location: ../DashboardTeacher.php');
    }

    // Close the connection
    $stmt->close();
    $conn->close();
    $_SESSION['success'] = 'The grade was deleted successfully.';
    // Redirect back to the previous page
    header('Location: ../DashboardTeacher.php');
}
?>