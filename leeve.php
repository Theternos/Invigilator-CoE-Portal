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


        <label for="">Total Classes Needed</label>
        <input type="number" id="input-field">
        <button id="submit-button">Submit</button>
        <label class='exam_reg_label1'>Select Class Rooms : <span>*</span></label>
        <button id="show-popup">Search</button>

        <form>
            <div class="multi-select">
                <div id="popup" class="popup">
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
                    <button id="close-popup">Close</button>
                </div>
            </div>
            <br /><br />
            <label for="">From Date</label>
            <input type="date"><br /><br />
            <label for="">To Date</label>
            <input type="date"><br /><br />
            <label for="">Session</label>
            <select name="" id="">
                <option value="">SELECT</option>
                <option value="">FN</option>
                <option value="">AN</option>
            </select><br /><br />
            <button>Submit</button>
            </select>
        </form>
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



        <style>
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