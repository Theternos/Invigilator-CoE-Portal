<?php
include('../config.php');
error_reporting(0);
if (isset($_POST['year'])) {
    $name = $_POST['year'];
    $semester = $_POST['semester'];
    #$name = 'UG 2nd Year';
    #$semester = 'Odd Semester';
    if ($name == 'UG 1st Year' or $name == 'PG 1st Year') {
        $year = 0;
    } elseif ($name == 'UG 2nd Year' or $name == 'PG 2nd Year') {
        $year = 2;
    } elseif ($name == 'UG 3rd Year') {
        $year = 4;
    } elseif ($name == 'UG 2nd Year') {
        $year = 6;
    }
    if ($semester == 'Odd Semester') {
        $year_child = 1;
    }
    if ($semester == 'Even Semester') {
        $year_child = 2;
    }
    $parent_year = $year + $year_child;
    $Sem = '';
    $Sem = 'Sem_' . $parent_year;
    $max = '';
    $max = 'max' . '(' . $Sem . ')';
    if ($name ==  'PG 1st Year' or $name ==  'PG 2nd Year') {
        $sql = "SELECT max($Sem) from invigilation.dept_sub WHERE Department = 'Master of Business Administration'";
    } else {
        $sql = "SELECT max($Sem) from invigilation.dept_sub WHERE Department != 'Master of Business Administration'";
    }
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $i = 0;
    while ($i < $row[$max]) {
        $i = $i + 1;
        echo "<h5 class = 'exam_deeet'>Exam $i Details</h5>"; ?>
        <div class="time">
            <?php
            echo "<label class='exam_reg_label1'>Date : </label>";
            echo "<input class='exam_reg_select1' name='date$i' type='date'>";
            echo "<label class='exam_reg_label1'>From Time : </label>";
            echo "<input class='exam_reg_select1' name = 'ftime$i'type='time'>";
            echo "<label class='exam_reg_label1'>To Time : </label>";
            echo "<input class='exam_reg_select1' name = 'ttime$i'type='time'>"; ?>
        </div>
        <?php
    }
}
if (isset($_POST['date_insert'])) {
    $name = $_POST['year'];
    $semester = $_POST['semester'];
    $batch = $name . ' ' . $semester;
    $exam = $_POST['exam'];
    $of_exam = $_POST['of_exam'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $date3 = $_POST['date3'];
    $date4 = $_POST['date4'];
    $date5 = $_POST['date5'];
    $date6 = $_POST['date6'];
    $date7 = $_POST['date7'];
    $date8 = $_POST['date8'];
    $ftime1 = $_POST['ftime1'];
    $ftime2 = $_POST['ftime2'];
    $ftime3 = $_POST['ftime3'];
    $ftime4 = $_POST['ftime4'];
    $ftime5 = $_POST['ftime5'];
    $ftime6 = $_POST['ftime6'];
    $ftime7 = $_POST['ftime7'];
    $ftime8 = $_POST['ftime8'];
    $ttime1 = $_POST['ttime1'];
    $ttime2 = $_POST['ttime2'];
    $ttime3 = $_POST['ttime3'];
    $ttime4 = $_POST['ttime4'];
    $ttime5 = $_POST['ttime5'];
    $ttime6 = $_POST['ttime6'];
    $ttime7 = $_POST['ttime7'];
    $ttime8 = $_POST['ttime8'];
    $date = '';
    $ftime = '';
    $ttime = '';
    for ($i = 0; $i < 8; $i++) {
        $date = 'date' . $i;
        $ftime = 'ftime' . $i;
        $ttime = 'ttime' . $i;
        $datee = $$date;
        $ftimee = $$ftime;
        $ttimee = $$ttime;
        $date_time = $datee . ' / ' . $ftimee . ' - ' . $ttimee;
        if ($$date != NULL) {
            $sql = "INSERT INTO invigilation.exam_details (batch, exam_name, date, ftime, ttime, date_time) values ('$batch', '$exam', '$datee', '$ftimee', '$ttimee', '$date_time')";
            $result = mysqli_query($link, $sql);
        }
        $date = NULL;
        $ftime = NULL;
        $ttime = NULL;
    }
    header('location: ./faculty.php');
}

if (isset($_POST['batch_sem'])) {
    $i = $_POST['batch_sem'];
    $sql = "SELECT * from invigilation.exam_details where batch = '$i' and status = 'NOT RECRUITED'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $exam_details = $row['exam_name']  . ' / ' . $row['date'] . ' / ' . $row['ftime'] . ' - ' . $row['ttime'];
            $exam_detail = $row['exam_name'];
            $exam_det = $row['date'] . ' / ' . $row['ftime'] . ' - ' . $row['ttime'];
        ?>
            <option style='text-align:center;' value='<?php echo $exam_det ?>'><?php echo $exam_details ?></option>
            <option value="<?php echo $row['exam_name'] ?>" hidden></option>
        <?php }
    }
}
if (isset($_POST['batch__sem'])) {
    $i = $_POST['batch__sem'];
    $sql = "SELECT * from invigilation.exam_details where batch = '$i' and status = 'NOT RECRUITED'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <option value="<?php echo $row['exam_name'] ?>"><?php echo $row['exam_name'] ?></option>
<?php }
    }
}
if (isset($_POST['staff_recruit'])) {
    $values = $_POST['ary'];
    $batch = $_POST['batch_sem'];
    $exam_name = $_POST['exam__date'];
    $exam_date = $_POST['exam_date'];
    foreach ($values as $staff) {
        $sqll = "SELECT * from `invigilation`.`user_data` where Year = '$staff'";
        $resultt = mysqli_query($link, $sqll);
        $roww = mysqli_fetch_assoc($resultt);
        $email = $roww['student_official_email_id'];
        $sql1 = "SELECT * FROM invigilation.exam_details WHERE state = 'UPCOMING'";
        $result1 = mysqli_query($link, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $ftime = $row1['ftime'];
        $bio_time = strtotime($ftime);
        $bio_out = $row1['ttime'];
        $time = $bio_time - (15 * 60);
        $biometric_time = date("H:i:s", $time);
        $date = date_create($row1['date']);
        date_sub($date, date_interval_create_from_date_string('1 day'));
        $mail_date =  date_format($date, 'Y-m-d') . "\n";
        echo '<br>';
        $sql = "INSERT INTO `invigilation`.`staff` (batch, exam_name, date_time, staff, email, bio_time, mail_date, bio_out) VALUES ('$batch', '$exam_name', '$exam_date','$staff', '$email', '$biometric_time', '$mail_date', '$bio_out')";
        echo $sql;
        $result = mysqli_query($link, $sql);
    }
    echo '<br>';
    $sql = "UPDATE invigilation.exam_details SET status = 'RECRUITED' WHERE exam_name = '$exam_name' and date_time = '$exam_date'";
    echo $sql;
    $result = mysqli_query($link, $sql);
    header('location: ./faculty.php');
}
?>