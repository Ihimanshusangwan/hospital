// Variable to store the timeout ID
let debounceTimeout2;

// Attach event listener to the live-fetch inputs and textareas
var liveFetchElements2 = () => {
  document.querySelectorAll(".live-fetch-2").forEach(function (element) {
    // Attach event handler to each element
    element.addEventListener("input", function () {
      var inputValue = this.value;
      var dropdownContainer = this.nextElementSibling;

      // Clear the dropdown container
      dropdownContainer.innerHTML = "";

      // Clear the previous timeout (if any) to prevent the previous request from being sent
      clearTimeout(debounceTimeout);

      // Set a new timeout to send the request after 1 second of the user's last input
      debounceTimeout = setTimeout(function () {
        // Fetch dropdown menu content from the server based on the input value and column name
        fetch(
          "fetch_medicine_content.php?input=" + encodeURIComponent(inputValue)
        )
          .then((response) => response.json())
          .then((data) => {
            // Build the dropdown menu rows
            var dropdownRows = "";
            data.forEach((option) => {
              // Display the 'columnToShow' value in the dropdown
              dropdownRows += `<div class="dropdown-row" data-stored="${encodeURIComponent(
                JSON.stringify(option.otherColumn)
              )}" >${option.columnToShow}</div>`;
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
};
liveFetchElements2();

// Attach click event handler to the document
document.addEventListener("click", function (event) {
  var dropdownRow = event.target;

  // Check if the clicked element is a dropdown row
  if (dropdownRow.classList.contains("dropdown-row")) {
    var hell = dropdownRow.getAttribute("data-stored");
    var data = JSON.parse(decodeURIComponent(hell));
    console.log(data);

    var inputOrTextarea = dropdownRow.parentNode.previousElementSibling;
    var row = inputOrTextarea.closest("tr");
    if (data.type == "Syrup") {
      row.children[0].children[0].value = data.type;
      var selectElement1 = row.children[2].children[0];
      var selectElement2 = row.children[3].children[0];
      var selectElement3 = row.children[4].children[0];
      selectElement1.innerHTML = "<option value='0' >0</option>";
      selectElement2.innerHTML = "<option value='0' >0</option>";
      selectElement3.innerHTML = "<option value='0' >0</option>";

      const values = [0, 5, 10, 15, 20, 25, 30];

      for (const ml of values) {
        let option = document.createElement("option");
        option.value = `${ml} ml`;
        option.textContent = `${ml} ml`;
        selectElement1.appendChild(option);
      }

      for (const ml of values) {
        let option = document.createElement("option");
        option.value = `${ml} ml`;
        option.textContent = `${ml} ml`;
        selectElement2.appendChild(option);
      }

      for (const ml of values) {
        let option = document.createElement("option");
        option.value = `${ml} ml`;
        option.textContent = `${ml} ml`;
        selectElement3.appendChild(option);
      }

      selectElement1.value = data.morning;
      selectElement2.value = data.afternoon;
      selectElement3.value = data.night;
      var str = row.children[6].children[0].getAttribute("name");
      var num = str[str.length - 1];
      row.children[5].innerHTML = `<select name="eat_${num}"><option value="जेवणा नंतर">जेवणा नंतर</option><option value="जेवणा  अगोदर">जेवणा  अगोदर</option><option value='जिभे खाली'>जिभे खाली</option><option value='रेक्टल मध्ये'>रेक्टल मध्येे</option><option value='आठवड्यातून एकदा'>आठवड्यातून एकदा</option></select>`;
      row.children[5].children[0].value = data.eat;
      row.children[6].children[0].value = data.days;
      row.children[7].children[0].value = data.quantity;
    } else if (data.type == "E/D") {
      row.children[0].children[0].value = data.type;
      var selectElement1 = row.children[2].children[0];
      var selectElement2 = row.children[3].children[0];
      var selectElement3 = row.children[4].children[0];
      selectElement1.innerHTML = "<option value='0' >0</option>";
      selectElement2.innerHTML = "<option value='0' >0</option>";
      selectElement3.innerHTML = "<option value='0' >0</option>";

      // Loop to create options from 1 ml to 15 ml
      for (let ml = 1; ml <= 10; ml++) {
        let option = document.createElement("option");
        option.value = `${ml} थेंब`;
        option.textContent = `${ml} थेंब`;
        selectElement1.appendChild(option);
      }
      for (let ml = 1; ml <= 10; ml++) {
        let option = document.createElement("option");
        option.value = `${ml} थेंब`;
        option.textContent = `${ml} थेंब`;
        selectElement2.appendChild(option);
      }
      for (let ml = 1; ml <= 10; ml++) {
        let option = document.createElement("option");
        option.value = `${ml} थेंब`;
        option.textContent = `${ml} थेंब`;
        selectElement3.appendChild(option);
      }
      selectElement1.value = data.morning;
      selectElement2.value = data.afternoon;
      selectElement3.value = data.night;
      var str = row.children[6].children[0].getAttribute("name");
      var num = str[str.length - 1];
      row.children[5].innerHTML = `<select name="eat_${num}"> <option value='3 times'>3 times</option>
       <option value='4 times'>4 times</option>
       <option value='5 times'>5 times</option>
       <option value='6 times'>6 times</option>
       <option value='8 times'>8 times</option>
       <option value='9 times'>9 times</option>
       <option value=' एक आठवडा'> एक आठवडा</option>
       <option value='दोन आठवडे'>दोन आठवडे</option>
       <option value=' तीन आठवडे एक महिना'> तीन आठवडे एक महिना</option></select>`;
      row.children[5].children[0].value = data.eat;
      row.children[6].children[0].value = data.days;
      row.children[7].children[0].value = data.quantity;
    } else if (data.type == "Inj") {
      row.children[0].children[0].value = data.type;
      var str = row.children[6].children[0].getAttribute("name");
      var num = str[str.length - 1];
      var selectElement1 = row.children[2];
      var selectElement2 = row.children[3];
      var selectElement3 = row.children[4];
      selectElement1.innerHTML = `<input name="morning_${num}" value="${data.morning}" >`;
      selectElement2.innerHTML = `<input name="afternoon_${num}" value="${data.afternoon}" >`;
      selectElement3.innerHTML = `<input name="night_${num}" value="${data.night}" >`;
      row.children[5].innerHTML = `<select name="eat_${num}"><option value="IM">IM</option><option value="IV">IV</option><option value="S/C">S/C</option><option value="Center Line">Center Line</option><option value="Intracath">Intracath</option></select>`;
      row.children[5].children[0].value = data.eat;
      row.children[6].children[0].value = data.days;
      row.children[7].children[0].value = data.quantity;
    } else {
      row.children[0].children[0].value = data.type;
      var selectElement1 = row.children[2].children[0];
      var selectElement2 = row.children[3].children[0];
      var selectElement3 = row.children[4].children[0];
      selectElement1.innerHTML =
        "<option value='0' >0</option><option value='1/2' >1/2</option>";
      selectElement2.innerHTML =
        "<option value='0' >0</option><option value='1/2' >1/2</option>";
      selectElement3.innerHTML =
        "<option value='0' >0</option><option value='1/2' >1/2</option>";

      for (let ml = 1; ml <= 10; ml++) {
        let option = document.createElement("option");
        option.value = `${ml}`;
        option.textContent = `${ml}`;
        selectElement1.appendChild(option);
      }
      for (let ml = 1; ml <= 10; ml++) {
        let option = document.createElement("option");
        option.value = `${ml}`;
        option.textContent = `${ml}`;
        selectElement2.appendChild(option);
      }
      for (let ml = 1; ml <= 10; ml++) {
        let option = document.createElement("option");
        option.value = `${ml}`;
        option.textContent = `${ml}`;
        selectElement3.appendChild(option);
      }
      selectElement1.value = data.morning;
      selectElement2.value = data.afternoon;
      selectElement3.value = data.night;
      
      var str = row.children[6].children[0].getAttribute("name");
      var num = str[str.length - 1];

      row.children[5].innerHTML = `<select name="eat_${num}"><option value="जेवणा नंतर">जेवणा नंतर</option><option value="जेवणा  अगोदर">जेवणा  अगोदर</option><option value='जिभे खाली'>जिभे खाली</option><option value='रेक्टल मध्ये'>रेक्टल मध्येे</option><option value='आठवड्यातून एकदा'>आठवड्यातून एकदा</option></select>`;
      row.children[5].children[0].value = data.eat;
      row.children[6].children[0].value = data.days;
      row.children[7].children[0].value = data.quantity;
      row.children[7].children[0].onclick = function() {
        calcQyt(row.children[7].children[0]);
    };
    }
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
