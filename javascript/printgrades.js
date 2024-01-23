function printGrades() {
  var firstSemesterTable = document.getElementById(
    "first-semester-grades-table"
  ).outerHTML;
  var secondSemesterTable = document.getElementById(
    "second-semester-grades-table"
  ).outerHTML;
  var firstSemesterLabel = document.getElementById(
    "firstsemester-label"
  ).outerHTML;
  var secondSemesterLabel = document.getElementById(
    "secondsemester-label"
  ).outerHTML;
  var studentName = window.studentName;
  var studentSection = window.studentSection;
  var studentCourse = window.studentCourse;
  var studentYearLevel = window.studentYearLevel;

  var styles = Array.from(document.styleSheets)
    .map((styleSheet) => {
      try {
        return Array.from(styleSheet.cssRules)
          .map((rule) => rule.cssText)
          .join("");
      } catch (e) {
        console.log(e);
        return "";
      }
    })
    .join("");

  var printWindow = window.open("", "", "width=1200,height=600");

  printWindow.document.write(`
        <html>
            <head>
            <title>Print Grades</title>
                <style>
                    ${styles}
                    .student-info {
                        display: flex;
                        justify-content: space-between;
                        font-size: 14px;
                        font-weight: bold;
                        margin-left: 50px;
                        margin-right: 50px;
                        margin-bottom: 0;
                        margin-top: 0;
                    }
                    .right {
                        margin-right: 110px;
                    }
                    .tables {
                        -webkit-print-color-adjust: exact;
                        color-adjust: exact;
                    }
                   
                </style>
            </head>
            <body>
                </br>
                </br>
                </br>
                </br>
                <div class="student-info">
                    <div classname="label">Name: &nbsp; ${studentName}</div>
                    <div classname="label">Strand: &nbsp; ${studentCourse}</div>
                </div>
                <div class="student-info">
                    <div>Section: &nbsp; ${studentSection}</div>
                    <div class="right">Year Level: &nbsp; ${studentYearLevel}</div>
                </div>
                </br>
                </br>
                </br>
                </br>
                ${firstSemesterLabel}
                ${firstSemesterTable}
                </br>
                </br>
                ${secondSemesterLabel}
                ${secondSemesterTable}
            </body>
        </html>
    `);

  // Call the print function
  printWindow.document.close();
  printWindow.print();
}
