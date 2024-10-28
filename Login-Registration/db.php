<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "grace";
$con = mysqli_connect ( $hostName, $dbUser, $dbPassword, $dbName);

if (!$con) {
    die ("Something went wrong");
}

?>