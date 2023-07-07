 <link rel="stylesheet" href="<?= base_url('css/index.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>

<div class="body-premium">
      <div class="header-layer">
        <div class="header-index">
          <div class="header-index-text">
            <div class="large-bold-text">
              Get 2 months of Premium only at RM14.90 for first time user.
            </div>
            <div class="regular-medium-text">
              Just RM14.90/month after. Cancel anytime
            </div>
            <div class="button-container button-text">
                <a href="<?= base_url('check-login-status/checkout') ?>" style="color: #ffffff; text-decoration: none;" >
              <div class="started-button top-button">
                <div >Get Started</div>
              </div></a>
              <div onclick="scrollToSection('plan-layer')" class="view-button top-button">
                <div >View Plans</div>
              </div>
            </div>
            <div class="term-container small-text">
              Offer not available for users who have already tried Premium.
            </div>
          </div>
        </div>
      </div>

      <div class="content-layer">
        <div class="content-index">
          <div class="why-go-premium-container">
            <div class="header-content-index large-extrabold-text">
              Why go Premium?
            </div>
            <div class="icons-container">
              <div class="icon-container">
                <div class="icon">
                  <img src="assets/music.png" class="img-icon" />
                </div>
                <div class="icon-header medium-text">Download Music.</div>
                <div class="icon-desc karla-small-medium-text">
                  Listen Anywhere.
                </div>
              </div>
              <div class="icon-container">
                <div class="icon">
                  <img src="assets/add.png" class="img-icon" />
                </div>
                <div class="icon-header medium-text">
                  Ad-free music listening.
                </div>
                <div class="icon-desc karla-small-medium-text">
                  Enjoy nonstop music.
                </div>
              </div>
              <div class="icon-container">
                <div class="icon">
                  <img src="assets/any.png" class="img-icon" />
                </div>
                <div class="icon-header medium-text">Play any song.</div>
                <div class="icon-desc karla-small-medium-text">
                  Even on mobile.
                </div>
              </div>
              <div class="icon-container">
                <div class="icon">
                  <img src="assets/unlimited.png" class="img-icon" />
                </div>
                <div class="icon-header medium-text">Unlimited skips.</div>
                <div class="icon-desc karla-small-medium-text">
                  Just hit next.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="plan-layer" id="plan-layer">
        <div class="plans-container">
          <div class="header-plan large-extrabold-text">Pick your Premium</div>
          <div class="desc-plan regular-medium-text">
            Listen without limits on your phone, speaker, and other devices.
          </div>
          <div class="plan-container-layer">
            <div class="plan-container-outside">
              <div class="plan-container-inside">
                <div class="top-layer-container">
                  <div class="plan-badge small-bold-text">
                    <div class="badge-text">
                      One-time payment
                    </div>
                  </div>
                  <div class="top-container">
                    <div class="top-name large-medium-text">Mini</div>
                    <div class="top-desc regular-medium-text">
                      From RM0.75/day
                      <br />
                      Discount 3% for buy albums
                    </div>
                  </div>
                </div>
                
                <div class="grey-line"></div>
                <div class="bottom-container">
                  <div class="total-feature-list">
                    <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      Ad-free music listening on mobile
                    </div>
                  </div>
                  <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      Group Session
                    </div>
                  </div>
                  
                  </div>
                  <!-- <a href="<?= base_url('check-login-status/individual') ?>" class="get-started-button top-button button-text"> -->
                  
                  <div onclick="planButton('<?php base_url()?>','check-login-status/individual')" class="get-started-button top-button button-text">
                    Get Started
                  </div>
                  <div class="term-container-bottom small-text">
                    Offer not available for users who have already tried Premium
                  </div>
                </div>
              </div>

              <!-- Individual Plan -->
              <div class="plan-container-inside">
                <div class="top-layer-container">
                  <div class="plan-badge small-bold-text">
                    <div class="badge-text">
                      2 months for RM14.90 for first time user
                    </div>
                  </div>
                  <div class="top-container">
                    <div class="top-name large-medium-text">Monthly</div>
                    <div class="top-desc regular-medium-text">
                      RM14.90/month after offer period
                      <br />
                      Discount 10% for buy albums
                    </div>
                  </div>
                </div>
                <div class="grey-line"></div>
                <div class="bottom-container">
                  <div class="total-feature-list">
                    <div class="features-list">
                      <div class="feature-icon">
                        <i
                          class="fa-solid fa-check fa-lg"
                          style="color: #000000"
                        ></i>
                      </div>
                      <div class="feature-desc regular-small-text">
                        Ad-free music listening on mobile
                      </div>
                    </div>
                    <div class="features-list">
                      <div class="feature-icon">
                        <i
                          class="fa-solid fa-check fa-lg"
                          style="color: #000000"
                        ></i>
                      </div>
                      <div class="feature-desc regular-small-text">
                        Play anewhere - even offline
                      </div>
                    </div>
                    <div class="features-list">
                      <div class="feature-icon">
                        <i
                          class="fa-solid fa-check fa-lg"
                          style="color: #000000"
                        ></i>
                      </div>
                      <div class="feature-desc regular-small-text">
                        On-demand playback
                      </div>
                    </div>
                    
                  </div>
                  
                  <div onclick="planButton('<?php base_url()?>','individual')" class="get-started-button top-button button-text">
                    Get Started
                  </div>
                  <div class="term-container-bottom small-text">
                    Offer not available for users who have already tried Premium
                  </div>
                </div>
              </div>

                <!-- yearly Plan -->

              <div class="plan-container-inside">
                <div class="top-layer-container">
                  <div class="plan-badge small-bold-text">
                    <div class="badge-text">
                      One-time payment for yearly
                    </div>
                  </div>

                  <div class="top-container">
                    <div class="top-name large-medium-text">Yearly</div>
                    <div class="top-desc regular-medium-text">
                      RM130.90/yearly after offer period
                      <br />
                      Discount 20% for buy albums
                    </div>
                  </div>
              </div>
                <div class="grey-line"></div>
                <div class="bottom-container">
                  <div class="total-feature-list">
                    <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      Ad-free music listening
                    </div>
                  </div>
                  <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      High-Quality Audio
                    </div>
                  </div>
                  <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      Unlimited Skips
                    </div>
                  </div>
                  <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      Lyrics Integration
                    </div>
                  </div>
                  <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      Multi-Device Sync
                    </div>
                  </div>
                  <div class="features-list">
                    <div class="feature-icon">
                      <i
                        class="fa-solid fa-check fa-lg"
                        style="color: #000000"
                      ></i>
                    </div>
                    <div class="feature-desc regular-small-text">
                      and more ..
                    </div>
                  </div>

                  </div>
                  
                
                  <div onclick="planButton('<?php base_url()?>','yearly')" class="get-started-button top-button button-text">
                    Get started
                  </div>
                  <div class="term-container-bottom small-text">
                    Offer not available for users who have already tried Premium
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>