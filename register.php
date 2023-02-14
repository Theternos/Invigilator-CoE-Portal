<?php
// Include config file
require_once "config.php";
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["bit_invigilation_duty_COE"]) && $_SESSION["bit_invigilation_duty_COE"] === true) {
    header("location: login.php");
    exit;
}
error_reporting(0);
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter your Mail.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This Mail is already taken.";
                } else {
                    include 'config.php';
                    $user_data = "SELECT student_official_email_id from user_data";
                    $resulty = mysqli_query($link, $user_data);
                    $temp = 0;
                    while ($row = mysqli_fetch_array($resulty)) {
                        if (strtoupper($row['student_official_email_id']) == strtoupper(trim($_POST["username"]))) {
                            $username = trim($_POST["username"]);
                            $temp = 1;
                        }
                    }
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        if ($temp == 1) {
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    session_start();

                    // Store data in session variables
                    $_SESSION["Success"] = "You have successfully Signed Up!";
                    header("location: login.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        } else { ?>
            <p style="text-align: center; color:red; font-size:20px;"><?php echo "Oops! Make sure that you use BITSATHY Mail ID."; ?></p>
<?php }
    }


    // Close connection
    mysqli_close($link);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BIT'S HACK22 | SIGNUP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style-login.css">
    <link rel="icon" type="image/x-icon" href="/assets/icon.png">


    <style>
        body {
            background-color: #f2f4fe;
            max-height: 100vh;
        }
    </style>
</head>

<body>
    <center>
        <section class="signup_forms">
            <div class="wrapper_signup">
                <b>
                    <h3>Set up your account</h3>
                </b>
                <p>Join us and start your journey with us.</p>
                <div class="investor">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group_signup">
                            <input class="input_box_reg" type="text" name="username" placeholder="Enter your Mail ID" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group_signup">
                            <input type="password" name="password" placeholder="Enter your password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group_signup">
                            <input type="password" name="confirm_password" placeholder="Re-enter your password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group_signup">
                            <input type="submit" class="login_btn" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </center>
</body>

</html>
<?php
?>