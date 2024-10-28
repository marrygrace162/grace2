<?php

if(!isset($_SESSION['status']))
{
    $_SESSION['status'] = "Please login to Access User Dashboard.";
    header('Location: login.php');
    exit(0);
}

?>