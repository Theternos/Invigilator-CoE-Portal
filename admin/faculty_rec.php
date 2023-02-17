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
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JS & CSS library of MultiSelect plugin -->
    <script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script>

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
                    <a href="faculty.php" class="active nav-link">Faculty / Exam</a>
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
    <section class="recruit">
        <h3>Recruit Staffs</h3>
        <form action="fac_ajax.php" method="POST">
            <label class="recruit_label" for="batch_sem">Select Batch & Semester: </label><br>
            <select name="batch_sem" id="batch_sem" onchange="FetchState(this.value)" required>
                <option style='text-align:center;'>-- SELECT --</option>
                <?php
                $sql = "SELECT * from invigilation.exam_details where status = 'NOT RECRUITED'";
                $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $exam_details = $row['batch'];

                ?>
                        <option style='text-align:center;' value='<?php echo $exam_details ?>'><?php echo $exam_details ?></option>
                <?php }
                }
                ?>
            </select><br><br>
            <label class="recruit_label" for="exam_date">Select Exam & Date: </label><br>
            <select name="exam_date" id="exam_date" required>
                <option style="text-align: center;" value='0'>-- SELECT --</option>
            </select>
            <select name="exam__date" id="exam__date" hidden>
            </select><br><br>
            <label class="recruit_label" for="exam_date">Choose Number of Classes </label><br>
            <input type="number" style="min-width: 30px; min-height: 20px; margin: left 10vw;" name="classroom_required"><br /><br />
            <button type="submit" name="staff_recruit" onclick="return confirm('Are you sure you want to Submit?')">Submit</button>
        </form>

    </section>

</body>
<script src="../js/script.js"></script>
<script src="../js/multiselect-dropdown.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> </script>
<script>
    function FetchState(id) {
        $("#exam_date").html('');
        $.ajax({
            type: "POST",
            url: "fac_ajax.php",
            data: {
                batch_sem: id,
            },
            success: function(data) {
                $("#exam_date").html(data);
            }
        })
        $("#exam__date").html('');
        $.ajax({
            type: "POST",
            url: "fac_ajax.php",
            data: {
                batch__sem: id,
            },
            success: function(data) {
                $("#exam__date").html(data);

            }
        })
    }
</script>


</html>