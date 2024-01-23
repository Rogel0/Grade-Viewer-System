<?php
session_start();
    include("./phpfiles/connection.php");

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Lyceum of Alabang</title>

    <!-- CSS links Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/Changepass.css">
    <link rel="stylesheet" href="./css/studentmessage.css">
    <link rel="shortcut icon" href="./images/Lyceum.png" type="image/x-icon">
</head>

<body style="background-color: #F0ECE5;">
    <div class="container">
        <?php include("./TeacherComponents/TeacherHeader.php") ?>



        <?php include("./TeacherComponents/TeacherSidebar.php") ?>
        <?php include("./TeacherComponents/TeacherTime.php") ?>

        <?php include("./TeacherComponents/TeacherChangePass.php") ?>


    </div>
    <script src="./javascript/Script.js"></script>
    <script src="./javascript/changepassmessage.js"></script>
</body>

</html>