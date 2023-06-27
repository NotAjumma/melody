 <link rel="stylesheet" href="<?= base_url('css/profile.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>

<div style=" width: 70%; background-color: white;">


<!-- edit here for profile page -->
<div class="profile-content">
    <?php $session = session();
    $username = $session->get('username'); 
    $email = $session->get('email'); 
    $dob = $session->get('dob'); 
    $plan_name = $session->get('plan_name'); 
    $list_feature = $session->get('list_feature'); 
    // Convert the date format
    $formattedDate = date('F j, Y', strtotime($dob));   
     
    ?>
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
          <div class="edit-profile-button button-bold-text">Edit profile</div>

          <div class="your-plan-container">
            <div class="sub-header-text large-regular-text">Your plan</div>
            <div class="plan-container">
              <div class="premium-plan-container">
                <div class="large-extrabold-text">
                 <?php echo $plan_name ?>
                 
                </div>
              </div>
              <div class="bottom-plan-container">
                <div class="">
                  <div class="karla-half-medium-small-text">
                   <?php echo $list_feature ?>
                  </div>
                </div>
                <div class="member-container karla-half-medium-small-text">
                  You're a member of a Custom plan.
                </div>
              </div>
            </div>
          </div>

          <div class="edit-profile-button button-bold-text">Change plan</div>
        </div>

</div>

<!-- Dont delete this below div -->
</div>
</div>
</div>