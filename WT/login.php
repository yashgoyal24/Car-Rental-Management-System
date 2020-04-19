<?php
session_start();
if(isset($_POST['emailid']) && isset($_POST['password'])){
  if(!empty($_POST['emailid']) && !empty($_POST['password'])){
    $emailid=$_POST['emailid'];
    $password=$_POST['password'];
    $link = mysqli_connect('localhost', 'test', '', 'carrental');
    if(mysqli_connect_errno()){
      //echo mysqli_connect_error();
      echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
    }
    $query = "SELECT id FROM user_details WHERE emailid='$emailid' AND password='$password'";
    if ($res=mysqli_query($link, $query)) {
      if (mysqli_num_rows($res)==1) {
        $res_arr=mysqli_fetch_assoc($res);
        $_SESSION['id'] = $res_arr['id'];
        echo '<script type="text/javascript">alert("Logged in successfully");</script>';
        header('Location: index.php');
      }else{
        echo '<script type="text/javascript">alert("Check your credentials and try again");</script>';
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" href="css/header_file.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
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
          <label for="emailid">E-Mail ID : </label>
          <input type="text" name="emailid" id="emailid" placeholder="Enter email_id">
          <label for="password">Password : </label>
          <input type="text" name="password" id="password" placeholder="Enter password">
          <p class="full">
            Register here: <a href="upload_borrower_details.php">Sign Up</a>
          </p>
          <input type="submit" value="Login" class="buts">
        </form>
      </div>
      <div id="rdiv">
          <h1>Log In to book or lend a car</h1>
      </div>
    </div>

    <footer style="margin-top:0;">
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
  </body>
</html>
