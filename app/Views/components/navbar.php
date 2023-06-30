
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
<script src="js/navbar.js"></script>

<div class="nav-container">
  <nav class="navbar navbar-expand-lg ">
  <div class="navbar collapse navbar-collapse" id="navbarSupportedContent">
    <?php $session = session();
    $username = $session->get('username'); 
     
    ?>
    <div>
      <a class="navbar-brand" href="<?= base_url('/') ?>">Melody</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="right-nav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link dropdown-toggle" href="<?= base_url() ?>">Premium <span class="sr-only">(current)</span></a>
        </li>
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
        <div>
          <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFRgVFRUYGBgYGhgYGBgYGBgYGBgYGBoaGRgZGBgcIS4lHCErIRgYJjgmKy8xNTU1GiQ7QDszPy40NTEBDAwMEA8QHhISHzEkISQ0NDQ0NDQ0NDQxNDQ0NDQ0NDQ0NDQ0NDQ0NDQ0NDE0NDQxNDQ0NDQ0NDQ0NDQ0NDQ0NP/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAAAQIFBAYHAwj/xABBEAABAwEFBAgFAQYDCQAAAAABAAIRAwQSITFBBQZRYSIycYGRobHwE0JSwdGCBxQjcuHxFiRiFTRTc5KTosLS/8QAGAEBAAMBAAAAAAAAAAAAAAAAAAECAwT/xAAkEQEAAwACAgEDBQAAAAAAAAAAAQIRAyExQRITUWEiMkJxsf/aAAwDAQACEQMRAD8A3FCE1CCQmhAkJpIEUlJJVCSTKEAhAQUSRSQCi8gSRXm+0AGFJ9ZoiSMcufDv5JqcNCYKEQSEIIQCSaECKgplBQQRCZSQJJNIoCShJCDPQhCsgIhCFUCRTQgSRTQgSChEoklj2t7g2RdEZSXegGPYV42ms8m6zvd5d/l2rStt2xjSZr1HvyhrwA39LctNZUavFdbId4qYwdg7QO6IMfS7I5Lzr7xBrZ+G14iZZUa4RoSCB5dy57atovILXEnLrFznSOZPl5rENWRi6MiRphqY+6Yn4w3S07whxaT0QA9rg0m8wkCGvaQDmBocCqy1bcc6WAiCZadJAkiDgMSfFa+LW++HNi8MAXehLp8ypOBe+HNuOOYHVPNsE46xJGCYtDeNhbyuc4NqPJbAb8shxIAzEuHOVt1N4IkGZ4eS4m55aXNOc4EHA8CCtz3Y3sgNpVTBkAPicOY8FKlob2heNnrteJa4Hs8sPeq9oRQAIKChAkFNIhBBEKSigClCZSQKEJShBnoQhEBCEICEIQgEk0IlFQqPAaSSABqcl6OWl75bV+G9lJpN7rvcDF0DEC6OI8UlNY2XjvhtY3TSpEhohr3AkXjq2eAGJ0JOsFa8x9FlJpqMffOLXdGBzun7YpWi0fEAc4sGkTeeccJGuXovWw7DqWioGMF52BdJktbOb8egMNceCpP5bVjPCpfddAZIPCIPjrgsMMN8A4NmLzhgOeGa61Y9wqTACXEv4jAZQcNV7f4HozN9xOeMHHlgq/UiF/hMuWPspdJYCGNwl2Ex+c+Cxn0iyIdORwMt8vsun7S3OLRLC5/J0HtgYD0Wu2nYbx0SwxjjBEcVMckSieOWmVqgdngcz98VC8QQfVWdusABg4ROMZd4/Cw/gkSRJAGXPQGVpEs5hZ2PbNRgBDyW8MyOY54rfthbwsrU7xPSaBfA6w0vXdVygOIGHFZlgt76L21KZAeJmZIcNR6HuU4rPbtLKgcJBBTWmbqbcLw1hmWuiDEFjjDWgjquAOGjrui3QqFZgihEIRBFJSKiUCKipFRQJCaEGahCaIJCEIAoQhAJJpFEoVagaJPLzwz0XJ99q9R9pfJENAaGtmARjhJk8OcLpm261yz1HXS7oHoiZM4YQCddAuU2SXuL33nkDhgHHDvKL1hkWGydFsAl7oDGCL0nAF0ZCTAE68oXXt29iss1EMaOmYL3fU/XHgMQFpu4Vgv1HVXiSwSJx6TsAeE+kBdNYxYXnZx0VjIIMR8JZLWpwqxUmzBfTVfa7I1/WHfkrlzVhVRCraMXrbWl7Y2E1wJEnvxhaNbNnlj7mQxjAjxEwF1u2NWnbbsN/IZckpeYnF7Vi0NBqWa7rHh5LDMAzEEaxOP5/Cu9rWa67uVNaImDjqTiD3wuqs65LVxlbJ2kaLy9rA4GDBJbiMQZHDn5FdZ2PtFtopMqNwvhxu6gtN1w7sPELiZefDTSOC2DdLaNRlegxpNw1pIjO8wscB2iJGXRHBSzl1pBQPfJBRUklIqJQIpIQgSEpQgziiUFEIgIQUBAIQUIBJNCJV227CK1IsLnNkthzCQ4GZwII71ze20vgvNJmIzJBJk5QTmYgzxnhn1gjLl6rku03E1HOdmHkGOJJJHqolpR0PcGlFJzjm53Z5aLd2rS9wG/5a/9Tz5YHzW7BwAkkDtwXP8AylvPUPQIKxau06LDD3taeBOhwXrStLX9Vw5jUe4V4xn2bxgsKuwqwfC8aoCraq9bKO0tKqbSwajRX9qAIMaZxjhx98VQ7Sc2DiNcJ05LKat62c93lMvI4LXKzJz4iVsG2z0yqWu2W8578oC6qeIc9+5lWPpwcdcj9lsO5lRotDCT0mhzmAgnpFpYDwEXpnsVdQc0G7UbLSAQZcCOwj7g6LIszad8RkSBeBkhupEjAxyWmscdkY4RAIMYHGcY1/Caq9hWqm9gbSYGMZ0WjU3cCYz/AFHMq0UKBIppFAlFSUUCQndKEGYhCEQEIRKAQhCAQUk0SRK5ZvJYPhVQw9ZzA88Ok+oIHGAB4ldTWrb77Oa5ja4kPYWNLh9MuIw1xJ8SkrUntmbk2v4ez2PguLXvAaAcSXYAxjqFZ/7KtNo6ZqXHHHEEgTkA3QDhhzRuLZbtjp45uqPJ4y8/gLJtW1qjq7bPRhsxeqvm60YzAkXnZQ0EaknQ8/XydPedelYzcmo1959VjwTJBDmukiHEOxz4ZK+sOz7hzN6AJxmBz8PBahbDbXWoUnPrFkvDnFrAyLwDLrmiT0cTMROZW2bGvgEOffAMNdDsQDAm9r3lLdSRMzVduwhaHvHWqPqOY155NZ1j3BbntSvdYXcAfRco2TtGp+8vIvOc8mA0NLzBybewwGJJyAyOSif8TSOtZdm3X2jUN4EUxkC6o8HkLomErfura2MB+O17hJjpYT9JMR3q92+ysyzl1OpUvm9LGEl7QWmJfUxPSgEtDQAcsitO/f7axge6o90yXsquBEjEwT0szGvktMnPSu952pre9967UbdeNRiCquq+Cti2nVNcNeBmJnWc4K161U4KvWVbQx7S6TPP1gn1WZsukajwyLxMwJiY4kZDPKexV9R/3jvVturTc610GtGN5ztSIDHTejT8hWZOobB2cKFO7IL3dJ5AgToGt0aBACs150GQMQB2L0RQJJlIhAkiVJRKCMoQhBmoQhEBCEkDSQhAIKEBEhedp2f+8MdSmL0Z8jPrC9Fk2F3TzjDzBB/Krb9q1Jy0J7s0rlnpsObWwe2Te81YCzDQDnOK87MxrHOaOreJH6iXHzJWaFjEa6JnGO+xtIxAwmMAM81B1EN6ojsWWV5PwMd6TBWZV22Ooew+i5PZHn4rXAYsfeGmU/aV1jbw/hOicjkuSOPw60kdGRJ4BxzSI7ltE/ph1SiWVKYjEOGIdiQVU7R2S2p1ojlh48Vn7OpQ1sHNqyrRgJWep8NPq7OaxjwQBA6PGFzrazZvRxPquh7z2sNY7Hh6wueVXSStuLfLLk+yup0pz8FuP7OKLfjViR0m023TwvP6UdsBajXEOEZn8rff2dUMK9Ti5jPAFx9QtmFoyrdEIQjIJSmkgIUCpFQKCMITQgzkJIRAQiUSiQhCCgEISQNelkMPbPGPEQvJEpMbCYnJ1dPEP/mAPeMCsumVWUrXfc0EQQDjOasqawzJdG7CbisK3WoUxeLXuxAhjS52OoaMT3LLcVjVXT3JMpiFZt7bVCmx994Ba0m6TDsuByXHKm0hWvvOWUQYxyAnrZrs1usjHy17Q4XYxAJA0xK0SpsWix2DACHSZ4e9VEWj20rHWQ2XcW0PfZGXwbzZbJzIGSsLa+AUtjVWNbDcoWPtypDHRnBI7YwxVJnVvbn+8leXub3rVnHFW+1akueTx/usLZdm+LXp08w+oxp0lsy/HTogrekZDG89sMUwe0xBzM5QPLxXVt3tm/u1nZTPXxc/k92JHcIb3LE2bulZ6NT4jS95abzGvLS1h+U4NBeRoXZZ5q9JWmMLW3qAhCEUCSaRQIqDlMqBKCKE5QgzEIQiAhCAiQhCUoGhCSAKEIQetmfDh4eKvWHBa6rmyVpaDyWd471rxz1j0rVQ0FzjAGZOEAc1WVdsU2xca6q4gEBjS4AHIl2XdmrOpTa49ITlhmD2p12A4wCQs21c3tr9r268NcW2ao5wGAu+gmFqG0du4uFSi9hIBEtw5dUk4LerZUeMAxvby0Wu7R2c+ocGho+rXnpKjY3ttGZ10xt2LZ8S81l6WxhdcI4GTz4K32y0imS7DA8dPysrZTBSa1g0mScSSq7fO3D4LgDBjifDBR1M9K7MS5vtN4JOPKeJWVucP85Tn/We+45VNpqT70Vrucf85T/WP/By6Ic9p3XTEIKArMDSQiUAUkSkUCJUCplQKBQhLxQgzkIQiAiUJIBCaESEkJoAoSKSBr2ste6YOR8ivGUiotGxiazk6vBU8l6MMjiqOpaTRILsWOyP0/6XfY8FYUrW0tkGZxwPosHTj2fTae3TOFX1xd0wWYbUI/t4FVO1bV0MPPHXkqyvWWBXtQBceE8h4nhgtF2/tj4mAOXmlt/axvFjTjOMHDHhyWuknM/3WlKZ3Kt7eoE6q33VddtVE8Xx/wBTXD7qnZismi5zCHNJa4EFrmmCCMiOYWrOY6dgRK43U3t2gx0G1PkHg3HgcW4q42BvvaBUZ+8va+k4hrnFjWvaMr4c0CQDiZGIlWxg6YUkEIUASKCVFAFRcpFQKBShKU0GahJNEAppIQOUJIRJoKSSBlJEoQCAEKm3stRp2Z8TLzc7iCXeTSO9TEbOC/2baqdpo3mOD2EvZIyJYS0+Y8COKqrRsB56dCq5h+mTdJ7Jw8FTfsjtRNGvSJ6tUPHZUY2e6WLemvuPg9U/dc9oy0w6aztWk2qzbQYDN1wykcFrm1LZajg+RAjAcoXXbYG3Z8OYWpbSsYeTlHiT369ijcXjtzB7OIMnFIWV7tPLBb5/sNpMBvfl4/hXll3cYG5dpP2VvqHw+7mtn2a6cj4KdtstxpK6Q/ZDG4Ad61De59OmPhjF7h1cobxcfsppM3tkItFa11pNei10OOmXMcOxeNV0achHop1auJ8hw5IuEgHmuyK5GQ45nZ11Pcq2/FslOTLqc0nceh1J/QWq+XLdzdqmz2gMOLK5ax4+lxcAx47CYPJx4LqREYFZWjJSjKCUFJVCKgVIqJQCEkIM5CJSRCSEkIBJNJEhJOEIBCRSe8NBc4gNGJJMADmTkgapN72TZp0FRk9hvNPb1libV3vps6NAfEd9RkMHPi7yHNaha7fUrPv1HlzpgD5Wz9AGWS2pxzuyrNlp+zC2BlrfScevThon5qTpjmbrj4LrFVgIBXAnWwMqstNMy5lSZEw4YA9uefNdy2DtNlqoMqMycMR9LtR3Fc3NXLOmluhaKFSLoeLvfMduq8RYRGV73xVvTcRgfFRrmcFjjSJlV2eyi/JgxkBkO3irb4eHvAfZYlauygx9Wq4NYxpc4mIAHqTkOZXKt6986tpmmP4dIy34YMlw41XDrdgwzzzWvHxTb+md+T4tg3p3zYy9SsxDn5OrYOYw8GD5iPq6o0k5cztdZz5LiXOJvFxJJJOMknNRe+8eWvpj74Lyd0ieA8SuutK0jIc9rzadkUmF5ByHvgvT4l/BmQzcfsOK8b89BmPE6AanBZTWBogE3RmdScz6K8Il4GneN0ZZknUAxn3rYNn7w2mzm6Hl7PofLwOTXdZvcYVTQZhJ+aOUAZBetYaccPHDuU/CJjtG9t92XvhQqwHzSdl0jLCf9Lxl+oDtWw6A5g5HQ8wclx34cNnMAQI7cis7Zu1a9mP8N8DVh6bD+n8QVlbi+yYs6mVAqg2VvbRqw2pFJ5wxMscTwfGHY7xV+5ZTWY8rBCU+4SUDPlBKiUIg5TlJJBJCjKJRKSjUeGgucQ1ozJIAHeVU7b2/Ts3R69Q5MBynIvPyjlmVoO0dpVbQ69VeSPlYMGN7G5d+a1rxzbv0rNsbjtDe+kyRRaarsr2LGDvOJ7h3rTtpbTq2h01XkicGDBjeQb9zJ5rE7PVLwW9aVr4Vm0yI81MmRyGUapA/0SBHscf7K6rGdQusDR9T88jN0nyW2/sr2saVZ9meei/Fn8wyjtHotYdB99wK8rNfp1GVGTeYQZ46wPPDNc3Nx7HTbjt2+iYQ5q8NlWgVaTHt+ZrThzCzGtxB5rix0OO/tZ3hv1BZGO6FJ01Bo6pGR43ZjtvcFoReTEk9VsxiTGGH5VrvZsmrRtNYVzBNR72kSb7XuLmvaT8sHnjKwLOAGA4TjnpOLZ96jgu2kZGOa072C6QAAIGQGXecyvGXONxg7TkB2lZNOm5+t0HXJzuIH0jmvakwEQwEMxkjNx1g+MnwWmajXnZ6IaIaf53ZEu4N94dq9XU5huQAkjgF6MI0gBuUD0hAdnxPvBXiIU0z796qJOKkDioNGPvwVgqM9IcHT4hSe0a5a/180MbiecYpv7PfaoHmWETOvDKFZ7J23Ws/Ra6+wZ03dXH6Tmw9mHJYDRgME3N98e5VmsSnW0/44b/wHf8AcH/whan8IfT5n8IVfpwa7MkknC5VwhNJA1qm9G33seaNFwaQOm8YuBPyMOQMYk54q/2pbBRpPqH5R0ebzg0eJC5fVeXEucSSSS48STie9bcVdnZVtZEDM8cSTmScyTqhHciV1KCO9Jo9/lEFMD+6ED3CUT/ZNx4Dz99qHH2PuoEKjZ7VjtYbxPSMCZ0deOLY1gDD+qy50P8AVRHh7zSY1Ots3E3oNnc2k938F5zPyE6tPDHVdXtNvp06Tqz3AMY0vc7SOXGch2r57a2CR3gdv2n1Ke2N4q1WgyxBxLGuvOGZe7Ata46hvr2Ll5OH9Wx4ltHJtcny897t4H7QtBfHREtps0ayQQPKSdSTpCxmWURdOZgju4D9UY4J2ekGC6wX3kYn5WjmdFkMoho1JMFzj8x+wGgC1rVnNnhQYTebOEi8RIH8ox7z4L1qPnojAZcPcJv6Ihvhlnmo0malXiPSPy9CTEeCThIjDJM5gofiI4mVKCbpI9+/VJmff5KXJSns80CIGaT3Yd3uFCodE82wgbRhwn7/AHSJk8s1JxIUajgBPuUErx9gIWNffwKFBku1hCELjaAoGSEKBru/P+7t/wCaz/2Wh8O/0QhdXF4Ut5Nv2CLRl75IQtlYLUe+CY/KEJIOPvgirl4IQgG5lSHW7kIRDz+ZvZ9wqawdfvPqUkLO/peqz2fr/P8AhZDskIVo8Iny8ndfxXq37j0QhISTcwotzHvVCEVTb9ivI5oQiXm7reK9X/j1KaECPW98V4Wzrs7UISfBDIQhCql//9k=" width="30" height="30" class="rounded-circle"/>
      

        </div>
        <li class="nav-item dropdown">
          
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url('profile') ?>">Account</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">Log out</a>
          </div>
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

   


