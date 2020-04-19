<?php
session_start();
if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
    header('Location: login.php');
}
$_sess=$_SESSION['id'];
$link=mysqli_connect('localhost', 'test', '', 'carrental');
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
}

$arr1 = array();
$i1=0;
$display1=array();

$query1 = "SELECT car_id,owner_id,bor_id,ratings,kms_driven FROM car_history where owner_id=$_sess";
if ($res=mysqli_query($link, $query1)) {
	while ($row1=mysqli_fetch_assoc($res)) {
		array_push($arr1, $row1);
        $display1[$i1]=$row1;
        $i1++;
	}
}

$arr2 = array();
$i2=0;
$display2=array();

$query2 = "SELECT car_id,owner_id,bor_id,ratings,kms_driven FROM car_history WHERE bor_id=$_sess";
if ($res=mysqli_query($link, $query2)) {
	while ($row2=mysqli_fetch_assoc($res)) {
		array_push($arr2, $row2);
        $display2[$i2]=$row2;
        $i2++;
	}
}
mysqli_close($link);
?>

<html>
<head>
    <title>User Profile</title>
	<link rel="stylesheet" type=text/css href="css/header_file.css">
	<link rel="stylesheet" type="text/css" href="css/user_profile.css">
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

<h1>User Profile</h1>

<div class="line"></div>
<div class="lent">
    <h3>LENT HISTORY</h3>
    <div class="row">
        <div class="column">
        	<div class="card">
        		<img src="images/vector.jpg" class="img" >
        		<p class="cname">Car ID : <?php echo $arr1[0]['car_id'];?></p>
        		<p class="type">Owner ID : <?php echo $arr1[0]['owner_id'];?></p>
        		<p class="type">Borrower ID : <?php echo $arr1[0]['bor_id'];?></p>
        		<p class="lname">Ratings : <?php echo $arr1[0]['ratings'];?></p>
        		<p class="cost">Kilometres Driven : <?php echo $arr1[0]['kms_driven'];?></p>
        	</div>
        </div>
        <div class="column">
        	<div class="card">
        		<img src="images/vector.jpg" class="img" >
        		<p class="cname">Car ID : <?php echo $arr1[1]['car_id'];?></p>
        		<p class="type">Owner ID : <?php echo $arr1[1]['owner_id'];?></p>
        		<p class="type">Borrower ID : <?php echo $arr1[1]['bor_id'];?></p>
        		<p class="lname">Ratings : <?php echo $arr1[1]['ratings'];?></p>
        		<p class="cost">Kilometres Driven : <?php echo $arr1[1]['kms_driven'];?></p>
        	</div>
        </div>
    </div>
</div>
<div class="borrow">
    <h3>BORROWED HISTORY</h3>
    <div class="row">
        <div class="column">
        	<div class="card">
        		<img src="images/vector.jpg" class="img" >
        		<p class="cname">Car ID : <?php echo $arr2[0]['car_id'];?></p>
        		<p class="type">Owner ID : <?php echo $arr2[0]['owner_id'];?></p>
        		<p class="type">Borrower ID : <?php echo $arr2[0]['bor_id'];?></p>
        		<p class="lname">Ratings : <?php echo $arr2[0]['ratings'];?></p>
        		<p class="cost">Kilometres Driven : <?php echo $arr2[0]['kms_driven'];?></p>
        	</div>
        </div>
        <div class="column">
        	<div class="card">
        		<img src="images/vector.jpg" class="img" >
        		<p class="cname">Car ID : <?php echo $arr2[1]['car_id'];?></p>
        		<p class="type">Owner ID : <?php echo $arr2[1]['owner_id'];?></p>
        		<p class="type">Borrower ID : <?php echo $arr2[1]['bor_id'];?></p>
        		<p class="lname">Ratings : <?php echo $arr2[1]['ratings'];?></p>
        		<p class="cost">Kilometres Driven : <?php echo $arr2[1]['kms_driven'];?></p>
        	</div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/user_profile.js"></script>

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
