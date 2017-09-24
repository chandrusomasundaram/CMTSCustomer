<?php

require "init.php";

$delivery_type = $_POST["parcel_type"];
$from_name = $_POST["from_name"];
$from_address = $_POST["from_address"];
$from_phnum = $_POST["from_phnum"];
$to_name = $_POST["to_name"];
$to_address = $_POST["to_address"];
$to_phnum = $_POST["to_phnum"];
$cus_id = $_POST["cus_id"];
$rate = $_POST["rate"];
$weight = $_POST["weight"];
$book_date = date("d M Y H:i");
$date = date("d M Y",strtotime("+1 day"));
$pickup_date = $date." 4:00PM";
$s_date = Date('d M Y', strtotime("+2 days"));
$schedule_date = $s_date." 8:00PM";
$track = $from_address.", ".$from_area.", ".$from_city;

$query = "SELECT cus_emailid FROM customer_registration WHERE cus_id LIKE '".$cus_id."';";

$result = mysqli_query($db_conn,$query);

$response = array();

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_row($result);
    $mail = $row[0];
    $query = "INSERT INTO pickup VALUES('','".$cus_id."','".$book_date."','".$pickup_date."','".$schedule_date."','".$delivery_type."','".$weight."','".$from_name."','".$from_address."','".$from_phnum."','".$to_name."','".$to_address."','".$to_phnum."','".$rate."','registered','".$track."');";
    $result = mysqli_query($db_conn,$query);
    if($result){
        $code = "reg_success";
        $message = "Your pickup request successfully registered.";
        array_push($response,array("code"=>$code,"message"=>$message));
        echo json_encode($response);
    }
    else{
        $code = "reg_failed";
        $message = "Server busy try again later.";
        array_push($response,array("code"=>$code,"message"=>$message));
        echo json_encode($response);
    } 
}
else {   }

mysqli_close($db_conn);

?>