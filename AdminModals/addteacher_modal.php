<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeacherModalLabel">Add Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./Adminphpfiles/add_teacher.php" method="POST">
                    <label for="teacher_number">Teacher Number:</label>
                    <input type="text" name="teacher_number" required><br>

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

                    <label for="contact_number">Contact Number:</label>
                    <input type="text" name="contact_number" required><br>

                    <label for="username">Username:</label>
                    <input type="text" name="username" required><br>

                    <label for="password">Password:</label>
                    <input type="password" name="password" required><br>

                    <!-- <label for="user_type">User Type:</label>
                    <input type="text" name="user_type" value="teacher" readonly><br> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="btnadd_teacher" value="Save Changes" class="btn btn-secondary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>