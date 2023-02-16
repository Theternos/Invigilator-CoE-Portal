<?php
include '../config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE_admin"]) || $_SESSION["bit_invigilation_duty_COE_admin"] !== true) {
    header("location: login.php");
    exit;
}
error_reporting(0);
$username = $_SESSION["username"];

if (isset($_POST['add-todo-list'])) {
    $description = $_POST['to-do'];
    $sql = "INSERT INTO staff_todo (staff_mail, description) VALUES ('$username', '$description')";
    $result = mysqli_query($link, $sql);
    header("location: index.php");
}
if (isset($_POST['delete-todo-list'])) {
    $id = $_POST['id-todo'];
    $sql = "DELETE FROM staff_todo where id = '$id'";
    $result = mysqli_query($link, $sql);
    header("location: index.php");
}
