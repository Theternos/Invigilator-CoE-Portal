<?php

include 'config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE"]) || $_SESSION["bit_invigilation_duty_COE"] !== true) {
    header("location: login.php");
    exit;
}
$username = $_SESSION["username"];
error_reporting(0);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

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
                    <li><a href="#">Leave Apply</a><span class="icon"><i class="fa fa-renren"></i></span></li>
                    <li><a href="./report.php">Malpractice</a><span class="icon"><i class="fa fa-stumbleupon"></i></span></li>
                    <li><a href="#">Faculty</a><span class="icon"><i class="fa fa-user"></i></span></li>
                    <li style="position:absolute;bottom: 0;"><a href="./logout.php">Logout</a><span class="icon"><i style="margin-left: 11.5vw; color:#fff;" class="fa fa-sign-out"></i></span></li>
                </ul>
        </nav>
    </div>
    <section class="leave_history">
        <section>
            <section class='leave'>
                <h3>Leave / Mutual Alter - Apply</h3>
                <div id="leave">
                    <form action="leave_action.php" method="POST">
                        <div class="flex-row">
                            <label>Select Exam Duty: </label><br>
                            <select class="date_time" name="date_time" id="date_time" onchange="FetchState()" required>
                                <option value="0"> -- SELECT -- </option>
                                <?php
                                $staff_table = "SELECT * FROM `staff` WHERE email = '$username' and `status` = 'UPCOMING'";
                                $staff_result = mysqli_query($link, $staff_table);
                                $date_time = array();

                                while ($staff_row = mysqli_fetch_assoc($staff_result)) {
                                    $leave_table = "SELECT * FROM `leave` WHERE mail = '$username'";
                                    $leave_result = mysqli_query($link, $leave_table);
                                    if (mysqli_num_rows($leave_result) > 0) {
                                        while ($leave_row = mysqli_fetch_assoc($leave_result)) {
                                            if ($leave_row['date_time'] == $staff_row['date_time']) {
                                                if ($leave_row['status'] == 'REJECTED' and $leave_row['checking'] == '1') {
                                                    array_push($date_time, $leave_row['date_time']); ?>
                                                    <option value="<?php echo $staff_row['date_time'] ?>"><?php echo $staff_row['date_time'] ?> </option>

                                            <?php
                                                }
                                            }
                                            array_push($date_time, $leave_row['date_time']);
                                            $date_time = array_unique($date_time) ?>
                                        <?php
                                        }
                                        $search_element = $staff_row['date_time'];
                                        if (!in_array($search_element, $date_time)) {

                                            # if ($leave_row['status'] != 'INITIATED') { 
                                        ?>
                                            <option value="<?php echo $staff_row['date_time'] ?>"><?php echo $staff_row['date_time'] ?> </option>
                                        <?php
                                            #    }
                                        }
                                    } else {
                                        ?>
                                        <option value="<?php echo $staff_row['date_time'] ?>"><?php echo $staff_row['date_time'] ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div><br><br>
                        <div class="flex-row">
                            <label>Select Leave Type: </label><br>
                            <select style='letter-spacing:1px;' class="leave_type" name="leave_type" id="leave_type" onchange="FetchState()">
                                <option value="0">-- SELECT --</option>
                                <option value="Leave">Leave</option>
                                <option value="Mutual Interchange">Mutual Interchange</option>
                            </select>
                        </div><br><br>
                        <div class="flex-row">
                            <label style="margin-top: 26px;">Leave / Mutual Interchange Reason: </label>
                            <textarea name="leave_reason" id="leave_reason" required></textarea>
                        </div><br>
                        <div class="flex-row">
                            <label>Select Alternate Staff: </label><br>
                            <select class="alt_staff" name="alt_staff" id="alt_staff" required>
                                <option value="0">-- SELECT --</option>
                            </select>
                        </div><br>
                        <div class="flex-row">
                            <button name='leave_insert'>Submit</button>
                        </div>
                    </form>
                </div>
            </section>
            <section class="leave_graph">
                <h3>Visualize your activity</h3>
                <?php
                $sql = "SELECT COUNT(id) as COUNT FROM `leave` WHERE mail = '$username' and `status` = 'APPROVED' and `leave_type` = 'Leave'";
                $result = mysqli_query($link, $sql);
                if ($result->num_rows > 0) {
                    $leave_accepted_leave_row = mysqli_fetch_assoc($result);
                } else {
                    $leave_accepted_leave_row['COUNT'] = 0;
                }
                $sql = "SELECT COUNT(id) as COUNT FROM `leave` WHERE mail = '$username' and `status` = 'APPROVED' and `leave_type` = 'Mutual Interchange'";
                $result = mysqli_query($link, $sql);
                if ($result->num_rows > 0) {
                    $leave_accepted_mutual_row = mysqli_fetch_assoc($result);
                } else {
                    $leave_accepted_mutual_row['COUNT'] = 0;
                }
                $sql = "SELECT COUNT(id) as COUNT FROM `leave` WHERE mail = '$username' and `status` = 'REJECTED' and `leave_type` = 'Leave'";
                $result = mysqli_query($link, $sql);
                if ($result->num_rows > 0) {
                    $leave_rejected_leave_row = mysqli_fetch_assoc($result);
                } else {
                    $leave_rejected_leave_row['COUNT'] = 0;
                }
                $sql = "SELECT COUNT(id) as COUNT FROM `leave` WHERE mail = '$username' and `status` = 'REJECTED' and `leave_type` = 'Mutual Interchange'";
                $result = mysqli_query($link, $sql);
                if ($result->num_rows > 0) {
                    $leave_rejected_mutual_row = mysqli_fetch_assoc($result);
                } else {
                    $leave_rejected_mutual_row['COUNT'] = 0;
                }
                $dataPoints = array(
                    array("y" => $leave_rejected_leave_row['COUNT'], "label" => "Leave (Rejected)"),
                    array("y" => $leave_rejected_mutual_row['COUNT'], "label" => "Mutual Interchange (Rejected)"),
                    array("y" => $leave_accepted_leave_row['COUNT'], "label" => "Leave (Approved)"),
                    array("y" => $leave_accepted_mutual_row['COUNT'], "label" => "Mutual Interchange (Approved)"),
                );

                ?>
                <div id="chartContainer" style="height: 90%; width: 100%;"></div>
            </section>
        </section>
        <section class="history_leave">
            <h2 class="leave_history_h2">Leave Summary</h2>

            <?php
            $sql = "SELECT * FROM invigilation.`leave` where mail = '$username' ORDER BY id DESC";
            $result = mysqli_query($link, $sql);
            $temp = 1;
            if (mysqli_num_rows($result) > 0) { ?>
                <table>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td class="table_sno"><?php echo $temp ?></td>
                                <td><?php echo $row['leave_type'] ?></td>
                                <td><?php echo $row['alt_staff'] ?></td>
                                <td><?php echo $row['date_time'] ?></td>
                                <td><?php echo $row['reason'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 'INITIATED') {
                                    ?>
                                        <form action="cancel.php" method="POST">
                                            <input type="hidden" name='alt_mail' value='<?php echo $row['alt_mail'] ?>'>
                                            <input type="hidden" name='date_time' value='<?php echo $row['date_time'] ?>'>
                                            <button class="leave_cancel" name="cancel" onclick="return confirm('Are you sure you want to Cancel?')">Cancel</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                            $temp = $temp + 1;
                        }
                    } else { ?>
                        <p style="text-align: center; letter-spacing:2px; margin-top:70%;">No Leave Record Found!</p>
                    <?php  }
                    ?>
                    </tbody>
                    </thead>
                </table>
        </section>
    </section>
</body>
<script src="./js/script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> </script>
<script>
    function FetchState() {
        id = $('#date_time option:selected').val();
        alp = $('#leave_type option:selected').val();

        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                date_time: id,
                leave_type: alp
            },
            success: function(data) {
                $("#alt_staff").html(data);
            }
        });
    }
</script>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,

            axisY: {
                title: "Total number of Leave Count",
                includeZero: true
            },
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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</html>