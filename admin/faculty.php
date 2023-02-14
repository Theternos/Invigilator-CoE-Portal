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
            content: "S.No";
        }

        table tbody tr td:nth-child(2):before {
            content: "Batch";
        }

        table tbody tr td:nth-child(3):before {
            content: "Exam Name";
        }

        table tbody tr td:nth-child(4):before {
            content: "Date & Time";
        }

        table tbody tr td:nth-child(5):before {
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
                    <a href="#" class="active nav-link">Faculty / Exam</a>
                </li>
                <li class="nav-item">
                    <a href="leave_approve.php" class="nav-link">Leave Approve</a>
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
    <div class="fac">
        <a href="./exam_reg.php">
            <div class="fac1">
                <h4>Register Exam</h4>
            </div>
        </a>
        <a href="./faculty_rec.php">
            <div class="fac2">
                <h4>Recruit Staff</h4>
            </div>
        </a>
    </div>
    <section class="exam_history">
        <?php
        $sql = "SELECT * from invigilation.exam_details where status = 'NOT RECRUITED'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<h3 class='missed'>Hey! You have forgot to Recruit Staffs for these Dates / session</h3>";
            while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="carrdd">
                    <div class="carrddss">
                        <p>Batch: <?php echo $row['batch'] ?></p>
                        <p>Exam Name: <?php echo $row['exam_name'] ?></p>
                    </div>
                    <p>Date: <?php echo $row['date'] ?> &nbsp;&nbsp;&nbsp;&nbsp; Time: <?php echo $row['ftime'] ?> - <?php echo $row['ttime'] ?></p>
                    <p></p>
                    <a href="./faculty_rec.php">
                        <p>Recruit Now</p>
                    </a>
                </div>

            <?php    }
        }
        $sqll = "SELECT * FROM invigilation.exam_details ORDER BY id DESC";
        $resultt = mysqli_query($link, $sqll);
        if (mysqli_num_rows($resultt) > 0) {
            echo "<h3 style = 'font-size:18px; letter-spacing:1px;' class='missed'>Exam History</h3>";
            $temp = 1; ?>
            <table>
                <thead>
                    <tr>
                        <th class="table_sno">S.no</th>
                        <th>Batch</th>
                        <th>Exam Name</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($roww = mysqli_fetch_assoc($resultt)) { ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $temp ?></td>
                            <td><?php echo $roww['batch'] ?></td>
                            <td><?php echo $roww['exam_name'] ?></td>
                            <td><?php echo $roww['date'] ?> / <?php echo $roww['ftime'] ?> - <?php echo $roww['ttime'] ?></td>
                            <td><?php echo $roww['state'] ?></td>
                        </tr>

                    <?php
                        $temp = $temp + 1;
                    } ?>
                </tbody>
            </table><?php
                }
                    ?>
    </section>
</body>


</html>