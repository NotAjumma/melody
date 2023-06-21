function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  section.scrollIntoView({ behavior: "smooth" });
}

function planButton(baseurl, path) {
  // Change the URL path based on the provided parameter
  var url = baseurl + "plan/" + path;
  console.log(url);
  window.location.href = url;
}
