 <link rel="stylesheet" href="<?= base_url('css/receipt.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
 <div style="padding: 3rem; background-color: #f9eadd;"></div>
    <div class="body-receipt">
      <div class="receipt-container">
        <div class="header-receipt">
          <div class="regular-medium-text">Hi, <?php echo $nickname ?></div>
          <div class="regular-medium-text">Your order is confirmed!</div>
          <div class="regular-medium-text"><?php echo $sub_name ?> Plan</div>
        </div>
        <div class="first-layer-receipt">
          <div class="first-layer-column regular-small-text">
            <div class="th-receipt">Date</div>
            <div><?php echo $date_purchased ?></div>
          </div>
          <div class="first-layer-column regular-small-text">
            <div class="th-receipt">Order No</div>
            <div>#<?php echo $order_id ?></div>
          </div>
          <div class="first-layer-column regular-small-text">
            <div class="th-receipt">Payment Type</div>
            <div><?php echo $card_type ?> | <?php echo $card_number ?></div>
          </div>
          <div class="first-layer-column regular-small-text">
            <div class="th-receipt">Email</div>
            <div><?php echo $email ?></div>
          </div>
        </div>
        <div class="second-layer-receipt">
          <?php  foreach($ListAlbumsBuyed as $album){ ?>
          <div class="row-items">
            <div class="imgs-item-receipt">
              <img
                class="img-item-receipt"
                src="<?php echo $album[0]['album_cover'] ?>"
              />
              <div class="item-information">
                <div class="karla-regular-blod-small-text"><?php echo $album[0]['album_title'] ?></div>
                <div class="karla-regular-small-text">Artist : <?php echo $album[0]['artist'] ?></div>
                <div class="karla-regular-small-text">Genre : <?php echo $album[0]['genre'] ?></div>
                <div class="karla-regular-small-text">Description : <?php echo $album[0]['descriptions'] ?></div>
              </div>
            </div>

            <div class="price-container small-double-extrabold-text">RM <?php echo $album[0]['price'] ?></div>
          </div>
          <?php } ?>
          
        </div>
        <div class="third-layer-receipt">
          <div class="right-container">
            <div class="information karla-regular-small-text">
              <div >Subtotal</div>
              <div id="subtotal"></div>
            </div>
            <div class="information karla-regular-small-text">
              <div >Discount</div>
              <div id="discount"></div>
            </div>
            <div class="information">
              <div class="karla-medium-text">Total</div>
              <div class="karla-medium-text">RM <?php echo $total_amount ?></div>
            </div>
          </div>
        </div>
      </div>
      <div style="padding: 5rem; background-color:#f9eadd;"></div>
    <input type="hidden" id="useridInput" value="<?php echo $sub_id; ?>">
    <input type="hidden" id="totalInput" value="<?php echo $total_amount; ?>">

    </div>
    <script>
      const useridInput = document.getElementById('useridInput');
      const userid = parseFloat(useridInput.value);
      const totalInput = document.getElementById('totalInput');
      const total = parseFloat(totalInput.value);
      console.log(userid);
      let discount = 0;
      if(userid == 1){
        discount = 0.9;
      } else if(userid == 2){
        discount = 0.8;
      } else if(userid == 3){
        discount = 0.07;
      }else{
        discount = 0;
      }
      console.log(discount);

      
      const subtotal =  total / discount;
      console.log(subtotal);
      const discountPrice =  subtotal - total;
      console.log(discountPrice);


      const subtotalElement = document.getElementById('subtotal');
      subtotalElement.textContent = 'RM ' + subtotal.toFixed(2);

      const discountElement = document.getElementById('discount');
      discountElement.textContent = 'RM ' + discountPrice.toFixed(2);

   
    </script>
