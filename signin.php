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
        // Salt generator
        function genKey($length) {
            $rand_id="";
            if($length > 0) {
                for($i=1; $i <= $length; $i++) {
                 mt_srand((double)microtime() * 1000000);
                 $num = mt_rand(1,72);
                 $rand_id .= assign_rand_value($num);
                }
          }
            return $rand_id;
        }
        function assign_rand_value($num) {
            $rand_value= "";
          switch($num) {
            case "1":
             $rand_value = "a";
            break;
            case "2":
             $rand_value = "b";
            break;
            case "3":
             $rand_value = "c";
            break;
            case "4":
             $rand_value = "d";
            break;
            case "5":
             $rand_value = "e";
            break;
            case "6":
             $rand_value = "f";
            break;
            case "7":
             $rand_value = "g";
            break;
            case "8":
             $rand_value = "h";
            break;
            case "9":
             $rand_value = "i";
            break;
            case "10":
             $rand_value = "j";
            break;
            case "11":
             $rand_value = "k";
            break;
            case "12":
             $rand_value = "l";
            break;
            case "13":
             $rand_value = "m";
            break;
            case "14":
             $rand_value = "n";
            break;
            case "15":
             $rand_value = "o";
            break;
            case "16":
             $rand_value = "p";
            break;
            case "17":
             $rand_value = "q";
            break;
            case "18":
             $rand_value = "r";
            break;
            case "19":
             $rand_value = "s";
            break;
            case "20":
             $rand_value = "t";
            break;
            case "21":
             $rand_value = "u";
            break;
            case "22":
             $rand_value = "v";
            break;
            case "23":
             $rand_value = "w";
            break;
            case "24":
             $rand_value = "x";
            break;
            case "25":
             $rand_value = "y";
            break;
            case "26":
             $rand_value = "z";
            break;
            case "27":
             $rand_value = "0";
            break;
            case "28":
             $rand_value = "1";
            break;
            case "29":
             $rand_value = "2";
            break;
            case "30":
             $rand_value = "3";
            break;
            case "31":
             $rand_value = "4";
            break;
            case "32":
             $rand_value = "5";
            break;
            case "33":
             $rand_value = "6";
            break;
            case "34":
             $rand_value = "7";
            break;
            case "35":
             $rand_value = "8";
            break;
            case "36":
             $rand_value = "9";
            break;
            case "37":
             $rand_value = "*";
            break;
            case "38":
             $rand_value = "~";
            break;
            case "39":
             $rand_value = "-";
            break;
            case "40":
             $rand_value = "|";
            break;
            case "41":
             $rand_value = "^";
            break;
            case "42":
             $rand_value = "%";
            break;
            case "43":
             $rand_value = " ";
            break;
            case "44":
             $rand_value = "_";
            break;
            case "45":
             $rand_value = "+";
            break;
            case "46":
             $rand_value = "=";
            break;
            case "47":
             $rand_value = "A";
            break;
            case "48":
             $rand_value = "B";
            break;
            case "49":
             $rand_value = "C";
            break;
            case "50":
             $rand_value = "D";
            break;
            case "51":
             $rand_value = "E";
            break;
            case "52":
             $rand_value = "F";
            break;
            case "53":
             $rand_value = "G";
            break;
            case "54":
             $rand_value = "H";
            break;
            case "55":
             $rand_value = "I";
            break;
            case "56":
             $rand_value = "J";
            break;
            case "57":
             $rand_value = "K";
            break;
            case "58":
             $rand_value = "L";
            break;
            case "59":
             $rand_value = "M";
            break;
            case "60":
             $rand_value = "N";
            break;
            case "61":
             $rand_value = "O";
            break;
            case "62":
             $rand_value = "P";
            break;
            case "63":
             $rand_value = "Q";
            break;
            case "64":
             $rand_value = "R";
            break;
            case "65":
             $rand_value = "S";
            break;
            case "66":
             $rand_value = "T";
            break;
            case "67":
             $rand_value = "U";
            break;
            case "68":
             $rand_value = "V";
            break;
            case "69":
             $rand_value = "W";
            break;
            case "70":
             $rand_value = "X";
            break;
            case "71":
             $rand_value = "Y";
            break;
            case "72":
             $rand_value = "Z";
            break;
          }
        return $rand_value;
        }

        if ($_POST)
        {
            $valid = true;

            if (!isset($_POST['email']) || (empty($_POST['email'])))
            {
                $valid = false;
            }

            if (!isset($_POST['password']) || (empty($_POST['password'])))
            {
                $valid = false;
            }

            if ($valid)
            {
                $database = 'captain_vahab';
                $user = 'vahab';
                $password = '5bPKpsmPvfEujKVb';
                $host = 'localhost';
                $encryptedPassword = crypt($password, genKey(60));
                $connection = mysql_connect($host, $user, $password);
                $db = mysql_select_db('captain_vahab', $connection);

                if (!$connection)
                    die('Connection Failed'.mysql_error());

                if (!$db)
                    die('Database connection Failed'.mysql_error());

                $email = $_POST['email'];
                $password = $_POST['password'];
                $encryptedPassword = crypt($password, genKey(60));

                $query = "SELECT * FROM users WHERE email = \"$email\"";

                $result = mysql_query($query) or die(mysql_error());

                $row = mysql_fetch_assoc($result);
                $isHash = hash_equals($encryptedPassword, crypt($_POST['password'], $encryptedPassword));
                if($row && isHash)
                {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['logged_in'] = true;
                    $_SESSION['email'] = $email;

                    header("Location: signin.php");
                }

                else
                {
                    $error_quote = "Wrong User E-mail / Password.";
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

</body>
    <?php
        function curPageURL()
        {
            $pageURL = 'http';
            if ($_SERVER["HTTPS"] == "on") {
                $pageURL .= "s";
            }
            $pageURL .= "://";
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"];
            }
            return $pageURL;
        }

        if (!isset($_SESSION['logged_in']))
        { ?>

            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">424</a>
                    </div>

                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="signin.php">Home</a></li>
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

            <form name="signinform" id ="signinform" method="post" action="signin.php" onsubmit="validation()">

                <div class="outside" id="outside">

                    <div class="row">
                        <span class = "result"> <?php echo "</br><div style='font-size: 20px; text-align: center; color: red'>$error_quote</div>"?></span>

                        <div class="col-lg-12">
                            <p class = "title" id = "title">Sign In</p>
                        </div>
                        <div class="loginpart">
                            <div class="col-lg-12">
                            <input type="email" id="email" class="type_signin" name="email" placeholder="Enter your e-mail address">
                            </div>
                            <div class="col-lg-12">
                            <input type="PASSWORD" id="pwdid" class="type_signin" name="password" placeholder="Enter your password">
                            </div>
                            <div class="col-sm-6">
                            <div class="rememberdiv">
                                <input type="checkbox" name="remember" value="remember" class="remember"><p class = "remember1">　Remember me</p>
                            </div>
                            </div>
                        </div>
                        <input type="submit" value="Sign In" class="submit">
                        <div class = "forgot">
                            Forgot user e-mail? Click <a href="forgot_username.php">HERE</a> <br/>
                            Forgot password? Click <a href="forgot_password.php">HERE</a><br/>
                            New user? Register <a href="register.php">HERE</a>
                        </div>
                    </div>
                </div>
            </form>
    <?php }

    else {
        ?>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand">424</a>
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

        <?php
        $random_code = mt_rand();

        $user = $_SESSION['email'];

        $query1 = "SELECT first_name, last_name, email, birth_date FROM users WHERE email = \"$user\"";
        $result1 = mysql_query($query1);
        $row1 = mysql_fetch_assoc($result1);


        if (!$result1) {
            echo "Could not successfully run query ($query1) from DB: " . mysql_error();
            exit;
        }

        if (mysql_num_rows($result1) == 0) {
            echo "No rows found, nothing to print so am exiting";
            exit;
        }

        if ($row1) {

            $first_name = $row1["first_name"];
            $last_name = $row1["last_name"];
            $email = $_SESSION["email"];

            $query3 = "UPDATE users SET random_code = \"$random_code\" WHERE email = \"$email\" AND first_name = \"$first_name\" AND last_name =\"$last_name\"";

            $result3 = mysql_query($query3);

            $baseUrl = curPageURL();

            $email_message = "Hello, $first_name $last_name. Here is the access code <b>$random_code</b>. Use this <a href='$baseUrl/succeed_signin.php?email=$email'>LINK</a> to log in.";

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

            $mail->Subject = 'Access Code';
            $mail->Body = $email_message;
            $mail->AltBody = 'Access Code';

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                exit;
            }

            echo '<p style = "margin-top: 100px; text-align: center; font-size: 30px;"> Message has been sent with access code.<br/>Please check your e-mail and use the link to log in.</p> ';
            $_SESSION['logged_in'] = false;

        }
    }

    ?>

<script type="text/javascript">
    function validation() {
    }

    function getCurrentBaseUrl() {
        var baseArr = window.location.href.split('/'),
            baseUrl = baseArr[0] + '/' + baseArr[2];
        return baseUrl;
    }
</script>
<script type="text/javascript" src="./assets/jquery.min.js"></script>
<script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>



</html>
