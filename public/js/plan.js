function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  section.scrollIntoView({ behavior: "smooth" });
}

function changeButton(baseurl) {
  // Change the URL path based on the provided parameter
  var url = baseurl;
  console.log(url);
  window.location.href = url;

  // setTimeout(function () {
  //   var sectionId = "plan-layer";
  //   scrollToSection(sectionId);
  // }, 1000); // Adjust the delay as needed
}

function checkout(baseurl, path) {
  // Change the URL path based on the provided parameter
  var url = baseurl + "checkout/" + path;
  console.log(url);
  window.location.href = url;

  // setTimeout(function () {
  //   var sectionId = "plan-layer";
  //   scrollToSection(sectionId);
  // }, 1000); // Adjust the delay as needed
}
