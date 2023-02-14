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
                                //echo $staff_table;
                                // Execute the query
                                $staff_result = mysqli_query($link, $staff_table);
                                $date_time = array();
                                $staff = array();
                                while ($staff_row = mysqli_fetch_assoc($staff_result)) {
                                    array_push($date_time, $staff_row['date_time']);
                                    array_push($staff, $staff_row['email']);
                                };
                                print_r($staff);
                                print_r($date_time);

                                $leave_table = "SELECT * FROM `leave` WHERE `status` = 'REJECTED'";
                                $leave_result = mysqli_query($link, $leave_table);
                                while ($leave_row = mysqli_fetch_assoc($leave_result)) {
                                    if ($leave_row['mail'] != null and $leave_row['mail'] == $username) {
                                        $temp1 = array_search($leave_row['date_time'], $date_time);
                                        $leave_table = "SELECT * FROM `leave` WHERE `status` = 'REJECTED'";
                                        $leave_result = mysqli_query($link, $leave_table);
                                        while ($leave_row = mysqli_fetch_assoc($leave_result)) {
                                ?>
                                            <option value="<?php echo $leave_row['date_time'] ?>"><?php echo $leave_row['date_time'] ?> </option>
                                        <?php }
                                        unset($date_time[$temp1]);
                                        foreach ($date_time as $value) {
                                        ?>
                                            <option value="<?php echo $value ?>"><?php echo $value ?> </option>
                                <?php                        }
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
                            <label style="margin-top: 18px;">Leave / Mutual Interchange Reason: </label>
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
                <h3>Track your activity</h3>

            </section>
        </section>
        <section class="history_leave">
            <h2 class="leave_history_h2">Leave Summary</h2>

            <?php
            $sql = "SELECT * FROM invigilation.leave where mail = '$username'";
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
                        <h4 style="text-align: center; padding-bottom:20px; padding-top:20px; letter-spacing:2px;">No Leave Record Found!</h4>
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


</html>