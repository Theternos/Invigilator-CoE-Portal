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
if (isset($_POST['update_staff_recruit_limit'])) {
    $ap_1 = $_POST['assistant_professor_i_limit'];
    $ap_2 = $_POST['assistant_professor_ii_limit'];
    $ap_3 = $_POST['assistant_professor_iii_limit'];
    $sp = $_POST['senior_professor_limit'];
    $ap = $_POST['associate_professor_limit'];
    $p = $_POST['professor_limit'];
    $sql = "UPDATE duty_limit SET ap_1 = '$ap_1',ap_2 = '$ap_2',ap_3 = '$ap_3',sp = '$sp',ap = '$ap',p = '$p'";
    $result = mysqli_query($link, $sql);
    header("location: customize.php");
}
if (isset($_POST['add_announcement_button'])) {
    $description = $_POST['add_announcement'];
    $sql = "INSERT INTO latest_announcements (announcements) VALUES ('$description')";
    $result = mysqli_query($link, $sql);
    header("location: index.php");
}
