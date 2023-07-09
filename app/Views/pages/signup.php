<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url('css/signup.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script
      src="https://kit.fontawesome.com/607f9bcbf8.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <?php if (session()->has('alert')): ?>
    <?= session('alert') ?>
<?php endif; ?>
    <div class="outer-layer"></div>
    <div class="sign-up-container">
      <form method="post" id="signup" name="signup" action="submit-signup" style="width:40rem" onsubmit="return validateForm()">
        <div class="header large-bold-text">Melody</div>
        <div class="header sign-up large-medium-text">
          Sign up with your email address
        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">What's your email?</div>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your email"
          />
           <div id="emailError" class="error-message"></div> <!-- Error message element -->
        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">Create a username</div>
          <input
            type="text"
            name="username"
            id="username"
            placeholder="Create a username"
          />
           <div id="usernameError" class="error-message"></div> <!-- Error message element -->

        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">What's we call you?</div>
          <input
            type="text"
            name="nickname"
            id="nickname"
            placeholder="Create a nickname"
          />
           <div id="nicknameError" class="error-message"></div> <!-- Error message element -->

        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">Create a password</div>
          <input
            type="password"
            name="password"
            id="id_password"
            placeholder="Create a password"
          />
          <i
            class="fa-regular fa-eye-slash"
            id="togglePassword"
            style="margin-left: -45px; cursor: pointer; color: #5c5c5c"
          ></i>
           <div id="id_passwordError" class="error-message"></div> <!-- Error message element -->

        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">
            What's your date of birth?
          </div>
          <input type="date" name="date_of_birth" id="dob" />
           <div id="dobError" class="error-message"></div> <!-- Error message element -->

        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">
            What's your gender?
          </div>
          <div class="gender-container">
            <div>
              <input
                type="radio"
                name="gender"
                value="Male"
                class="custom"
              />
            </div>
            <div class="small-medium-text">Male</div>
            <div>
              <input
                type="radio"
                name="gender"
                value="Female"
                class="custom"
              />
            </div>
            <div class="small-medium-text">Female</div>
            <div>
              <input
                type="radio"
                name="gender"
                value="Prefer not to say"
                class="custom"
              />
            </div>

            <div class="small-medium-text">Prefer not to say</div>

          </div>
           <div id="genderError" class="error-message"></div> <!-- Error message element -->

        </div>
        <div style="padding: 1rem"></div>
        <!-- <div class="checkbox-container">
          <div class="checkbox-inlayyer">
            <div class="checkbox-layyer">
              <input
                type="checkbox"
                name="marketing"
                id="marketing"
                class="custom"
              />
            </div>
            <div class="small-medium-text">
              I would prefer not to receive marketing messages from Melody
            </div>
          </div>

          <div class="checkbox-inlayyer">
            <div class="checkbox-layyer">
              <input type="checkbox" name="share" id="share" class="custom" />
            </div>
            <div class="small-medium-text">
              Share my registration data with Melody’s content providers for
              marketing purposes.
            </div>
          </div>
        </div>
        <div class="term-container small-text">
          By clicking on sign-up, you agree to Melody’s
          <a href="" class="span-link small-bold-text"
            >Terms and Conditions of Use.</a
          >
        </div>
        <div class="policy-container small-text">
          To learn more about how Melody collects, uses. shares and protects
          your personal data, please see
          <a href="" class="span-link small-bold-text"
            >Melody’s Privacy Policy.</a
          >
        </div> -->
        <div class="submit-container">
          <button type="submit" name="submit" id="submitButton" class="submit">
            Sign up
          </button>
        </div>

        <div class="login-container small-text">
          Have an account?
          <a href="<?= base_url('login') ?>" class="span-link small-bold-text"
            >Log in.</a
          >
        </div>
      </form>
    </div>
    <div class="bottom-div"></div>
  </body>
  <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#id_password");

    togglePassword.addEventListener("click", function (e) {
      // toggle the type attribute
      const type =
        password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);

      // toggle the eye slash icon
      if (type === "password") {
        this.classList.remove("fa-eye");
        this.classList.add("fa-eye-slash");
      } else {
        this.classList.add("fa-eye");
        this.classList.remove("fa-eye-slash");
      }
    });
   const submitButton = document.getElementById("submitButton");
const signupForm = document.getElementById("signup");

 function validateForm() {
    // event.preventDefault();

    // Remove existing error messages
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((errorMessage) => {
      errorMessage.textContent = "";
    });

    // Perform validation for each input field
    const email = document.getElementById("email").value;
    const username = document.getElementById("username").value;
    const nickname = document.getElementById("nickname").value;
    const password = document.getElementById("id_password").value;
    const dob = document.getElementById("dob").value;
    const gender = document.querySelector("input[name='gender']:checked");

    if (!email || !validateEmail(email)) {
      showError("email", "Please enter a valid email address.");
      return false;
    }

    if (!username) {
      showError("username", "Please enter a username.");
      return false;
    }

    if (!nickname) {
      showError("nickname", "Please enter a nickname.");
      return false;
    }

    if (!password) {
      showError("id_password", "Please enter a password.");
      return false;
    }

    if (!dob) {
      showError("dob", "Please enter your date of birth.");
      return false;
    }

    if (!gender) {
      showError("gender", "Please select your gender.");
      return false;
    }

    // If all validations pass, you can proceed with form submission
    // signupForm.submit();
  };

  function validateEmail(email) {
      // Perform email validation using a regular expression or any other method
      // This is a simple example, you may need to use a more comprehensive validation
      const emailRegex = /^\S+@\S+\.\S+$/;
      return emailRegex.test(email);
    }

    // Get the current date
    var currentDate = new Date().toISOString().split("T")[0];

    // Set the maximum date for the input field
    document.getElementById("dob").setAttribute("max", currentDate);

  function showError(fieldName, errorMessage) {
    const errorElement = document.getElementById(fieldName + "Error");
    errorElement.textContent = errorMessage;
  }
  </script>
</html>
