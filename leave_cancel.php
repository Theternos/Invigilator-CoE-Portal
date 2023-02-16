<?php

include 'config.php';

session_start();

$username = $_SESSION["username"];

if (isset($_POST['leave_reject'])) {
    $sql = "update invigilation.leave set status = 'REJECTED' where alt_mail = '$username' and status = 'INITIATED'";
    echo $sql;
    $result = mysqli_query($link, $sql);
    header('location: index.php');
}
if (isset($_POST['leave_accept'])) {
    $sqll = "SELECT * FROM invigilation.leave where alt_mail = '$username' and status = 'INITIATED'";
    $resultt = mysqli_query($link, $sqll);
    $roww = mysqli_fetch_assoc($resultt);
    if ($roww['leave_type'] == 'Leave') {
        $sql = "update invigilation.leave set state = state + 1 where alt_mail = '$username' and status = 'INITIATED'";
        $result = mysqli_query($link, $sql);
    } else {
        $sql = "update invigilation.leave set state = state + 2 where alt_mail = '$username' and status = 'INITIATED'";
        $result = mysqli_query($link, $sql);
        $sql = "update invigilation.leave set status = 'APPROVED' where alt_mail = '$username' and status = 'INITIATED'";
        $result = mysqli_query($link, $sql);
        $sql = "SELECT * FROM invigilation.staff where email = '" . $roww['alt_mail'] . "' and status = 'UPCOMING'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "update invigilation.staff set date_time = '" . $row['date_time'] . "' where email = '" . $roww['mail'] . "' and status = 'UPCOMING'";
        $result = mysqli_query($link, $sql);
        $sql = "update invigilation.staff set date_time = '" . $roww['date_time'] . "' where email = '$username' and status = 'UPCOMING'";
        $result = mysqli_query($link, $sql);
    }
    header('location: ./admin/leave_approve.php');
}
if (isset($_POST['leave_reject_CoE'])) {
    $name = $_POST['name'];
    $sql = "update `invigilation`.`leave` set status = 'REJECTED' where name = '$name' and state = '1'";
    echo $sql;
    $result = mysqli_query($link, $sql);
    header('location: ./admin/leave_approve.php');
}
if (isset($_POST['leave_accept_CoE'])) {
    $name = $_POST['name'];
    $alt_staff = $_POST['alt_staff'];
    $date_time = $_POST['date_time'];
    $sql = "update `invigilation`.`leave` set status = 'APPROVED' where name = '$name' and state = '1';";
    $result = mysqli_query($link, $sql);
    $sql = "update `invigilation`.`leave` set state = '2' where name = '$name' and status = 'APPROVED';";
    $result = mysqli_query($link, $sql);
    $sql = "SELECT * FROM `invigilation`.`staff` WHERE staff = '$name' and date_time = '$date_time'";
    $result = mysqli_query($link, $sql);
    $sqll = "SELECT * FROM `invigilation`.`user_data` WHERE Year = '$alt_staff'";
    $resultt = mysqli_query($link, $sqll);
    $roww = mysqli_fetch_assoc($resultt);
    $row = mysqli_fetch_assoc($result);
    $sql = "INSERT INTO invigilation.staff (batch, exam_name, date_time, staff, email, status) VALUES ('" . $row['batch'] . "','" . $row['exam_name'] . "','" . $row['date_time'] . "','$alt_staff','" . $roww['student_official_email_id'] . "','UPCOMING')";
    echo $sql;
    echo '<br>';
    $result = mysqli_query($link, $sql);
    $sql = "update `invigilation`.`staff` set status = 'ENDED' where staff = '$name' and date_time = '$date_time';";
    echo $sql;
    echo '<br>';
    $result = mysqli_query($link, $sql);
    header('location: ./admin/leave_approve.php');
}
