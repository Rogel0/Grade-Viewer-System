function addEventListenerToAddSubjectButton(semester, button) {
  // Check if the event listener has already been added
  if (button.hasEventListener) {
    return;
  }
  button.addEventListener("click", function () {
    // Get the number of current subjects
    var numSubjects =
      document.querySelectorAll(`[name^='subject_name_${semester}[]']`).length +
      1;

    // Get the selected subject from the last row
    var allRows = document.querySelectorAll(
      `[name^='subject_name_${semester}[]']`
    );
    var lastRow = allRows[allRows.length - 1];
    var selectedSubject = "default"; // Add a default value here
    if (lastRow) {
      // Get the selected option element
      var selectedOption = lastRow.options[lastRow.selectedIndex];
      // Get the subject_id from the value attribute of the selected option element
      selectedSubject = selectedOption ? selectedOption.value : null;
    } else {
      // If there are no subjects for the second semester, get the selected subject from the last row of the subjects for the first semester
      allRows = document.querySelectorAll(`[name^='subject_name_first[]']`);
      lastRow = allRows[allRows.length - 1];
      if (lastRow) {
        // Get the selected option element
        var selectedOption = lastRow.options[lastRow.selectedIndex];
        // Get the subject_id from the value attribute of the selected option element
        selectedSubject = selectedOption ? selectedOption.value : null;
      }
    }

    // Create new row
    var newRow = document.createElement("div");
    newRow.className = "row";

    // Create new columns
    var columns = ["Subject"];
    if (semester === "first") {
      columns.push("1st Quarter", "2nd Quarter");
    } else if (semester === "second") {
      columns.push("3rd Quarter", "4th Quarter");
    }

    columns.forEach(function (column) {
      var newCol = document.createElement("div");
      newCol.className = "col";

      var newLabel = document.createElement("label");
      newLabel.textContent = column;

      var newInput;
      if (column === "Subject") {
        // Get the original select element
        var originalSelect = document.querySelector(
          `[name^='subject_name_${semester}[]']`
        );

        // Clone the original select element
        newInput = originalSelect.cloneNode(true);

        // Copy the name and id from the original select element
        newInput.name = originalSelect.name;
        newInput.id = originalSelect.id;

        // Set the selected subject in the new select dropdown
        if (selectedSubject) {
          newInput.value = selectedSubject;
        }
      } else {
        newInput = document.createElement("input");
        newInput.type = "number";
        // Set the name attribute based on the column
        if (column === "1st Quarter") {
          newInput.name = "first_quarter_grade[]";
        } else if (column === "2nd Quarter") {
          newInput.name = "second_quarter_grade[]";
        } else if (column === "3rd Quarter") {
          newInput.name = "third_quarter_grade[]";
        } else if (column === "4th Quarter") {
          newInput.name = "fourth_quarter_grade[]";
        }
      }
      newInput.id =
        column.toLowerCase().replace(" ", "_") + "_" + semester + numSubjects;
      newInput.className = "form-control";

      newLabel.for = newInput.id;

      newCol.appendChild(newLabel);
      newCol.appendChild(newInput); // Append the new input to the new column
      newRow.appendChild(newCol);
    });

    // Append the new row before the "+" button
    var buttonParent = button.parentElement.parentElement;
    buttonParent.insertBefore(newRow, button.parentElement);
  });
  button.hasEventListener = true;
}

document.body.addEventListener('click', function(event) {
  // Check if the event originated from an addSubject button
  if (event.target.classList.contains('addSubject')) {
    var button = event.target;
    var semester = button.id.includes('1st') ? 'first' : 'second';
    addEventListenerToAddSubjectButton(semester, button);
  }
});