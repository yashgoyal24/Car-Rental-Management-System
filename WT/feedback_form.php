<?php
session_start();
$link=mysqli_connect('localhost', 'test', '', 'carrental');
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
}

if (isset($_POST['feedback']) && isset($_POST['ratings']) && isset($_POST['kms_driven']) && isset($_POST['car_id'])) {
    $fb=$_POST['feedback'];
    $ratings=$_POST['ratings'];
    $kms_driven=$_POST['kms_driven'];
    $car_id=$_POST['car_id'];

    $query = "UPDATE car_history SET feedback='$fb', ratings=4, kms_driven=$kms_driven WHERE car_id=$car_id";

    if ($res=mysqli_query($link, $query)) {
        echo 'Details uploaded successfully';
    }else{
        echo 'Entry for car_id: '.$car_id.' not found<br>';
    }
    echo mysqli_error($link);
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Feedback</title>
        <link rel="stylesheet" href="css/upload_car_details.css">
        <link rel="stylesheet" href="css/header_file.css">
        <link rel="stylesheet" href="css/feedback_form.css">
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
            <h2>Upload Feedback Details here</h2>
            <hr>
            <form action="feedback_form.php" method="post" >
                <div class="form_entry">
                    <label >Car ID: </label>
                    <input type="text" class="common_input_class" name="car_id" placeholder="Enter Car ID" size="100" maxlength="100">
                </div>

                <div class="form_entry">
                    <label >Feedback: </label>
                    <input type="text" class="common_input_class" name="feedback" placeholder="Enter Feedback" size="100" maxlength="100">
                </div>


                 <div class="form_entry">
                    <label>Ratings: </label>
                    <input type="text" class="common_input_class" name="ratings" placeholder="Enter Rating out of 10" size="100" maxlength="100">
                </div>
                 <div class="form_entry">
                    <label>Kilometres Diven: </label>
                    <input type="number" class="common_input_class" name="kms_driven" placeholder="Enter Kilometres Diven" size="100" maxlength="100">
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
