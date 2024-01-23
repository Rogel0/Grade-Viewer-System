<?php
include('../phpfiles/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['student_id'], $_POST['student_no'], $_POST['last_name'], $_POST['first_name'], $_POST['middle_name'], $_POST['gender'], $_POST['dob'], $_POST['address'])) {
        $student_id = $_POST['student_id'];
        $student_no = $_POST['student_no'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];

        $sql = "UPDATE students SET student_no = ?, last_name = ?, first_name = ?, middle_name = ?, gender = ?, dob = ?, address = ? WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssi', $student_no, $last_name, $first_name, $middle_name, $gender, $dob, $address, $student_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Student info updated successfully";
        } else {
            echo "No changes were made";
        }
    } else {
        echo "Missing required fields";
    }
} else {
    echo "Invalid request method";
}