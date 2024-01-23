<?php
session_start();
include('../phpfiles/connection.php');

if (isset($_POST['submitButton'])) {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $teacherNo = $_POST['teacher_number'];  

    if ($newPassword != $confirmPassword) {
        $_SESSION['error'] = "New password and confirm password do not match.";
        header("Location: ../AdminAddTeacher.php");
        exit;
    }

    var_dump($teacherNo);

    $sql = "SELECT password FROM teacher_info WHERE teacher_number = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $teacherNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    var_dump($row);

    if ($row['password'] !== NULL) {
        if ($oldPassword == $row['password']) {
            $sql = "UPDATE teacher_info SET password = ? WHERE teacher_number = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $newPassword, $teacherNo);
            mysqli_stmt_execute($stmt);

            $_SESSION['success'] = "Password Successfully Changed.";
            header("Location: ../AdminAddTeacher.php");
        } else {
            $_SESSION['error'] = "Old password is incorrect.";
            header("Location: ../AdminAddTeacher.php");
        }
    } else {
        $_SESSION['error'] = "Old password is NULL.";
        header("Location: ../AdminAddTeacher.php");
    }
}
?>