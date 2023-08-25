// Variable to store the timeout ID
let debounceTimeout;

// Attach event listener to the live-fetch inputs and textareas
var liveFetchElements = document.querySelectorAll(".live-fetch");
liveFetchElements.forEach(function (element) {
  // Attach event handler to each element
  element.addEventListener("input", function () {
    var inputValue = this.value;
    var columnName = this.getAttribute("data-column");
    var tableName = this.getAttribute("data-table");
    var dropdownContainer = this.nextElementSibling;

    // Clear the dropdown container
    dropdownContainer.innerHTML = "";

    // Clear the previous timeout (if any) to prevent the previous request from being sent
    clearTimeout(debounceTimeout);

    // Set a new timeout to send the request after 1 second of the user's last input
    debounceTimeout = setTimeout(function () {
      // Fetch dropdown menu content from the server based on the input value and column name
      fetch(
        "../fetch_dropdown_content.php?input=" +
          encodeURIComponent(inputValue) +
          "&column=" +
          encodeURIComponent(columnName) +
          "&table=" +
          encodeURIComponent(tableName)
      )
        .then((response) => response.json())
        .then((data) => {
          // Build the dropdown menu rows
          var dropdownRows = "";
          data.forEach((option) => {
            dropdownRows += '<div class="dropdown-row">' + option + "</div>";
          });

          // Append the dropdown rows to the container
          dropdownContainer.innerHTML = dropdownRows;

          // Show the dropdown container
          dropdownContainer.style.display = "block";
        })
        .catch((error) => {
          console.error(
            "Failed to fetch dropdown content from the server.",
            error
          );
        });
    }, 100); // Debounce time
  });
});

// Attach click event handler to the document
document.addEventListener("click", function (event) {
  var dropdownRow = event.target;

  // Check if the clicked element is a dropdown row
  if (dropdownRow.classList.contains("dropdown-row")) {
    var inputOrTextarea = dropdownRow.parentNode.previousElementSibling;

    // Fill the input or textarea with the selected row's value
    inputOrTextarea.value = dropdownRow.textContent;

    // Hide the dropdown container
    dropdownRow.parentNode.style.display = "none";
  }
});

// Hide the dropdown container when clicking outside of it
document.addEventListener("click", function () {
  document.querySelectorAll(".dropdown-container").forEach((e) => {
    e.style.display = "none";
  });
});
