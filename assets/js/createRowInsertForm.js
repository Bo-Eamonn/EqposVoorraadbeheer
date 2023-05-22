function insertRow() {
    var dataRow = document.getElementById("data-row");
    var cloneRow = dataRow.cloneNode(true);

    // Clear input values in the cloned row
    var inputs = cloneRow.querySelectorAll("input[type=text], select, textarea");
    inputs.forEach(function (input) {
        input.value = "";
    });

    // Update the index of the cloned row's input field names
    var newIndex = dataRow.parentElement.querySelectorAll("#data-row + tr").length;
    var cloneInputs = cloneRow.querySelectorAll("input, select, textarea");
    cloneInputs.forEach(function (input) {
        var name = input.getAttribute("name");
        if (name) {
            input.setAttribute("name", name.replace("data_row[0]", "data_row[" + newIndex + "]"));
        }
    });

    dataRow.parentElement.insertBefore(cloneRow, dataRow.nextElementSibling);
}


    function validateForm() {
        var dataRows = document.querySelectorAll("#data-row + tr");

        // Check each row and remove empty rows
        for (var i = 0; i < dataRows.length; i++) {
            var inputs = dataRows[i].querySelectorAll("input[type=text], select, textarea");
            var isEmpty = true;

            // Check if any field in the row is filled
            for (var j = 0; j < inputs.length; j++) {
                if (inputs[j].value.trim() !== "") {
                    isEmpty = false;
                    break;
                }
            }

            // Remove empty row
            if (isEmpty) {
                dataRows[i].parentNode.removeChild(dataRows[i]);
            }
        }

        // Submit the form
        return true;
    }