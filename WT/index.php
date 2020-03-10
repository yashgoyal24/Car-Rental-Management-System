<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/header_file.css">
    <link rel="stylesheet" href="css/homepage.css">
</head>
<body onclick="checkclick(event)">
    <nav>
        <img id="logo_img" src="images/logo.png" alt="Car Rental Management System" width="200" height="50">
        <ul id="navbar_list">
            <li><a href="index.php" id="navbar_links">Home</a></li>
            <li><a href="cars_view.php" id="navbar_links">Rent Car</a></li>
            <li><a href="#about" id="navbar_links">About</a></li>
            <li><a href="#about" id="navbar_links">Contact Us</a></li>
            <li><a href="user_profile.php" id="navbar_links">Profile</a></li>
            <?php
                if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                    echo '<li><a href="logout.php" id="navbar_links">Logout</a></li>';
                }else{
                    echo '<li><a href="login.php" id="navbar_links">LogIn</a></li>';
                    echo '<li><a href="upload_borrower_details.php" id="navbar_links">SignUp</a></li>';
                }
            ?>
        </ul>
    </nav>

    <div id="booking">
      <div id="book_car">
        <form action="" method="post">
          <button type="button" class="buttons"><a href="./login.php">Sign in</a></button>
          <button type="button" class="buttons"><a href="./upload_borrower_details.php">Sign up</a></button>
          <p>Dont have an account? Create one here</p>
        </form>
      </div>
      <div id="rdiv">
        <div style="padding-left:150px;">
          <h1>Book a Car</h1>
          <p>Select from a wide variety of available cars</p>
          <p>OR</p>
          <p>Put your car up for rent</p>
        </div>
      </div>
    </div>
    <div class="main_content">
      <div>
        <h1>Services We Provide</h1>
        <div class="service">
          <h3>Service 1</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="service">
          <h3>Service 1</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="service">
          <h3>Service 1</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="service">
          <h3>Service 1</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
      </div>
    </div>
    <footer>
        <div class="visit_links_div">
            <h4 id="visit_links_header">Visit us on:</h3>
            <ul id="visit_links_list">
                <li><a href="#" class="visit_links">Facebook</a></li>
                <li><a href="#" class="visit_links">Instagram</a></li>
                <li><a href="#" class="visit_links">Twitter</a></li>
                <li><a href="#" class="visit_links">Youtube</a></li>
                <li><a href="#" class="visit_links">Tumblr</a></li>
            </ul>
        </div>
        <p id="about" class="footer_center_text"><sup>&copy;</sup>Car Rental Management System</p>
    </footer>
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/homepage.js" charset="utf-8"></script>
    <script src="js/clickable.js" charset="utf-8"></script>
  </body>
</html>
