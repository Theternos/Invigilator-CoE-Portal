<?php

include 'config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE"]) || $_SESSION["bit_invigilation_duty_COE"] !== true) {
    header("location: login.php");
    exit;
}
$username = $_SESSION["username"];

if (isset($_POST['leave_insert'])) {
    $leave_type = $_POST['leave_type'];
    $exam_duty = $_POST['date_time'];
    $alt_staff = $_POST['alt_staff'];
    $reason = $_POST['leave_reason'];
    $sql = "SELECT * FROM user_data where student_official_email_id = '$username'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['Year'];
    $sql1 = "SELECT * FROM invigilation.user_data Where Year = '$alt_staff'";
    $result1 = mysqli_query($link, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $alt_mail = $row1['student_official_email_id'];
    $sqll = "SELECT * FROM `invigilation`.`staff` where email = '$username' and date_time = '$exam_duty'";
    echo $sqll;
    echo '<br>';
    $resultt = mysqli_query($link, $sqll);
    $roww = mysqli_fetch_assoc($resultt);
    $exam = $roww['exam_name'];
    $batch = $roww['batch'];
    $sql = "INSERT INTO invigilation.`leave` (`name`,leave_type,batch,exam, mail, alt_staff, alt_mail, reason, date_time, `status`) VALUES ('$name','$leave_type','$batch','$exam', '$username', '$alt_staff', '$alt_mail','$reason', '$exam_duty','INITIATED');";
    echo $sql;
    $result = mysqli_query($link, $sql);
    header('location: leave.php');
}
