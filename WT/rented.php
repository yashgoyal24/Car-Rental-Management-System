<?php
session_start();
if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
    header('Location: login.php');
}
$car_id = $_GET['car_id'];
$bor_id=$_SESSION['id'];
$link=mysqli_connect('localhost', 'test', '', 'carrental');
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
}

$f_query = "SELECT owner_id FROM car_details WHERE car_id=$car_id";
if($f_res=mysqli_query($link, $f_query)){
    $owner_id_res = mysqli_fetch_assoc($f_res);
    $owner_id = $owner_id_res['owner_id'];
}

$query = "INSERT INTO car_history(car_id,owner_id, bor_id) VALUES($car_id, $owner_id, $bor_id)";
if ($res=mysqli_query($link, $query)) {
    $u_query = "UPDATE car_details SET status=1 WHERE car_id=$car_id";
    if($result=mysqli_query($link, $u_query)){
        echo '';
    }
}
header('Location: user_profile.php');
mysqli_close($link);
?>
