<div class="modal fade" id="viewModal<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="viewModalLabel<?php echo $row['student_id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-sm">
        <div class="modal-content ">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="viewModalLabel<?php echo $row['student_id']; ?>">Student Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3 d-flex">
                    <label class="fw-bold">Student No:</label>
                    <span><?php echo $row['student_id']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Student Name:</label>
                    <span><?php echo $row['student_name']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Student Course:</label>
                    <span><?php echo $row['student_course']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Year Level:</label>
                    <span><?php echo $row['year_level']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Section:</label>
                    <span><?php echo $row['student_section']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">School Year:</label>
                    <span><?php echo $row['school_year']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Gender:</label>
                    <span><?php echo $row['gender']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Birthdate:</label>
                    <span><?php echo $row['date_of_birth']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Address:</label>
                    <span><?php echo $row['address']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Contact Number:</label>
                    <span><?php echo $row['contact_number']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Parent Name:</label>
                    <span><?php echo $row['parent_name']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Permanent Address:</label>
                    <span><?php echo $row['permanent_address']; ?></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>