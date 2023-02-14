<?php

include 'config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE"]) || $_SESSION["bit_invigilation_duty_COE"] !== true) {
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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Carme&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">CoE Portal.</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="exam_hall.php" class="active nav-link">Exam-Hall</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Invigilation</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Faculty</a>
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
    <section>
        <form action="action.php" method="POST">
            <label for="fdate">From</label>
            <input type="date">
            <label for="ftime">From</label>
            <input type="time">
            <br>
            <label for="tdate">To</label>
            <input type="date">
            <label for="ttime">To</label>
            <input type="time">
            <br>
            <input name="booking" type="submit" placeholder="Submit">

        </form>
    </section>
</body>

</html>