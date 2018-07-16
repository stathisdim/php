<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "php_test";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(!$connection){

     echo "DB Connection Failed!" . mysqli_connect_errono();

}

?>