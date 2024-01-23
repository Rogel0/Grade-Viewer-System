<?php
session_start();
include('../phpfiles/connection.php');

if (isset($_POST['submitButton'])) {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $studentId = $_POST['student_id'];  // Get the student_id from the form data

    if ($newPassword != $confirmPassword) {
        $_SESSION['error'] = "New password and confirm password do not match.";
        header("Location: ../AdminAddStudent.php");
        exit;
    }

    var_dump($studentId);

    $sql = "SELECT password FROM student_info WHERE student_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $studentId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    var_dump($row);

    if ($row['password'] !== NULL) {
        if ($oldPassword == $row['password']) {
            $sql = "UPDATE student_info SET password = ? WHERE student_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $newPassword, $studentId);
            mysqli_stmt_execute($stmt);

            $_SESSION['success'] = "Password Successfully Changed.";
            header("Location: ../AdminAddStudent.php");
        } else {
            $_SESSION['error'] = "Old password is incorrect.";
            header("Location: ../AdminAddStudent.php");
        }
    } else {
        $_SESSION['error'] = "Old password is NULL.";
        header("Location: ../AdminAddStudent.php");
    }
}
?>