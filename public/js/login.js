if ($("#login").length > 0) {
  $("#login").validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Username is required.",
      },
      email: {
        required: "Password is required.",
      },
    },
  });
}
