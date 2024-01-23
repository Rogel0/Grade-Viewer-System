


<!-- The modal -->
<div class="modal fade" id="gradesModal<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="gradesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel<?php echo $row['student_id']; ?>">Student Grades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <button onclick="printGrades()" class="print-button" style="float:inline-end; margin-bottom: 1%; margin-right: 1%;">
        <i class="fa fa-print"></i> Print Grades
</button>
            <div class="modal-body">
                <h5><strong>First Semester</strong></h5>
                <table class="tables">
                    <thead class="theads">
                        <tr class="trs">
                            <th class="ths">Subject</th>
                            <th class="ths">1st Grading</th>
                            <th class="ths">2nd Grading</th>
                            <th class="ths">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbodys" id="firstSemesterGrades">
                        <!-- Grades will be inserted here -->
                        <?php
                     
                        // Fetch the grades for the first semester
                        $query = "SELECT id, subject_name, first_quarter_grade, second_quarter_grade FROM grades WHERE student_id = ? AND semester = 1";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $row['student_id']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        

                        // Loop through the grades and display them
                        while ($grade = $result->fetch_assoc()) {
                            echo '<tr class="trs" style="display: table-row">';
                            echo '<td class="tds">' . $grade['subject_name'] . '</td>';
                            echo '<td class="tds">' . $grade['first_quarter_grade'] . '</td>';
                            echo '<td class="tds">' . $grade['second_quarter_grade'] . '</td>';
                            echo '<td class="tds">';  // Start a new table cell
                            echo '<form action="./phpfiles/delete_grade.php" method="POST">';
                            echo '<input type="hidden" name="id" value="' . $grade['id'] . '">';
                            echo '<button type="submit"><box-icon type="solid" name="trash" size="20px"></box-icon></button>';
                            echo '</form>';
                            echo '</td>';  // End the table cell
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>

                <h5><strong>Second Semester</strong></h5>
                <table class="tables">
                    <thead class="theads">
                        <tr class="trs">
                            <th class="ths">Subject</th>
                            <th class="ths">3rd Grading</th>
                            <th class="ths">4th Grading</th>
                            <th class="ths">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbodys" id="secondSemesterGrades">
                        <!-- Grades will be inserted here -->
                        <?php
                        // Fetch the grades for the second semester
                        $query = "SELECT id, subject_name, third_quarter_grade, fourth_quarter_grade FROM grades WHERE student_id = ? AND semester = 2";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $row['student_id']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Loop through the grades and display them
                        while ($grade = $result->fetch_assoc()) {
                            echo '<tr class="trs">';
                            echo '<td class="tds">' . $grade['subject_name'] . '</td>';
                            echo '<td class="tds">' . $grade['third_quarter_grade'] . '</td>';
                            echo '<td class="tds">' . $grade['fourth_quarter_grade'] . '</td>';
                            echo '<td class="tds">';  // Start a new table cell
                            echo '<form action="./phpfiles/delete_grade.php" method="POST">';
                            echo '<input type="hidden" name="id" value="' . $grade['id'] . '">';
                            echo '<button type="submit"><box-icon type="solid" name="trash" size="20px"></box-icon></button>';
                            echo '</form>';
                            echo '</td>';  // End the table cell
                            echo '</tr>';
                        }
                        ?>
                        <!-- <td><img src="./images/trash-solid-24.png" alt="Delete"></td> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var studentName = document.getElementById('student-name').innerHTML;
</script>