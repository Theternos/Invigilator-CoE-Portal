<?php

include '../config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE_admin"]) || $_SESSION["bit_invigilation_duty_COE_admin"] !== true) {
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
    <link rel="stylesheet" href="../css/new_style.css" />
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
            <section class="flex-row">
                <section class='duty_allotment'>
                    <h3>Duty - Allotment</h3>
                    <div id="duty_allotment">
                        <form action="action.php" method="POST">
                            <div class="flex-row">
                                <label for="assistant_professor_i_limit">Assistant Professor - I :</label>
                                <input type="number" name='assistant_professor_i_limit'>
                            </div>
                            <div style="margin-top: 13px;" class="flex-row">
                                <label for="assistant_professor_ii_limit">Assistant Professor - II :</label>
                                <input type="number" name='assistant_professor_ii_limit'>
                            </div>
                            <div style="margin-top: 13px;" class="flex-row">
                                <label for="assistant_professor_iii_limit">Assistant Professor - III :</label>
                                <input type="number" name='assistant_professor_iii_limit'>
                            </div>
                            <div style="margin-top: 13px;" class="flex-row">
                                <label for="senior_professor_limit">Senior Professor :</label>
                                <input type="number" name='senior_professor_limit'>
                            </div>
                            <div style="margin-top: 13px;" class="flex-row">
                                <label for="associate_professor_limit">Associate Professor :</label>
                                <input type="number" name='associate_professor_limit'>
                            </div>
                            <div style="margin-top: 13px;" class="flex-row">
                                <label for="professor_limit">Professor :</label>
                                <input type="number" name='professor_limit'>
                            </div>
                            <div style="margin-top: 13px;" class="flex-row">
                                <button name='update_staff_recruit_limit'>Update</button>
                            </div>
                        </form>
                    </div>
                </section>
                <section class="existing_limit">
                    <h3>Existing - Duty limit</h3>
                    <?php
                    $sql = "SELECT * from duty_limit";
                    $result = mysqli_query($link, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="flex-row">
                                <p class="el_label_p" style="margin-top: 10px;">Assistant Professor - I :</p>
                                <p class="el_limit_p" style="margin-top: 10px;"><?php echo $row['ap_1'] ?></p>
                            </div>
                            <div style=" margin-top: 20px;" class="flex-row">
                                <p class="el_label_p">Assistant Professor - II :</p>
                                <p class="el_limit_p"><?php echo $row['ap_2'] ?></p>
                            </div>
                            <div style="margin-top: 20px;" class="flex-row">
                                <p class="el_label_p">Assistant Professor - III :</p>
                                <p class="el_limit_p"><?php echo $row['ap_3'] ?></p>
                            </div>
                            <div style="margin-top: 20px;" class="flex-row">
                                <p class="el_label_p">Senior Professor :</p>
                                <p class="el_limit_p"><?php echo $row['sp'] ?></p>
                            </div>
                            <div style="margin-top: 20px;" class="flex-row">
                                <p class="el_label_p">Associate Professor :</p>
                                <p class="el_limit_p"><?php echo $row['ap'] ?></p>
                            </div>
                            <div style="margin-top: 20px;" class="flex-row">
                                <p class="el_label_p">Professor :</p>
                                <p class="el_limit_p"><?php echo $row['p'] ?></p>
                            </div>
                    <?php
                        }
                    };
                    ?>
                </section>
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
            <h2 class="leave_history_h2">Register Exam Halls</h2>


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