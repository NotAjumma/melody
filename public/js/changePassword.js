function validateForm() {
  var baseURL = document.getElementById("baseURL").value;
  var currentPassword = document.getElementById("current_password").value;
  var newPassword = document.getElementById("new_password").value;
  var repeatNewPassword = document.getElementById("repeat_new_password").value;
  var db_password = document.getElementById("db_password").value;
  var username = document.getElementById("username").value;

  var errors = {};

  // Create a Promise for each input validation
  var promises = [];

  // Validate current password
  if (currentPassword.trim() === "") {
    errors.current_password = "Please enter your current password";
  } else {
    promises.push(
      new Promise(function (resolve) {
        // Make an AJAX request to check the password
        var xhr = new XMLHttpRequest();
        xhr.open("POST", baseURL + "/js/check-current-password.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              try {
                var response = JSON.parse(xhr.responseText);
                if (!response.valid) {
                  errors.current_password = "Sorry, wrong password";
                }
              } catch (error) {
                console.error("Error parsing JSON: " + error);
              }
            } else {
              console.error("Error: " + xhr.status);
            }
            resolve(); // Resolve the promise
          }
        };

        var formData =
          "current_password=" + encodeURIComponent(currentPassword);
        formData += "&db_password=" + encodeURIComponent(db_password);
        formData += "&username=" + encodeURIComponent(username);
        xhr.send(formData);
      })
    );
  }

  // Validate new password
  if (newPassword.trim() === "") {
    errors.new_password = "Please enter a new password";
  }

  // Validate repeat new password
  if (repeatNewPassword.trim() === "") {
    errors.repeat_new_password = "Please repeat the new password";
  } else if (newPassword !== repeatNewPassword) {
    errors.repeat_new_password = "Passwords do not match";
  }

  // Wait for all promises to resolve
  Promise.all(promises).then(function () {
    if (Object.keys(errors).length === 0) {
      // No errors, proceed with form submission
      document.getElementById("changePasswordForm").submit();
    } else {
      // Display errors
      displayErrors(errors);
    }
  });

  return false;
}

function displayErrors(errors) {
  // Hide all error containers and clear error messages
  var errorContainers = document.getElementsByClassName("validation-error");
  for (var i = 0; i < errorContainers.length; i++) {
    var errorContainer = errorContainers[i];
    errorContainer.style.display = "none";
  }

  // Clear error messages
  var errorMessages = document.getElementsByClassName("error-input-text");
  for (var j = 0; j < errorMessages.length; j++) {
    var errorMessage = errorMessages[j];
    errorMessage.innerText = "";
  }

  // Display error messages for specific fields
  for (var key in errors) {
    var errorElement = document.getElementById("error_" + key);
    var errorElementContainer = document.getElementById(
      "container_error_" + key
    );

    if (errorElement) {
      errorElement.innerText = errors[key];
      errorElementContainer.style.display = "block";
    }
  }
}

// Prevent form submission on Enter key press
document
  .getElementById("changePasswordForm")
  .addEventListener("keypress", function (event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      validateForm();
    }
  });
