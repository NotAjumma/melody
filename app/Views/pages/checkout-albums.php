

 <link rel="stylesheet" href="<?= base_url('css/checkoutAlbum.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/saved_card.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
  <script src="js/navbar.js"></script>
  <script src="js/checkout-albums.js"></script>
  <script src="js/index.js"></script>

 <!-- <script src="js/index.js"></script> -->

 <link rel="stylesheet" href="<?= base_url('css/card.css') ?>" />
<link rel="stylesheet" href="<?= base_url('css/checkout.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.4.0/imask.min.js"></script>

<script src="<?= base_url('js/checkout.js') ?>"></script>
<script src="<?= base_url('js/plan.js') ?>"></script>
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
        </div>
        
        <div class="plan-container" >
          <div class="karla-medium-text">Your plan</div>
          <div class="your-plan-container" id="your-plan-container-color">
            <div class="karla-regular-blod-small-text"><?php echo $sub_name ?></div>
            <?php if($sub_id == 1) { ?>
            <div class="karla-regular-blod-small-text">Get 10% discount</div>
            <?php } elseif($sub_id == 2) { ?>
            <div class="karla-regular-blod-small-text">Get 20% discount</div>
            <?php }  elseif($sub_id == 3) { ?>
            <div class="karla-regular-blod-small-text">Get 3% discount</div>
            <?php } else {?>
            <div class="karla-regular-blod-small-text">No discount available</div>
              <?php }?>
          </div>
        </div>
      </div>
      <div class="right-content">
        <div class="payment-detail-container">
          <div class="header-payment-checkout">
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
                value="<?php echo $email ?>"
                readonly
              />
            </div>
          </div>
          <?php  if (!empty($cards)){ ?>
          <form action="submit-checkout-albums-list" method="post">
            <div class="card-container-input">
              <div class="small-extrabold-text">Card Detail</div>
              <select class="select-card-checkout" id="card-select" name="cardCheckoutInput">
                <option value="">Select a card</option>
                <?php foreach ($cards as $card): ?>
                  
                  <option value="<?php echo $card['id']; ?>"  data-card-name="<?php echo $card['name']; ?>">
                    <?php echo $card['card_type'];  ?> | **** <?php echo substr($card['card_number'], -4); ?> | <?php echo $card['expiration'];  ?> 
                

                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="card-container-input">
              <div class="small-extrabold-text">Card Holder</div>
              <div>
                <input class="email-input" type="text" id="card-holder-input" placeholder="Card Holder" readonly />
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
             <?php $session = session();
      $username = $session->get('username'); 
      
      ?>
             <input type="hidden" name="cartItems" id="cartItemsInput">
             <input type="hidden" name="totalInput" id="totalInput" >
             <input type="hidden" name="username" id="username" value="<?php echo $username; ?>" >
            <button type="submit" class="pay-button button-text" id="pay-button"></button>
          </form>
          <?php } else {?>
            
              <div class="card-container" id="card-container">
                <div class="label-card">
                  <div class="left-label">
                    <div>
                      <i class="fa-solid fa-credit-card fa-xl"></i>
                    </div>
                    <div class="karla-medium-text">**** 0000 | MM/YY</div>
                  </div>
                  <div>
                    <div onclick="addCardContainer()" class="add-card-button karla-medium-text">
                      Add card
                    </div>
                  </div>
                </div>
              </div>
           <form method="post" id="add-card" name="add-card" action="submit-add-card-checkout">
        <div class="add-info-top-layer-checkout" id="add-card-container" style="display:none;"> 
  
  
            <div class="add-card-layer" >
              <div class="container preload">
                <div class="creditcard">
                  <div class="front">
                    <div id="ccsingle"></div>
                    <svg
                      version="1.1"
                      id="cardfront"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      x="0px"
                      y="0px"
                      viewBox="0 0 750 471"
                      style="enable-background: new 0 0 750 471"
                      xml:space="preserve"
                    >
                      <g id="Front">
                        <g id="CardBackground">
                          <g id="Page-1_1_">
                            <g id="amex_1_">
                              <path
                                id="Rectangle-1_1_"
                                class="lightcolor grey"
                                d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                          C0,17.9,17.9,0,40,0z"
                              />
                            </g>
                          </g>
                          <path
                            class="darkcolor greydark"
                            d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z"
                          />
                        </g>
                        <text
                          transform="matrix(1 0 0 1 60.106 295.0121)"
                          id="svgnumber"
                          class="st2 st3 st4"
                        >
                          0123 4567 8910 1112
                        </text>
                        <text
                          transform="matrix(1 0 0 1 54.1064 428.1723)"
                          id="svgname"
                          class="st2 st5 st6"
                        >
                          JOHN DOE
                        </text>
                        <text
                          transform="matrix(1 0 0 1 54.1074 389.8793)"
                          class="st7 st5 st8"
                        >
                          cardholder name
                        </text>
                        <text
                          transform="matrix(1 0 0 1 479.7754 388.8793)"
                          class="st7 st5 st8"
                        >
                          expiration
                        </text>
                        <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">
                          card number
                        </text>
                        <g>
                          <text
                            transform="matrix(1 0 0 1 574.4219 433.8095)"
                            id="svgexpire"
                            class="st2 st5 st9"
                          >
                            01/23
                          </text>
                          <text
                            transform="matrix(1 0 0 1 479.3848 417.0097)"
                            class="st2 st10 st11"
                          >
                            VALID
                          </text>
                          <text
                            transform="matrix(1 0 0 1 479.3848 435.6762)"
                            class="st2 st10 st11"
                          >
                            THRU
                          </text>
                          <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		" />
                        </g>
                        <g id="cchip">
                          <g>
                            <path
                              class="st2"
                              d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                                      c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z"
                            />
                          </g>
                          <g>
                            <g>
                              <rect x="82" y="70" class="st12" width="1.5" height="60" />
                            </g>
                            <g>
                              <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                            </g>
                            <g>
                              <path
                                class="st12"
                                d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                          c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                          C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                          c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                          c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z"
                              />
                            </g>
                            <g>
                              <rect
                                x="82.8"
                                y="82.1"
                                class="st12"
                                width="25.8"
                                height="1.5"
                              />
                            </g>
                            <g>
                              <rect
                                x="82.8"
                                y="117.9"
                                class="st12"
                                width="26.1"
                                height="1.5"
                              />
                            </g>
                            <g>
                              <rect
                                x="142.4"
                                y="82.1"
                                class="st12"
                                width="25.8"
                                height="1.5"
                              />
                            </g>
                            <g>
                              <rect
                                x="142"
                                y="117.9"
                                class="st12"
                                width="26.2"
                                height="1.5"
                              />
                            </g>
                          </g>
                        </g>
                      </g>
                      <g id="Back"></g>
                    </svg>
                  </div>
                  <div class="back">
                    <svg
                      version="1.1"
                      id="cardback"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      x="0px"
                      y="0px"
                      viewBox="0 0 750 471"
                      style="enable-background: new 0 0 750 471"
                      xml:space="preserve"
                    >
                      <g id="Front">
                        <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11" />
                      </g>
                      <g id="Back">
                        <g id="Page-1_2_">
                          <g id="amex_2_">
                            <path
                              id="Rectangle-1_2_"
                              class="darkcolor greydark"
                              d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                      C0,17.9,17.9,0,40,0z"
                            />
                          </g>
                        </g>
                        <rect y="61.6" class="st2" width="750" height="78" />
                        <g>
                          <path
                            class="st3"
                            d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                                  C707.1,246.4,704.4,249.1,701.1,249.1z"
                          />
                          <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5" />
                          <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5" />
                          <path
                            class="st5"
                            d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z"
                          />
                        </g>
                        <text
                          transform="matrix(1 0 0 1 621.999 227.2734)"
                          id="svgsecurity"
                          class="st6 st7"
                        >
                          985
                        </text>
                        <g class="st8">
                          <text
                            transform="matrix(1 0 0 1 518.083 280.0879)"
                            class="st9 st6 st10"
                          >
                            security code
                          </text>
                        </g>
                        <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5" />
                        <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5" />
                        <text
                          transform="matrix(1 0 0 1 59.5073 228.6099)"
                          id="svgnameback"
                          class="st12 st13"
                        >
                          John Doe
                        </text>
                      </g>
                    </svg>
                  </div>
                </div>
              </div>
              <form>
              <div class="form-container">
                <div class="field-container">
                  <div class="small-extrabold-text" style="color:#000000;" for="name">Name</div>
                  <input id="name" maxlength="20" type="text" name="name" />
                </div>
                <div class="field-container">
                  <div class="small-extrabold-text" style="color:#000000;" for="cardnumber">Card Number</
                  ><span id="generatecard">generate random</span>
                  <input id="cardnumber" type="text"  inputmode="numeric" name="card_number" />
                  <svg
                    id="ccicon"
                    class="ccicon"
                    width="750"
                    height="471"
                    viewBox="0 0 750 471"
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                  ></svg>
                </div>
                <div class="expiration-security-field-container" style="display:flex; gap: 0.5rem;">
                  <div class="field-container">
                    <div class="small-extrabold-text" style="color:#000000;" for="expirationdate">Expiration (mm/yy)</div>
                    <input
                      id="expirationdate"
                      type="text"
                      
                      inputmode="numeric"
                      name="expiration"
                    />
                  </div>
                  <div class="field-container">
                    <div class="small-extrabold-text" style="color:#000000;" for="securitycode">Security Code</div>
                    <input id="securitycode" type="text"  inputmode="numeric" name="security_code"/>
                  </div>
                </div>
                
              </div>
          </div>
              <input type="hidden" id="card-type" name="card_type" value="" />

          <button type="submit" class="buy-now-button button-text" id="buy-now-button">Save</button>
          <div onclick="hideAddCardContainer()" class="cancel-button button-text" >Cancel</div>
            <div class="in-bottom-footer-layer"></div>
          </form>
          </div>
          </div>
          
            <?php }?>
        
        
      </div>
    </div>
    <input type="hidden" id="useridInput" value="<?php echo $sub_id; ?>">
