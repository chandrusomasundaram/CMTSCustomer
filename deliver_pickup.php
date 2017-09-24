<?php

require "init.php";

$pickup_id = $_POST["id"];

$query = "UPDATE pickup SET status='picked', track_hint='At CMTS origin facility' WHERE pickup_id='".$pickup_id."';";

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