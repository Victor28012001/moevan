<?php session_start();
include_once('../includes/config.php');
// Code for login 
if (isset($_POST['login'])) {
    $adminusername = $_POST['username'];
    $pass = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "Welcome.php";
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['adminid'] = $num['id'];
        echo "<script>alert('correct guy');</script>";
        echo "<script>window.location.href='" . $extra . "'</script>";
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        $extra = "index.php";
        echo "<script>window.location.href='" . $extra . "'</script>";
        exit();
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
    <link rel="shortcut icon" href="../moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>Admin Login</title>
    <!-- <link href="../css/styling.css" rel="stylesheet" /> -->
    <link href="../css/pre.css" rel="stylesheet" />
    <!-- <link href="../css/style.css" rel="stylesheet" /> -->
    <link href="../css/carousel.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <main>
        <form method="post" id="form">

            <div class="first-part">
                <img src="../moevan icons\meovan symbol - Copy.svg" alt="">
                <h2 style="color:#cbcbcb;">Admin Login</h2>
            </div>

            <div class="middle-part">
                <p>username or email</p>
                <input class="form-control" id="email" name="username" type="name" type="email"
                    placeholder="username or email" required />

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
                <a href="../index.php">
                    <p class="orange">Back to Home Page</p>
                </a>
                <!-- <a href="signup.php"><button><h5>Create free Account</h5></button></a> -->
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