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
</style>

<div class="mainDiv">
    <div class="cardStyle">
        <form action="./phpfiles/changepass_teacher.php" method="POST">
            <h2 class="formTitle">
                CHANGE PASSWORD
            </h2>
            <div class="inputDiv">
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