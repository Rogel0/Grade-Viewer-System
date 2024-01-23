<?php
session_start(); // Start the session
include("./phpfiles/connection.php");

if (!isset($_SESSION['logged_in_user_id'])) {
    die('No user ID found in session');
}

$userId = $_SESSION['logged_in_user_id'];


$sql = "SELECT * FROM teacher_info WHERE teacher_info_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if (mysqli_num_rows($result) === 0) {
    die('No teacher found with the given ID');
}

$teacher = mysqli_fetch_assoc($result);
?>

<div class="mainshow">
    <h1 class="Student-info">
        Teacher Information
    </h1>
    <div class="profile">
        <img class="imgs" src="Picture/Lycelogo.png" alt="">
    </div>

    <div class="student-names">
    <h2 class="SInfoname"><?php echo $teacher['lastname'] . ', ' . $teacher['firstname'] . ' ' . $teacher['middlename'] . '.';?></h2>
        <h3 class="Status">TEACHER</h3>
    </div>

    <div class="sub-profile">
        <form>
            <table>
                <tr>
                    <th>TEACHER NUMBER: </th>
                    <th><?php echo $teacher['teacher_number']; ?></th>
                </tr>
                <tr>
                    <th>DATE OF BIRTH: </th>
                    <th><?php
                        $birthdate = new DateTime($teacher['date_of_birth']);
                        echo $birthdate->format('m-d-Y');
                        ?></th>
                </tr>
                <tr>
                    <th>CONTACT NUMBER: </th>
                    <th><?php echo $teacher['contact_number']; ?></th>
                </tr>
                <tr>
                    <th>AGE: </th>
                    <th>
                        <?php
                        $birthDate = new DateTime($teacher['date_of_birth']);
                        $today = new DateTime();
                        $age = $today->diff($birthDate)->y;
                        echo $age;
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>SEX: </th>
                    <th><?php echo $teacher['gender']; ?></th>
                </tr>
            </table>
        </form>
    </div>
</div>