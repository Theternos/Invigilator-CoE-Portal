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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JS & CSS library of MultiSelect plugin -->
    <script src="https://phpcoder.tech/multiselect/js/jquery.multiselect.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

</head>

<style>
    table tbody tr td:nth-child(1):before {
        content: "Staff Name";
    }

    table tbody tr td:nth-child(2):before {
        content: "Email";
    }

    table tbody tr td:nth-child(3):before {
        content: "Date & Time";
    }

    table tbody tr td:nth-child(4):before {
        content: "Venue";
    }

    table tbody tr td:nth-child(5):before {
        content: "Batch";
    }

    table tbody tr td:nth-child(6):before {
        content: "Exam Name";
    }

    table tbody tr td:nth-child(7):before {
        content: "In Time";
    }

    table tbody tr td:nth-child(8):before {
        content: "Out Time";
    }

    table tbody tr td:nth-child(9):before {
        content: "Status";
    }

    .multi-select {
        position: relative;
        display: inline-block;
    }

    .popup {
        position: absolute;

        z-index: 1000;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 10px;
        display: none;
    }

    .search-box {
        display: block;
        width: 100%;
        padding: 6px;
        margin-bottom: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .options {
        max-height: 200px;
        overflow-y: auto;
    }

    .options label {
        display: block;
        margin-bottom: 6px;
    }

    .selected-options {
        position: absolute;
        bottom: 100%;
        left: 0;
        z-index: 1000;
        width: 100%;
        padding: 6px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-top: none;
        border-radius: 0 0 4px 4px;
    }

    .selected-count {
        font-size: 14px;
        color: #333;
    }
</style>

<body>
    <div class="primary-nav">

        <button href="#" class="hamburger open-panel nav-toggle">
            <span class="screen-reader-text">Menu</span>
        </button>

        <nav role="navigation" class="menu">
            <a href="#" class="logotype" style="left:39px;top:8px;">Invgltr<span> Portal</span></a>
            <div class="overflow-container">
                <ul style="margin-top:1vh; " class="menu-dropdown">
                    <li><a href="./index.php">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span></li>
                    <li><a href="./faculty.php">Faculty / Exam</a><span class="icon"><i class="fa fa-renren"></i></span></li>
                    <li><a href="./leave_approve.php">Leave Approve</a><span class="icon"><i class="fa fa-stumbleupon"></i></span></li>
                    <li><a href="#">Customize</a><span class="icon"><i class="fa fa-user"></i></span></li>
                    <li style="position:absolute;bottom: 0;"><a href="./logout.php">Logout</a><span class="icon"><i style="margin-left: 11.5vw; color:#fff;" class="fa fa-sign-out"></i></span></li>
                </ul>
        </nav>
    </div>
    <section class="leave_history">
        <section>
            <section class="flex-row" style="width:65vw;">
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
            <section class="flex-row">
                <section class="existing_remainder">
                    <h5>Additional Schedule</h5>
                    <?php
                    $sql = "SELECT * FROM schedule_mail";
                    $result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="added_schedule">
                                <p style="margin-left:20px; margin-top:2px;">Duty : <?php echo $row['date_time']; ?></p>
                                <p style="margin-left:20px;">Schedule Time : <?php echo $row['date']; ?>&nbsp;
                                    <?php echo $row['time']; ?></p>
                            </div>

                    <?php    }
                    } ?>
                </section>
                <section class="schedule_remainder">
                    <h3 style="margin-bottom: 15px;">Schedule the Reminder</h3>
                    <?php
                    $sql = "SELECT DISTINCT date_time FROM staff WHERE `status` = 'UPCOMING'";
                    $result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <form action="fac_ajax.php" method="POST">
                            <label for="">Select Duty: </label>
                            <select name="date_time_select" id="date_time_select">
                                <option value="Not Selected"> -- SELECT -- </option>
                                <?php
                                $today = date("Y-m-d");
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['date_time'] ?>"><?php echo $row['date_time'] ?></option>
                                <?php    } ?>
                            </select><br />
                            <label for="">Select Date: </label>
                            <?php
                            $selected_date = $_POST['selected_date'];
                            $sql = "SELECT * FROM exam_details WHERE date_time = '$selected_date'";
                            $result = mysqli_query($link, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $exam_date = $row['date'];
                            echo $exam_date;
                            ?>
                            <input name="date_of_scheduling" type="date" min="<?php echo $today ?>" max="<?php echo $exam_date ?>"><br />
                            <label for="">Select Time: </label>
                            <input name="time_of_scheduling" type="time"><br />
                            <button type="submit" name="set_schedule">Set Schedule</button>
                        </form>
                    <?php  }
                    ?>
                </section>
            </section>
        </section>
        <section class="right_bar">
            <section class="second_right_bar">
                <h2 class="leave_history_h2">DOWNLOAD RECENT DATA</h2>
                <?php
                $sql = "SELECT biometric.staff_name, biometric.email, staff.date_time, staff.venue, staff.batch, staff.exam_name, biometric.in_time, biometric.out_time, biometric.`status` FROM staff, biometric WHERE staff.`status` = 'ENDED' and staff.email = biometric.email";
                $result = mysqli_query($link, $sql); ?>

                <table style='display:none;' id="tbl_exporttable_to_xls" border="1">
                    <thead>
                        <th>Staff Name</th>
                        <th>Email</th>
                        <th>Date & Time</th>
                        <th>Venue</th>
                        <th>Batch</th>
                        <th>Exam Name</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Status</th>

                    </thead>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['staff_name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['date_time'] ?></td>
                                    <td><?php echo $row['venue'] ?></td>
                                    <td><?php echo $row['batch'] ?></td>
                                    <td><?php echo $row['exam_name'] ?></td>
                                    <td><?php echo $row['in_time'] ?></td>
                                    <td><?php echo $row['out_time'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                </tr>
                            </tbody>
                    <?php }
                    } ?>
                </table>
                <button onclick="ExportToExcel('xlsx')">Click here to export data to excel</button>
                <br /><br />
            </section>
            <section class="first_right_bar">
                <h2 class="leave_history_h2">Register Exam Halls</h2>
                <label style="margin-left: 2.5vw;" class='exam_reg_label1'>Select Class Rooms : </label>
                <button id="show-popup">Select</button>
                <form>
                    <div class="multi-select">
                        <div id="popup" class="popup">
                            <button id="close-popup" style="margin-left: 20vh;">Close</button>
                            <input type="text" class="search-box" placeholder="Search...">
                            <div class="options">
                                <?php
                                $sql = "SELECT * FROM classroom_details";
                                $result = mysqli_query($link, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <label style="width:200px;"><input type="checkbox" value="value='<?php echo $row['Classroom_No'] ?>'"><?php echo $row['Classroom_No'] ?></label>
                                <?php }
                                }
                                ?>
                            </div>
                            <div class="selected-options">
                                <span class="selected-count">0 selected</span>
                            </div>
                        </div>
                    </div>
                    <button style="margin-left: 12vw;margin-top:7vh; width:80px">Submit</button>
                    </select>
                </form>
            </section>
            <section class="third_right_bar">
                <h2 class="leave_history_h2">Exam Halls' LIST</h2>
                <?php
                $sql = "SELECT * FROM classroom_details LIMIT 3";
                $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) { ?>
                    <div style="display:flex; margin-left:5vw;">
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <p style="margin-top: 5px;margin-left:25px;"><?php echo $row['Classroom_No'] ?></p>
                        <?php } ?>
                    </div>
                <?php    }
                ?>
            </section>
        </section>
    </section>
    <?php
    $count = 5
    ?>
