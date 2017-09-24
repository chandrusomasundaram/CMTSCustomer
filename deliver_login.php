<?php

require "init.php";

$email = $_POST["email"];
$password = $_POST["password"];

$query = "select emp_name,emp_email,emp_id from employee_pd where emp_email = '".$email."' and emp_pass = '".$password."' and emp_type = 'deliver';";

$result = mysqli_query($db_conn,$query);

$response = array();

if(mysqli_num_rows($result) > 0) 
{
    $row = mysqli_fetch_row($result);
    $name = $row[0];
    $email_id = $row[1];
    $emp_id = $row[2];
    $code = "login_success";
    array_push($response,array("code"=>$code,"name"=>$name,"email"=>$email_id,"emp_id"=>$emp_id));
    echo json_encode($response);
}
else 
{
    $code = "login_failed";
    $message = "You may be not yet Registered";
    array_push($response,array("code"=>$code,"message"=>$message));
    echo json_encode($response);
}

mysqli_close($db_conn);

?>