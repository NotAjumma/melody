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

        

          
        </div>

</div>

<!-- Dont delete this below div -->
</div>
</div>
</div>