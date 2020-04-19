<?php
session_start();
if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password']) && isset($_POST['bor_age']) && isset($_POST['bor_contact']))
  {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $bor_age = $_POST['bor_age'];
    $bor_contact = $_POST['bor_contact'];

    if (!empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['user_password'])&& !empty($_POST['bor_age'])&& !empty($_POST['bor_contact'])) {
        $link=mysqli_connect('localhost', 'test', '', 'carrental');
        if(mysqli_connect_errno()){
            //echo mysqli_connect_error();
            echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
        }


 $ins_query = "INSERT INTO user_details(name,emailid,password,age,contact)
        VALUES('".$user_name. "', '" .$user_email. "', '" .$user_password. "', '" .$bor_age. "', '" .$bor_contact. "')";

        if (!mysqli_query($link, $ins_query)) {
            echo '<script type="text/javascript">alert("Insert Error");</script>';
        }else{
            echo '<script type="text/javascript">alert("Your details have been successfully uploaded");</script>';
        }

        mysqli_close($link);
    }else {
        echo '<script type="text/javascript">alert("Please check the details you entered and try again");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Upload Borrower Details</title>
        <link rel="stylesheet" href="css/header_file.css">
        <link rel="stylesheet" href="css/upload_borrower_details.css">
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

        <div class="main_content">
            <h2>Upload your details here</h2>
            <hr>
            <form action="upload_borrower_details.php" method="post" id="bor_details_form">
                <div class="form_entry">
                    <label >Name: </label>
                    <input type="text" class="common_input_class" name="user_name" placeholder="Enter your name" size="100" maxlength="100">
                </div>
                <div class="form_entry">
                    <label for="bor_age_id">Age: </label>
                    <input type="number" class="common_input_class" id="bor_age_id" name="bor_age" placeholder="Enter your age" min="1">
                </div>
                <div class="form_entry">
                    Gender:
                    <div class="common_input_class radio_class">
                        <input type="radio" name="bor_gender" value="Male" id="male_id"><label for="male_id">Male</label>
                        <input type="radio" name="bor_gender" value="Female" id="female_id"><label for="female_id">Female</label>
                        <input type="radio" name="bor_gender" value="Other" id="other_id"><label for="other_id">Other</label>
                    </div>
                </div>
                <div class="form_entry">
                    Can Drive?:
                    <div class="common_input_class radio_class">
                        <input type="radio" name="candrive" value="Male" id="yes_id"><label for="yes_id">Yes</label>
                        <input type="radio" name="candrive" value="Female" id="no_id"><label for="no_id">No</label>
                    </div>
                    <br><span class="bracket_text">(Select YES if you don't need a driver)</span>
                </div>
                 <div class="form_entry">
                    <label>EMAIL: </label>
                    <input type="text" class="common_input_class" name="user_email" placeholder="Enter your email" size="100" maxlength="100">
                </div>
                 <div class="form_entry">
                    <label>Password: </label>
                    <input type="password" class="common_input_class" name="user_password" placeholder="Enter your password" size="100" maxlength="100">
                </div>
                <div class="form_entry">
                   <label>Contact: </label>
                   <input type="text" class="common_input_class" name="bor_contact" placeholder="Enter your contact information" size="100" maxlength="100">
               </div>
                <div class="form_entry">
                    <fieldset>
                        <legend>Select images to upload</legend>
                        User Image: <input type="file" name="user_img"><br><br>
                        Aadhaar Card: <input type="file" name="aadhaar_img"><br><br>
                        Pan Card: <input type="file" name="pan_img"><br><br>
                        License: <input type="file" name="license_img"><br><span class="bracket_text">(Optional)</span><br><br>
                    </fieldset>
                </div>
                <div class="form_entry">
                    <input type="submit" value="Submit" style="width:70px;">
                </div>
            </form>
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
    </body>
</html>
