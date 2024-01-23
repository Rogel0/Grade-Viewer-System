<?php
session_start(); // Start the session

include('connection.php');

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check the student_info table
    $sql = "SELECT * FROM student_info WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // If no result, check the teacher_info table
    if (mysqli_num_rows($result) == 0) {
        $sql = "SELECT * FROM teacher_info WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    // If still no result, check the admins table
    if (mysqli_num_rows($result) == 0) {
        $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $userType = $row['user_type'];

            if ($userType == 'student') {
                $_SESSION['logged_in_user_id'] = $row['student_id'];
                header("Location: ../Studentdashboard.php");
                exit;
            } elseif ($userType == 'teacher') {
                $_SESSION['logged_in_user_id'] = $row['teacher_info_id']; 
                header("Location: ../TeacherLandingPage.php");
                exit;
            } elseif ($userType == 'admin') {
                $_SESSION['logged_in_user_id'] = $row['admin_id']; 
                header("Location: ../Admin.php");
                exit;
            } else {
                echo "<script>alert('Unknown user type.')</script>";
                echo "<script>window.location.href=' ../index.php'</script>";
            }
        }
        else {
            // If $count is not 1, the credentials are incorrect
            $_SESSION['error'] = 'Incorrect username or password';
            header("Location: ../index.php");
        }
    }
}
?>