<?php 

require "init.php";

$emp_id = $_POST["id"];
$status = $_POST["status"];

$query = "UPDATE employee_pd SET emp_status = '".$status."' WHERE emp_id LIKE '".$emp_id."';";

$result = mysqli_query($db_conn,$query);

$response = array();

if($result){
    $code = "success";
    array_push($response,array("code"=>$code));
    echo json_encode($response);
}
else {
    $code = "failed";
    array_push($response,array("code"=>$code));
    echo json_encode($response);
}

mysqli_close($db_conn);


?>