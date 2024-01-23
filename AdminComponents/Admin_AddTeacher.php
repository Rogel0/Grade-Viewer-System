<?php
include('./phpfiles/connection.php');

$query = "SELECT teacher_info_id, teacher_number, lastname, firstname, middlename, date_of_birth, contact_number, gender, username, password, user_type FROM teacher_info";
$result = mysqli_query($conn, $query);

if ($result) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}


if (isset($_SESSION['success'])) {
    echo "<div id='success-message' style='padding: 20px; margin-bottom: 20px; color: #3c763d; background-color: #dff0d8; border: 1px solid #d6e9c6; border-radius: 4px;'>";
    echo $_SESSION['success'];
    echo "</div>";
    // unset the session variable so it doesn't keep showing up
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo "<div id='success-message' style='padding: 20px; margin-bottom: 20px; color: black; background-color: #FF6868; border: 1px solid #DCFFB7; border-radius: 4px;'>";
    echo $_SESSION['error'];
    echo "</div>";
    // unset the session variable so it doesn't keep showing up
    unset($_SESSION['error']);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/teacher.css">
    <link rel="stylesheet" href="./css/StudentGrades.css">
    <link rel="stylesheet" href="./css/view_grades.css"> -->
    <!--  -->
    <link rel="shortcut icon" href="./images/Lyceum.png" type="image/x-icon">
</head>

<?php include('./AdminModals/teacher_filterbuttons.php') ?>
<?php include('./AdminModals/addteacher_modal.php') ?>

<!-- Start of the table -->
<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">Teacher Number</th>
            <th scope="col">Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Gender</th>
            <th scope="col">Username</th>
            <th scope="col" style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?php echo $row['teacher_number']; ?></td>
                <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></td>
                <td><?php echo $row['date_of_birth']; ?></td>
                <td><?php echo $row['contact_number']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td>
                    <!-- Modify the action buttons to work with teacher data -->
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#teacher_changePasswordModal<?php echo $row['teacher_number']; ?>">Change Password</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#teacher_viewModal<?php echo $row['teacher_number']; ?>">View Profile</button>
                    <form action='./Adminphpfiles/delete_teacher.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='teacher_number' value='<?php echo $row['teacher_number']; ?>'>
                        <input type='submit' class="btn btn-danger" value='Delete Teacher'>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php foreach ($rows as $row) : ?>
    <?php include('./AdminModals/teacher_view_profile.php') ?>
    <?php include('./AdminModals/teacher_changepass_modal.php'); ?>
<?php endforeach; ?>



<script src="./javascript/sessionmessage.js"></script>
<script src="./javascript/changepassmessage.js"></script>
<script src="./javascript/admin_searchbar.js"></script>

</body>

</html>