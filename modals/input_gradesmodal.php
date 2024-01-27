<?php

include('./phpfiles/connection.php');

// if (isset($_SESSION['success'])) {
//     echo "<div class='alert alert-success'>";
//     echo $_SESSION['success'];
//     echo "</div>";
//     // unset the session variable so it doesn't keep showing up
//     unset($_SESSION['success']);
// }

$student_id = $row['student_id'];
$query = "SELECT firstname, lastname, student_section,LRN, year_level FROM student_info WHERE student_id = $student_id";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);
?>
<!-- Edit Grades Modal -->
<div class="modal fade editGradesModal" id="editGradesModal<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="editGradesModalLabel<?php echo $row['student_no']; ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGradesModalLabel<?php echo $row['student_id']; ?>">Edit Grades</h5>
                <!-- <div style="display: flex; justify-content: center; margin-left: 10%; gap: 20px; margin-bottom: 0; margin-top: 2%;">
                    <div class="col">
                        <label for="first_quarter_checkbox">Enable 1st Quarter</label>
                        <input type="checkbox" id="first_quarter_checkbox" class="gradingCheckbox">
                    </div>
                    <div class="col">
                        <label for="second_quarter_checkbox">Enable 2nd Quarter</label>
                        <input type="checkbox" id="second_quarter_checkbox" class="gradingCheckbox">
                    </div>
                </div> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>


            <div class="modal-body">
            <div style="display: flex; justify-content: space-between;">
                <div style="margin-left: 8%; margin-top: 4%;">
                    <p style="margin: 0; "><strong>Name:</strong> <?php echo $student['firstname'] . ' ' . $student['lastname']; ?></p>
                    <br>
                    <p style="margin: 0;"><strong>Section:</strong> <?php echo $student['student_section']; ?></p>
                </div>

                <div style="margin-right: 8%; margin-top: 4%;">
                    <p style="margin: 0; "><strong>LRN:</strong> <?php echo $student['LRN']; ?></p>
                    <br>
                    <p style="margin: 0;"><strong>Year Level:</strong> <?php echo $student['year_level']; ?></p>
                </div>
               
            </div>
                <br>
                <br>
                <form action="./phpfiles/grades_update.php" method="POST" id="yourFormId" class="gradesForm">
                    <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">

                    <!-- Subjects and grades -->
                    <div class="first-semester">
                        <div class="row">
                            <h3>First Semester</h3>
                            <div class="col">
                                <label for="subject_name_first">Subject</label>
                                <select name="subject_name_first[]" id="subject_name_first" class="form-control" onchange="updateSubjectArray(this)">
                                    <option value=""></option>
                                    <option value="General Mathematics">General Mathematics</option>
                                    <option value="Oral Communication">Oral Communication</option>
                                    <option value="21st Century Literature From the Philippines and the World">21st Century Literature From the Philippines and the World</option>
                                    <option value="Earth and life Sciences">Earth and life Sciences</option>
                                    <option value="English for Academic and Professional Purposes">English for Academic and Professional Purposes</option>
                                    <option value="Practical Research 1">Practical Research 1</option>
                                    <option value="Computer Software Serving NC II">Computer Software Serving NC II</option>
                                    <option value="Physical Education 1">Physical Education 1</option>
                                    <option value="Household 1">Household 1</option>
                                    <option value="Housekeeping 1">Housekeeping 1</option>
                                    <option value="EIM NC II">EIM NC II</option>
                                    <option value="Driving Mechanic NC II"></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="first_quarter_grade">1st Quarter</label>
                                <input type="number" name="first_quarter_grade[]" id="first_quarter_grade" class="first_quarterInput form-control" pattern="^[0-9]+([.,][0-9]+)?$" title="Please enter only numbers and decimal points." oninput="validateMinMax(this, 60, 100)">
                            </div>
                            <div class="col">
                                <label for="second_quarter_grade">2nd Quarter</label>
                                <input type="number" name="second_quarter_grade[]" id="second_quarter_grade" class="second_quarterInput form-control" pattern="^[0-9]+([.,][0-9]+)?$" title="Please enter only numbers and decimal points." oninput="validateMinMax(this, 60, 100)">
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary addSubject" id="addSubject1st">+</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="second-semester">
                        <div class="row">
                            <h3>Second Semester</h3>
                            <div class="col">
                                <label for="subject_name_second">Subject</label>
                                <select name="subject_name_second[]" id="subject_id_second" class="form-control">
                                    <option value=""></option>
                                    <option value="Science">Science</option>
                                    <option value="Understanding The Self">Understanding The Self</option>
                                    <option value="choice3">Choice 3</option>
                                    <option value="choice4">Choice 4</option>
                                    <option value="choice5">Choice 5</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="third_quarter_grade">3rd Quarter</label>
                                <input type="text" name="third_quarter_grade[]" id="third_quarter_grade" class="third_quarterInput form-control" pattern="^[0-9]+([.,][0-9]+)?$" title="Please enter only numbers and decimal points." oninput="validateMinMax(this, 60, 100)">
                            </div>
                            <div class="col">
                                <label for="fourth_quarter_grade">4th Quarter</label>
                                <input type="text" name="fourth_quarter_grade[]" id="fourth_quarter_grade" class="fourth_quarterInput form-control" pattern="^[0-9]+([.,][0-9]+)?$" title="Please enter only numbers and decimal points." oninput="validateMinMax(this, 60, 100)">
                            </div>
                        </div>

                        <!-- Add more subjects -->
                        <div class="row mt-3">
                            <div class="col">
                                <button type="button" class="btn btn-primary addSubject" id="addSubject2nd">+</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btnAdd" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>