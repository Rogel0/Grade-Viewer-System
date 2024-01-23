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
    <!-- <link rel="stylesheet" href="./css/teacher.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style2.css">
    <!-- <link rel="stylesheet" href="./css/SGrades.css"> -->
    <!-- <link rel="stylesheet" href="./css/view_grades.css"> -->
   
    <link rel="shortcut icon" href="./images/Lyceum.png" type="image/x-icon">
    <title>Login - Lyceum Alabang</title>
</head>

<body class="index-body" style="background-color: #F0ECE5;">
    <?php include("./StudentComponents/StudentHeader.php") ?>
    <!-- Login form -->

    <div class="container py-2 h-40 ">
        <div class="row justify-content-center align-items-center h-60">
            <div class="col-lg-5 ">
                <div class="card rounded-8 mx-lg-3 text-black align-items-center bg-gray-200 bg-light-blue">
                    <!-- <div class="row g-1"> -->
                    <div class="col-md-9">
                        <div class="card-body p-md-2 mx-md-1 ">

                            <div class="text-center mt-4">
                                <img src="./images/Lyceum.png" style="width: 100px;" alt="logo">
                                <h4 class="mt-1 mb-1 pb-1">Lyceum Of Alabang</h4>
                                <h5 class="mt-1 mb-5 pb-1">Senior High School</h4>
                            </div>

                            <form action="./phpfiles/login.php" method="POST">
                                <p class="header-text">Please login to your account</p>

                                <div class="form-outline mb-4">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Student number or Username" required />
                                    <label class="form-label" for="username">Username</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password" class="form-control" required />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div class="text-center d-md-flex flex- pt-1 mb-5 pb-1 align-items-center justify-content-center">
                                    <button class="btn btn-inline-primary text-white  mb-1 py-2 px-5 mx-3 gradient-custom-2" type="submit" name="submit" value="Login">Login</button>
                                </div>
                                <div class="text-center">
                                    <a class="text-muted align-items-right mb-5" href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot password?</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include("./modals/forgot_password_modal.php") ?>


    <!-- This is modal Create New Button -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="loginLabel">NOTE!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-warning">
                    <h2 class="lead text-dark">When you click this "Start Now" mapupunta sa Login Modals</h2>
                    <p class="lead text-dark">"Click save changes go to tasks management"</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a class="nav-link m-0 p-0 text-dark" href="taskmanagement.php">Save changes</a></button>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!-- <footer style="background-color: rgb(225, 227, 228); padding: 20px; text-align: center; position: fixed; bottom: 0; width: 100%;">
        <p class="mt-2 mb-0">&copy; 2024 Lyceum of Alabang</p>
    </footer> -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./javascript/Script.js"></script>
    <script src="./javascript/sessionmessage.js"></script>
    <script src="./javascript/changepassmessage.js"></script>
</body>

</html>