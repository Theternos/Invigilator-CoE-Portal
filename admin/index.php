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
    <title>CoE | Dashboard</title>
    <link rel="stylesheet" href="../css/new_style.css" />
    <link rel="icon" type="image/x-icon" href="../assets/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,800" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
</head>

<body>
    <div class="primary-nav">

        <button href="#" class="hamburger open-panel nav-toggle">
            <span class="screen-reader-text">Menu</span>
        </button>

        <nav role="navigation" class="menu">
            <a href="#" class="logotype">Coe<span> Portal</span></a>
            <div class="overflow-container">
                <ul style="margin-top:1vh; " class="menu-dropdown">
                    <li><a href="#">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span></li>
                    <li><a href="./faculty.php">Faculty / Exam</a><span class="icon"><i class="fa fa-renren"></i></span></li>
                    <li><a href="./leave_approve.php">Leave Approve</a><span class="icon"><i class="fa fa-stumbleupon"></i></span></li>
                    <li><a href="./customize.php">Customize</a><span class="icon"><i class="fa fa-user"></i></span></li>
                    <li style="position:absolute;bottom: 0;"><a href="./logout.php">Logout</a><span class="icon"><i style="margin-left: 11.5vw; color:#fff;" class="fa fa-sign-out"></i></span></li>
                </ul>
        </nav>
    </div>
    <div class="ini">
        <div style="padding-left: 6.4vw;" class="init">
            <div class="initi">
                <h5>TO DO LIST</h5>
                <div style="justify-content:flex-start;min-height:80%; max-height:80% ;overflow:hidden;" class="flex-add-todo">
                    <div style="flex-direction:column;" class="add-todo">
                        <?php
                        $sql = "SELECT * from staff_todo WHERE staff_mail = '$username' ORDER BY id DESC";
                        $result = mysqli_query($link, $sql);
                        $row = [];
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_all(MYSQLI_ASSOC);
                            if (!empty($row))
                                foreach ($row as $rows) {
                        ?>
                                <div style="display:flex;flex-direction:row;margin-top: 7px;" class="one-todo done">
                                    <form action="action.php" method="POST">
                                        <input type="hidden" name="id-todo" value="<?php echo $rows['id'] ?>">
                                        <button name="delete-todo-list">.</button>
                                        <p><?php echo $rows['description'] ?></p>
                                    </form>
                                </div>
                            <?php }
                        } else { ?>
                            <div style="margin-top: 10vh;" class="initia">
                                <h3>You don't have any To-Do List 😉</h3>
                            </div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="flex-add-todo">
                    <div class="add-todo">
                        <form action="action.php" method="POST">
                            <input type="text" name="to-do" placeholder="Type here" required />
                            <button name="add-todo-list">ADD</button>
                        </form>

                    </div>
                </div>

            </div>
            <div class="initia admin_initia">
                <h5>VISUALIZE THE INVIGILATORS ACTIVITY</h5>
                <div id="chartContainer" style="height: 320px; width: 100%;"></div>
                <?php
                $dataPoints = array(
                    array("y" => 27, "label" => "Submitted"),
                    array("y" => 70, "label" => "Collected"),
                    array("y" => 3, "label" => "Late Collected"),
                );
                ?>
            </div>

        </div>
        <div style="margin-left:0;" class="initial_0">
            <div class="initial">
                <div style="margin-left:0; margin-right:3.8vw;" class="color_box">
                    <img src="../assets/bg-image.jpg" alt="CoE Portal" width="150%" />
                    <h2 style="  position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">coe <span>Portal</span></h2>
                </div>
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

                        if ($greeting_time <= '05:45' and $greeting_time >= '00:00') { ?>
                            <img src="../asset/moon.png" alt="Weather Image" width="110px">
                        <?php  } elseif ($greeting_time <= '23:59' and $greeting_time >= '19:00') { ?>
                            <img src="../asset/moon.png" alt="Weather Image" width="110px">
                        <?php } else { ?>
                            <img src="../assets/cloudy.png" alt="Weather Image" width="110px">
                        <?php } ?>
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
                        <h3>Controller of Examination!</h3>
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

            </div>
            <div class="admin_initial_2">
                <div style="margin-top:0" class="initia add_announcements">
                    <h5>ADD LATEST ANNOUNCEMENTS & NEWS</h5>
                    <form action="action" method="POST">
                        <textarea style="min-height:15vh; margin-top: 3vh;" name="add_announcement" class="add_announcement" type="text"></textarea>
                        <button class="add_announcement_button">Update</button>
                    </form>
                </div>
                <div class="biometric_updates">
                    <div class="admin_other_main">
                        <h5>hey</h5>
                    </div>
                    <div class="admin_other_main">
                        <h5>hey</h5>
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

            data: [{
                type: "bar",
                yValueFormatString: "#",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</html>