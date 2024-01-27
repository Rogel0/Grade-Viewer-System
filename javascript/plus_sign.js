function addEventListenerToAddSubjectButton(semester, button) {
  if (button.hasEventListener) {
    return;
  }
  button.addEventListener("click", function () {
    var numSubjects =
      document.querySelectorAll(`[name^='subject_name_${semester}[]']`).length +
      1;

    var allRows = document.querySelectorAll(
      `[name^='subject_name_${semester}[]']`
    );
    var lastRow = allRows[allRows.length - 1];
    var selectedSubject = "default";
    if (lastRow) {
      var selectedOption = lastRow.options[lastRow.selectedIndex];
      selectedSubject = selectedOption ? selectedOption.value : null;
    } else {
      allRows = document.querySelectorAll(`[name^='subject_name_first[]']`);
      lastRow = allRows[allRows.length - 1];
      if (lastRow) {
        var selectedOption = lastRow.options[lastRow.selectedIndex];
        selectedSubject = selectedOption ? selectedOption.value : null;
      }
    }

    var newRow = document.createElement("div");
    newRow.className = "row";

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
        var originalSelect = document.querySelector(`[name^='subject_name_${semester}[]']`);
        newInput = originalSelect.cloneNode(true);
        newInput.name = originalSelect.name;
        newInput.id = originalSelect.id;
        newInput.className = originalSelect.className; // Add this line
      
        if (selectedSubject) {
          newInput.value = selectedSubject;
        }
      } else {
        newInput = document.createElement("input");
        newInput.type = "number";
      
        if (column === "1st Quarter") {
          newInput.name = "first_quarter_grade[]";
          newInput.className = "form-control first_quarterInput";
        } else if (column === "2nd Quarter") {
          newInput.name = "second_quarter_grade[]";
          newInput.className = "form-control second_quarterInput";
        } else if (column === "3rd Quarter") {
          newInput.name = "third_quarter_grade[]";
          newInput.className = "form-control third_quarterInput";
        } else if (column === "4th Quarter") {
          newInput.name = "fourth_quarter_grade[]";
          newInput.className = "form-control fourth_quarterInput";
        }
      }

      newLabel.for = newInput.id;

      newCol.appendChild(newLabel);
      newCol.appendChild(newInput);
      newRow.appendChild(newCol);
    });

    var buttonParent = button.parentElement.parentElement;
    buttonParent.insertBefore(newRow, button.parentElement);
  });
  button.hasEventListener = true;
}

document.body.addEventListener("click", function (event) {
  if (event.target.classList.contains("addSubject")) {
    var button = event.target;
    var semester = button.id.includes("1st") ? "first" : "second";
    addEventListenerToAddSubjectButton(semester, button);
  }
});