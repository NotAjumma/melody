 <link rel="stylesheet" href="<?= base_url('css/editprofile.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

<script src="<?= base_url('js/index.js') ?>"></script> 
 <script src="<?= base_url('js/navbar.js') ?>"></script>
 <script src="<?= base_url('js/changePassword.js') ?>"></script>

 
 <div style=" width: 70%; background-color: white">
        <!-- edit here for profile page -->
        <form action="submit-change-password" id="changePasswordForm" method="post" onsubmit="return validateForm()">
        <div class="profile-content">
          <div class="edit-header-text extralarge-bold-text">Change your Password</div>
          <div class="input-container">
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Current password
              </div>
              <div>
                <input
                  class="input-change-password karla-regular-small-text"
                  type="password"
                  name="current_password"
                  id="current_password"
                />
              </div>
            </div>
            <div class="validation-error" id="container_error_current_password"  style="display: none;">
            <div class="error-container">
              <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
              <div class="error-input-text" id="error_current_password" ></div>
            </div>
            </div> 

            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                New password
              </div>
              <div>
                <input
                  class="input-change-password karla-regular-small-text"
                  type="password"
                  name="new_password"
                  id="new_password"

                />
              </div>
            </div>
            <div class="validation-error" id="container_error_new_password" style="display: none;">
            <div class="error-container">
              <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
              <div class="error-input-text" id="error_new_password" ></div>
            </div>
            </div>
             <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Repeat new password
              </div>
              <div>
                <input
                  class="input-change-password karla-regular-small-text"
                  type="password"
                  name="repeat_new_password"
                  id="repeat_new_password"

                />
              </div>
            </div>
            <div  class="validation-error" id="container_error_repeat_new_password" style="display: none;">
            <div class="error-container">
              <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
              <div class="error-input-text" id="error_repeat_new_password"></div>
            </div>
            </div>
          </div>

          <?php  $session = session(); 
        $db_password = $password;
        $username = $session->get('username');
        
        // if (password_verify($currentPassword, $storedPassword)) {
        //   $valid="true";
        
        ?>
         <input type="hidden" id="db_password" name="db_password" value="<?php echo $db_password ?>"/>
         <input type="hidden" id="username" name="username" value="<?php echo $username ?>"/>
         <input type="hidden" id="baseURL" name="baseURL" value="<?php echo base_url() ?>"/>
         
          <div class="grey-line"></div>
          <div class="save-profile-button-container">
            <div class="cancel-profile-button button-bold-text" onclick="sidebarButton('<?php base_url()?>','profile')">Cancel</div>
            <button type="submit" class="change-password-button button-bold-text">Set new password</button>
          </div>
        </div>
        </form>
      </div>
      
      <!-- Dont delete this below div -->
</div>
</div>
</div>