<?php
include('./phpfiles/connection.php');

$query = "SELECT student_no, LRN,student_id, CONCAT(firstname, ' ', lastname) AS student_name, student_course, year_level, student_section, school_year, gender, date_of_birth, address, contact_number, parent_name, permanent_address FROM student_info";
$result = mysqli_query($conn, $query);

if ($result) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

if (isset($_SESSION['success'])) {
    echo "<div id='success-message' class='alert alert-success'>";
    echo $_SESSION['success'];
    echo "</div>";
    // unset the session variable so it doesn't keep showing up
    unset($_SESSION['success']);
}


// Rest of your code...
?>



<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <!-- <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/teacher.css">
    <link rel="stylesheet" href="./css/StudentGrades.css">
    <link rel="stylesheet" href="./css/view_grades.css"> -->
    <!--  -->
    <link rel="shortcut icon" href="./images/Lyceum.png" type="image/x-icon">
</head>

<!-- <body> -->
<!-- <header>
    <div class="header-content" style="display: flex; justify-content: space-between; align-items: center;">
        <h1>ADMIN DASHBOARD</h1>
        <a href="./phpfiles/logout.php" style="margin-left: auto; margin-right: 10px; color: white;">Logout</a>
    </div>
</header> -->
    
    <?php include('./modals/filterbuttons.php') ?>
    <?php include('./modals/addstudent_modal.php') ?>

    <!-- Start of the table -->
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">LRN</th>
                <th scope="col">Student Name</th>
                <th scope="col">Course</th>
                <th scope="col">Year</th>
                <th scope="col">Section</th>
                <th scope="col">School Year</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?php echo $row['LRN']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['student_course']; ?></td>
                    <td><?php echo $row['year_level']; ?></td>
                    <td><?php echo $row['student_section']; ?></td>
                    <td><?php echo $row['school_year']; ?></td>
                    <td>
                        
                        <!-- <button class="btn btn-success">View</button> -->
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editGradesModal<?php echo $row['student_id']; ?>">Input Grades</button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gradesModal<?php echo $row['student_id']; ?>">View Grades</button>
                        <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editInfoModal<?php echo $row['student_id']; ?>">Edit Info</button> -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['student_id']; ?>">View Profile</button>
                        <form action='./phpfiles/delete_student.php' method='POST' style='display: inline;'>
                            <input type='hidden' name='student_id' value='<?php echo $row['student_id']; ?>'>
                            <input type='submit' class="btn btn-danger" value='Delete'>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- End of the table -->

    <!-- Start of the modals -->
    <?php foreach ($rows as $row) : ?>
    <?php include('./modals/viewprofile_modal.php'); ?>
    <?php include('./modals/editInfo_modals.php'); ?>
    <?php include('./modals/view_gradesmodal.php'); ?>
    <?php include('./modals/input_gradesmodal.php'); ?>
<?php endforeach; ?>
<!-- End of the modals -->


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<!-- <script src="./javascript/filterbutton.js"></script> -->
<!-- <script src="./javascript/bar_search.js"></script> -->
<!-- <script src="./javascript/bar_search.js"></script> -->
<!-- <script src="./javascript/trial.js"></script> -->
<!-- <script src="./javascript/clonedfields.js"></script> -->
<!-- <script src="./javascript/plus_sign.js"></script>
<script src="./javascript/succesfullmessagetime.js"></script> -->
<script src="./javascript/sessionmessage.js"></script>
<script src="./javascript/changepassmessage.js"></script>
    
</body>

</html>