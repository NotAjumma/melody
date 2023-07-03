 <link rel="stylesheet" href="<?= base_url('css/editprofile.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>
 <script src="js/navbar.js"></script>

<div style=" width: 70%; background-color: white;">

<form action="submit-edit-profile-admin" method="post">
        <div class="profile-content">
          <div class="edit-header-text extralarge-bold-text">Edit Profile</div>
          <div class="input-container">
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Username
              </div>
              <div class="readonly-input karla-regular-small-text">
                  
                <?php echo $username ?>
              </div>
            </div>
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
                  
                  <option><?php echo $gender ?></option>
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
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Profile Picture
              </div>
              <div>
                <input
                  class="input-upload-profile karla-regular-small-text"
                  type="file"
                  name="profile_pic"
                  id="profile_pic"
                />
              </div>
            </div>
          </div>

          <input type="hidden" value="<?php echo $username ?>" name="username" id="username" />

          <div class="grey-line"></div>
          <div class="save-profile-button-container">
            <div class="cancel-profile-button button-bold-text" onclick="sidebarButton('<?php base_url()?>','profile')">Cancel</div>
            <button type="submit" class="save-profile-button button-bold-text">Save Profile</button>
          </div>
        </div>
        </form>
<div>
  
</div>

<!-- Dont delete this below div -->
</div>
</div>
</div>