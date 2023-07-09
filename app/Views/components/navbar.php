<?php 
use App\Models\UsersModel;

?>

<head>
  <link rel="stylesheet" href="<?= base_url('css/navbar.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/footer.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/promotion.css') ?>" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
  <script
      src="https://kit.fontawesome.com/607f9bcbf8.js"
      crossorigin="anonymous"
    ></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="icon" type="image/png" href="<?= base_url('assets/logo.png') ?>">

  <title><?php echo $title; ?></title>
</head>
<script src="<?= base_url('js/navbar.js') ?>"></script>

<div class="nav-container">
  <nav class="navbar navbar-expand-lg ">
  <div class="navbar collapse navbar-collapse" id="navbarSupportedContent">
    <?php $session = session();
    $username = $session->get('username'); 
    $role_id = $session->get('role_id'); 
     
       
    ?>
    <div>
      <a class="navbar-brand" href="<?= base_url('/') ?>">Melody</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="right-nav">
      <ul class="navbar-nav mr-auto">
        <?php if($role_id != 1) {?>
        <li class="nav-item active">
          <a class="nav-link dropdown-toggle" href="<?= base_url('albums-list') ?>">Albums <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link dropdown-toggle" href="<?= base_url() ?>">Premium <span class="sr-only">(current)</span></a>
        </li>
        <?php }?>
        <li class="nav-item ">
          <a class="nav-link dropdown-toggle" href="<?= base_url('about-us') ?>">About us</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link dropdown-toggle" href="<?= base_url('contact-us') ?>">Contact us</a>
        </li>
        <div class="nav-item ">
          <a class="nav-border" >|</a>
        </div>
        <?php if (session()->has('role_id')) { ?>
          <?php    $usersModel = new UsersModel();

            $dataUser = $usersModel->getUserByUsername($username);

         $profilePic = $dataUser['profile_pic']; 
         $defaultProfilePic = 'uploads/profile_pics/default-profile-pic.png'; ?>
        <div >
            <img src="<?php echo !empty($profilePic) ? base_url('uploads/profile_pics/' . $profilePic) : base_url($defaultProfilePic); ?>" width="30" height="30" class="rounded-circle" />
        </div>
        <li class="nav-item dropdown">
          
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
          </a>
          <?php if ($role_id==1){?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url('admin/profile') ?>">Account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">Log out</a>
          </div>
          <?php } else {?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url('profile') ?>">Account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">Log out</a>
          </div>
          <?php } ?>
        </li>
        <?php } else {?>
        <li class="nav-item ">
          <a class="nav-link dropdown-toggle" href="<?= base_url('signup') ?>">Sign up</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link dropdown-toggle" href="<?= base_url('login') ?>">Login</a>
        </li>
        <?php } ?>
        
      </ul>
    </div>
  </div>
</nav>
</div>
 <?php if (session()->has('alertSuccess')): ?>
    <?= session('alertSuccess') ?>
<?php endif; ?>
   


<?php 
$currentUrl = uri_string();
// Define the pattern for the desired URL structure
$pattern = 'admin/edit-view/';

// Check if the current URL matches the desired pattern
if (strpos($currentUrl, $pattern) !== false) {
    // Extract the username from the URL
    $segments = explode('/', $currentUrl);
    $username = end($segments);

    // Your sidebar code goes here

    // Example: Display the username
    // echo "Username:" . $username;
  
}
  $urlEditView = 'admin/edit-view/' . $username;
    // echo $urlEditView;

