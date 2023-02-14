<?php
session_start();
include 'config.php';

$username = $_SESSION["username"];


if (isset($_POST['cancel'])) {
    $date_time = $_POST['date_time'];
    $sql = "delete from invigilation.leave where mail = '$username' and date_time = '$date_time' and status = 'INITIATED'";
    echo $sql;
    $result = mysqli_query($link, $sql);
}
header("location: leave.php");
