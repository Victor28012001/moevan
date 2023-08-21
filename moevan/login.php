<?php session_start();
include_once('includes/config.php');


// Code for login 
if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $dec_password = $password;
    $useremail = $_POST['uemail'];
    $ret = mysqli_query($con, "SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {

        $_SESSION['id'] = $num['id'];
        $_SESSION['fname'] = $num['fname'];
        $_SESSION['lname'] = $num['lname'];
        $_SESSION['email'] = $num['email'];
        $_SESSION['contactno'] = $num['contactno'];
        $_SESSION['balance'] = $num['balance'];
        header("location:welcome.php");

    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>User Login | Moevan</title>
    <!-- <link href="css/styles.css" rel="stylesheet" /> -->
    <!-- <link href="css/style.css" rel="stylesheet" /> -->
    <link href="css/pre.css" rel="stylesheet" />
    <link href="css/navbar.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body>

    <style>
        input {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: end;
            padding: 12px;
            gap: 16px;
            border-style: none;

            position: relative;
            width: 95%;
            height: 48px;
            /* left: 50%;
    transform: translateX(-50%); */

            background: #E2E1E1;
            border-radius: 5px;
        }
    </style>
    <?php include('includes/navbar1.php'); ?>
    <main>
        <form method="post" id="form">

            <div class="first-part">
                <img src="moevan icons\meovan symbol - Copy.svg" alt="">
                <h2 style="color:#cbcbcb;">Sign in</h2>
            </div>

            <div class="middle-part">
                <p>username or email</p>
                <input class="form-control" id="email" name="uemail" type="email" placeholder="username or email"
                    required />

                <p>password</p>
                <input class="form-control" id="password" name="password" type="password" placeholder="password"
                    required />

            </div>


            <div class="last-part">
                <a href="password-recovery.php">
                    <p class="orange">forgot password</p>
                </a>
                <button name="login" type="submit">
                    <h5>log in</h5>
                </button>
            </div>

            <div class="very-last">
                <p>...not yet registered</p>
                <button><a href="signup.php" class="a">
                        <h5>Create free Account</h5>
                    </a></button>
            </div>



        </form>

    </main>

    <script src="js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/script.js"></script>
</body>

</html>