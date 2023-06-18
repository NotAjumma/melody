<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="<?= base_url('css/signup.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <script
      src="https://kit.fontawesome.com/607f9bcbf8.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="outer-layer"></div>
    <div class="sign-up-container">
      <form method="post" id="signup" name="signup" action="submit-signup">
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
        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">Create a username</div>
          <input
            type="text"
            name="text"
            id="text"
            placeholder="Create a username"
          />
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
        </div>
        <div class="input-container">
          <div class="label-input small-extrabold-text">
            What's your date of birth?
          </div>
          <input type="date" name="date_of_birth" id="dob" />
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
                id="gender"
                value="Male"
                class="custom"
              />
            </div>
            <div class="small-medium-text">Male</div>
            <div>
              <input
                type="radio"
                name="gender"
                id="gender"
                value="Female"
                class="custom"
              />
            </div>
            <div class="small-medium-text">Female</div>
            <div>
              <input
                type="radio"
                name="gender"
                id="gender"
                value="Prefer not to say"
                class="custom"
              />
            </div>

            <div class="small-medium-text">Prefer not to say</div>
          </div>
        </div>
        <div class="checkbox-container">
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
        </div>
        <div class="submit-container">
          <button type="submit" name="submit" id="submit" class="submit">
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
  </script>
</html>
