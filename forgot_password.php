<!DOCTYPE html>

<html lang="en">

<?php
    /**
     * Author: Varatep-mac
     */
?>

<head>
    <meta charset="utf-8" />
    <title>Forgot Username</title>
    <link rel="stylesheet" href="assets/lab4.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        function redirect() {
            if (document.getElementById('method_security_question').checked) {
                alert("1");
                window.location.href = 'method_security.php';
            }

            if (document.getElementById('method_email').checked) {
                alert("2");
                window.location.href = 'method_email.php';
            }
        }
    </script>

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">424</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href="signin.php">Home</a></li>
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

    <form name="forgot_password" id = "forgot_password" method="post" action="forgot_password.php">
        <div class="outerbox_forgot_username">
            <p class="title">Find Password</p>
            <div class = "method_div">

                <div class = "method_div">
                    <input type="button" value="Find by Security Question" class="find_button" style="margin: 10px;" onclick="location.href='method_security.php'">
                    <input type="button" value="Find by E-mail address" class="find_button" style="margin: 10px;" onclick="location.href='method_email.php'">
                </div>


            </div>

            <div class = "forgot1">
                Want to Sign In? Click <a href="signin.php">HERE</a><BR/>
                Forgot Username? Click <a href="forgot_username.php">HERE</a><BR/>
                New user? Register <a href="register.php">HERE</a>
            </div>
        </div>
    </form>

</body>
</html>

