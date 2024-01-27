<?php
include('connection.php');

if (isset($_POST['btnadd_student'])) {
    if (!isset($_POST['student_no'])) {
        // Handle the error, e.g., display an error message and exit
        echo "Error: student_no is not set.";
        exit;
    }

    $studentNo = $_POST['student_no'];
    $LRN = $_POST['LRN'];
    $lastName = $_POST['last_name'];
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contact_number'];
    $parentName = $_POST['parent_name'];
    $permanentAddress = $_POST['permanent_address'];
    $studentsCourse = $_POST['student_course'];
    $yearLevel = $_POST['year_level'];
    $schoolYear = $_POST['school_year'];
    $studentSection = $_POST['student_section'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = 'student';


    $insertQuery = "INSERT INTO student_info (
    student_no, LRN, lastname, firstname, middlename, gender, date_of_birth, address,
    contact_number, parent_name, permanent_address, student_course, year_level, school_year,student_section, username, password, user_type
) VALUES (
    '$studentNo', '$LRN', '$lastName', '$firstName', '$middleName', '$gender', '$dateOfBirth',
    '$address', '$contactNumber', '$parentName', '$permanentAddress',
    '$studentsCourse', '$yearLevel', '$schoolYear','$studentSection', '$username', '$password', '$userType'
)";

    if (mysqli_query($conn, $insertQuery)) {
        $_SESSION['success'] = 'The student successfully added.';
    // Redirect back to the previous page
       header('Location: ../DashboardTeacher.php');
        exit;
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
