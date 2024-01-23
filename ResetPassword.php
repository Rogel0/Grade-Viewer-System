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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style2.css">
    <title>Reset Password - Lyceum Alabang</title>
</head>

<body class="index-body">
    <?php include("./StudentComponents/StudentHeader.php") ?>
    <?php include("./StudentComponents/StudentTime.php") ?>

    <div style="width: 40%; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; font-family: 'Montserrat', sans-serif;">
    <h2 style="font-size: 24px; font-weight: bold; text-align: center;">Reset Password</h2>
    <form action="./phpfiles/reset_password.php" method="post">
    <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : ''; ?>">
        <div>
            <label style="font-weight: bold; margin-bottom: 5px; display: inline-block;" for="password">New Password:</label>
            <input style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 18px; border-radius: 5px; border: 1px solid #ccc;" type="password" id="password" name="password" required>
        </div>
        <div>
            <label style="font-weight: bold; margin-bottom: 5px; display: inline-block;" for="confirm_password">Confirm New Password:</label>
            <input style="width: 100%; padding: 10px; margin-bottom: 10px; font-size: 18px; border-radius: 5px; border: 1px solid #ccc;" type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div>
            <input type="submit" value="Reset Password" style="font-size: 18px; padding: 10px 20px; border-radius: 5px; border: none; background-color: #007bff; color: white; cursor: pointer;">
        </div>
    </form>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./javascript/Script.js"></script>
    <script src="./javascript/sessionmessage.js"></script>
    <script src="./javascript/changepassmessage.js"></script>
</body>

</html>