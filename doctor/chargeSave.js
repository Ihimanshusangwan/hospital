document.addEventListener("DOMContentLoaded", function () {
  const addButton = document.getElementById("charge-add-btn");
  const selectBox = document.getElementById("followup-charge");

  addButton.addEventListener("click", function () {
    const selectedValue = selectBox.value;
    addButton.disabled = true;

    if (selectedValue !== "") {
      const url = "chargeSave.php";
      const data = new URLSearchParams();
      data.append("selectedValue", selectedValue);
      data.append("p_id", Id);

      fetch(url, {
        method: "POST",
        body: data,
      })
        .then((response) => response.json())
        .then((result) => {
          if (result.status == "success") {
            addButton.disabled = false;
          } else {
            console.error("Error:");
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    }
  });
});
