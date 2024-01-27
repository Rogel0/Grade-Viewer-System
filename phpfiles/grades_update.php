<?php
session_start();
include("connection.php");

$student_id = $_POST['student_id'];
$subject_names_first = isset($_POST['subject_name_first']) ? $_POST['subject_name_first'] : [];
$first_quarters = isset($_POST['first_quarter_grade']) ? $_POST['first_quarter_grade'] : [];
$second_quarters = isset($_POST['second_quarter_grade']) ? $_POST['second_quarter_grade'] : [];

$subject_names_second = isset($_POST['subject_name_second']) ? $_POST['subject_name_second'] : [];
$third_quarters = isset($_POST['third_quarter_grade']) ? $_POST['third_quarter_grade'] : [];
$fourth_quarters = isset($_POST['fourth_quarter_grade']) ? $_POST['fourth_quarter_grade'] : [];

// Process the first semester grades
for ($i = 0; $i < count($subject_names_first); $i++) {
    $subject_name = $subject_names_first[$i];
    $sql = "SELECT subject_id FROM subjects WHERE subject_name = ?";
    $stmt_subject = $conn->prepare($sql);
    $stmt_subject->bind_param("s", $subject_name);
    $stmt_subject->execute();
    $result = $stmt_subject->get_result();
    $subject = $result->fetch_assoc();
    $subject_id = $subject['subject_id'];

    if (isset($first_quarters[$i]) || isset($second_quarters[$i])) {
        $first_quarter_grade = isset($first_quarters[$i]) ? $first_quarters[$i] : NULL;
        $second_quarter_grade = isset($second_quarters[$i]) ? $second_quarters[$i] : NULL;

        // Check if a grade for the same subject already exists
        $sql = "SELECT * FROM grades WHERE student_id = ? AND subject_id = ? AND semester = 1";
        $stmt_check = $conn->prepare($sql);
        $stmt_check->bind_param("ii", $student_id, $subject_id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // A grade for the same subject already exists, update it
            $sql = "UPDATE grades SET second_quarter_grade = ? WHERE student_id = ? AND subject_id = ? AND semester = 1";
            $stmt_update = $conn->prepare($sql);
            $stmt_update->bind_param("dii", $second_quarter_grade, $student_id, $subject_id);
            $stmt_update->execute();
        } else {
            // Insert a new grade
            $sql = "INSERT INTO grades (student_id, subject_id, semester, subject_name, first_quarter_grade, second_quarter_grade) VALUES (?, ?, 1, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql);
            $stmt_insert->bind_param("iisdd", $student_id, $subject_id, $subject_name, $first_quarter_grade, $second_quarter_grade);
            $stmt_insert->execute();
        }
    }

    if ($stmt->error) {
        die("Execute failed: {$stmt->error}");
    }

    if ($conn->affected_rows > 0) {
        $_SESSION['success'] = "Record inserted successfully";
    } else {
        // $_SESSION['error'] = "No rows were affected";
    }
}

// Process the second semester grades
for ($i = 0; $i < count($subject_names_second); $i++) {
    $subject_name = $subject_names_second[$i];
    $sql = "SELECT subject_id FROM subjects WHERE subject_name = ?";
    $stmt_subject = $conn->prepare($sql);
    $stmt_subject->bind_param("s", $subject_name);
    $stmt_subject->execute();
    $result = $stmt_subject->get_result();
    $subject = $result->fetch_assoc();
    $subject_id = $subject['subject_id'];

    if (isset($third_quarters[$i]) || isset($fourth_quarters[$i])) {
        $third_quarter_grade = isset($third_quarters[$i]) ? $third_quarters[$i] : NULL;
        $fourth_quarter_grade = isset($fourth_quarters[$i]) ? $fourth_quarters[$i] : NULL;

        // Check if a grade for the same subject already exists
        $sql = "SELECT * FROM grades WHERE student_id = ? AND subject_id = ? AND semester = 2";
        $stmt_check = $conn->prepare($sql);
        $stmt_check->bind_param("ii", $student_id, $subject_id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // A grade for the same subject already exists, update it
            $sql = "UPDATE grades SET fourth_quarter_grade = ? WHERE student_id = ? AND subject_id = ? AND semester = 2";
            $stmt_update = $conn->prepare($sql);
            $stmt_update->bind_param("dii", $fourth_quarter_grade, $student_id, $subject_id);
            $stmt_update->execute();
        } else {
            // Insert a new grade
            $sql = "INSERT INTO grades (student_id, subject_id, semester, subject_name, third_quarter_grade, fourth_quarter_grade) VALUES (?, ?, 2, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql);
            $stmt_insert->bind_param("iisdd", $student_id, $subject_id, $subject_name, $third_quarter_grade, $fourth_quarter_grade);
            $stmt_insert->execute();
        }
    }

    if ($stmt->error) {
        die("Execute failed: {$stmt->error}");
    }

    if ($conn->affected_rows > 0) {
        $_SESSION['success'] = "Record inserted successfully";
    } else {
        // $_SESSION['error'] = "No rows were affected";
    }
}

header("Location: ../DashboardTeacher.php");
