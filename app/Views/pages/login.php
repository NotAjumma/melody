<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <script
      src="https://kit.fontawesome.com/607f9bcbf8.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
  <body class="body-login">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include(APPPATH . 'views/components/navbar.php'); ?>
    <div class="outer"></div>
    <div class="login-container">
      <form method="post" id="login" name="login" action="submit-login">

        <div class="header large-bold-text">Log in to Melody</div>
        <div class="username-container">
          <div class="small-medium-text">Username</div>
          <div class="input-container-login">
            <input class="input-login" type="text" placeholder="Username" name="username" id="username" />
          </div>
        </div>
        <div class="password-container">
          <div class="small-medium-text">Password</div>
          <div class="input-container-login">
            <input
              class="input-login"
              type="password"
              placeholder="Password"
              name="password"
              id="id_password"
              onclick=""
            />
            <i
              class="fa-regular fa-eye-slash"
              id="togglePassword"
              style="margin-left: -30px; margin-top:7px; cursor: pointer; color: #5c5c5c"
            ></i>
          </div>
        </div>
        <div class="submit-container">
          <button
            type="submit"
            value="Log in"
            class="submit-login small-bold-text"
          >Log in</button>
        </div>
      </form>
      <div class="liner-grey"></div>
      <div class="sign-up-container">
        <div>
          Don't have an account?<a
            href="<?= base_url('signup') ?>"
            class="span-sign-up small-bold-text"
            >Sign up for Melody</a
          >
        </div>
      </div>
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

//   $(document).ready(function() {
//   if ($("#login").length > 0) {
//     $("#login").validate({
//       rules: {
//         username: {
//           required: true,
//         },
//         password: {
//           required: true,
//         },
//       },
//       messages: {
//         username: {
//           required: "Username is required.",
//         },
//         password: {
//           required: "Password is required.",
//         },
//       },
//     });
//   }
// });



  </script>
</html>
