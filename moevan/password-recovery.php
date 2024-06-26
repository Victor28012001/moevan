<?php
include('includes/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer;
if (isset($_POST['send'])) {


    $femail = $_POST['femail'];

    $row1 = mysqli_query($con, "select email,password,fname from users where email='$femail'");
    $row2 = mysqli_fetch_array($row1);
    if ($row2 > 0) {
        $toemail = $row2['email'];
        $fname = $row2['fname'];
        $subject = "Information about your password";
        $password = $row2['password'];
        $message = "Your password is " . $password;
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'your gmail id here'; // SMTP username
        $mail->Password = 'your gmail password here'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to
        $mail->setFrom('your gmail id here', 'your name here');
        $mail->addAddress($toemail); // Add a recipient
        $mail->isHTML(true); // Set email format to HTML
        $bodyContent = $message;
        $mail->Subject = $subject;
        $bodyContent = 'Dear' . " " . $fname;
        $bodyContent .= '<p>' . $message . '</p>';
        $mail->Body = $bodyContent;
        if (!$mail->send()) {
            echo "<script>alert('Message could not be sent');</script>";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo "<script>alert('Your Password has been sent Successfully');</script>";
        }

    } else {
        echo "<script>alert('Email not register with us');</script>";
    }
}






?>
<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>Password Reset | Moevan</title>
    <link href="css/pre.css" rel="stylesheet" />
    <link href="css/navbar.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body>

    <?php include('includes/navbar1.php'); ?>
    <main>
        <form method="post" id="form">

            <div class="first-part">
                <img src="moevan icons\meovan symbol - Copy.svg" alt="">
                <h2 style="color:#cbcbcb;">Password Recovery</h2>
            </div>

            <p>Enter your email address and we will send you password on your email</p>

            <div class="middle-part" style="margin-top:30px">
                <p>username or email</p>
                <input class="form-control" id="email" name="femail" type="email" placeholder="username or email"
                    required />

            </div>


            <div class="last-part">
                <a href="login.php">
                    <p class="orange">Return to login</p>
                </a>
                <button name="login" type="submit">
                    <h5>Reset</h5>
                </button>
            </div>

            <div class="very-last">
                <p>...not yet registered</p>
                <button><a href="signup.php" class="a" type="submit" name="send">
                        <h5>Create free Account</h5>
                    </a></button>
            </div>



        </form>

    </main>

    <script src="js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <!-- <script src="js/scripts.js"></script> -->
    <script src="js/script.js"></script>
</body>

</html>