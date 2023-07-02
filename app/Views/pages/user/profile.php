 <link rel="stylesheet" href="<?= base_url('css/profile.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>
 <script src="js/navbar.js"></script>

<div style=" width: 70%; background-color: white;">


<!-- edit here for profile page -->
<div class="profile-content">
          <div class="header-text extralarge-bold-text">Account overview</div>
          <div class="sub-header-text large-regular-text">Profile</div>
          <div class="table-rows">
            <div class="data-row">
              <div class="attribute-data karla-regular-small-text">
                Username
              </div>
              <div class="variable-data karla-regular-blod-small-text">
                <?php echo $username ?>
              </div>
            </div>
            <div class="grey-line"></div>
            <div class="data-row">
              <div class="attribute-data karla-regular-small-text">
                Nickname
              </div>
              <div class="variable-data karla-regular-blod-small-text">
                <?php echo $nickname ?>
              </div>
            </div>
            <div class="grey-line"></div>
            <div class="data-row">
              <div class="attribute-data karla-regular-small-text">Email</div>
              <div class="variable-data karla-regular-blod-small-text">
                <?php echo $email ?>
              </div>
            </div>
            <div class="grey-line"></div>
            <div class="data-row">
              <div class="attribute-data karla-regular-small-text">
                Date of birth
              </div>
              <div class="variable-data karla-regular-blod-small-text">
                <?php echo $formattedDate ?>
              </div>
            </div>
            <div class="grey-line"></div>
          </div>
          <div class="edit-profile-button button-bold-text" onclick="sidebarButton('<?php base_url()?>','edit-profile')" >Edit profile</div>

          <div class="your-plan-container">
            <div class="sub-header-text large-regular-text">Your plan</div>
           
              <?php if ($sub_id == "") {?>
              <div class="free-plan-container-layer">
              <div class="free-plan-container">
                <div class="large-extrabold-text">
                 Free Plan
                 
                </div>
              </div>
              <div class="bottom-plan-container">
                <div class="list-features">
                  <div class="karla-half-medium-small-text">
                   <?php

                  $featuresModel = new \App\Models\FeaturesModel();
                  

                  $featureNames = $featuresModel->getFeatureNamesBySubId($sub_id);

                  if (!empty($featureNames)) {
                      $lastIndex = count($featureNames) - 1;
                      foreach ($featureNames as $index => $featureName) {
                          echo $featureName['feature_name'];
                          if ($index !== $lastIndex) {
                              echo ", ";
                          } else {
                              echo ".";
                          }
                      }
                  } 


                   ?>
                  </div>
                </div>
                <div onclick="scrollToPlan('<?php base_url()?>','#plan-layer')" class="cancel-free-button button-bold-text">Join Premium</div>
                <!-- <div class="member-container karla-half-medium-small-text">
                  You're a member of a Custom plan.
                </div> -->
              </div>
              </div>
              <?php } ?>
              <?php if ($sub_id == "1") {?>
              <div class="individual-plan-container-layer">
              <div class="premium-plan-container">
                <div class="large-extrabold-text">
                 <?php echo $sub_name ?>
                 
                </div>
              </div>
              <div class="bottom-plan-container">
                <div class="list-features">
                  <div class="karla-half-medium-small-text">
                   <?php

                  $featuresModel = new \App\Models\FeaturesModel();
                  

                  $featureNames = $featuresModel->getFeatureNamesBySubId($sub_id);

                  if (!empty($featureNames)) {
                      $lastIndex = count($featureNames) - 1;
                      foreach ($featureNames as $index => $featureName) {
                          echo $featureName['feature_name'];
                          if ($index !== $lastIndex) {
                              echo ", ";
                          } else {
                              echo ".";
                          }
                      }
                  } 


                   ?>
                  </div>
                </div>
                <div class="cancel-premium-button button-bold-text">Cancel Premium</div>
                <!-- <div class="member-container karla-half-medium-small-text">
                  You're a member of a Custom plan.
                </div> -->
              </div>
              </div>
              <?php } ?>
              <?php if ($sub_id == "2") {?>
              <div class="custom-plan-container-layer">
              <div class="custom-plan-container">
                <div class="large-extrabold-text">
                 <?php echo $sub_name ?>
                 
                </div>
              </div>
              <div class="bottom-plan-container">
                <div class="list-features">
                  <div class="karla-half-medium-small-text">
                   <?php

                  $featuresModel = new \App\Models\FeaturesModel();
                  

                  $featureNames = $featuresModel->getFeatureNamesBySubId($sub_id);

                  if (!empty($featureNames)) {
                      $lastIndex = count($featureNames) - 1;
                      foreach ($featureNames as $index => $featureName) {
                          echo $featureName['feature_name'];
                          if ($index !== $lastIndex) {
                              echo ", ";
                          } else {
                              echo ".";
                          }
                      }
                  } 


                   ?>
                  </div>
                </div>
                <div class="cancel-premium-button button-bold-text">Cancel Premium</div>
                <!-- <div class="member-container karla-half-medium-small-text">
                  You're a member of a Custom plan.
                </div> -->
              </div>
              </div>
              <?php } ?>
            
          </div>

          
        </div>

</div>

<!-- Dont delete this below div -->
</div>
</div>
</div>