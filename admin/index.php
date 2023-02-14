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
    <div class="main">
        <div class="in_main">
            <div class="box1">
                <h2><span>1st</span><br> Year</h2>
            </div>
            <div class="box2">
                <h2><span>2nd</span> Year</h2>
            </div>
        </div>
        <div class="in_main">
            <div class="box3">
                <h2><span>3rd</span> Year</h2>
            </div>
            <div class="box4">
                <h2><span>4th</span> Year</h2>
            </div>
        </div>
    </div>

</body>
<script src="../js/script.js"></script>

</html>