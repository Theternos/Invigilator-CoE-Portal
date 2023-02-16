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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                    <a href="report.php" class="nav-link">Malpractice</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="active nav-link">Leave Apply</a>
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
    <section class='leave'>
        <div class="flex_row">
            <h3>Leave / Mutual Alter - Apply</h3>
        </div>
        <div id="leave">
            <?php
            $sql1 = "SELECT * from invigilation.leave ";
            $result1 = mysqli_query($link, $sql1);
            $sql = "SELECT * FROM invigilation.staff Where email = '$username'";
            $result = mysqli_query($link, $sql);
            $date_time = array();
            $staff = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($date_time, $row['date_time']);
                array_push($staff, $row['email']);
            }
            print_r($staff);
            print_r($date_time);
            ?>

            <form action="leave_action.php" method="POST">
                <label>Select Exam Duty: </label><br>
                <!--<select class="date_time" name="date_time" id="date_time" onchange="FetchState()" required>-->
                <option value="0"> -- SELECT -- </option>
                <?php
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $temp1 =  array_search($row1['date_time'], $date_time);
                    $temp2 =  array_search($row1['email'], $staff);
                    echo $staff[$temp2];
                    $sqll = "SELECT status from `invigilation`.`leave` where mail = '$username' and date_time = '$date_time[$temp1]'";
                    echo $sqll;
                    $resultt = mysqli_query($link, $sqll);
                    $roww = mysqli_fetch_assoc($resultt);
                    if ($staff_email == $username and $row['status'] == 'UPCOMING') {
                        if ($staff[$temp2] != NULL) {
                            if ($username == $staff[$temp2] and $row['date_time'] == $date_time[$temp1]) {
                                if ($roww['status'] == 'REJECTED') {
                ?>
                                    <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                                <?php
                                }
                            } elseif ($row['email'] != $username) {
                                ?>
                                <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                            <?php
                            }
                        } else {
                            if ($staff[$temp2] == NULL) {

                            ?>
                                <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                                <?php
                            } else {
                                if ($date_time == $row['date_time']) {

                                ?>
                                    <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                <?php
                                }
                            }
                        }
                    }
                }
                ?>
                </select><br><br>
                <label>Select Leave Type: </label><br>
                <select style='letter-spacing:1px;' class="leave_type" name="leave_type" id="leave_type" onchange="FetchState()">
                    <option value="0">-- SELECT --</option>
                    <option value="Leave">Leave</option>
                    <option value="Mutual Interchange">Mutual Interchange</option>
                </select><br><br>
                <label>Leave / Mutual Interchange Reason: </label>
                <textarea name="leave_reason" id="leave_reason" required></textarea><br>
                <label>Select Alternate Staff: </label><br>
                <select class="alt_staff" name="alt_staff" id="alt_staff" required>
                    <option value="0">-- SELECT --</option>
                </select><br>
                <button name='leave_insert'>Submit</button>
            </form>
        </div>
    </section>
    <h2 class="leave_history_h2">Leave Summary</h2>
    <section class="leave_history">

        <?php
        $sql = "SELECT * FROM invigilation.leave where mail = '$username'";
        $result = mysqli_query($link, $sql);
        $temp = 1;
        if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th class="table_sno">S.no</th>
                        <th>Leave Type</th>
                        <th>Alternate Staff</th>
                        <th>Date & Time</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                    <a href="report.php" class="nav-link">Malpractice</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="active nav-link">Leave Apply</a>
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
    <section class='leave'>
        <div class="flex_row">
            <h3>Leave / Mutual Alter - Apply</h3>
        </div>
        <div id="leave">
            <?php
            $table_leave = "SELECT * from invigilation.leave ";
            $leave_result = mysqli_query($link, $table_leave);
            $table_staff = "SELECT * FROM invigilation.staff Where email = '$username'";
            $staff_result = mysqli_query($link, $table_staff);
            $date_time = array();
            $staff = array();
            while ($staff_row = mysqli_fetch_assoc($staff_result)) {
                array_push($date_time, $staff_row['date_time']);
                array_push($staff, $staff_row['email']);
            }
            print_r($staff);
            print_r($date_time);

            ?>

            <form action="leave_action.php" method="POST">
                <label>Select Exam Duty: </label><br>
                <!--<select class="date_time" name="date_time" id="date_time" onchange="FetchState()" required>-->
                <option value="0"> -- SELECT -- </option>
                <?php
                while ($leave_row = mysqli_fetch_assoc($leave_result)) {
                    $temp1 =  array_search($leave_row['date_time'], $date_time);
                    $temp2 =  array_search($leave_row['mail'], $staff);

                    if (is_null($temp2) == false) {
                        $temp2 = 0;
                    } elseif (is_null($temp1) == false) {
                        $temp1 = 1;
                    }
                    echo $temp1;
                    echo $temp2;
                    $table_leave_2 = "SELECT status from `invigilation`.`leave` where mail = '$username' and date_time = '$date_time[$temp1]'";
                    echo $table_leave_2;
                    $leave_result_2 = mysqli_query($link, $table_leave_2);
                    $leave_row_2 = mysqli_fetch_assoc($leave_result_2);
                    $table_staff = "SELECT * FROM invigilation.staff Where email = '$username' and date_time = '$date_time[$temp1]'";
                    $staff_result = mysqli_query($link, $table_staff);
                    $staff_row = mysqli_fetch_assoc($staff_result);
                    if ($staff_row['email'] == $username and $staff_row['status'] == 'UPCOMING') {
                        if ($staff[$temp2] != NULL and $date_time[$temp1] != NULL) {
                            if ($staff_row['date_time'] == $date_time[$temp1]) {
                                if ($leave_row_2['status'] == 'REJECTED') {
                ?>
                                    <option value="<?php echo $staff_row['date_time'] ?>"><?php echo $staff_row['date_time'] ?> </option>
                                <?php
                                }
                            } elseif ($staff_row['date_time'] != $date_time[$temp1]) {
                                echo 'hola';
                            }
                        } else {
                            echo 'hii';
                            if ($date_time[$temp1] == NULL) {

                                ?>
                                <option value="<?php echo $staff_row['date_time'] ?>"><?php echo $staff_row['date_time'] ?> </option>
                                <?php
                            } else {
                                if ($date_time == $row['date_time']) {

                                ?>
                                    <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                <?php
                                }
                            }
                        }
                    }
                }
                ?>
                </select><br><br>
                <label>Select Leave Type: </label><br>
                <select style='letter-spacing:1px;' class="leave_type" name="leave_type" id="leave_type" onchange="FetchState()">
                    <option value="0">-- SELECT --</option>
                    <option value="Leave">Leave</option>
                    <option value="Mutual Interchange">Mutual Interchange</option>
                </select><br><br>
                <label>Leave / Mutual Interchange Reason: </label>
                <textarea name="leave_reason" id="leave_reason" required></textarea><br>
                <label>Select Alternate Staff: </label><br>
                <select class="alt_staff" name="alt_staff" id="alt_staff" required>
                    <option value="0">-- SELECT --</option>
                </select><br>
                <button name='leave_insert'>Submit</button>
            </form>
        </div>
    </section>
    <h2 class="leave_history_h2">Leave Summary</h2>
    <section class="leave_history">

        <?php
        $sql = "SELECT * FROM invigilation.leave where mail = '$username'";
        $result = mysqli_query($link, $sql);
        $temp = 1;
        if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th class="table_sno">S.no</th>
                        <th>Leave Type</th>
                        <th>Alternate Staff</th>
                        <th>Date & Time</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                    <a href="report.php" class="nav-link">Malpractice</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="active nav-link">Leave Apply</a>
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
    <section class='leave'>
        <div class="flex_row">
            <h3>Leave / Mutual Alter - Apply</h3>
        </div>
        <div id="leave">


            <form action="leave_action.php" method="POST">
                <label>Select Exam Duty: </label><br>
                <!--<select class="date_time" name="date_time" id="date_time" onchange="FetchState()" required> -->
                <option value="0"> -- SELECT -- </option>
                <?php
                $sql = "SELECT staff.`status`,staff.email, staff.`date_time`, `leave`.`date_time` as leave_date_time ,`leave`.`status` as leave_status from staff inner join `leave` on staff.email = `leave`.mail WHERE staff.`date_time` IN (SELECT `leave`.date_time from `leave`) and staff.email = '$username'";
                echo $sql;

                // Execute the query
                $result = mysqli_query($link, $sql);
                // Check if the query was successful
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the results and print the data
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['leave_status'] == 'REJECTED' and $row['date_time'] == $row['leave_date_time']) {
                ?>
                            <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                            <?php
                        } else {
                            $sqll = "SELECT staff.`status`,staff.email, staff.`date_time`, `leave`.`date_time` as leave_date_time ,`leave`.`status` as leave_status from staff join `leave` on staff.email = `leave`.mail WHERE staff.`date_time` NOT IN (SELECT `leave`.date_time from `leave`) and staff.email = '$username'";
                            echo $sqll;
                            $resultt = mysqli_query($link, $sqll);
                            while ($rows = mysqli_fetch_assoc($resultt)) {
                            ?>
                                <option value="<?php echo $rows['date_time'] ?>"> <?php echo $rows['date_time'] ?> </option>
                            <?php
                            }
                        }
                    }
                } else {
                    echo '<br/>';
                    $sql = "SELECT staff.`status`,staff.email, staff.`date_time`,`leave`.`status` as leave_status from staff inner join `leave` on staff.email = `leave`.mail WHERE staff.`date_time` NOT IN (SELECT `leave`.date_time from `leave`) and staff.email = '$username'";
                    echo $sql;

                    // Execute the query
                    $result = mysqli_query($link, $sql);
                    // Check if the query was successful
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the results and print the data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                            <?php

                        }
                    } else {
                        $sql = "select * from staff where email = '$username';";
                        echo $sql;

                        // Execute the query
                        $result = mysqli_query($link, $sql);
                        // Check if the query was successful
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through the results and print the data
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row[''])
                            ?>
                                <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?> </option>
                <?php

                            }
                        } else {
                            echo "No results found.";
                        }
                    }
                }
                ?>
                </select><br><br>
                <label>Select Leave Type: </label><br>
                <select style='letter-spacing:1px;' class="leave_type" name="leave_type" id="leave_type" onchange="FetchState()">
                    <option value="0">-- SELECT --</option>
                    <option value="Leave">Leave</option>
                    <option value="Mutual Interchange">Mutual Interchange</option>
                </select><br><br>
                <label>Leave / Mutual Interchange Reason: </label>
                <textarea name="leave_reason" id="leave_reason" required></textarea><br>
                <label>Select Alternate Staff: </label><br>
                <select class="alt_staff" name="alt_staff" id="alt_staff" required>
                    <option value="0">-- SELECT --</option>
                </select><br>
                <button name='leave_insert'>Submit</button>
            </form>
        </div>
    </section>
    <h2 class="leave_history_h2">Leave Summary</h2>
    <section class="leave_history">

        <?php
        $sql = "SELECT * FROM invigilation.leave where mail = '$username'";
        $result = mysqli_query($link, $sql);
        $temp = 1;
        if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th class="table_sno">S.no</th>
                        <th>Leave Type</th>
                        <th>Alternate Staff</th>
                        <th>Date & Time</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
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
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                    <a href="report.php" class="nav-link">Malpractice</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="active nav-link">Leave Apply</a>
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
    <section class='leave'>
        <div class="flex_row">
            <h3>Leave / Mutual Alter - Apply</h3>
        </div>
        <div id="leave">


            <form action="leave_action.php" method="POST">
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
                            while ($staff_row = mysqli_fetch_assoc($staff_result)) {
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
                </select><br><br>
                <label>Select Leave Type: </label><br>
                <select style='letter-spacing:1px;' class="leave_type" name="leave_type" id="leave_type" onchange="FetchState()">
                    <option value="0">-- SELECT --</option>
                    <option value="Leave">Leave</option>
                    <option value="Mutual Interchange">Mutual Interchange</option>
                </select><br><br>
                <label>Leave / Mutual Interchange Reason: </label>
                <textarea name="leave_reason" id="leave_reason" required></textarea><br>
                <label>Select Alternate Staff: </label><br>
                <select class="alt_staff" name="alt_staff" id="alt_staff" required>
                    <option value="0">-- SELECT --</option>
                </select><br>
                <button name='leave_insert'>Submit</button>
            </form>
        </div>
    </section>
    <h2 class="leave_history_h2">Leave Summary</h2>
    <section class="leave_history">

        <?php
        $sql = "SELECT * FROM invigilation.leave where mail = '$username'";
        $result = mysqli_query($link, $sql);
        $temp = 1;
        if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th class="table_sno">S.no</th>
                        <th>Leave Type</th>
                        <th>Alternate Staff</th>
                        <th>Date & Time</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
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