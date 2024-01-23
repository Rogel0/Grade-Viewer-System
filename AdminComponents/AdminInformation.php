<?php
session_start(); // Start the session
include("./phpfiles/connection.php");

if (!isset($_SESSION['logged_in_user_id'])) {
    die('No user ID found in session');
}

$userId = $_SESSION['logged_in_user_id'];


$sql = "SELECT * FROM admins WHERE admin_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
    

if (mysqli_num_rows($result) === 0) {
    die('No Admin found with the given ID');
}

$admin = mysqli_fetch_assoc($result);
?>

<div class="mainshow">
    <h1 class="Student-info">
        Admin Information
    </h1>
    <div class="profile">
        <img class="imgs" src="Picture/Lycelogo.png" alt="">
    </div>

    <div class="student-names">
    <h2 class="SInfoname"><?php echo $admin['lastname'] . ', ' . $admin['firstname'] . ' ' . $admin['middlename'] . '.';?></h2>
        <h3 class="Status">Admin</h3>
    </div>

    <div class="sub-profile">
        <form>
            <table>
                <tr>
                    <th>DATE OF BIRTH: </th>
                    <th><?php
                        $birthdate = new DateTime($admin['birthdate']);
                        echo $birthdate->format('m-d-Y');
                        ?></th>
                </tr>
                <tr>
                    <th>AGE: </th>
                    <th>
                        <?php
                        $birthDate = new DateTime($admin['birthdate']);
                        $today = new DateTime();
                        $age = $today->diff($birthDate)->y;
                        echo $age;
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>SEX: </th>
                    <th><?php echo $admin['sex']; ?></th>
                </tr>
                <tr>
                    <th>EMAIL: </th>
                    <th><?php echo $admin['email']; ?></th>
                </tr>
            </table>
        </form>
    </div>
</div>