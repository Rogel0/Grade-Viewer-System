<?php
session_start();

include("./phpfiles/connection.php");


if (!isset($_SESSION['logged_in_user_id'])) {
    die('No user ID found in session');
}

$userId = $_SESSION['logged_in_user_id'];

$sql = "SELECT * FROM student_info WHERE student_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if (mysqli_num_rows($result) === 0) {
    die('No student found with the given ID');
}

$student = mysqli_fetch_assoc($result);
?>

<div class="mainshow">
    <h1 class="Student-info">
        Student Information
    </h1>
    <div class="profile">
        <img class="imgs" src="Picture/Lycelogo.png" alt="">
    </div>
    <div class="student-name" id="student-name">
        <h2 class="SInfoname"><?php echo $student['lastname'] . ', ' . $student['firstname']; ?></h2>
        <h3 class="Status">STUDENT</h3>
    </div>
    
    <div class="sub-profile">
        
        <form action="">
            <table>
                <tr>
                    <th>STUDENT NUMBER: </th>
                    <th id="student-number"><?php echo $student['student_no']; ?></th>
                </tr>
                <tr>
                    <th>SCHOOL YEAR: </th>
                    <th><?php echo $student['school_year']; ?></th>
                </tr>
                <tr>
                    <th>YEAR LEVEL: </th>
                    <th id="student-year-level"><?php echo $student['year_level']; ?></th>
                </tr>
                <tr>
                    <th>SECTION: </th>
                    <th id="student-section"><?php echo $student['student_section']; ?></th>
                </tr>
                <th>DATE OF BIRTH: </th>
                <th><?php 
                    $birthdate = new DateTime($student['date_of_birth']); 
                    echo $birthdate->format('m-d-Y');
                    ?></th>
                </tr>
                <tr>
                    <th>CONTACT NUMBER: </th>
                    <th><?php echo $student['contact_number']; ?></th>
                </tr>
                <tr>
                    <th>AGE: </th>
                    <th>
                        <?php
                        $birthDate = new DateTime($student['date_of_birth']);
                        $today = new DateTime();
                        $age = $today->diff($birthDate)->y;
                        echo $age;
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>SEX: </th>
                    <th><?php echo $student['gender']; ?></th>
                </tr>
                <tr>


            </table>
        </form>
    </div>
</div>