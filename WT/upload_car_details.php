<?php
session_start();
echo $sess_id=$_SESSION['id'];

if (isset($_POST['car_name']) && isset($_POST['car_type']) && isset($_POST['car_age']) && isset($_POST['car_period']) && isset($_POST['car_cost']) && isset($_POST['car_seats']) && isset($_POST['car_gearbox'])) {
    $car_name = $_POST['car_name'];
    $car_type = $_POST['car_type'];
    $car_age = $_POST['car_age'];
    $car_period = $_POST['car_period'];
    $car_cost = $_POST['car_cost'];
    $car_seats = $_POST['car_seats'];
    $car_gearbox = $_POST['car_gearbox'];
    $car_location = $_POST['car_location'];
    if (!empty($_POST['car_name']) && !empty($_POST['car_type']) && !empty($_POST['car_age']) && !empty($_POST['car_period']) && !empty($_POST['car_cost']) && !empty($_POST['car_seats']) && !empty($_POST['car_gearbox'])) {
        $link=mysqli_connect('localhost', 'test', '', 'carrental');
        if(mysqli_connect_errno()){
            //echo mysqli_connect_error();
            echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
        }

        $check_table = mysqli_query($link,"SELECT table_name FROM information_schema.tables WHERE table_schema = 'carrental' AND table_name = 'car_details'");
        if(mysqli_num_rows($check_table)>0){
            mysqli_free_result($check_table);
        }else{
            $query = "CREATE TABLE car_details (
                car_id int(11) NOT NULL AUTO_INCREMENT,
                owner_id int(11) NOT NULL,
                name varchar(100) NOT NULL,
                type varchar(20) NOT NULL,
                age int(11) NOT NULL,
                period int(11) NOT NULL,
                cost int(11) NOT NULL,
                seats int(11) NOT NULL,
                gearbox varchar(10) NOT NULL,
                location varchar(100) NOT NULL,
                status int(11) DEFAULT 0 NOT NULL,
                PRIMARY KEY (id)
            )";

        }

        $ins_query = "INSERT INTO car_details (owner_id,name,type,age,period,cost,seats,gearbox,location)
        VALUES($sess_id,'".$car_name. "', '" .$car_type. "', " .$car_age. "," .$car_period. ",".$car_cost.",".$car_seats.", '".$car_gearbox."', '".$car_location."')";

        if (!mysqli_query($link, $ins_query)) {
            echo mysqli_error($link).'<br>';
            echo '<script type="text/javascript">alert("Insert Error");</script>';
        }else{
            echo '<script type="text/javascript">alert("Your details have been successfully uploaded");</script>';
        }

        mysqli_close($link);
    }else {
        echo '<script type="text/javascript">alert("Please check the details you entered and try again");</script>';
    }

if (!file_exists('uploads')) {
    mkdir('uploads');
}

$target_dir = 'uploads/'.$_SESSION['id'].'/';
if (!file_exists($target_dir)) {
    mkdir($target_dir);
}

for ($i=1; $i<=4 ; $i++) {
    $target_file = $target_dir . basename($_FILES["car_img_".$i]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["car_img_".$i]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file number ".$i." already exists.";
        $uploadOk = 0;
    }
    // Check file size
    // if ($_FILES["car_img_".$i]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["car_img_".$i]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["car_img_".$i]["name"]). " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Upload Car Details</title>
        <link rel="stylesheet" href="css/header_file.css">
        <link rel="stylesheet" href="css/upload_car_details.css">
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
            <h2>Upload your Car details here</h2>
            <hr>
            <!-- FORM -->
            <form action="upload_car_details.php" method="post" id="car_details_form" onsubmit="return runonclick();" enctype="multipart/form-data">
                <div class="form_entry">
                    <label for="car_name_id">Car Name: </label>
                    <input type="text" class="common_input_class" id="car_name_id" name="car_name" placeholder="Enter your Car's name" size="100" maxlength="100" required>
                </div>
                <div class="form_entry">
                    <label for="car_type_id">Car type: </label>
                    <select class="common_input_class" id="car_type_id" name="car_type" required>
                        <option value="null" disabled selected>Select</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="SUV">SUV</option>
                        <option value="Sports Vehicle">Sports Vehicle</option>
                        <option value="Compact Vehicle">Compact Vehicle</option>
                        <option value="Coupe">Coupe</option>
                        <option value="Convertible">Convertible</option>
                        <option value="Van">Van</option>
                        <option value="Minivan">Minivan</option>
                        <option value="Off-road">Off-road</option>
                        <option value="Pickup Truck">Pickup Truck</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form_entry">
                    <label for="car_age_id">Age of Car: </label>
                    <input type="number" class="common_input_class" id="car_age_id" name="car_age" placeholder="Enter your Car's age(in years)" max="100" min="1" required>
                </div>
                <div class="form_entry">
                    <label for="car_period_id">Car availability: </label>
                    <input type="number" class="common_input_class" id="car_period_id" name="car_period" placeholder="Enter your Car's availability(in number of days)" min="1" max="100" required>
                </div>
                <div class="form_entry">
                    <label for="car_cost_id">Cost(per day): </label>
                    <input type="number" class="common_input_class" id="car_cost_id" name="car_cost" placeholder="Enter per day rent for your car"  min="1" required>
                </div>
                <div class="form_entry">
                    <label for="car_seats_id">Number of Seats: </label>
                    <input type="number" class="common_input_class" id="car_seats_id" name="car_seats" placeholder="Enter number of seats in your car" min="1" max="8" required>
                </div>
                <div class="form_entry">
                    <label for="car_gearbox_id">Gearbox type: </label>
                    <select class="common_input_class" id="car_gearbox_id" name="car_gearbox" required>
                        <option value="null" disabled selected>Select</option>
                        <option value="Manual">Manual</option>
                        <option value="Automatic">Automatic</option>
                    </select>
                </div>
                <div class="form_entry">
                    <label for="car_location_id">Car Location: </label>
                    <select class="common_input_class" id="car_location_id" name="car_location" required>
                        <option value="null" disabled selected>Select</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Kolkata">Kolkata</option>
                        <option value="New Mumbai">New Mumbai</option>
                        <option value="New Delhi">New Delhi</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Jaipur">Jaipur</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form_entry">
                    <fieldset>
                        <legend>Select images to upload</legend>
                        <input type="file" name="car_img_1" required><br><br>
                        <input type="file" name="car_img_2" required><br><br>
                        <input type="file" name="car_img_3" required><br><br>
                        <input type="file" name="car_img_4" required><br><br>
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

        <script type="text/javascript" src="js/upload_car_details.js"></script>
    </body>
</html>
