<?php

$db_user = "root";
$db_pswd = "";
$db_server = "localhost";
$db_dbname = "courier_management_system";

$db_conn = mysqli_connect($db_server,$db_user,$db_pswd,$db_dbname);

// if(!$db_conn)
// {
//     echo "Connection Error";
// }
// else {
//     echo "Database Connected";
// }

?>