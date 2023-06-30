 <link rel="stylesheet" href="<?= base_url('css/saved_card.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <!-- <script src="js/index.js"></script> -->
 <script src="js/navbar.js"></script>

<div style=" width: 70%; background-color: white;">


<!-- edit here for profile page -->
<div class="saved-payment-cards-content">
          <div class="edit-header-text large-bold-text">
            Saved payment cards
          </div>
          <div class="payment-desc-text regular-small-text">
            Securely Stored Payment Cards feature, you can securely save and
            store your credit, debit, and other payment cards for quick and
            hassle-free transactions.
          </div>

          <div class="mycard-container">
            <div class="header-mycard">
              <div class="karla-medium-text">My cards</div>
              <div><i class="fa-solid fa-lock fa-lg"></i></div>
            </div>
            <div class="cards-container">
              <?php if (!empty($cards)): ?>
                    <?php foreach ($cards as $card): ?>
                        <div class="card-container">
                            <div class="label-card">
                                <div class="left-label">
                                    <div>
                                        <img src="<?= base_url('assets/card/'. $card['card_type'] . '.png') ?>" style="height: 2rem;" />
                                    </div>
                                    <div class="text-left-label karla-medium-text">
                                        <span class="span-left-label">**** </span><span><?= substr($card['card_number'], -4) ?></span> <span>|</span> <span><?= $card['expiration'] ?></span>
                                    </div>
                                </div>
                                <div class="card-container-id" data-card-id="<?= $card['id'] ?>">
                                    
                                    <div onclick="deleteCard(this)" class="delete-card-button karla-medium-text" data-card-id="<?= $card['id'] ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>

              <div class="card-container">
                <div class="label-card">
                  <div class="left-label">
                    <div>
                      <i class="fa-solid fa-credit-card fa-xl"></i>
                    </div>
                    <div class="karla-medium-text">**** 0000 | MM/YY</div>
                  </div>
                  <div>
                    <div class="add-card-button karla-medium-text">
                      Add card
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script>
    var baseUrl = "<?php echo base_url(); ?>"; // Add this line to set the base URL
    
    function deleteCard(element) {
        var cardId = element.getAttribute('data-card-id');
        var cardContainer = element.closest('.card-container');
        var url = baseUrl + 'cards/delete/' + cardId; // Use the base URL here

        // Make an AJAX request to delete the card
        $.ajax({
            type: 'POST',
            url: url, // Use the base URL here
            data: { cardId: cardId },
            success: function(response) {
                // Remove the card container from the DOM
                $(cardContainer).remove();
                console.log(url);
                console.log(cardId);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
                // Handle the error if needed
            }
        });
    }
</script>


<!-- Dont delete this below div -->
</div>
</div>
</div>