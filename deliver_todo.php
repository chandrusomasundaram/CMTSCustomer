<?php

require "init.php";

$id = $_POST["emp_id"];
$query = "SELECT pickup_id FROM assign_pickup WHERE emp_id LIKE '".$id."';";
$result = mysqli_query($db_conn,$query);
if($result) {
    while($row = mysqli_fetch_array($result)) {
        $pickup_id[] = $row;
    }
    for($i = 0; $i<sizeof($pickup_id);$i++) {
        $pickup = $pickup_id[$i]['pickup_id'];
        $query_frst = "SELECT * FROM pickup WHERE pickup_id LIKE '".$pickup."';";
        $result_frst = mysqli_query($db_conn,$query_frst);
        if($result_frst) {
            while($row_frst = mysqli_fetch_array($result_frst)){
                $flag[] = $row_frst;
            }
        } 
    }
    echo json_encode($flag);                
}
mysqli_close($db_conn);
?>