<?php
session_start();
include('connection.php');

if (isset($_POST['submitButton'])) {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword != $confirmPassword) {
        // echo "New password and confirm password do not match.";
        $_SESSION['error'] = "New password and confirm password do not match.";
        header("Location: ../ChangepassTeacher.php");
        exit;
    }

    $teacherId = $_SESSION['logged_in_user_id'];

    $sql = "SELECT password FROM teacher_info WHERE teacher_info_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $teacherId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($oldPassword == $row['password']) {
        $sql = "UPDATE teacher_info SET password = ? WHERE teacher_info_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $newPassword, $teacherId);
        mysqli_stmt_execute($stmt);

        // echo "Password changed successfully.";
        $_SESSION['success'] = "Password Successfully Changed.";
        header("Location: ../ChangepassTeacher.php");
    } else {
        // echo "Old password is incorrect.";
        $_SESSION['error'] = "Old password is incorrect.";
        header("Location: ../ChangepassTeacher.php");
    }
}
?>