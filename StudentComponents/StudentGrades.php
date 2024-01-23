<?php
session_start();
include("./phpfiles/connection.php");

$userId = $_SESSION['logged_in_user_id'];

// Fetch first semester grades
$sql = "SELECT * FROM grades WHERE student_id = ? AND semester = 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$firstSemesterGrades = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Calculate final grade for first semester
$firstSemesterFinalGrade = 0;
foreach ($firstSemesterGrades as $grade) {
    $firstSemesterFinalGrade += ($grade['first_quarter_grade'] + $grade['second_quarter_grade']) / 2;
}
if (count($firstSemesterGrades) > 0) {
    $firstSemesterFinalGrade /= count($firstSemesterGrades);
}


// Fetch second semester grades
$sql = "SELECT * FROM grades WHERE student_id = ? AND semester = 2";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$secondSemesterGrades = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Calculate final grade for second semester
$secondSemesterFinalGrade = 0;
foreach ($secondSemesterGrades as $grade) {
    $secondSemesterFinalGrade += ($grade['third_quarter_grade'] + $grade['fourth_quarter_grade']) / 2;
}
if (count($secondSemesterGrades) > 0) {
    $secondSemesterFinalGrade /= count($secondSemesterGrades);
}

?>

<?php
// Fetch student's name
$sql = "SELECT firstname, lastname, student_course, year_level, school_year, student_section FROM student_info WHERE student_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);

$studentName = $student['firstname'] . ' ' . $student['lastname'];
$studentSection = $student['student_section'];
$studentCourse = $student['student_course'];
$studentYearLevel = $student['year_level'];
?>

<!-- First semester grades -->

<div class="w-11/12 text-base student-grid" style="margin-bottom: 120px; margin-top: 0; margin-left: 40px;">

    <div id="student-name" style="display: none;">
        <?php echo $studentName; ?>
    </div>
    <div class="relative overflow-hidden shadow-md rounded-lg">
        <button onclick="printGrades()" class="print-button" style="float:inline-end; margin-bottom: 1%; margin-right: 1%; background-color: gray; color: white; padding: 10px;" onmouseover="$(this).css('background-color', 'blue');" onmouseout="$(this).css('background-color', 'gray');">
            <i class="fa fa-print"></i> Print Grades
        </button>
        <h2 class="semester-text" style="color: gray; margin-left: 20px; margin-bottom: 0;" id="firstsemester-label">First Semester</h2>
        <table class="grade-table table-fixed w-full text-left" id="first-semester-grades-table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>First Quarter Grade</th>
                    <th>Second Quarter Grade</th>
                    <th>Average</th>
                </tr>
            </thead>
            <tbody class="mb-20px" style="background-color: #F2F1EB; color: black;">
                <?php foreach ($firstSemesterGrades as $grade) : ?>
                    <tr>
                        <td><?php echo $grade['subject_name']; ?></td>
                        <td><?php echo $grade['first_quarter_grade']; ?></td>
                        <td><?php echo $grade['second_quarter_grade']; ?></td>
                        <td style="font-weight: 600;">
                            <?php
                            $average = ($grade['first_quarter_grade'] + $grade['second_quarter_grade']) / 2;
                            echo $average;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr style="background-color: #FF6868; color: black;">
                    <td colspan="3" style="color:#F2F1EB; text-align: right;">General Average</td>
                    <td style="font-weight: 600;"><?php echo $firstSemesterFinalGrade; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Second semester grades -->

<div class="w-11/12 text-base student-grid" style="margin-left: 40px;">
    <div class="relative overflow-hidden shadow-md rounded-lg">
        <h2 class="semester-text" style="color: gray; margin-left: 20px; margin-bottom: 0;" id="secondsemester-label">Second Semester</h2>
        <table class="table-fixed w-full text-left" id="second-semester-grades-table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Third Quarter Grade</th>
                    <th>Fourth Quarter Grade</th>
                    <th>Average</th>
                </tr>
            </thead>
            <tbody class="" style="background-color: #F2F1EB; color: black;">
                <?php foreach ($secondSemesterGrades as $grade) : ?>
                    <tr>
                        <td><?php echo $grade['subject_name']; ?></td>
                        <td><?php echo $grade['third_quarter_grade']; ?></td>
                        <td><?php echo $grade['fourth_quarter_grade']; ?></td>
                        <td style="font-weight: 600;">
                            <?php
                            $average = ($grade['third_quarter_grade'] + $grade['fourth_quarter_grade']) / 2;
                            echo $average;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr style="background-color: #FF6868; color: black;">
                    <td colspan="3" style="color:#F2F1EB;  text-align: right;">General Average</td>
                    <td style="font-weight: 600;"><?php echo $secondSemesterFinalGrade; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    var studentName = "<?php echo $studentName; ?>";
    var studentSection = "<?php echo $studentSection; ?>";
    var studentCourse = "<?php echo $studentCourse; ?>";
    var studentYearLevel = "<?php echo $studentYearLevel; ?>";
</script>