<?php if (current_url() === site_url('submit-login') || current_url() === site_url('profile') 
|| current_url() === site_url('edit-profile') || current_url() === site_url('change-password') 
|| current_url() === site_url('saved-payment-cards')) : ?>
  <?php if (session()->has('role_id')) { ?>
    <div class="body-back">
    <?php if  (session('role_id') == 2 && current_url() === site_url('profile')){ ?>
      <!-- promotion Banner -->
    <!-- <div class="header-layer">
      <div class="header-index-banner banner-promotion">
          <div class="header-index-text">
          <div class="header-text extralarge-bold-text">
              Get 2 months of Premium only at RM15.90 for first time user.
          </div>
          <div class="regular-medium-text">
              Just RM15.90/month after. Cancel anytime
          </div>
          <div class="button-container button-text">
              <div class="started-button top-button">
              <div>Get Started</div>
              </div>
              <div onclick="scrollToPlan('<?php base_url()?>','#plan-layer')" class="view-button top-button">
              <div>View Plans</div>
              </div>
          </div>
          <div class="term-container small-text">
              Offer not available for users who have already tried Premium.
          </div>
          </div>
          <div class="header-img-container">
          <img class="header-img" src="assets/banner.jpg" />
          </div>
      </div>
    </div> -->

    <!-- Premium Individual Banner -->
    <div class="header-layer">
      <div class="header-index-banner banner-individual">
          <div class="header-index-text-banner">
          <div class="header-text-banner banner-bold-text">
              Premium Individual<br>Only for you
          </div>
          <div class="regular-medium-text">
              Your Personal Sound Haven
          </div>
     
      </div>
    </div>

    <!-- Premium Custom Banner -->
    <!-- <div class="header-layer">
      <div class="header-index-banner banner-custom">
          <div class="header-index-text-banner">
          <div class="header-text-banner banner-bold-text">
              Premium Custom<br>Melody Pro
          </div>
          <div class="regular-medium-text">
              Craft Your Personalized Melodic Symphony
          </div>
     
      </div>
    </div> -->
    
    <?php } ?>
    <div class="middle-content" >
    <div class="sidebar-container">
      
      <div class="sidebar" >
        <div class="sidebar-profile">
        <img src="data:image/jpeg;base64,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" width="120" height="120" class="rounded-circle"/>
              
        </div>
        <div class="user-name karla-medium-text"><?php echo $nickname ?></div>

        <!-- Admin sidebar -->
        <?php if (session()->get('role_id') == 1) : ?>
        <div class="sidebar-buttons small-medium-text">
          <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','dashboard')">
            <div><i class="fa-solid fa-house" style="color: #ffffff;"></i></div>
            <div class="sidebar-button-name">
              Dashboard
            </div>
          </div>
          <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','user-list')">
            <div><i class="fa-solid fa-users" style="color: #ffffff;"></i></div>
            <div class="sidebar-button-name">
              Users
            </div>
          </div>
          <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','verify-membership')">
            <div><i class="fa-solid fa-money-check" style="color: #ffffff;"></i></div>
            <div class="sidebar-button-name">
              Membership Payment
            </div>
            <div class="membership-notify">3</div>
          </div>
          <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','edit-profile')">
            <div><i class="fa-solid fa-user-pen" style="color: #ffffff;"></i></div>
            <div class="sidebar-button-name">
              Edit Profile
            </div>
          </div>
        </div>
          
        <!-- User sidebar -->
        <?php else: ?>
          <div class="sidebar-buttons">
          <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','profile')">
            <div class="icon-div" ><i class="fa-solid fa-house" style="color: #ffffff;"></i></div>
            <div class="sidebar-button-name">
              Profile
            </div>
          </div>
          <div class="sidebar-button" onclick="sidebarButton('<?php base_url()?>','edit-profile')">
            <div class="icon-div" ><i class="fa-solid fa-id-card-clip"></i></div>
            <div class="sidebar-button-name">
              Available Plans
            </div>
          </div>
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
        <?php endif; ?>
      </div>
  <?php } ?>
<?php endif; ?>