if (current_url() === site_url('submit-login') || current_url() === site_url('profile') 
|| current_url() === site_url('edit-profile') || current_url() === site_url('change-password') 
|| current_url() === site_url('saved-payment-cards') || current_url() === site_url('admin/dashboard') 
|| current_url() === site_url('admin/profile') || current_url() === site_url('admin/edit-profile') || current_url() === site_url($urlEditView) 
|| current_url() === site_url('admin/user-list') || current_url() === site_url('admin/verify-membership') 
|| current_url() === site_url('admin/albums-list') || current_url() === site_url('admin/change-password')) : ?>
  <?php if (session()->has('role_id')) { ?>
    <div class="body-back">
    <?php if  (session('role_id') == 2 && current_url() === site_url('profile')){ ?>
      <!-- promotion Banner -->
      <?php if ($sub_id == ""){ ?>   
      <div class="header-layer">
        <div class="header-index-banner banner-promotion">
            <div class="header-index-text">
            <div class="header-text extralarge-bold-text">
                Get 1 months of Premium only at RM14.90 .
            </div>
            <div class="regular-medium-text">
                Just RM14.90/month. Cancel anytime.<br>Pay with your card
            </div>
            <div class="button-container button-text">
                <a href="<?= base_url('plan/checkout/1m') ?>" style="color: #ffffff; text-decoration: none;" >
                <div class="started-button top-button">
                  <div >Get Started</div>
                </div></a>
                <div onclick="scrollToPlan('<?php base_url()?>','#plan-layer')" class="view-button top-button">
                <div>View Plans</div>
                </div>
            </div>
            <div class="term-container small-text">
                 Available for all users.
            </div>
            </div>
            <div class="header-img-container">
            <img class="header-img" src="assets/banner.jpg" />
            </div>
        </div>
      </div>
      <?php } else if ($sub_id == "1" ){?>
      <!-- Premium Individual Banner -->
      <div class="header-layer">
        <div class="header-index-banner banner-individual">
            <div class="header-index-text-banner">
            <div class="header-text-banner banner-bold-text">
                Monthly Premium<br>Melody Pro
            </div>
            <div class="regular-medium-text">
                Your Personal Sound Haven
            </div>
      
        </div>
      </div>
      <?php } else if ($sub_id == "2"){?>

      <!-- Premium Custom Banner -->
      <div class="header-layer">
        <div class="header-index-banner banner-custom">
            <div class="header-index-text-banner">
            <div class="header-text-banner banner-bold-text">
                Yearly Premium<br>Melody Pro
            </div>
            <div class="regular-medium-text">
                Craft Your Personalized Melodic Symphony
            </div>
      
        </div>
      </div>
      <?php }?>
    
    <?php } ?>
    <div class="middle-content" >
    <?php if (session()->get('role_id') == 1 ) { ?>
      <div class="sidebar-container-admin">
        <div class="sidebar-admin" >
           <div class="sidebar-profile">
              <img src="<?php echo !empty($profilePic) ? base_url('uploads/profile_pics/' . $profilePic) : base_url($defaultProfilePic); ?>" width="120" height="120" class="rounded-circle" />
          </div>
          <div class="user-name karla-medium-text"><?php echo $nickname ?></div>
          <div class="sidebar-buttons small-medium-text">
            <div class="sidebar-button" onclick="sidebarButtonAdmin('<?php base_url()?>','dashboard')">
              <div><i class="fa-solid fa-house" style="color: #ffffff;"></i></div>
              <div class="sidebar-button-name">
                Dashboard
              </div>
            </div>
            <div class="sidebar-button" onclick="sidebarButtonAdmin('<?php base_url()?>','profile')">
              <div><i class="fa-solid fa-house" style="color: #ffffff;"></i></div>
              <div class="sidebar-button-name">
                Profile
              </div>
            </div>
            <div class="sidebar-button" onclick="sidebarButtonAdmin('<?php base_url()?>','user-list')">
              <div><i class="fa-solid fa-users" style="color: #ffffff;"></i></div>
              <div class="sidebar-button-name">
                Users
              </div>
            </div>
            <div class="sidebar-button" onclick="sidebarButtonAdmin('<?php base_url()?>','albums-list')">
              <div><i class="fa-solid fa-money-check" style="color: #ffffff;"></i></div>
              <div class="sidebar-button-name">
                Albums List
              </div>
              <!-- <div class="membership-notify">3</div> -->
            </div>
            <div class="sidebar-button" onclick="sidebarButtonAdmin('<?php base_url()?>','edit-profile')">
              <div><i class="fa-solid fa-user-pen" style="color: #ffffff;"></i></div>
              <div class="sidebar-button-name">
                Edit Profile
              </div>
            </div>
            <div class="sidebar-button" onclick="sidebarButtonAdmin('<?php base_url()?>','change-password')">
              <div><i class="fa-solid fa-lock"></i></div>
              <div class="sidebar-button-name">
                Change Password
              </div>
            </div>
          </div>
      </div>
    <?php } else { ?>
      
         
      <div class="sidebar-container">
        <div class="sidebar" >
          <div class="sidebar-profile">
              <img src="<?php echo !empty($profilePic) ? base_url('uploads/profile_pics/' . $profilePic) : base_url($defaultProfilePic); ?>" width="120" height="120" class="rounded-circle" />
          </div>
          <div class="user-name karla-medium-text"><?php echo $nickname ?></div>
            <div class="sidebar-buttons">
            <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','profile')">
              <div class="icon-div" ><i class="fa-solid fa-house" style="color: #ffffff;"></i></div>
              <div class="sidebar-button-name">
                Profile
              </div>
            </div>
            <!-- <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','edit-profile')">
              <div class="icon-div" ><i class="fa-solid fa-id-card-clip"></i></div>
              <div class="sidebar-button-name">
                Available Plans
              </div>
            </div> -->
            <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','edit-profile')">
              <div class="icon-div" ><i class="fa-solid fa-user-pen" style="color: #ffffff;"></i></div>
              <div class="sidebar-button-name">
                Edit Profile
              </div>
            </div>
            <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','change-password')">
              <div class="icon-div" ><i class="fa-solid fa-lock"></i></div>
              <div class="sidebar-button-name">
                Change password
              </div>
            </div>
            <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','saved-payment-cards')">
              <div class="icon-div" ><i class="fa-solid fa-credit-card"></i></div>
              <div class="sidebar-button-name">
                Saved payment cards
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
  <?php } ?>
<?php endif; ?>




