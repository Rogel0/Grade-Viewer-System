<div class="modal fade" id="editInfoModal<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="editInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfoModalLabel">Edit Student Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./Adminphpfiles/update_student.php" method="POST">
                    <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">

                    <label for="student_no">Student No:</label>
                    <input type="text" id="student_no" name="student_no" value="<?php echo $row['student_no']; ?>">

                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>">

                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>">

                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name" value="<?php echo $row['middle_name']; ?>">

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="Male" <?php echo $row['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $row['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                    </select>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>">

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>">

                    <!-- Add more input fields for the rest of the student information... -->

                    <button type="submit" name="submitButton">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>