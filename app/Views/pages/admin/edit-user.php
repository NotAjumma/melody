 <link rel="stylesheet" href="<?= base_url('css/editprofile.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
 

 <script src="js/index.js"></script>
 <script src="js/navbar.js"></script>

<div style=" width: 70%; background-color: white;">


<!-- edit here for profile page -->
<div style=" width: 70%; background-color: white; margin: 0 auto;">
        <!-- edit here for profile page -->
        <form action="admin/submit-edit-user" method="post">
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
                    Plan
                </div>
                <div>
                    <select class="select-edit-profile karla-regular-small-text" id="plan-select" name="plan_update" onchange="handlePlanSelect(this)">
                        <option value="<?php echo $sub_id ?>"><?php echo $sub_name ?></option>
                        <?php foreach ($subscriptionTypes as $subscriptionType): ?>
                            <option value="<?php echo $subscriptionType['id']; ?>">
                                <?php echo $subscriptionType['sub_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="input-row" id="start-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Start Date
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="date"
                  name="start_date"
                  value="<?php echo $start_date ?>"

                />
              </div>
            </div>
            
            
            <div class="input-row" id="status-row">
                <div class="label-input-edit karla-regular-blod-small-text">
                    Status
                </div>
                <div>
                    <select class="select-edit-profile karla-regular-small-text" id="status-select" name="status_update">
                      <?php if ($sub_id == 1 || $sub_id == 2) {?>
                        <option value="<?php echo $status ?>"><?php echo $status ?></option>
                        <?php }?>
                        <!-- <option value="Free">Free</option> -->
                        <option value="Active">Active</option>
                        <option value="Unactive">Unactive</option>
                    </select>
                </div>
                <!-- <input type="hidden" value="Insert" name="updateOrInsert"  /> -->

            </div>
            <!-- <div class="input-row">
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
            </div> -->
          </div>

          <input type="hidden" value="<?php echo $username ?>" name="username" id="username" />
          <input type="hidden" value="<?php echo $sub_id ?>" name="sub_id"  />
          <input type="hidden" value="<?php echo $id ?>" name="id"  />

          <div class="grey-line"></div>
          <div class="save-profile-button-container">
            <div class="cancel-profile-button button-bold-text" onclick="goBack()">Cancel</div>
            <button type="submit" class="save-profile-button button-bold-text">Save Profile</button>
          </div>
        </div>
        </form>
      </div>

<!-- Dont delete this below div -->
</div>
</div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
    document.addEventListener("DOMContentLoaded", function() {
    var selectElement = document.getElementById('plan-select');
    handlePlanSelect(selectElement);
});
   function handlePlanSelect(selectElement) {
    var statusRow = document.getElementById('status-row');
    var startRow = document.getElementById('start-row');
    var subIdDd = "<?php echo $sub_id ?>";
    if (selectElement.value === '0' || subIdDd === 0) {
        statusRow.style.display = 'none';
        startRow.style.display = 'none';
    } else {
        statusRow.style.display = 'block';
        startRow.style.display = 'block';
    }
}

</script>