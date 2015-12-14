<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Forgot Username</title>
    <link rel="stylesheet" href="assets/lab4.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <link href="./assets/PHPMailer/class.phpmailer.php">;

    <script type="text/javascript">


    </script>


    <?php
        function curPageURL() {
            $pageURL = 'http';
            if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
            $pageURL .= "://";
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"];
            }
            return $pageURL;
        }

        if ($_POST) {
            $valid = true;
            $error_quote = "";

            if (!isset($_POST['email']) || (empty($_POST['email']))) {
                $valid = false;
                $error_quote = "Please fill all the fields.";
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

                $query = "SELECT * FROM users WHERE email = \"$email\"";

                $result = mysql_query($query);
                $row = mysql_fetch_assoc($result);

                if ($row) {
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];

                    $baseUrl = curPageURL();

                    $email_message = "Hello, $first_name $last_name. Here is the <a href='$baseUrl/setnewpassword.php?email=$email'>LINK</a> to set new password.";

                    require './assets/PHPMailer/PHPMailerAutoload.php';

                    $mail = new PHPMailer;

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'comp424vahab@gmail.com';                   // SMTP username
                    $mail->Password = 'comp4241234';               // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
                    $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
                    $mail->setFrom('comp424vahab@gmail.com', 'Captain Vahab');     //Set who the message is to be sent from
                    $mail->addReplyTo('dummycomp424@gmail.com', 'Another Captain');  //Set an alternative reply-to address
                    $mail->addAddress($email, $first_name + $last_name);  // Add a recipient
                    $mail->WordWrap = 50;
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = 'Set New Password';
                    $mail->Body    = $email_message;
                    $mail->AltBody = 'Set New Password';

                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                        exit;
                    }

                    $error_quote = 'Message has been sent';
                }
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

<form name="method_email" id = "method_email" method="post">
    <div class="outerbox_forgot_username">
        <span class="result"> <?php echo "</br><div style='font-size: 20px; text-align: center; color: red'>$error_quote</div>" ?></span>
        <p class="title">Find Password</p>
        <input type="text" value="" class="type_register" name="email" placeholder="Enter your E-mail address">
        <input type="submit" value="Send temporary password" class="submit" style="margin: 10px;">
        <div class = "forgot2">
            Find password by Security Question, Click <a href="method_security.php">HERE</a><br/>
            Have an account? Sign in <a href="signin.php">HERE</a><br/>
            New user? Register <a href="register.php">HERE</a>
        </div>
    </div>


</form>
</body>
</html>