<?php if (!empty($cards)){ ?>
    <script>

      

const cardSelect = document.getElementById('card-select');
  const cardHolderInput = document.getElementById('card-holder-input');

  cardSelect.addEventListener('change', function() {
    const selectedOption = cardSelect.options[cardSelect.selectedIndex];
     const cardHolder = selectedOption.dataset.cardName;
    console.log(cardHolder);
    cardHolderInput.value = cardHolder;
  });
  </script>
<?php } ?>
<script>

  const sub_idInput = document.getElementById('useridInput');
  const sub_id = parseFloat(sub_idInput.value);
  console.log("subid" +sub_id);

  var elementPlan = document.getElementById("your-plan-container-color");

        if (sub_id == 1) { //monthly
          elementPlan.classList.add("monthly");
        } else if (sub_id == 2){ //yearly
          elementPlan.classList.add("yearly");
        }else if (sub_id == 3){ //mini
          elementPlan.classList.add("mini");
        }else { //free
          elementPlan.classList.add("free");
        }




  const cartItems = JSON.parse(localStorage.getItem('cartItems'));
  // localStorage.removeItem('cartItems');
  // Set the cartItems value to the hidden input field
document.getElementById('cartItemsInput').value = JSON.stringify(cartItems);
console.log(document.getElementById('cartItemsInput').value = JSON.stringify(cartItems));

