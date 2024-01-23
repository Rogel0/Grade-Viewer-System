<div class="container-table">
    <div class="btnAddStudent-container">
        <a href="" class="btnAddStudent" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</a>

        <div style="visibility: hidden;">
            <label class="input-label" for="student_course">Student Course:</label>
            <select class="input-field" name="student_course">
                <option selected></option>
                <option value="Home Economics">Home Economics</option>
                <option value="Industrial Arts">Industrial Arts</option>
                <option value="Information & Communication Tech">Information & Communication Tech</option>
            </select>
        </div>

        <div style="visibility: hidden;">
        <label class="input-label" for="year_level">Year Level:</label>
        <select class="input-field" name="year_level">
            <option selected></option>
            <option value="SHS 11">SHS 11</option>
            <option value="SHS 12">SHS 12</option>
        </select>
        </div>

        <div style="visibility: hidden;">
        <label class="input-label" for="student_section">Section:</label>
        <select class="input-field" name="student_section">
            <option selected></option>
            <option value="Section 1">Section 1</option>
            <option value="Section 2">Section 2</option>
            <option value="Section 3">Section 3</option>
            <option value="Section 4">Section 4</option>
            <option value="Section 5">Section 5</option>
        </select>
        </div>

        <div style="visibility: hidden;">
        <label class="input-label" for="school_year">School Year:</label>
        <select class="input-field" name="school_year">
            <option selected></option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2024-2025</option>
        </select>
        </div>

        <!-- <form action="" method="POST">
                <input class="searchbar" type="text" name="search" placeholder="Search">
                
            </form> -->
        <!-- <input type="submit" name="submit_search" value="Search"> -->

        <form action="" method="POST" class="d-flex">
            <input class="form-control me-2 searchbar" type="search" placeholder="Search" aria-label="Search" name="search">
        </form>
    </div>