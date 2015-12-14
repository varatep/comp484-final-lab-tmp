<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Forgot Username</title>
    <link rel="stylesheet" href="assets/lab4.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>

    <?php session_start();

        if ($_POST)
        {
            $valid = true;

            if (!isset($_POST['first_name']) || (empty($_POST['first_name'])))
            {
                $valid = false;
            }

            if (!isset($_POST['last_name']) || (empty($_POST['last_name'])))
            {
                $valid = false;
            }

            if (!isset($_POST['phone_number']) || (empty($_POST['phone_number'])))
            {
                $valid = false;
            }

            if (!isset($_POST['birth_date']) || (empty($_POST['birth_date'])))
            {
                $valid = false;
            }

            if ($valid)
            {
                $database = 'captain_vahab';
                $user = 'vahab';
                $password = '5bPKpsmPvfEujKVb';
                $host = 'localhost';

                $connection = mysql_connect($host, $user, $password);
                $db = mysql_select_db('captain_vahab', $connection);

                if (!$connection)
                    die('Connection Failed'.mysql_error());

                if (!$db)
                    die('Database connection Failed'.mysql_error());

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone_number = $_POST['phone_number'];
                $birth_date = $_POST['birth_date'];

                $query = "SELECT * FROM users WHERE first_name = \"$first_name\" AND last_name = \"$last_name\" AND phone_number = \"$phone_number\" AND birth_date = \"$birth_date\"";

                $result = mysql_query($query);

                $row = mysql_fetch_assoc($result);

                if($row)
                {
                    ?><p style = "font-size: 30px; margin-top: 50px; text-align: center; font-weight: bold;"> <?php echo "Your User E-mail is: ", $row["email"]?> <a href="signin.php">Sign In HERE</a></p><?php

                    header("Location: signin.php");
                    ?>
                <?php
                }

                else
                {
                    $error_quote = "Please check information that you provided.";
                }
            }

            else
            {
                $error_quote = "Please fill all the fields.";
                //echo "<div style='color: red; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px;'>Please check your input.</div>";
            }
        }
    ?>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">424</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="index.php">Home</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li class=""><a href="signin.php">Log In</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li class=""><a href="register.php">Register</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="active"><a href="recover_account.php">Recover Account</a></li>
            </ul>
        </div>
    </div>
</nav>


    <form name="forgot_username" id = "forgot_username" method="post" action="forgot_username.php">
        <div class="outerbox_forgot_username">
            <span class = "result"> <?php echo "</br><div style='font-size: 30px; text-align: center; color: red'>$error_quote</div>"?></span>

            <p class="title">Find Username</p>

            <div class="choose_question" id = "choose_question">
                <input type="text" class="type_forgot_username" id ="name" name="first_name" placeholder="First name">
                <input type="text" class="type_forgot_username" id ="name" name="last_name" placeholder="Last name">
                <input type="text" class="type_forgot_username2" name="phone_number" placeholder="Phone Number (e.g. 123-345-6789)">
                <input type="date" class="birthday" name="birth_date" placeholder="Birthday (e.g. 1980-01-01)" >

                <!-- show security question that user choose when register
                <p id="security_question" style="font-size: 13px;">Security question:</p>
                <p id="security_question">show security question that user chose when register</p>
                <input type="text" class ="type_forgot_username2" name="securityanswer" placeholder="Answer for Security Question">-->
                </div>

            <input type="submit" value="Find Username" class="submit" style="margin: 10px;">

            <div class = "forgot1">
                Forgot password? Click <a href="forgot_password.php">HERE</a><BR/>
                New user? Register <a href="register.php">HERE</a><br/>
                Want to Sign In? Click <a href="signin.php">HERE</a>
            </div>
        </div>


    </form>
</body>
</html>