fetch('/submit-checkout-albums-list', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(cartItems)
})
  .then(response => {
    // Handle the response
  })
  .catch(error => {
    // Handle any errors
  });

  console.log(cartItems);

var selectElement = document.getElementById("card-select");
var buttonElement = document.getElementById("pay-button");
var selectedValue = selectElement.value;

function updateCheckoutButton() {
  if (selectedValue) {
    // console.log("if");
    buttonElement.style.pointerEvents = 'auto';
    buttonElement.style.opacity = '1';
    buttonElement.style.cursor = 'pointer';
    
  } else {
    // console.log("else");
    buttonElement.style.pointerEvents = 'none';
    buttonElement.style.opacity = '0.5';
    buttonElement.style.cursor = 'not-allowed';
    
  }
}

function checkSelectedValue() {
    console.log("in checkSelectedValue");

  var newValue = selectElement.value;
  if (selectedValue !== newValue) {
    selectedValue = newValue;
    updateCheckoutButton();
  }
}

// Call the checkSelectedValue function initially to check the selected value
checkSelectedValue();
setInterval(updateCheckoutButton, 1);


// Add an event listener to the select element to check for changes in the value
selectElement.addEventListener("change", function() {
    console.log("in addEventListener");

  checkSelectedValue();
});



</script>
<?php if (!empty($cards)){ ?>
<script>



const useridInput = document.getElementById('useridInput');
const userid = parseFloat(useridInput.value);
console.log(userid);
let discount = 0;
if(userid == 1){
  discount = 0.1;
} else if(userid == 2){
  discount = 0.2;
} else if(userid == 3){
  discount = 0.03;
}else{
  discount = 0;
}
console.log(discount);

let subtotal = 0;

cartItems.forEach(item => {
  subtotal += parseFloat(item.price);
});
console.log(subtotal);


const discountPrice = subtotal * discount;
console.log(discountPrice);
const afterDiscount = subtotal - discountPrice;
console.log(afterDiscount);


const subtotalElement = document.getElementById('subtotal');
subtotalElement.textContent = 'RM ' + subtotal.toFixed(2);

const discountElement = document.getElementById('discount');
discountElement.textContent = 'RM ' + discountPrice.toFixed(2);

const totalElement = document.getElementById('total');
totalElement.textContent = 'RM ' + afterDiscount.toFixed(2);

const payElement = document.getElementById('pay-button');
payElement.textContent = 'Pay RM ' + afterDiscount.toFixed(2);

const afterDiscountElement = document.getElementById('totalInput');
afterDiscountElement.value = afterDiscount.toFixed(2);


</script>
<?php } ?>
<script>



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

