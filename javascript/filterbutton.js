var addSubjectButtons = document.querySelectorAll(".addSubject");
addSubjectButtons.forEach(function(button) {
    button.addEventListener("click", function () {
        // Get the parent of the current semester
        var semesterParent = button.closest('.first-semester, .second-semester');

        // Clone the first row of the current semester
        var firstRow = semesterParent.querySelector('.row');
        var clonedRow = document.createElement('div');
        clonedRow.className = 'row';

        // Clone only the input fields and labels and append them to the clonedRow
        var inputContainers = firstRow.querySelectorAll('.col');
        inputContainers.forEach(function(container) {
            var clonedContainer = container.cloneNode(true);

            // Update the names and ids of the cloned inputs
            var input = clonedContainer.querySelector('input, select');
            if (input) {
                var nameParts = input.name.match(/(\D+)(\d+)/);
                var baseName = nameParts[1];
                var num = parseInt(nameParts[2]);
                input.name = baseName + (num + 1);
                input.id = baseName + (num + 1);
            }

            clonedRow.appendChild(clonedContainer);
        });

        // Append the cloned row before the "+" button
        var buttonParent = button.parentElement;
        buttonParent.parentElement.insertBefore(clonedRow, buttonParent);
    });

    // Open the modal...
$('#yourModalId').modal('show');

// Then show the rows
$('#firstSemesterGrades tr').show();
});

// Call the function when the modal is shown