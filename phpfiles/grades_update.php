<?php
session_start();
include('connection.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['btnAdd'])) {
    $student_id = $_POST['student_id'];
    $subject_names_first = isset($_POST['subject_name_first']) ? $_POST['subject_name_first'] : [];
    $first_quarters = isset($_POST['first_quarter_grade']) ? $_POST['first_quarter_grade'] : [];
    $second_quarters = isset($_POST['second_quarter_grade']) ? $_POST['second_quarter_grade'] : [];


    // Process the first semester grades
    $sql = "INSERT INTO grades (student_id, subject_id, semester, subject_name, first_quarter_grade, second_quarter_grade) VALUES (?, ?, 1, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    for ($i = 0; $i < count($subject_names_first); $i++) {
        $subject_name = $subject_names_first[$i];
        $sql = "SELECT subject_id FROM subjects WHERE subject_name = ?";
        $stmt_subject = $conn->prepare($sql);
        $stmt_subject->bind_param("s", $subject_name);
        $stmt_subject->execute();
        $result = $stmt_subject->get_result();
        $subject = $result->fetch_assoc();
        $subject_id = $subject['subject_id'];

        // Check if the grades for the subject exist
        // if (!isset($first_quarters[$i]) || !isset($second_quarters[$i])) {
        //     die("Grades for subject {$subject_name} do not exist");
        // }

        // Check if the grades are not empty
        if (!empty($first_quarters[$i]) && !empty($second_quarters[$i])) {
            $sql = "SELECT subject_id FROM subjects WHERE subject_name = ?";
            $stmt_subject = $conn->prepare($sql);
            $stmt_subject->bind_param("s", $subject_name);
            $stmt_subject->execute();
            $result = $stmt_subject->get_result();
            $subject = $result->fetch_assoc();
            $subject_id = $subject['subject_id'];
        
            // Check if a grade for the same subject already exists
            $sql = "SELECT * FROM grades WHERE student_id = ? AND subject_id = ? AND semester = 1";
            $stmt_check = $conn->prepare($sql);
            $stmt_check->bind_param("ii", $student_id, $subject_id);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();
        
            if ($result_check->num_rows > 0) {
                // A grade for the same subject already exists
                $_SESSION['error'] = "A grade for the subject {$subject_name} already exists";
            } else {
                // Bind the parameters and execute the statement
                $stmt->bind_param("iissi", $student_id, $subject_id, $subject_name, $first_quarters[$i], $second_quarters[$i]);
                $stmt->execute();
            }
        }

        if ($stmt->error) {
            die("Execute failed: {$stmt->error}");
        }

        if ($conn->affected_rows > 0) {
            $_SESSION['success'] = "Record inserted successfully";
        } else {
            $_SESSION['error'] = "No rows were affected";
        }
    }

    $subject_names_second = isset($_POST['subject_name_second']) ? $_POST['subject_name_second'] : [];
    $third_quarters = isset($_POST['third_quarter_grade']) ? $_POST['third_quarter_grade'] : [];
    $fourth_quarters = isset($_POST['fourth_quarter_grade']) ? $_POST['fourth_quarter_grade'] : [];

    // Process the second semester grades
    $sql = "INSERT INTO grades (student_id, subject_id, semester, subject_name, third_quarter_grade, fourth_quarter_grade) VALUES (?, ?, 2, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    for ($i = 0; $i < count($subject_names_second); $i++) {
        $subject_name = $subject_names_second[$i];
        $sql = "SELECT subject_id FROM subjects WHERE subject_name = ?";
        $stmt_subject = $conn->prepare($sql);
        $stmt_subject->bind_param("s", $subject_name);
        $stmt_subject->execute();
        $result = $stmt_subject->get_result();
        $subject = $result->fetch_assoc();
        $subject_id = $subject['subject_id'];

        // Check if the grades are not empty
        if (!empty($third_quarters[$i]) && !empty($fourth_quarters[$i])) {
            $sql = "SELECT subject_id FROM subjects WHERE subject_name = ?";
            $stmt_subject = $conn->prepare($sql);
            $stmt_subject->bind_param("s", $subject_name);
            $stmt_subject->execute();
            $result = $stmt_subject->get_result();
            $subject = $result->fetch_assoc();
            $subject_id = $subject['subject_id'];

            // Bind the parameters and execute the statement
            $stmt->bind_param("iisii", $student_id, $subject_id, $subject_name, $third_quarters[$i], $fourth_quarters[$i]);
            $stmt->execute();

            if ($stmt->error) {
                die("Execute failed: {$stmt->error}");
            }

            if ($conn->affected_rows > 0) {
                $_SESSION['success'] = "Record inserted successfully";
            } else {
                $_SESSION['error'] = "No rows were affected";
            }
        }
    }
    header("Location: ../DashboardTeacher.php");
    exit;
}
