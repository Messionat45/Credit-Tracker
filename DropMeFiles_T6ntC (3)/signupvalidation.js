function validateName() {
  var userName = document.getElementById("userName").value;
  const nameRegex = /^[A-Z][a-z]+ [A-Z][a-z]+$/;

  if (!nameRegex.test(userName)) throw "Error: Invalid Name.";
}
function validatePhone() {
  var phone = document.getElementById("phone").value;
  const phoneRegex = /[0-9]{10}$/;

  if (!phoneRegex.test(phone) && phone.length != 10)
    throw "Error: Invalid Phone Number.";
}
function validateEmail() {
  var email = document.getElementById("email").value;
  const emailRegex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[A-Za-z]{3}$/;
  if (!emailRegex.test(email)) throw "Error: Invalid Email Address";
}

function validatePassword() {
  var password = document.getElementById("password").value;
  if (password.length < 8) throw "Error: Invalid Password.";
}

function signupValidate(event) {
  event.preventDefault();
  var userName = document.getElementById("userName").value;
  var phone = document.getElementById("phone").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var feedback = document.getElementById("feedback");

  try {
    if (!userName || !phone || !email || !password) {
      throw "Error: All Fields are required.";
    }

    validateName();
    validatePhone();
    validateEmail();
    validatePassword();

    feedback.innerHTML = `<span style="color: green;">Registration Successful!</span>`;
  } catch (error) {
    feedback.innerHTML = `<span style="color: red;">${error}</span>`;
  }
}

var signup = document.getElementById("signup");
signup.addEventListener("click", signupValidate);
