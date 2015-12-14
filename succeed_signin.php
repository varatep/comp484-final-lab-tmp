<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sign In</title>
    <link rel="stylesheet" href="./assets/lab4.css" type="text/css" />
    <!-- <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap-theme.min.css">

    <?php session_start();

    //$email = $_SESSION['email'];
    $_SESSION['logged_in'] = false;

    if ($_POST)
    {
        $valid = true;

        if (!isset($_POST['random_code']) || (empty($_POST['random_code'])))
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

            $email = $_GET['email'];
            $random_code = $_POST['random_code'];

            $query = "SELECT * FROM users WHERE email = \"$email\" AND random_code =\"$random_code\"";

            $result = mysql_query($query);

            $row = mysql_fetch_assoc($result);


            if($row)
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $email;

                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $email = $row["email"];

                $sql = "UPDATE users SET login_count = login_count + 1 WHERE email = \"$email\"";
                mysql_query($sql);

                $login_count = $row["login_count"];
                ?>

                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="succeed_signin.php">424</a>
                        </div>

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class=""><a href="logout.php">Log Out</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class=""><a href="recover_account.php">Recover Account</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <h1 style="text-align: center; margin-top: 100px;">
                    Welcome! <?php echo $first_name ?> <?php echo $last_name ?>.<br/>
                    You logged in <?php echo $login_count?> times. <br/>
                    Log in time is

                    <?php

                    date_default_timezone_set('America/Los_Angeles');
                    echo date("F jS Y\, l h:i:s A") . "<br>";

                    ?>
                    <a href="confidential/company_confidential_file.txt">Confidential File</a>
                    <br/><a href="logout.php">Log Out</a></h1>

                <?php

                mysql_free_result($result1);
                $_SESSION['logged_in'] = true;
            }

            else
            {
                $error_quote = $random_code;

                //echo "<div style='color:red; text-align:center; font-weight: bold; font-size: 30px; margin-top: 25px;'>
                //   Wrong Credentials. Please try again or register! </div>";
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

<?php
if ($_SESSION['logged_in'] == false)
{
    //echo "<h1 style='margin-top: 100px;'> false!!!!! </h1>";
    $email = $_GET['email'];
    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">424</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="logout.php">Log Out</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li class=""><a href="register.php">Register</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li class=""><a href="recover_account.php">Recover Account</a></li>
                </ul>

            </div>
        </div>
    </nav>

    <form name="access_code" id = "access_code" method="post" action="succeed_signin.php?email=<?php echo $email?>">
        <div class="outerbox_forgot_username">
            <span class="result"> <?php echo "</br><div style='font-size: 20px; text-align: center; color: red'>$error_quote</div>" ?></span>
            <p class="title">Access Code</p>
            <p style="font-size=20px; text-align: center;"><?php echo $email?></p>
            <input type="text" value="" class="type_register" name="random_code" placeholder="Enter the Access Code">
            <input type="submit" value="Check Access Code" class="submit" style="margin-top: 10px;">

            <div class = "forgot2">
                Forgot user e-mail? Click <a href="forgot_username.php">HERE</a> <br/>
                Forgot password? Click <a href="forgot_password.php">HERE</a><br/>
                New user? Register <a href="register.php">HERE</a>
            </div>
        </div>
    </form>
<?php }
?>

</body>
</html>




