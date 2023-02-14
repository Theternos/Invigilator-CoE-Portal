<?php

include '../config.php';

session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["bit_invigilation_duty_COE_admin"]) || $_SESSION["bit_invigilation_duty_COE_admin"] !== true) {
    header("location: login.php");
    exit;
}
error_reporting(0);

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
    <link rel="icon" type="image/x-icon" href="../assets/icon.png">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
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
    <section class="exam_reg">
        <h3>Register Examination</h3>
        <form action="fac_ajax.php" method="POST">
            <div class="exam_reg_whole">
                <div class="exam_reg_part">
                    <label class="exam_reg_label" for="year_label">Select Batch: </label>
                    <select class="exam_reg_select" name="year" id="year" onchange="FetchState()">
                        <option value="0">-- SELECT --</option>
                        <option value="UG 1st Year">UG 1st Year</option>
                        <option value="UG 2nd Year">UG 2nd Year</option>
                        <option value="UG 3rd Year">UG 3rd Year</option>
                        <option value="UG 4th Year">UG 4th Year</option>
                        <option value="PG 1st Year">PG 1st Year</option>
                        <option value="PG 2nd Year">PG 2nd Year</option>
                    </select>
                </div>
                <div class="exam_reg_part">
                    <label class="exam_reg_label" for="semester_label">Select Semester: </label>
                    <select class="exam_reg_select" name="semester" id="semester" onchange="FetchState()">
                        <option value="0">-- SELECT --</option>
                        <option value="Odd Semester">Odd Semester</option>
                        <option value="Even Semester">Even Semester</option>
                    </select>
                </div>
                <div class="exam_reg_part">
                    <label class="exam_reg_label" for="exam_label">Select Exam: </label>
                    <select class="exam_reg_select" name="exam" id="exam" onchange="FetchState()" required>
                        <option value="0">-- SELECT --</option>
                        <option value="PT - 1">PT - 1</option>
                        <option value="PT - 2">PT - 2</option>
                        <option value="O = PT">O - PT</option>
                        <option value="Semester">Semester</option>
                    </select>
                </div>
            </div>
            <div id="no_exam">
            </div>
            <button name='date_insert' onclick="return confirm('Are you sure you want to Submit?')">Submit</button>
        </form>
    </section>
</body>
<script src="../js/script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> </script>
<script>
    function FetchState() {
        id = $('#year option:selected').val();
        alp = $('#semester option:selected').val();
        exam = $('#exam option:selected').val();
        if (exam != 0) {
            $.ajax({
                type: "POST",
                url: "fac_ajax.php",
                data: {
                    year: id,
                    semester: alp
                },
                success: function(data) {
                    $("#no_exam").html(data);
                }
            });
        }
    }
</script>

</html>