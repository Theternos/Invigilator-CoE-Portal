<?php

include '../config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE_admin"]) || $_SESSION["bit_invigilation_duty_COE_admin"] !== true) {
    header("location: login.php");
    exit;
}
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIT Invigilation Duty</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">CoE Portal.</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="active nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="faculty.php" class="nav-link">Faculty / Exam</a>
                </li>
                <li class="nav-item">
                    <a href="leave_approve.php" class="nav-link">Leave Approve</a>
                </li>
                <li style="margin-right: 1vw;" class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <?php
    $sqll1 = "SELECT * FROM invigilation.exam_details WHERE state = 'UPCOMING'";
    $resultt1 = mysqli_query($link, $sqll1);
    while ($roww1 = mysqli_fetch_assoc($resultt1)) {
        $mail_date = $roww1['date'];
        $mail_date1 = strtotime($mail_date);
        $maail_date = $mail_date1 - 24;
        $mail_date = date("Y:m:d", $maail_date);
        echo $mail_date;
    }

    ?>

</body>
<script src="../js/script.js"></script>

</html>