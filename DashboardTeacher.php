<?php
session_start(); // Start the session at the beginning of your script
include('./phpfiles/connection.php');



// if (isset($_SESSION['success'])) {
//     echo "<div class='alert alert-success'>";
//     echo $_SESSION['success'];
//     echo "</div>";
//     unset($_SESSION['success']); // Unset the success session variable so it doesn't persist on page refresh
// }
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
    <title>Teacher Dashboard - Lyceum of Alabang</title>

    <!-- CSS links Style -->
    <link rel="stylesheet" href="./css/teacher.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/SGrades.css">
    <link rel="stylesheet" href="./css/view_grades.css">


    <link rel="shortcut icon" href="./images/Lyceum.png" type="image/x-icon">

</head>

<body style="background-color: #F0ECE5;">
    <div class="container">
        <?php include("./TeacherComponents/TeacherHeader.php") ?>
        <?php include("./TeacherComponents/TeacherTime.php") ?>
        <div style="display: flex; justify-content: center; width: 30%; margin-left: 37%; gap: 2px; margin-bottom: 0; margin-top: 2%;">
            <div class="col">
                <label for="first_quarter_checkbox" style="font-weight: bold; color: #333;">1st Quarter</label>
                <input type="checkbox" id="first_quarter_checkbox" class="gradingCheckbox" style="margin-left: 10px;">
            </div>
            <div class="col">
                <label for="second_quarter_checkbox" style="font-weight: bold; color: #333;">2nd Quarter</label>
                <input type="checkbox" id="second_quarter_checkbox" class="gradingCheckbox" style="margin-left: 10px;">
            </div>
            <div class="col">
                <label for="third_quarter_checkbox" style="font-weight: bold; color: #333;">3rd Quarter</label>
                <input type="checkbox" id="third_quarter_checkbox" class="gradingCheckbox" style="margin-left: 10px;">
            </div>
            <div class="col">
                <label for="fourth_quarter_checkbox" style="font-weight: bold; color: #333;">4th Quarter</label>
                <input type="checkbox" id="fourth_quarter_checkbox" class="gradingCheckbox" style="margin-left: 10px;">
            </div>
        </div>

        <?php include("./TeacherComponents/TeacherSidebar.php") ?>

        <?php include("./Teacherdashboard.php") ?>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./javascript/Script.js" defer></script>
    <script src="./javascript/plus_sign.js" defer></script>
    <script src="./javascript/bar_search.js"></script>
    <!-- <script src="./javascript/sessionmessage.js"></script> -->
    <script src="./javascript/printgrades_teacher.js"></script>
    <script src="./javascript/checkbox_state.js"></script>
    <script src="./javascript/changepassmessage.js"></script>
    <script src="./javascript/error_handler_fields.js"></script>
</body>

</html>