 <link rel="stylesheet" href="<?= base_url('css/editprofile.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script> 
 <script src="js/navbar.js"></script>

 
 <div style=" width: 70%; background-color: white">
        <!-- edit here for profile page -->
        <div class="profile-content">
          <div class="edit-header-text extralarge-bold-text">Edit Profile</div>
          <div class="input-container">
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Nickname
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="text"
                  name="nickname"
                  value="<?php echo $nickname ?>"
                />
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Email
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="email"
                  name="email"
                  value="<?php echo $email ?>"

                />
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Gender
              </div>
              <div>
                <select
                  class="select-edit-profile karla-regular-small-text"
                  type="text"
                  name="gender"
                >
                  
                  <option><?php echo $nickname ?></option>
                  <option value="Prefer not to say">Prefer not to say</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Date of Birth
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="date"
                  name="dob"
                  value="<?php echo $dob ?>"
                />
              </div>
            </div>
          </div>

          <div class="grey-line"></div>
          <div class="save-profile-button-container">
            <div class="cancel-profile-button button-bold-text" onclick="sidebarButton('<?php base_url()?>','profile')">Cancel</div>
            <div class="save-profile-button button-bold-text">Save Profile</div>
          </div>
        </div>
      </div>
      <!-- Dont delete this below div -->
</div>
</div>
</div>