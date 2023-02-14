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
<style>
    @media screen and (max-width: 35.5em) {
        table tbody tr td:nth-child(1):before {
            content: "Batch & Year";
        }

        table tbody tr td:nth-child(2):before {
            content: "Staff";
        }

        table tbody tr td:nth-child(3):before {
            content: "Alt Staff";
        }

        table tbody tr td:nth-child(4):before {
            content: "Date & Time";
        }

        table tbody tr td:nth-child(5):before {
            content: "Reason";
        }

        table tbody tr td:nth-child(6):before {
            content: "Status";
        }
    }
</style>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">CoE Portal.</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="faculty.php" class="nav-link">Faculty / Exam</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="active nav-link">Leave Approve</a>
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
    <section class="leave_approve_portal">
        <h3>Invigilator Leave Approval Portal</h3>
        <?php
        $sql = "SELECT * FROM invigilation.leave where id != '1' and status = 'INITIATED' and state = '1'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Batch & Exam</th>
                        <th>Staff</th>
                        <th>Alt Staff</th>
                        <th>Date & Time</th>
                        <th>Reason</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['batch']; ?>&nbsp;
                                <?php echo $row['exam'];
                                ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['alt_staff'] ?></td>
                            <td><?php echo $row['date_time'] ?></td>
                            <td><?php echo $row['reason'] ?></td>

                            <td>
                                <div class="leave_accept_reject">
                                    <form style='margin-left: 0vw;' action="../leave_cancel.php" method="POST">
                                        <input type="hidden" name='name' value='<?php echo $row['name'] ?>'>
                                        <input type="hidden" name='alt_staff' value='<?php echo $row['alt_staff'] ?>'>
                                        <input type="hidden" name='date_time' value='<?php echo $row['date_time'] ?>'>
                                        <button class="leave_cancel" name="leave_accept_CoE" onclick="return confirm('Are you sure you want to Approve?')"><i class="fa fa-check accept" aria-hidden="true"></i></button>
                                    </form>
                                    <form style='margin-left: 1vw;' action="../leave_cancel.php" method="POST">
                                        <input type="hidden" name='name' value='<?php echo $row['name'] ?>'>
                                        <input type="hidden" name='date_time' value='<?php echo $row['date_time'] ?>'>
                                        <button class="leave_cancel" name="leave_reject_CoE" onclick="return confirm('Are you sure you want to Reject?')"><i class=" fa fa-close reject" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <table style="min-height:40vh; margin-top:10vh;">
                <tbody>
                    <tr>
                        <td style="margin-top:15vh ;" class="no_new_leave">No new leave approval data found!</td>
                    </tr>
                </tbody>
            </table>
        <?php    } ?>
    </section>
    <section class="leave_summary">

        <?php
        $sql = "SELECT * FROM invigilation.leave where id != '1' and status != 'INITIATED' ";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th style="text-align:center ;">Leave Type</th>
                        <th>Batch & Exam</th>
                        <th>Staff</th>
                        <th>Alternate Staff</th>
                        <th>Date & Time</th>
                        <th>Reason</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="text-align:center ;"><?php echo $row['leave_type'] ?></td>
                            <td><?php echo $row['batch']; ?>&nbsp;
                                <?php echo $row['exam'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['alt_staff'] ?></td>
                            <td><?php echo $row['date_time'] ?></td>
                            <td><?php echo $row['reason'] ?></td>
                            <td><?php echo $row['status'] ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else { ?>
            <table>
                <tr>
                    <td class='no_new_leave'>No Leave Record Found!</td>
                </tr>
            </table>


        <?php  }
        ?>
    </section>
</body>
<script src="./js/script.js"></script>

</html>