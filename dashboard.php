<?php

include 'config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE"]) || $_SESSION["bit_invigilation_duty_COE"] !== true) {
    header("location: login.php");
    exit;
}
error_reporting(0);
$username = $_SESSION["username"];

date_default_timezone_set('Asia/Kolkata');
$date = date('m/d/Y h:i a', time());
$calender_date = date('m/d/Y', time());
include 'calender.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invigilator | Dashboard</title>
    <link rel="stylesheet" href="./css/newest_style.css" />
    <link href="./css/calender.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,800" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
</head>

<body>
    <div class="primary-nav">

        <button href="#" class="hamburger open-panel nav-toggle">
            <span class="screen-reader-text">Menu</span>
        </button>

        <nav role="navigation" class="menu">
            <a href="#" class="logotype">Invgltr<span> Portal</span></a>
            <div class="overflow-container">
                <ul style="margin-top:1vh; " class="menu-dropdown">
                    <li><a href="#">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span></li>
                    <li><a href="./leave.php">Leave Apply</a><span class="icon"><i class="fa fa-renren"></i></span></li>
                    <li><a href="./report.php">Malpractice</a><span class="icon"><i class="fa fa-stumbleupon"></i></span></li>
                    <li><a href="#">Faculty</a><span class="icon"><i class="fa fa-user"></i></span></li>
                    <li style="position:absolute;bottom: 0;"><a href="./logout.php">Logout</a><span class="icon"><i style="margin-left: 11.5vw; color:#fff;" class="fa fa-sign-out"></i></span></li>
                </ul>
        </nav>
    </div>
    <div class="ini">
        <div class="initial_0">
            <div class="initial">
                <div class="initial_1">
                    <div class="greet">
                        <?php
                        $jsonurl = "https://api.openweathermap.org/data/2.5/weather?q=erode&appid=a8c83145b75b293745caf77e753df1e1&units=metric";
                        $json = file_get_contents($jsonurl);
                        $weather = json_decode($json);
                        $kelvin = $weather->main->temp;
                        $greeting_time = date('H:i', time());
                        $sql = "SELECT * FROM user_data WHERE student_official_email_id = '$username'";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if ($greeting_time <= '05:45' and $greeting_time >= '00:00')
                            echo '<img src="./assets/moon.png" alt="Weather Image" width="110px">';
                        elseif ($greeting_time <= '23:59' and $greeting_time >= '19:00')
                            echo '<img src="./assets/moon.png" alt="Weather Image" width="110px">';

                        else
                            echo '<img src="./assets/cloudy.png" alt="Weather Image" width="110px">';
                        ?>
                        <p><span style="font-size: 22px;"><?php echo $kelvin ?>°C</span></p>
                        <h4 style="letter-spacing: 1px;font-size: 13px;">
                            <?php
                            echo date('l');
                            echo ", ";
                            echo $date ?>
                        </h4>
                        <?php
                        if ($greeting_time <= '11:59' and $greeting_time >= '00:00')
                            echo "<h1>Good Morning,</h1>";
                        elseif ($greeting_time >= '12:00' and $greeting_time <= '17:00')
                            echo "<h1>Good Afternoon,</h1>";
                        else
                            echo "<h1>Good Evening,</h1>";
                        ?>
                        <h3><?php echo $row['Year']; ?> !</h3>
                    </div>
                    <div class="tip">
                        <h5>TIP OF THE DAY</h5>
                        <?php
                        $tips = array(
                            "Take breaks and stretch regularly to avoid eye strain and back pain.",
                            "Organize your workspace to increase productivity and reduce clutter.",
                            "Stay hydrated by drinking plenty of water throughout the day.",
                            "Keep healthy snacks within reach to avoid unhealthy snacking during work hours.",
                            "Create a to-do list each day to stay on track and prioritize tasks.",
                            "Treat students with respect and kindness for better learning and growth.",
                            "Start your day with a positive mindset by setting intentions and visualizing your goals.",
                            "Exercise regularly, even if it's just a short workout, to increase energy levels and boost productivity.",
                            "Prioritize tasks by importance and deadline to stay organized and focused.",
                            "Take breaks throughout the day to recharge and reduce stress levels.",
                            "Practice good sleep habits by sticking to a consistent sleep schedule and creating a relaxing bedtime routine.",
                            "Use time-management techniques like the Pomodoro method to maximize productivity and minimize distractions.",
                            "Foster collaboration and teamwork through regular check-ins, meetings or conversations.",
                            "Stay organized by decluttering your workspace, using a planner and keeping files in order.",
                            "Reflect on accomplishments, set goals and make a to-do list for tomorrow's success."
                        );

                        // get today's date
                        $today = date("j");
                        ?>

                        <p><?php echo $tips[$today % 9] ?></p>
                    </div>
                </div>
                <div class="color_box">
                    <video autoplay muted loop id="myVideo">
                        <source src="./assets/web-bg.webm" type="video/mp4">
                    </video>
                    <h2>Invigilator <span>Portal</span></h2>
                </div>
            </div>
            <div class="initial_2">
                <p>Events for You</p>
                <div class="main_events">
                    <div class="events">
                        <div class="event_topic">
                            <img src="./assets/calender.png" alt="calender icon">
                            <ul><a href="">On Going Events</a></ul>
                        </div>
                        <div class="event_details">
                            <div class="event_time">
                                <?php
                                $sql = "SELECT * FROM staff WHERE email = '$username' and `status` = 'ONGOING' LIMIT 1";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <img src="./assets/time.png" alt="time  icon" height="10%">
                                    <p class="date">
                                        <?php
                                        if ($row['date_time'] == null) {
                                            echo 'No Ongoing Events';
                                        } else {
                                            echo $row['date_time'];
                                        } ?>
                            </div>
                            <P class="venue">Venue: &nbsp;<span>
                                    <?php
                                    if ($row['venue'] == null) {
                                        echo 'Will be alloted soon';
                                    } else {
                                        echo $row['venue'];
                                    }
                                    ?>
                                </span></P>
                            <p class="event_status">Status: &nbsp;<i style="color: #00ff00;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;<span> Attending | <?php echo $row['exam_name'] ?></span></p>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="events">
                        <div class="event_topic">
                            <img src="./assets/calender.png" alt="calender icon">
                            <ul><a href="">Upcoming Events</a></ul>
                        </div>
                        <div class="event_details">
                            <div class="event_time">
                                <img src="./assets/time.png" alt="time  icon" height="10%">
                                <?php
                                $sql = "SELECT * FROM staff WHERE email = '$username' and `status` = 'UPCOMING' LIMIT 1";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <p class='date'><?php echo $row['date_time'] ?></p>
                            </div>
                            <P class="venue">Venue: &nbsp;<span>
                                    <?php
                                    if ($row['venue'] == null) {
                                        echo 'Will be alloted soon';
                                    } else {
                                        echo $row['venue'];
                                    }
                                    ?>
                                </span></P>
                            <p class="event_status">Status: &nbsp;<i style="color: #fdc60f;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;<span> Upcoming | <?php echo $row['exam_name'] ?></span></p>
                        <?php
                                }
                        ?>
                        </div>
                    </div>
                    <div class="events">
                        <div class="event_topic">
                            <img src="./assets/calender.png" alt="calender icon">
                            <ul><a href="">Ended Events</a></ul>
                        </div>
                        <div class="event_details">
                            <div class="event_time">
                                <img src="./assets/time.png" alt="time  icon" height="10%">
                                <?php
                                $sql = "SELECT * FROM staff WHERE email = '$username' and `status` = 'ENDED' LIMIT 1";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <p class="date"><?php echo $row['date_time'] ?></p>
                            </div>
                            <P class="venue">Venue: &nbsp;<span>
                                    <?php
                                    if ($row['venue'] == null) {
                                        echo 'Will be alloted soon';
                                    } else {
                                        echo $row['venue'];
                                    }
                                    ?></span></P>
                            <p class="event_status">Status: &nbsp;<i style="color: red;" class="fa fa-circle" aria-hidden="true"></i>&nbsp;<span> Ended | <?php echo $row['exam_name'] ?></span></p>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('.nav-toggle').click(function(e) {

        e.preventDefault();
        $("html").toggleClass("openNav");
        $(".nav-toggle").toggleClass("active");

    });
</script>
<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1",
            axisY: {
                includeZero: true
            },
            data: [{
                type: "column",
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<script>
    // Get the video
    var video = document.getElementById("myVideo");

    // Get the button
    var btn = document.getElementById("myBtn");

    // Pause and play the video, and change the button text
    function myFunction() {
        if (video.paused) {
            video.play();
            btn.innerHTML = "Pause";
        } else {
            video.pause();
            btn.innerHTML = "Play";
        }
    }
</script>
<script src='//https://code.jquery.com/jquery-1.9.1.js'></script>
<script src="//https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</html>