<?php
session_start();
$car_id=$_GET['car_id'];
$link=mysqli_connect('localhost', 'test', '', 'carrental');
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
}

$arr = array();
$i=0;

$query = "SELECT name,cost,ratings,rides,location FROM driver_details WHERE status=0";
if ($res=mysqli_query($link, $query)) {
	while ($row=mysqli_fetch_assoc($res)) {
        $arr[$i]=$row;
        $i++;
	}
}
$car_query = "SELECT name,type,age,period,cost, seats, gearbox, location FROM car_details WHERE car_id=$car_id";
if ($car_res=mysqli_query($link, $car_query)) {
	$car_arr=mysqli_fetch_assoc($car_res);
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Details</title>
	<link rel="stylesheet" type=text/css href="css/header_file.css">
	<link rel="stylesheet" type="text/css" href="css/car_details.css">
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

	<h1>View Car</h1>
    <div class="line"></div>
    <div class="car_rent_dets">
        <p id="ckm_title">Cost/km:</p>
        <p id="ckm_value">&#x20b9; <?php echo $car_arr['cost'];?></p>
        <input type="button" onclick="location.href='rented.php?car_id='+'<?php echo $_GET['car_id'];?>';" name="rent_button" id="rent_button" value="Rent this Car">
    </div>
	<div class="image">
		<img src="images/car_2.jpg" class="img1">
	</div>

	<div class="specs">
		<h3>Specifications</h3>
		<div class="specifications">
			<p class="name"><b>Name :</b> <?php echo $car_arr['name'];?></p>
            <div class="line2"></div>
            <p class="name"><b>Type :</b> <?php echo $car_arr['type'];?></p>
            <div class="line2"></div>
            <p class="name"><b>Age :</b> <?php echo $car_arr['age'];?></p>
            <div class="line2"></div>
            <p class="name"><b>Availability :</b> <?php echo $car_arr['period'];?> days</p>
            <div class="line2"></div>
            <p class="name"><b>Seats :</b> <?php echo $car_arr['seats'];?></p>
            <div class="line2"></div>
            <p class="name"><b>Gearbox :</b> <?php echo $car_arr['gearbox'];?></p>
            <div class="line2"></div>
            <p class="name"><b>Location :</b> <?php echo $car_arr['location'];?></p>
		</div>
	</div>
	<br><br><br>
	<hr>
	<h1>Hire a Driver</h1>
    <div class="line"></div>
	<div class="row">

        <?php
            for ($ic=0; $ic < $i; $ic++) {
                echo '<div class="column">';
                echo '<div class="card">';
    			echo '<img src="images/vector.jpg" class="img" >';
    			echo '<p class="name"><b>Name :</b> '.$arr[$ic]['name'].'</p>';
                echo '<div class="line2"></div>';
    			echo '<p class="name"><b>Cost/day :</b> '.$arr[$ic]['cost'].'</p>';
                echo '<div class="line2"></div>';
    			echo '<p class="name"><b>Ratings :</b> '.$arr[$ic]['ratings'].'</p>';
                echo '<div class="line2"></div>';
    			echo '<p class="name"><b>Location :</b> '.$arr[$ic]['location'].'</p>';
                echo '<div class="line2"></div>';
    			echo '<p class="name"><b>Rides completed :</b> '.$arr[$ic]['rides'].'</p>';
                echo '<input type="button" value="Hire this Driver" class="hire_d_button">';
    			echo '</div>';
    		    echo '</div>';
            }
        ?>
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
