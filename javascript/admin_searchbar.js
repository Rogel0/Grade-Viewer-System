$(document).ready(function(){
    $(".searchbar").on("keyup change", function() {
        var searchValue = $(this).val().toLowerCase();

        $(".table tbody tr").each(function() {
            var rowText = $(this).children('td').not(':last').text().toLowerCase(); // Exclude the last column with the buttons
            var isMatch = rowText.indexOf(searchValue) > -1;
            $(this).toggle(isMatch);
        });
    });
});