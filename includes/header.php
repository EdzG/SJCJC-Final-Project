<?php
  session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-License!</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Lobster&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Lobster&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Roboto:ital,wght@0,300;1,400&display=swap" rel="stylesheet"> 

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        

  <!-- Personal Style sheet -->
<link rel="stylesheet" href="styles.css">
<!-- Personal js file -->
<script src = "script.js"></script>
<!-- Js file needed for QRCode -->
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    
</head>
<body class="is-preload">

<nav class="navbar navbar-expand-md navbar-light" style="background-color: #1073E5">
  <div class="container-fluid">
    <a class="navbar-brand fs-3 mx-0" href="index.php"> <img src="images/logo/E-LicenseLogoBackgroundRemoved.png" alt="E-License logo" width="60" height="60" class="site-logo">E-License</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse fs-4" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link <?php if($page == 'home'){ echo 'active';} ?>" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if($page == 'about'){ echo 'active';} ?>" href="about.php">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if($page == 'contact'){ echo 'active';} ?>" href="contact.php">Contact Us</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php 
              if($page == 'country'){ echo 'active';}
              else if($page == 'travel'){ echo 'Travel';}
              else if($page == 'browse'){ echo 'Browse';} 
              else if($page == 'upload'){ echo 'Upload';}
              else { echo "Services"; }

              ?>
          </a>
          <ul class="dropdown-menu fs-5" style="background-color: #AFD4EB;" aria-labelledby="navbarDropdown">
          <?php 
           if (isset($_SESSION["userId"])){

            echo '<li><a class="dropdown-item" href="issue_ticket.php">Renew Driver License</a></li>';
            echo '<li><a class="dropdown-item" href="renew_car.php">Renew Car License</a></li>';
            echo '<li><a class="dropdown-item" href="pay_ticket.php">Pay Ticket</a></li>';
            echo '<li><a class="dropdown-item" href="qrCodeScan.php">QR Code</a></li>';
           } else if (isset($_SESSION["admin"])) {
            echo '<li><a class="dropdown-item" href="signup.php">Create Account</a></li>';
            echo '<li><a class="dropdown-item" href="signup.php#CarAdd.php">Add Car License</a></li>';
           } else if (isset($_SESSION["police"])) {
            echo '<li><a class="dropdown-item" href="issue_ticket.php">Issue Ticket</a></li>';
           }
           else {
            echo '<li><a class="dropdown-item disabled" href="#" style="color: #000;">Please Log In</a></li>';
           }
           ?>
            
          </ul>
        </li>

        <li class="nav-item">
          <a class='nav-link disabled' style="color: #000;" href=""><?php
          if (isset($_SESSION["userId"])){
            echo 'User';
          } else if (isset($_SESSION["admin"])) {
            echo 'Admin';
          } else if (isset($_SESSION["police"])){
            echo 'Police';
          }

          ?></a>
        </li>

      </ul>
      <?php 
        if (isset($_SESSION["userId"]) || isset($_SESSION["admin"]) || isset($_SESSION["police"])) {
          echo "<a class='btn btn-light px-2 mx-2 fs-5' href='includes/logout-action.php' role='button'>Log Out</a>";
        } 
      ?>

      
    </div>
  </div>
</nav>