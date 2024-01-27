const observer = new MutationObserver((mutationsList, observer) => {
    // Look through all mutations that just occured
    for(let mutation of mutationsList) {
        // If the addedNodes property has one or more nodes
        if(mutation.addedNodes.length) {
            

            const checkboxes = document.querySelectorAll(".gradingCheckbox");

            checkboxes.forEach((checkbox, index) => {
                // Load the saved state from localStorage and set the checkbox state
                const savedState = localStorage.getItem(checkbox.id);
               
                checkbox.checked = savedState === "true" ? true : false;

                // Disable or enable the corresponding input field
                const quarter = checkbox.id.replace("_checkbox", "");
                
                const inputFields = document.querySelectorAll("." + quarter + "Input");
             
                inputFields.forEach((inputField) => {
                    inputField.disabled = !checkbox.checked;
                });

                checkbox.addEventListener("change", (event) => {
                    // Save the state to localStorage whenever it changes
                    localStorage.setItem(event.target.id, event.target.checked);

                    // Also disable or enable the corresponding input field when the checkbox state changes
                    inputFields.forEach((inputField) => {
                        inputField.disabled = !event.target.checked;
                    });
                });
            });
        }
    }
});

// Start observing the document with the configured parameters
observer.observe(document, { childList: true, subtree: true });