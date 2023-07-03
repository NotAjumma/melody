

<?php
// Include or require the AlbumModel.php file here
//  require_once 'app/Models/AlbumListModel.php';

// Retrieve the cartItems array from the AJAX request
// $cartItems = json_decode($_POST['cartItems'], true);

// Create an instance of the AlbumModel class
// $this->whereIn('id', $albumIDs);
//         $query = $this->findAll();

// Call the getAlbumsByIDs method and pass the cartItems array
// $albums = $albumListModel->getAlbumsByIDs($cartItems);

// // Display or process the retrieved albums
// foreach ($albums as $album) {
//     echo $album['title'] . '<br>';
// }
?>

 <link rel="stylesheet" href="<?= base_url('css/checkoutAlbum.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
 <div class="outer-checkout"></div>
    <div class="checkout-content">
      <div class="left-content">
        <div class="summary-order-container">
          <div class="summary-header">
            <div class="karla-medium-text">Summary Order</div>
            <div class="small-text">Check your albums</div>
          </div>
          <div class="items-checkout-container">
            <div id="cart-items-container">
              <!-- Display the cart items here -->
            </div>
          </div>
          <!-- <div class="items-checkout-container">
            <div class="pic">
              <img
                class="img-album"
                src="https://upload.wikimedia.org/wikipedia/en/5/5e/Madvillainy_cover.png"
              />
            </div>
            <div class="items-text">
              <div class="karla-regular-blod-small-text">Title ALBUM</div>
              <div class="karla-small-medium-text">album description</div>
              <div class="karla-small-medium-text">Artist :</div>
              <div class="karla-small-medium-text">Genre :</div>
            </div>
            <div class="album-price karla-regular-blod-small-text">RM 50</div>
          </div>
          <div class="items-checkout-container">
            <div class="pic">
              <img
                class="img-album"
                src="https://upload.wikimedia.org/wikipedia/en/5/5e/Madvillainy_cover.png"
              />
            </div>
            <div class="items-text">
              <div class="karla-regular-blod-small-text">Title ALBUM</div>
              <div class="karla-small-medium-text">album description</div>
              <div class="karla-small-medium-text">Artist :</div>
              <div class="karla-small-medium-text">Genre :</div>
            </div>
            <div class="album-price karla-regular-blod-small-text">RM 50</div>
          </div> -->
        </div>
        
        <div class="plan-container">
          <div class="karla-medium-text">Your plan</div>
          <div class="your-plan-container">
            <div class="karla-regular-blod-small-text"><?php echo $sub_name ?></div>
            <?php if($sub_id == 1) { ?>
            <div class="karla-regular-blod-small-text">Get 10% discount</div>
            <?php } elseif($sub_id == 2) { ?>
            <div class="karla-regular-blod-small-text">Get 20% discount</div>
            <?php }  elseif($sub_id == 3) { ?>
            <div class="karla-regular-blod-small-text">Get 3% discount</div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="right-content">
        <div class="payment-detail-container">
          <div class="header-payment">
            <div class="karla-medium-text">Payment Details</div>
            <div class="small-text">
              Complete your purchase albm by providing your payment details
              order.
            </div>
          </div>
          <div class="email-container">
            <div class="small-extrabold-text">Email Address</div>
            <div>
              <input
                class="email-input"
                type="email"
                value="email@gmail.com"
                readonly
              />
            </div>
          </div>
          <div class="card-container">
            <div class="small-extrabold-text">Card Detail</div>
            <div>
              <input
                class="email-input"
                type="email"
                value="email@gmail.com"
                readonly
              />
            </div>
          </div>
          <div class="card-container">
            <div class="small-extrabold-text">Card Holder</div>
            <div>
              <input
                class="email-input"
                type="email"
                value="email@gmail.com"
                readonly
              />
            </div>
          </div>
        </div>
        <div class="checkout-details">
          <div class="detail-row karla-small-medium-text">
            <div >Subtotal</div>
            <div id="subtotal"></div>
          </div>
          <div class="detail-row karla-small-medium-text">
            <div>Discount</div>
            <div id="discount"></div>
          </div>
          <div class="detail-row total-text karla-regular-blod-small-text">
            <div>Total</div>
            <div id="total"></div>
          </div>
        </div>
        <div class="pay-button button-text" id="pay-button">Pay RM 270</div>
      </div>
    </div>
    <script>




const cartItems = JSON.parse(localStorage.getItem('cartItems'));
console.log(cartItems);



let subtotal = 0;

cartItems.forEach(item => {
  subtotal += parseFloat(item.price);
});

const subtotalElement = document.getElementById('subtotal');
subtotalElement.textContent = 'RM ' + subtotal;





// Get the container element
const container = document.getElementById('cart-items-container');

// Iterate over the cartItems array and create HTML elements for each item
cartItems.forEach(item => {
  // Create the main container for the item
  const itemContainer = document.createElement('div');
  itemContainer.classList.add('items-checkout-container');

  // Create the div for the image
  const picDiv = document.createElement('div');
  picDiv.classList.add('pic');

  // Create the image element
  const imgAlbum = document.createElement('img');
  imgAlbum.classList.add('img-album');
  imgAlbum.src = item.albumCover; // Replace 'imageURL' with the actual property name for the image URL

  // Append the image to the picDiv
  picDiv.appendChild(imgAlbum);

  // Create the div for the item text
  const itemsTextDiv = document.createElement('div');
  itemsTextDiv.classList.add('items-text');

  // Create the text elements for title, description, artist, and genre
  const titleElement = createElementWithClass('div', 'karla-regular-blod-small-text', 'Title: ' + item.title);
  const descriptionElement = createElementWithClass('div', 'karla-small-medium-text', 'Description: ' + item.description);
  const artistElement = createElementWithClass('div', 'karla-small-medium-text', 'Artist: ' + item.artist);
  const genreElement = createElementWithClass('div', 'karla-small-medium-text', 'Genre: ' + item.genre);

  // Append the text elements to the itemsTextDiv
  itemsTextDiv.appendChild(titleElement);
  itemsTextDiv.appendChild(descriptionElement);
  itemsTextDiv.appendChild(artistElement);
  itemsTextDiv.appendChild(genreElement);

  // Create the div for the album price
  const albumPriceDiv = createElementWithClass('div',  'album-price karla-regular-blod-small-text', 'RM ' + item.price);

  // Append all elements to the itemContainer
  itemContainer.appendChild(picDiv);
  itemContainer.appendChild(itemsTextDiv);
  itemContainer.appendChild(albumPriceDiv);

  // Append the itemContainer to the main container
  container.appendChild(itemContainer);
});

// Function to create an element with a given class and text content
function createElementWithClass(tag, classNames, textContent) {
  const element = document.createElement(tag);
  element.className = classNames;
  element.textContent = textContent;
  return element;
}



    </script>