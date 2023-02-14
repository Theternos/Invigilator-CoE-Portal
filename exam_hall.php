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
    <title>BIT Invigilation Duty</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">

</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">CoE Portal.</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="active nav-link">Exam-Hall</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Invigilation</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Faculty</a>
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
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10 bg-light mt-2 rounded pb-3">
                    <?php
                    $stmt = $link->prepare("SELECT * FROM classroom_details");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    ?>
                    <table class="table table-hover table-light table-striped" id="table-data">
                        <thead>
                            <tr>
                                <th>Block</th>
                                <th>Floor</th>
                                <th>Classroom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $row['block'] ?></td>
                                    <td><?= $row['floor'] ?></td>
                                    <td><?= $row['classroom'] ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="./js/script.js"></script>

</html>