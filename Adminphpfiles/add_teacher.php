<?php
include('../phpfiles/connection.php');

if (isset($_POST['btnadd_teacher'])) {
    if (!isset($_POST['teacher_number'])) {
        // Handle the error, e.g., display an error message and exit
        echo "Error: teacher_no is not set.";
        exit;
    }

    $teacherNo = $_POST['teacher_number'];
    $lastName = $_POST['last_name'];
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $dateOfBirth = $_POST['date_of_birth'];
    $contactNumber = $_POST['contact_number'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = 'teacher';


    $insertQuery = "INSERT INTO teacher_info (
    teacher_number  , lastname, firstname, middlename, gender, date_of_birth,
    contact_number,username, password, user_type
) VALUES (
    '$teacherNo', '$lastName', '$firstName', '$middleName', '$gender', '$dateOfBirth',
     '$contactNumber', '$username', '$password', '$userType'
)";

    if (mysqli_query($conn, $insertQuery)) {
        $_SESSION['success'] = 'The teacher successfully added.';
        // Redirect back to the previous page
        header('Location: ../AdminAddTeacher.php');
        exit;
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