</body>
<script>
    const now = new Date();
    const dd = String(now.getDate()).padStart(2, '0');
    const mm = String(now.getMonth() + 1).padStart(2, '0');
    const yyyy = now.getFullYear();
    const H = String(now.getHours()).padStart(2, '0');
    const M = String(now.getMinutes()).padStart(2, '0');
    const S = String(now.getSeconds()).padStart(2, '0');
    const timestamp = `${dd}-${mm}-${yyyy} ${H}:${M}:${S}`;

    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tbl_exporttable_to_xls');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || (timestamp + '.' + (type || 'xlsx')));
    }
</script>
<script>
    $(document).ready(function() {
        $('#date_time_select').change(function() {
            var selectedOption = $(this).val();
            $.ajax({
                url: 'fac_ajax.php',
                type: 'POST',
                data: {
                    option: selectedOption
                },
                success: function(data) {
                    $.ajax({
                        url: 'customize.php',
                        type: 'POST',
                        data: {
                            selected_date: data
                        },
                        success: function(result) {
                            console.log(result);
                        }
                    });
                }
            });
        });
    });
</script>

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



<script>
    const multiSelect = document.querySelector(".multi-select");
    const searchBox = multiSelect.querySelector(".search-box");
    const options = multiSelect.querySelectorAll(".options input[type='checkbox']");
    const selectedOptions = multiSelect.querySelector(".selected-options");
    const selectedCount = selectedOptions.querySelector(".selected-count");
    const showPopupButton = document.querySelector("#show-popup");
    const closePopupButton = document.querySelector("#close-popup");
    const popup = document.querySelector("#popup");

    showPopupButton.addEventListener("click", () => {
        popup.style.display = "block";
    });

    closePopupButton.addEventListener("click", () => {
        popup.style.display = "none";
    });


    const maxSelections = "<?php echo $count; ?>";
    let selected = [];

    function updateSelectedCount() {
        selectedCount.innerText = selected.length + " selected";
    }

    function onOptionChange(event) {
        const option = event.target;
        if (option.checked) {
            if (selected.length >= maxSelections) {
                option.checked = false;
                return;
            }
            selected.push(option.value);
        } else {
            selected = selected.filter((value) => value !== option.value);
        }
        updateSelectedCount();
    }

    function onSearchInput() {
        const query = searchBox.value.toLowerCase();
        for (const option of options) {
            const label = option.parentElement.innerText.toLowerCase();
            if (label.includes(query)) {
                option.style.display = "";
            } else {
                option.style.display = "none";
            }
        }
    }

    for (const option of options) {
        option.addEventListener("change", onOptionChange);
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var last_valid_selection = null;
        $('#staff_recruit').change(function(event) {
            if ($(this).val().length > 3) {
                $(this).val(last_valid_selection);
            } else {
                last_valid_selection = $(this).val();
            }
        });
    });
    $("select").on('click', 'option', function() {
        if ($("select option:selected").length > 3) {
            $(this).removeAttr("selected");
            // alert('You can select upto 3 options only');
        }
    });
</script>
<script>
    jQuery("#staff_recruit").multiselect({
        columns: 1,
        placeholder: "Select Classes",
        search: true,
    });
</script>



</html>