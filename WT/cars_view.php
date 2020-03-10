<?php
session_start();
$link=mysqli_connect('localhost', 'test', '', 'carrental');
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
}

$arr = array();
$i=0;

$query = "SELECT car_id, name, type, age, period, cost, seats,status FROM car_details WHERE status=0";
if ($res=mysqli_query($link, $query)) {
	while ($row=mysqli_fetch_assoc($res)) {
		if ($row['status']==0) {
			array_push($arr, $row);
		}
        $i++;
	}
}

mysqli_close($link);
?>

<html>
<head>
	<link rel="stylesheet" type=text/css href="css/header_file.css">
	<link rel="stylesheet" type="text/css" href="css/cars_view.css">
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

	<h1>VIEW CARS</h1>
	<div class="row">
        <?php
            for ($ic=0; $ic < $i; $ic++) {
                echo '<div class="column">';
                echo '<div class="card">';
    			echo '<img src="images/car_1.jpg" class="img" >';
    			echo '<p class="name">Name : '.$arr[$ic]['name'].'</p>';
    			echo '<p class="type">Type : '.$arr[$ic]['type'].'</p>';
    			echo '<p class="age">Age : '.$arr[$ic]['age'].'</p>';
    			echo '<p class="availability">Availability : '.$arr[$ic]['period'].'</p>';
    			echo '<p class="cost">Cost : '.$arr[$ic]['cost'].'</p>';
    			echo '<p class="seats">Seats : '.$arr[$ic]['seats'].'</p>';
                echo '<input type="button" name="view_car_details" value="View Car" onclick="location.href=\'car_details.php?car_id=\'+'.$arr[$ic]['car_id'].'">';
    			echo '</div>';
    		    echo '</div>';
            }
        ?>
	</div>

	<p id="test"></p>
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
	<script type="text/javascript" src="js/cars_view.js"></script>
</body>
</html>
