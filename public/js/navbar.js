function sidebarButton(baseurl, path) {
  // Change the URL path based on the provided parameter
  var url = baseurl + path;
  console.log(url);
  window.location.href = url;
}

function scrollToPlan(baseurl, path) {
  // section.scrollIntoView({ behavior: "smooth" });
  var url = baseurl + "/melody/public/" + path;
  console.log(url);
  window.location.href = url;
}
