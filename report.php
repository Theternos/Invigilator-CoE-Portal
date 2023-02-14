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
    <title>Leave Apply</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo"><span style="letter-spacing: 2px;">Invgltr</span> Portal.</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="active nav-link">Malpractice</a>
                </li>
                <li class="nav-item">
                    <a href="leave.php" class="nav-link">Leave Apply</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Faculty</a>
                </li>
                <li class="nav-item">
                    <a href="exam_hall.php" class="nav-link">Exam-Hall</a>
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
    <section class='malpractice'>
        <h3>Report Malpractice</h3>
        <form action="/action_page.php">
            <label for="exam_leave">Select Roll Number: &nbsp;&nbsp;</label>
            <select name="exam_leave" id="exam_leave">
                <option value="">7376211CS101</option>
                <option value="">7376211CS102</option>
                <option value="">7376211CS103</option>
                <option value="">7376211CS104</option>
                <option value="">7376211CS105</option>
                <option value="">7376211CS106</option>
                <option value="">7376211CS107</option>
                <option value="">7376211CS108</option>
                <option value="">7376211CS109</option>
                <option value="">7376211CS110</option>
                <option value="">7376211CS111</option>
                <option value="">7376211CS112</option>
                <option value="">7376211CS113</option>
                <option value="">7376211CS114</option>
                <option value="">7376211CS115</option>
                <option value="">7376211CS116</option>
                <option value="">7376211CS117</option>
                <option value="">7376211CS118</option>
                <option value="">7376211CS119</option>
                <option value="">7376211CS120</option>
                <option value="">7376211CS121</option>
                <option value="">7376211CS122</option>
                <option value="">7376211CS123</option>
                <option value="">7376211CS124</option>
                <option value="">7376211CS125</option>
                <option value="">7376211CS126</option>
                <option value="">7376211CS127</option>
                <option value="">7376211CS128</option>
                <option value="">7376211CS129</option>
                <option value="">7376211CS130</option>

            </select><br><br>
            <label for="leave_reason">State Reason: </label>
            <textarea name="leave_reason" id="leave_reason"></textarea><br>
            <label for="appt">Select approx time:</label>&nbsp;&nbsp;&nbsp;
            <input type="time" id="appt" name="appt"><br>
            <input class="submit_button" type="submit" value="Submit">
        </form>
    </section>
    <h2 class="leave_history_h2">Report Summary</h2>
    <section class="leave_history">
        <table>
            <thead>
                <tr>
                    <th class="table_sno">S.no</th>
                    <th>Roll Number</th>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Reason</th>
                    <th>Venue</th>
                </tr>
                <thead>
                <tbody>
                    <tr>
                        <td class="table_sno">1</td>
                        <td>7376211CS113</td>
                        <td>Allwin G B</td>
                        <td>10:15 AM</td>
                        <td>Asked Answer to the nearest person</td>
                        <td>IB - Block, 31</td>
                    </tr>
                    <tr>
                        <td class="table_sno">2</td>
                        <td>7376211CS183</td>
                        <td>Kavinkumar B</td>
                        <td>09:15 AM</td>
                        <td>Brought the bit paper of answers</td>
                        <td>IB - Block, 31</td>
                    </tr>
                </tbody>
                <table />
    </section>
</body>
<script src="./js/script.js"></script>

</html>