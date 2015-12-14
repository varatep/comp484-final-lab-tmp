<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Forgot Username</title>
    <link rel="stylesheet" href="assets/lab4.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>



    <?php

    if ($_POST)
    {
        $valid = true;

        if (!isset($_POST['email']) || (empty($_POST['email']))) {
            $valid = false;
        }

        if (!isset($_POST['first_name']) || (empty($_POST['first_name']))) {
            $valid = false;
        }

        if (!isset($_POST['last_name']) || (empty($_POST['last_name']))) {
            $valid = false;
        }

        if ($valid) {
            $database = 'captain_vahab';
            $user = 'vahab';
            $password = '5bPKpsmPvfEujKVb';
            $host = 'localhost';

            $connection = mysql_connect($host, $user, $password);
            $db = mysql_select_db('captain_vahab', $connection);

            if (!$connection)
                die('Connection Failed' . mysql_error());

            if (!$db)
                die('Database connection Failed' . mysql_error());


            $email = $_POST['email'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];

            $query = "SELECT * FROM users WHERE email = \"$email\" AND first_name = \"$first_name\" AND last_name = \"$last_name\"";

            $result = mysql_query($query);

            $row = mysql_fetch_assoc($result);

            if ($row) {

                $query1 = "SELECT security_question FROM users WHERE email = \"$email\" AND first_name = \"$first_name\" AND last_name = \"$last_name\"";
                $result1 = mysql_query($query1); ?>

                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">424</a>
                        </div>

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class="active"><a href="signin.php">Log In</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class="active"><a href="register.php">Register</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class="active"><a href="recover_account.php">Recover Account</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <?php
                if (!$result1) {
                    echo "Could not successfully run query ($query1) from DB: " . mysql_error();
                    exit;
                }

                if (mysql_num_rows($result1) == 0) {
                    echo "There is no account that you proivded. Please check your input or Register.";
                    exit;
                }

                while ($row = mysql_fetch_assoc($result1)) {
                    $question_quote = "";
                    $question = $row["security_question"];
                    if ($question == "petname") {
                        $question_quote = "What is your pet's name?";
                    }

                    if ($question == "schoolname") {
                        $question_quote = "What university did you attend?";
                    }

                    if ($question == "gradyear") {
                        $question_quote = "What year did / will you graduate?";
                    }

                    if ($question == "maiden") {
                        $question_quote = "What is your mother's maiden name?";
                    }

                    if ($question == "nickname") {
                        $question_quote = "What was your childhood nickname?";
                    }

                    if ($question == "oldmiddle") {
                        $question_quote = "What is the middle name of your child?";
                    }

                    if ($question == "firstcar") {
                        $question_quote = "What was the model of your first car?";
                    }
                    ?>

                    <div class="question_outer_div">
                        <form name="setnewpassword" class = "setnewpassword" method="post">
                            <span class="result"> <?php echo "</br><div style='font-size: 20px; text-align: center; color: red'>$error_quote</div>" ?></span>
                            <p style="font-size:20px;text-align: center; margin-top: 10px;"> <?php echo $question_quote ?><br/></p>
                            <input type="text" class="type_forgot_username" name="security_answer" placeholder="Answer here">
                            <input type="button" name ="checkanswer" value="Submit Answer" class="submit" style="margin: 10px;" onclick="location.href='setnewpassword.php?email=<?php echo $email?>'">
                        </form>
                    </div>

                <?php
                }
                echo "<form id ='method_security' style='display:none;'></form>";
                mysql_free_result($result1);


            }

            else {
                $error_quote = "There is no account that you proivded. Please check your input or Register.";
            }
        }
        else {
            $error_quote = "Please fill all the fields.";
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
                <li class="active"><a href="index.php">Home</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="active"><a href="signin.php">Log In</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="active"><a href="register.php">Register</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="active"><a href="recover_account.php">Recover Account</a></li>
            </ul>
        </div>
    </div>
</nav>

<form name="method_security" id = "method_security" method="post" action="method_security.php">
    <div class="outerbox_forgot_username" id = "outerbox_forgot_username">

        <span class = "result"> <?php echo "</br><div style='font-size: 20px; text-align: center; color: red'>$error_quote</div>"?></span>

        <p class="title">Find Password</p>


        <div class="choose_question" id = "choose_question">
            <input type="text" class="type_forgot_username" id ="name" name="first_name" placeholder="First name">
            <input type="text" class="type_forgot_username" id ="name" name="last_name" placeholder="Last name">
            <input type="email" class="type_register" name="email" placeholder="E-mail address (*Required)">


        </div>


        <input type="submit" value="Temporary Question" class="submit" style="margin: 10px;">


        <div class = "forgot2">
            Find password by e-mail, Click <a href="method_email.php">HERE</a><br/>
            Have an account? Sign in <a href="signin.php">HERE</a><br/>
            New user? Register <a href="register.php">HERE</a>
        </div>
    </div>
</form>
</body>
</html>