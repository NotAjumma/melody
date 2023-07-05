function openModal() {
  const modal = document.getElementById("myModal");
  modal.style.display = "block";
}

function closeModal() {
  const modal = document.getElementById("myModal");
  modal.style.display = "none";
}

window.onclick = function (event) {
  const modal = document.getElementById("myModal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
};

function hideAddCardContainer() {
  closeModal();
}

function openModal(baseurl) {
  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Define the URL of the page to fetch
  var url = baseurl + "add-card";

  // Configure the request
  xhr.open("GET", url, true);

  // Define the callback function to handle the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Get the modal element
      var modal = document.getElementById("myModal");

      // Set the response HTML as the content of the modal
      modal.innerHTML = xhr.responseText;

      // Show the modal
      modal.style.display = "block";
    }
  };

  // Send the request
  xhr.send();
}
