<?php
// Include your database connection file
include('./phpfiles/connection.php');

// Get the student id from the request
$student_id = $_GET['student_id'];

// Query to fetch the grades
$sql = "SELECT subject, first_grading, second_grading, third_grading, fourth_grading FROM grades WHERE student_id = " . $student_id;
$result = $conn->query($sql);

$grades = [];

if ($result->num_rows > 0) {
    // Output data of each row
    while($grade = $result->fetch_assoc()) {
        $grades[] = $grade;
    }
}

// Close the connection
$conn->close();

// Return the grades as a JSON object
echo json_encode($grades);
?>