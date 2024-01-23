<style>
    .mainDiv {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }

    .cardStyle {
        width: 600px;
        padding: 20px;
        background-color: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .formTitle {
        text-align: center;
        margin-bottom: 20px;
    }

    .inputDiv {
        margin-bottom: 10px;
    }

    .inputLabel {
        display: block;
        margin-bottom: 5px;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .buttonWrapper {
        text-align: center;
    }

    .submitButton {
        background-color: #0078D4;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submitButton:hover {
        background-color: #005A9E;
    }
    @media screen and (max-width: 767px) {
        .cardStyle {
            width: 85%;
            margin-left: 8%;
        }
    
    }
</style>



<div class="modal fade" id="changePasswordModal<?php echo $row['student_id']; ?>" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
<div class="modal-dialog  mb-5 mt-0 mx-auto my-auto modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mainDiv">
                    <div class="cardStyle">
                        <form action="./Adminphpfiles/changepass_student.php" method="POST">
                        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                            <h2 class="formTitle">
                                CHANGE PASSWORD
                            </h2>
                            <div class="inputDiv" style="margin-top: 0;">
                                <label class="inputLabel" for="old_password">Old Password</label>
                                <input type="password" id="old_password" name="old_password" required>
                            </div>
                            <div class="inputDiv">
                                <label class="inputLabel" for="password">New Password</label>
                                <input type="password" id="password" name="password" required>
                            </div>

                            <div class="inputDiv">
                                <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                                <input type="password" id="confirmPassword" name="confirmPassword" required>
                            </div>

                            <div class="buttonWrapper">
                                <button type="submit" name="submitButton" id="submitButton" for="submitButton" class="submitButton pure-button pure-button-primary">
                                    <span>Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>