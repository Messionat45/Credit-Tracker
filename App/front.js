async function fetchOption() {
  try {
    const response = await fetch("sample.json");
    const data = await response.json();
    return data;
  } catch (error) {
    console.log("there is some error n fetching", error);
  }
}

async function getSecondSelect() {
  var optionSelect = document.getElementById("selectOption");
  var secondSelect = document.getElementById("secondSelect");

  secondSelect.innerHTML = "";

  const options = await fetchOption();

  const selectedOption = options[optionSelect.value];

  if (selectedOption) {
    selectedOption.forEach((option) => {
      var optionElement = document.createElement("option");

      optionElement.text = option;
      optionElement.value = option.toLowerCase();

      secondSelect.appendChild(optionElement);
    });
  }
}

// Call the getSecondSelect function when the page loads
getSecondSelect();

// ajax deletion -----
document.addEventListener("DOMContentLoaded", function () {
  // Add event listener to trash icon
  document.querySelectorAll("#logo2").forEach(function (btn) {
    btn.addEventListener("click", function () {
      // Get the record ID associated with the trash icon
      var recordId = this.dataset.recordSrno;

      // Send AJAX request to delete the record
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "delete.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Reload the page to reflect changes
            location.reload();
          } else {
            console.error("Error deleting record: " + xhr.status);
          }
        }
      };
      xhr.send("recordSrno=" + recordId);
    });
  });
});
