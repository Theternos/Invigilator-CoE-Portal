<div class="multi-select">
    <label class="recruit_label" for="exam_date">Select Staffs: </label><br>
    <select name="ary[]" multiple id="staff_recruit" required>
        <?php
        $sql = "SELECT * from invigilation.user_data";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <option style='text-align:center;' value='<?php echo $row['Year'] ?>'><?php echo $row['Year'] ?></option>
        <?php }
        }
        ?>
    </select>
</div>



if ($greeting_time <= '05:45' and $greeting_time>= '00:00')
    echo '<img src="./assets/moon.png" alt="Weather Image" width="110px">';
    elseif ($greeting_time <= '23:59' and $greeting_time>= '19:00')
        echo '<img src="./assets/moon.png" alt="Weather Image" width="110px">';
        else
        echo '<img src="./assets/cloudy.png" alt="Weather Image" width="110px">';
        ?>