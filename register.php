<?php

require "init.php";

$name = $_POST["name"];
$password = $_POST["password"];
$address = $_POST["address"];
$email = $_POST["email"];
$phnum = $_POST["phnum"];
$response = array();

$query = "select * from customer_registration where cus_emailid='".$email."';";
$result = mysqli_query($db_conn,$query);

if(mysqli_num_rows($result) > 0)
{
    $code = "reg_failed";
    $message = "User already exist";
    array_push($response,array("code"=>$code,"message"=>$message));
    echo json_encode($response);
}
else 
{
    $query = "insert into customer_registration values('','".$name."','".$password."','".$address."','".$email."','".$phnum."');";
    $result = mysqli_query($db_conn,$query);
    if($result){
        $code = "reg_success";
        $message = "Thank You for Registration";
        array_push($response,array("code"=>$code,"message"=>$message));
        echo json_encode($response);
    }   
    else{
        $code = "reg_failed";
        $message = "Registration Failed. Please try again";
        array_push($response,array("code"=>$code,"message"=>$message));
        echo json_encode($response); 
    } 
}

mysqli_close($db_conn);

?>