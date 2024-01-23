<?php

session_start(); // Start the session at the beginning of your script

include('connection.php');

if (isset($_POST['student_id'])) {

    $studentId = (int)$_POST['student_id']; // Cast to integer

    // Delete the related rows in the 'grades' table
    $deleteGradesQuery = "DELETE FROM grades WHERE student_id = ?";
    $stmt = $conn->prepare($deleteGradesQuery);
    $stmt->bind_param("i", $studentId); // Bind as integer
    if (!$stmt->execute()) {
        die("Error executing deleteGradesQuery: " . $stmt->error);
    }

    // Delete the row in the 'student_info' table
    $deleteStudentQuery = "DELETE FROM student_info WHERE student_id = ?";
    $stmt = $conn->prepare($deleteStudentQuery);
    $stmt->bind_param("i", $studentId); // Bind as integer
    if (!$stmt->execute()) {
        die("Error executing deleteStudentQuery: " . $stmt->error);
    }

    $_SESSION['success'] = "Student information deleted successfully."; // Set the success session variable

    echo "<script>
        setTimeout(function() {
            window.location.href = '../DashboardTeacher.php';
        }, 0);
    </script>";
} else {
    echo "student_id is not set in POST data";
}

// Close the database connection
mysqli_close($conn);
?>