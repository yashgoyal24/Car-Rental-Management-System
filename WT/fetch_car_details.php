<?php
session_start();
$link=mysqli_connect('localhost', 'test', '', 'carrental');
if(mysqli_connect_errno()){
    //echo mysqli_connect_error();
    echo '<script type="text/javascript">alert("Error connecting to the database!! Please try again");</script>';
}

// $array='[';
$arr = array();
$i=0;

$query = "SELECT name, type, age, period, cost, seats FROM car_details LIMIT 8";
if ($res=mysqli_query($link, $query)) {
	while ($row=mysqli_fetch_assoc($res)) {
        $arr[$i]=$row;
        // print_r($row);
        // echo $row.'<br>';
		// $array.=json_encode($row).',';
        $i++;
	}
}
 print_r($arr);
// echo $arr[0]['name'];
// $array=rtrim($array, ',');
// $array.=']';
mysqli_close($link);
// echo $array;

?>
