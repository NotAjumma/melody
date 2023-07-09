<link rel="stylesheet" href="<?= base_url('css/individual.css') ?>" />
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

<script src="<?= base_url('js/plan.js') ?>"></script>

<?php if (session()->has('alert')): ?>
    <?= session('alert') ?>
<?php endif; ?>

    <div class="first-layer">
      <div class="header-top">
        <div class="large-medium-text">You chose</div>
        <div class="hyper-text small-extrabold-text ">
          <a class="hyper-link" href="<?= base_url('#plan-layer') ?>">Change plan</a>
        </div>
      </div>
      <div class="chose-container">
        <div class="small-extrabold-text">Monthly Premium</div>
        <div class="small-text">1 account</div>
      </div>
      <div class="term-text extrasmall-bold-text">
        Open only to users who haven't already tried Premium
      </div>
      <div class="subscribe-container">
        <div class="subscribe-text large-medium-text">Subscribe</div>
        <div class="sub-text karla-regular-blod-small-text">
          Use your card; cancel anytime.
        </div>
        <a href="<?= base_url('check-sub/checkout1m') ?>" style="color: #000000; text-decoration: none;" >
        <div class="method-container" >
          <div class="badge">
            <div class="button-text">Hots Deals</div>
          </div>
          <div class="method-text karla-medium-text midle-text">
            1 Month
          </div>
          <a class="karla-regular-blod-small-text">
            One-time payment of RM14.90
          </a>
        </div>
        </a>
      </div>
      <div class="one-time-payment-container">
        <div class="large-medium-text">One-time Payment</div>
        <div class="karla-regular-blod-small-text">
          Top up when you want. Does not auto-renew.
        </div>
        <a href="<?= base_url('check-sub/checkout6m') ?>" style="color: #000000; text-decoration: none;" >
        <div class="month-container">
          <div class="badge">
            <div class="button-text">Save RM19.00</div>
          </div>
          <div class="karla-medium-text midle-text">6 months</div>
          <div class="karla-regular-blod-small-text">
            One-time payment of RM70.40
          </div>
        </div>
        </a>
        <a href="<?= base_url('check-sub/checkout3m') ?>" style="color: #000000; text-decoration: none;" >
        <div class="month-container">
          <div class="karla-medium-text midle-text">3 months</div>
          <div class="karla-regular-blod-small-text">One-time payment of RM47.70</div>
        </div>
        </a>
        <!-- <div class="month-container">
          <div class="karla-medium-text midle-text">1 months</div>
          <div class="karla-regular-blod-small-text">One-time payment of RM15.90</div>
        </div> -->
      </div>
    </div>
