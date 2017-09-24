<?php

require "init.php";

$email = $_POST["email"];
$password = $_POST["password"];

$query = "select cus_name,cus_emailid,cus_id from customer_registration where cus_emailid = '".$email."' and cus_password = '".$password."';";

$result = mysqli_query($db_conn,$query);

$response = array();

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_row($result);
    $name = $row[0];
    $email_id = $row[1];
    $cus_id = $row[2];
    $code = "login_success";
    array_push($response,array("code"=>$code,"name"=>$name,"email"=>$email_id,"id"=>$cus_id));
    echo json_encode($response);
}
else {
    $code = "login_failed";
    $message = "You may be not yet Registered";
    array_push($response,array("code"=>$code,"message"=>$message));
    echo json_encode($response);
}

mysqli_close($db_conn);

?>