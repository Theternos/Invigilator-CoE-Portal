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
    <link rel="stylesheet" href="../css/new_style.css" />
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
    <div class="primary-nav">

        <button href="#" class="hamburger open-panel nav-toggle">
            <span class="screen-reader-text">Menu</span>
        </button>

        <nav role="navigation" class="menu">
            <a href="#" class="logotype">CoE<span> Portal</span></a>
            <div class="overflow-container">
                <ul style="margin-top:1vh; " class="menu-dropdown">
                    <li><a href="index.php">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span></li>
                    <li><a href="./faculty.php">Faculty / Exam</a><span class="icon"><i class="fa fa-renren"></i></span></li>
                    <li><a href="#">Leave Approve</a><span class="icon"><i class="fa fa-stumbleupon"></i></span></li>
                    <li><a href="#">Faculty</a><span class="icon"><i class="fa fa-user"></i></span></li>
                    <li style="position:absolute;bottom: 0;"><a href="./logout.php">Logout</a><span class="icon"><i style="margin-left: 11.5vw; color:#fff;" class="fa fa-sign-out"></i></span></li>
                </ul>
        </nav>
    </div>
    <section class="over_all_main">
        <section class="left_main_box">
            <section class="leave_approve_portal">
                <h5>LEAVE APPROVE PORTAL</h5>
            </section>
            <section class="leave_approve_graph">
                <h5>VISUALIZE THE DATA</h5>
            </section>
        </section>
        <section class="leave_summary">
            <h5>LEAVE SUMMARY</h5>
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
    </section>
</body>
<script src="./js/script.js"></script>

</html>