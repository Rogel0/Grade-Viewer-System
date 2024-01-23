<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./phpfiles/add_student.php" method="POST">
                    <label for="student_no">Student No:</label>
                    <input type="text" name="student_no" required><br>

                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" required><br>

                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" required><br>

                    <label for="middle_name">Middle Name:</label>
                    <input type="text" name="middle_name"><br>

                    <label for="gender">Gender:</label>
                    <select name="gender" style="width: 95%; padding: 10px; margin: 5px 0;">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><br>

                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" name="date_of_birth" style="width: 95%; padding: 10px; margin: 5px 0;" required><br>

                    <label for="address">Address:</label>
                    <input type="text" name="address" required><br>

                    <label for="contact_number">Contact Number:</label>
                    <input type="text" name="contact_number" required><br>

                    <label for="parent_name">Parent/Guardian:</label>
                    <input type="text" name="parent_name" required><br>

                    <label for="permanent_address">Permanent Address:</label>
                    <input type="text" name="permanent_address" required><br>

                    <label for="student_course">Student Course:</label>
                    <select name="student_course" style="width: 95%; padding: 10px; margin: 5px 0;">
                        <option value="#"></option>
                        <option value="Home Economics">Home Economics</option>
                        <option value="Industrial Arts">Industrial Arts</option>
                        <option value="Information & Communication Technology">Information & Communication Technology</option>
                    </select><br>

                    <label for="year_level">Year Level:</label>
                    <select name="year_level" style="width: 95%; padding: 10px; margin: 5px 0;">
                        <option value="#"></option>
                        <option value="SHS 11">SHS 11</option>
                        <option value="SHS 12">SHS 12</option>
                    </select><br>


                    <label for="school_year">School Year:</label>
                    <select name="school_year" style="width: 95%; padding: 10px; margin: 5px 0;">
                        <option value="#"></option>
                        <option value="2022-2023">2022-2023</option>
                        <option value="2023-2024">2024-2025</option>
                    </select><br>

                    <label for="student_section">Section:</label>
                    <select name="student_section" style="width: 95%; padding: 10px; margin: 5px 0;">
                        <option value="#"></option>
                        <option value="Section 1">Section 1</option>
                        <option value="Section 2">Section 2</option>
                        <option value="Section 3">Section 3</option>
                        <option value="Section 4">Section 4</option>
                        <option value="Section 5">Section 5</option>
                    </select><br>

                    <label for="username">Username:</label>
                    <input type="text" name="username" required><br>

                    <label for="password">Password:</label>
                    <input type="password" name="password" required><br>

                    <!-- <input type="submit" name="btnadd_student" value="Add Student"> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-primary" name="btnadd_student" value="Add Student">Save changes</button> -->
                        <input type="submit" name="btnadd_student" value="Save Changes" class="btn btn-secondary">
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>