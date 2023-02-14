<?php
include('config.php');
if (isset($_POST['leave_type'])) {
    $leave_type = $_POST['leave_type'];
    $date_time = $_POST['date_time'];
    #$date_time = '31 Mar 2022, 09:30 AM - 12:30 PM';
    #leave_type = 'Leave';
    if ($date_time != NULL) {
        echo "<option>-- SELECT --</option>";
    }
    if ($leave_type == 'Leave') {
        $sql1 = "SELECT * FROM `invigilation`.`user_data`";
        $result1 = mysqli_query($link, $sql1);
        $sql = "SELECT * FROM `invigilation`.`staff` WHERE status= 'UPCOMING'";
        $result = mysqli_query($link, $sql);
        $staff = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($staff, $row['email']);
        }
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $temp =  array_search($row1['student_official_email_id'], $staff);
            if ($row1['student_official_email_id'] != $staff[$temp]) {
?>
                <option value="<?php echo $row1['Year']; ?>"><?php echo $row1['Year'] ?></option>
                <?php
            }
        }
    } elseif ($leave_type == 'Mutual Interchange') {
        $sql = "SELECT * FROM invigilation.staff WHERE status= 'UPCOMING'";
        $result = mysqli_query($link, $sql);
        $sql1 = "SELECT * FROM invigilation.leave";
        $result1 = mysqli_query($link, $sql1);
        $leave = array();
        $date_time = array();
        while ($row1 = mysqli_fetch_assoc($result1)) {
            array_push($leave, $row1['alt_mail']);
            array_push($date_time, $row1['date_time']);
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $temp1 =  array_search($row['email'], $leave);
            $temp2 =  array_search($row['date_time'], $date_time);
            if ($row['email'] != $leave[$temp1]) {
                if ($row['email'] != $date_time[$temp2]) {
                    $sqll = mysqli_query($link, "SELECT * FROM invigilation.user_data");
                    while ($roww = mysqli_fetch_assoc($sqll))
                        if ($row['email'] == $roww['student_official_email_id']) ?>
                    <option value="<?php echo $row['staff']; ?>"><?php echo $row['staff'] ?></option>
<?php }
            }
        }
    }
}
