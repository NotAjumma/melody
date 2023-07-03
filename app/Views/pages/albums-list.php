 <link rel="stylesheet" href="<?= base_url('css/albums.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
<script src="<?= base_url('js/navbar.js') ?>"></script>


    <div class="background-albums-list">
      <div class="top-header-albums">
        <div>
            <div class="cart-container karla-medium-text">
                <div>Your Cart</div>
                <div id="cart-items" style="display:none;"></div>
                <!-- <div >Total Items</div> -->
                <div>(<span id="total-cart-items"></span>)
                </div>
            </div>
            <a href="<?= base_url('check-login-status/checkoutAlbums') ?>" style="color: #ffffff; text-decoration: none;">
            <div class="checkout-button button-text" id="checkout-button">Checkout</div>
            </a>
        </div>
        
      </div>
    
    <div class="genre-container">
    <div class="header-albums-genre">
        <div class="genre-title large-medium-text">Hip Hop</div>
        <div class="show-all button-text">Show all</div>
    </div>
    
    <div class="genres-container">
        <?php foreach ($hipHopAlbums as $hipHopAlbum) { ?>
        <div class="single-genre-container">
            
            <div class="price large-regular-text">RM <?php echo $hipHopAlbum['price'] ?></div>
            <div class="pic"><img class="img-album" src="<?php echo $hipHopAlbum['album_cover'] ?>" /></div>
            <div class="albums-title karla-regular-blod-small-text">
                <?php echo $hipHopAlbum['album_title'] ?>
            </div>
            <div class="description small-text">
                <?php echo $hipHopAlbum['descriptions'] ?>
            </div>
            <button class="cart-button" data-id="<?php echo $hipHopAlbum['id']; ?>"
                data-title="<?php echo $hipHopAlbum['album_title']; ?>"
                data-artist="<?php echo $hipHopAlbum['artist']; ?>"
                data-genre="<?php echo $hipHopAlbum['genre']; ?>"
                data-price="<?php echo $hipHopAlbum['price']; ?>"
                data-description="<?php echo $hipHopAlbum['descriptions']; ?>"
                data-cover="<?php echo $hipHopAlbum['album_cover']; ?>"

            >
                Add to Cart
            </button>
        </div>
        <?php } ?>
    </div>
</div>

<div class="genre-container">
    <div class="header-albums-genre">
        <div class="genre-title large-medium-text">Art Rock</div>
        <div class="show-all button-text">Show all</div>
    </div>
    
    <div class="genres-container">
        <?php foreach ($rockAlbums as $rockAlbum) { ?>
        <div class="single-genre-container">
            <div class="price large-regular-text">RM <?php echo $rockAlbum['price'] ?></div>
            <div class="pic"><img class="img-album" src="<?php echo $rockAlbum['album_cover'] ?>" /></div>
            <div class="albums-title karla-regular-blod-small-text">
                <?php echo $rockAlbum['album_title'] ?>
            </div>
            <div class="description small-text">
                <?php echo $rockAlbum['descriptions'] ?>
            </div>
            <button class="cart-button" data-id="<?php echo $rockAlbum['id']; ?>"
                data-title="<?php echo $rockAlbum['album_title']; ?>"
                data-artist="<?php echo $rockAlbum['artist']; ?>"
                data-genre="<?php echo $rockAlbum['genre']; ?>"
                data-price="<?php echo $rockAlbum['price']; ?>"
                data-description="<?php echo $rockAlbum['descriptions']; ?>"
                data-cover="<?php echo $rockAlbum['album_cover']; ?>"

            >
                Add to Cart
            </button>

        </div>
        <?php } ?>
    </div>
</div>






    </div>

<script>
    function checkoutButton(baseurl, path) {
    // Change the URL path based on the provided parameter
    var url = baseurl + path;
    console.log(url);
    window.location.href = url;
    }
    const cartButtons = document.querySelectorAll('.cart-button');
const cartItems = [];

cartButtons.forEach(button => {
    button.addEventListener('click', () => {
        const albumId = button.dataset.id;
        const albumTitle = button.dataset.title;
        const albumArtist = button.dataset.artist;
        const albumGenre = button.dataset.genre;
        const albumPrice = button.dataset.price;
        const albumDescription = button.dataset.description;
        const albumCover = button.dataset.cover;
        const isInCart = button.classList.toggle('added-to-cart');
        
        if (isInCart) {
            // Album is added to the cart
            const album = {
                id: albumId,
                title: albumTitle,
                artist: albumArtist,
                genre: albumGenre,
                price: albumPrice,
                description: albumDescription,
                albumCover: albumCover
            };
            cartItems.push(album);
            console.log('Added to cart:', album);
        } else {
            // Album is removed from the cart
            const index = cartItems.findIndex(item => item.id === albumId);
            if (index > -1) {
                cartItems.splice(index, 1);
            }
            console.log('Removed from cart:', albumId);
        }
        
        const viewCartButton = document.getElementById('view-cart-button');
        const cartItemsContainer = document.getElementById('cart-items');
        const totalcartItems = document.getElementById('total-cart-items');

        // Immediately execute the logic to populate the cart items container
        cartItemsContainer.innerHTML = '';
        if (cartItems.length === 0) {
            cartItemsContainer.innerHTML = 'Your cart is empty.';
        } else {
            cartItems.forEach(item => {
                const cartItemElement = document.createElement('div');
                cartItemElement.textContent = item.title;
                cartItemsContainer.appendChild(cartItemElement);
            });
        }

        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        console.log('Cart items:', cartItems);

        const cartLength = cartItems.length;
        totalcartItems.textContent = cartLength;
        console.log('Cart length:', cartLength);
    });
});

    



  var containers = document.getElementsByClassName("single-genre-container");
  
  for (var i = 0; i < containers.length; i++) {
    var container = containers[i];
    var descriptionElement = container.getElementsByClassName("description")[0];
    var titleElement = container.getElementsByClassName("albums-title")[0];
    
    var containerWidth = container.offsetWidth;
    var maxLength = containerWidth > 200 ? 40 : 20; // Maximum length of the description
    var maxLengthTitle = containerWidth > 200 ? 50 : 15; // Maximum length of the title

    var descriptionText = descriptionElement.innerHTML;
    var titleText = titleElement.innerHTML;

    if (descriptionText.length > maxLength) {
      descriptionText = descriptionText.substring(0, maxLength) + "...";
    }

    if (titleText.length > maxLengthTitle) {
      if (!titleElement.dataset.truncated) {
        titleText = titleText.substring(0, maxLengthTitle) + "...";
        titleElement.innerHTML = titleText;
        titleElement.dataset.truncated = true;
      }
    }

    descriptionElement.innerHTML = descriptionText;
  }
</script>


