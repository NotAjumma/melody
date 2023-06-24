<link rel="stylesheet" href="<?= base_url('css/individual.css') ?>" />
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

<script src="<?= base_url('js/plan.js') ?>"></script>
    <div class="first-layer">
      <div class="header-top">
        <div class="large-medium-text">You chose</div>
        <div class="hyper-text small-extrabold-text ">
          <a class="hyper-link" href="#">Change plan</a>
        </div>
      </div>
      <div class="chose-container">
        <div class="small-extrabold-text">Premium Individual</div>
        <div class="small-text">1 account</div>
      </div>
      <div class="term-text extrasmall-bold-text">
        Open only to users who haven't already tried Premium
      </div>
      <div class="subscribe-container">
        <div class="subscribe-text large-medium-text">Subscribe</div>
        <div class="sub-text karla-regular-blod-small-text">
          Auto-renews monthly; cancel anytime.
        </div>
        <div class="method-container" onclick="checkout('<?php base_url()?>','promote')">
          <div class="badge">
            <div class="button-text">2 months for RM15.90</div>
          </div>
          <div class="method-text karla-medium-text midle-text">
            Subscribe by card
          </div>
          <div class="karla-regular-blod-small-text">
            RM15.90/month after offer period
          </div>
        </div>
      </div>
      <div class="one-time-payment-container">
        <div class="large-medium-text">One-time Payment</div>
        <div class="karla-regular-blod-small-text">
          Top up when you want. Does not auto-renew.
        </div>
        <div class="month-container">
          <div class="badge">
            <div class="button-text">Save RM41.80</div>
          </div>
          <div class="karla-medium-text midle-text">12 months</div>
          <div class="karla-regular-blod-small-text">
            One-time payment of RM149.00
          </div>
        </div>
        <div class="month-container">
          <div class="karla-medium-text midle-text">3 months</div>
          <div class="karla-regular-blod-small-text">One-time payment of RM47.70</div>
        </div>
        <div class="month-container">
          <div class="karla-medium-text midle-text">1 months</div>
          <div class="karla-regular-blod-small-text">One-time payment of RM15.90</div>
        </div>
      </div>
    </div>
