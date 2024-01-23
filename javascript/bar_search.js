$(document).ready(function(){
    $(".searchbar, .input-field").on("keyup change", function() {
        console.log("searching");
        var searchValue = $(".searchbar").val().toLowerCase();
        var studentCourse = $("select[name='student_course']").val().toLowerCase();
        var yearLevel = $("select[name='year_level']").val().toLowerCase();
        var studentSection = $("select[name='student_section']").val().toLowerCase();
        var schoolYear = $("select[name='school_year']").val().toLowerCase();

        $(".table tbody tr").filter(function() {
            var row = $(this).text().toLowerCase();
            $(this).toggle(row.indexOf(searchValue) > -1 && row.indexOf(studentCourse) > -1 && row.indexOf(yearLevel) > -1 && row.indexOf(studentSection) > -1 && row.indexOf(schoolYear) > -1)
        });

        // Show all grades when the input changes
        $('#firstSemesterGrades tr').show();
        $('#secondSemesterGrades tr').show();
    });

    $('#yourModalId').on('shown.bs.modal', function () {
        $('#firstSemesterGrades tr').show();
        $('#secondSemesterGrades tr').show();x``
    });
});