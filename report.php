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
    <link rel="stylesheet" href="./css/new_style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
</head>
<style>
    table tbody tr td:nth-child(1):before {
        content: "S.No";
    }

    table tbody tr td:nth-child(2):before {
        content: "Roll Number";
    }

    table tbody tr td:nth-child(3):before {
        content: "Student Name";
    }

    table tbody tr td:nth-child(4):before {
        content: "Approx Time";
    }

    table tbody tr td:nth-child(5):before {
        content: "Reason";
    }

    table tbody tr td:nth-child(6):before {
        content: "Venue";
    }
</style>

<body>
    <div class="primary-nav">

        <button href="#" class="hamburger open-panel nav-toggle">
            <span class="screen-reader-text">Menu</span>
        </button>

        <nav role="navigation" class="menu">
            <a href="#" class="logotype" style="left:39px;top:8px;">Invgltr<span> Portal</span></a>
            <div class="overflow-container">
                <ul style="margin-top:1vh; " class="menu-dropdown">
                    <li><a href="index.php">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span></li>
                    <li><a href="./leave.php">Leave Apply</a><span class="icon"><i class="fa fa-renren"></i></span></li>
                    <li><a href="#">Malpractice</a><span class="icon"><i class="fa fa-stumbleupon"></i></span></li>
                    <li><a href="#">Faculty</a><span class="icon"><i class="fa fa-user"></i></span></li>
                    <li style="position:absolute;bottom: 0;"><a href="./logout.php">Logout</a><span class="icon"><i style="margin-left: 11.5vw; color:#fff;" class="fa fa-sign-out"></i></span></li>
                </ul>
        </nav>
    </div>
    <section style="display: flex;flex-direction: row; padding-top:5vh;">
        <section class="malpractice_history">
            <div>
                <h3 class="leave_history_h2">Report Summary</h3>
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
                    </thead>
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
                </table>
            </div>
        </section>
        <section class="malpractice_and_graph">
            <section class='record_malpractice'>
                <h3>Report Malpractice</h3>
                <form action="/action_page.php">
                    <div class="flex-row">
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

                        </select>
                    </div><br><br>
                    <div class="flex-row">
                        <label style="margin-top: 20px;" for="leave_reason">State Reason: </label>
                        <textarea name="leave_reason" id="leave_reason"></textarea>
                    </div>
                    <br>
                    <div class="flex-row">
                        <label for="appt">Select approx time:</label>&nbsp;&nbsp;&nbsp;
                        <input type="time" id="appt" name="appt">
                    </div><br>
                    <div class="flex-row">
                        <input class="submit_button" type="submit" value="Submit">
                    </div>
                </form>
            </section>
            <section class="malpractice_graph">
                <h3>VISUALIZE YOUR ACTIVITY</h3>
                <?php

                $dataPoints = array(
                    array("y" => 1, "x" => 2021),
                    array("y" => 2, "x" => 2021),
                    array("y" => 3, "x" => 2022),
                    array("y" => 1, "x" => 2022),
                    array("y" => 2, "x" => 2022),
                    array("y" => 3, "x" => 2022),
                    array("y" => 1, "x" => 2022),
                    array("y" => 0, "x" => 2023),
                    array("y" => 1, "x" => 2023),
                    array("y" => 1, "x" => 2023)
                );

                ?>
                <div id="chartContainer" style="height: 100%; width: 100%;"></div>

            </section>
        </section>
    </section>

    <script type="text/javascript">
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,

                axisY: {
                    valueFormatString: "#######"
                },
                axisX: {
                    valueFormatString: "####"
                },
                data: [{
                    type: "spline",
                    xValueFormatString: "Year ####",
                    yValueFormatString: "#######",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>

                }]
            });

            chart.render();
        }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>

</html>