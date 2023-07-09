 <link rel="stylesheet" href="<?= base_url('css/editprofile.css') ?>" />
 <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />

 <script src="js/index.js"></script>
 <script src="js/navbar.js"></script>

<div style=" width: 70%; background-color: white;">

<form action="submit-edit-album" method="post">
        <div class="profile-content">
          <div class="edit-header-text extralarge-bold-text">Edit Album <?php echo $album_title ?></div>
          <div class="input-container">
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Album Id
              </div>
              <div class="readonly-input karla-regular-small-text">
                  <?php echo $id ?>
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Album Title
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="text"
                  name="album_title"
                  value="<?php echo $album_title ?>"
                />
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Artist
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="text"
                  name="artist"
                  value="<?php echo $artist ?>"

                />
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Price in RM
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="text"
                  name="price"
                  value="<?php echo $price ?>"

                />
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Genre
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="text"
                  name="genre"
                  value="<?php echo $genre ?>"

                />
              </div>
            </div>
           
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Release Date
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="date"
                  name="release_date"
                  value="<?php echo $release_date ?>"
                  id="dob"
                />
              </div>
            </div>
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Descriptions
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="text"
                  name="descriptions"
                  value="<?php echo $descriptions ?>"

                />
              </div>
            </div>
            
            <div class="input-row">
              <div class="label-input-edit karla-regular-blod-small-text">
                Album Cover Url Only
              </div>
              <div>
                <input
                  class="input-edit-profile karla-regular-small-text"
                  type="text"
                  name="album_cover"
                  id="profile_pic"
                  value="<?php echo $album_cover ?>"
                />
              </div>
            </div>
          </div>

          <input type="hidden" value="<?php echo $id ?>" name="id"  />
          

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
<script>
  // Get the current date
  var currentDate = new Date().toISOString().split("T")[0];
  
  // Get the value of the input field
  var dobValue = document.getElementById("dob").value;
  
  // If the input field has a value, set the maximum date to the maximum of the current date and the input value
  if (dobValue) {
    currentDate = new Date(Math.max(new Date(dobValue), new Date())).toISOString().split("T")[0];
  }
  
  // Set the maximum date for the input field
  document.getElementById("dob").setAttribute("max", currentDate);
</script> 