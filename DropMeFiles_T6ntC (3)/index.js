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

getSecondSelect();