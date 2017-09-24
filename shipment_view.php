<?php

require "init.php";

$id = $_POST["cus_id"];

$query = "SELECT * FROM pickup WHERE cus_id LIKE '".$id."';";

$result = mysqli_query($db_conn,$query);

if($result){
    while($row = mysqli_fetch_array($result)){
        $flag[] = $row;
    }
    echo json_encode($flag);
}

mysqli_close($db_conn);
?>