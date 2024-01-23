<?php
session_start(); // Start the session at the beginning of your script

include('../phpfiles/connection.php');

if (isset($_POST['teacher_number'])) {
    $teacherNo = (int)$_POST['teacher_number']; // Cast to integer

    // Delete the row in the 'teacher_info' table
    $deleteTeacherQuery = "DELETE FROM teacher_info WHERE teacher_number = ?";
    $stmt = $conn->prepare($deleteTeacherQuery);
    $stmt->bind_param("i", $teacherNo); // Bind as integer
    if (!$stmt->execute()) {
        die("Error executing deleteTeacherQuery: " . $stmt->error);
    }

    $_SESSION['success'] = "Teacher information deleted successfully."; // Set the success session variable

    echo "<script>
        setTimeout(function() {
            window.location.href = '../AdminAddTeacher.php';
        }, 0);
    </script>";
} else {
    echo "teacher_number is not set in POST data";
}

// Close the database connection
mysqli_close($conn);
?>