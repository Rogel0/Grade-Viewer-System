<div class="modal fade" id="teacher_viewModal<?php echo $row['teacher_number']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-sm">
        <div class="modal-content ">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="viewModalLabel<?php echo $row['teacher_number']; ?>">Teacher Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3 d-flex">
                    <label class="fw-bold">Teacher No:</label>
                    <span><?php echo $row['teacher_number']; ?></span>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold">Teacher Name:</label>
                    <span><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></span>
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
                    <label class="fw-bold">Contact Number:</label>
                    <span><?php echo $row['contact_number']; ?></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>