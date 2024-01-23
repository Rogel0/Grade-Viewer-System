<?php
include('./phpfiles/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Lyceum of Alabang</title>

    <!-- CSS links Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/StudentGrades.css">
    <link rel="shortcut icon" href="./images/Lyceum.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body>
    <div class="container">
        <?php include("./StudentComponents/StudentHeader.php") ?>

        <?php include("./StudentComponents/StudentSidebar.php") ?>

        <?php include("./StudentComponents/StudentTime.php") ?>
    </div>

    <?php include("./StudentComponents/StudentInformation.php") ?>
    <script src="./javascript/Script.js"></script>
    <script src="./javascript/printgrades.js"></script>
</body>

</html>