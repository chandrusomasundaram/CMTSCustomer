<?php

require "init.php";

$emp_id = $_POST["id"];

$query = "SELECT * FROM employee_pd WHERE emp_id LIKE '".$emp_id."';";

// $query = "SELECT * FROM employee_pd WHERE emp_id LIKE '1004';";

$result = mysqli_query($db_conn,$query);

if($result){
    while($row = mysqli_fetch_array($result)){
        $flag[] = $row;
    }
    echo json_encode($flag);
}

mysqli_close($db_conn);
?>