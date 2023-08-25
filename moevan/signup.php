<?php session_start();
require_once('includes/config.php');
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
    <title>User Signup | Moevan</title>
    <link href="css/navbar.css" rel="stylesheet" />
    <link href="css/pre.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        function checkpass() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert(' Password and Confirm Password field does not match');
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }

    </script>

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
            background: #E2E1E1;
            border-radius: 5px;
        }
    </style>
    <?php include('includes/navbar1.php'); ?>
    <main>
        <form method="post" id="formr" name="signup" onsubmit="return checkpass();">

            <div class="first-part">
                <img src="moevan icons\meovan symbol - Copy.svg" alt="">
                <h2 style="color:#cbcbcb;">Register</h2>
                <p>columns tagged <span id="span">*</span> are mandatory to fill</p>
            </div>

            <div class="names">
                <p><span id="span">*</span>Names</p>
                <div class="last-part">
                    <input class="form-control" id="fname" name="fname" type="text" placeholder="first name" required />

                    <input class="form-control" id="lname" name="lname" type="text" placeholder="surname" required />
                </div>
            </div>


            <div class="middle_part">

                <p><span id="span">*</span>phone number</p>
                <input class="form-control" id="contact" name="contact" type="text" placeholder="0800 000 0000" required
                    pattern="[0-9]{11}" title="11 numeric characters only" maxlength="11" required />

                <p><span id="span">*</span>email</p>
                <input class="form-control" id="email" name="email" type="email" placeholder="example@gmail.com"
                    required />
            </div>

            <div class="last-part">
                <div class="password">
                    <p><span id="span">*</span>password</p>
                    <input class="form-control" id="password" name="password" type="password" placeholder="*********"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                        title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                        required />
                </div>
                <div class="password">
                    <p><span id="span">*</span>confirm password</p>
                    <input class="form-control" id="confirmpassword" name="confirmpassword" type="password"
                        placeholder="*********" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                        title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                        required />
                </div>
            </div>


            <div class="last-part">


                <div class="referral-code">

                    <p><span id="span">*</span>referral code</p>
                    <input class="form-control" id="referralcode" name="referralcode" type="text"
                        placeholder="*********" />
                </div>


                <button name="submit" type="submit">
                    <h5>create</h5>
                </button>
            </div>

            <div class="very-last">
                <p>...already registered</p>
                <button><a href="login.php" class="a">
                        <h5>Sign in</h5>
                    </a></button>
            </div>



        </form>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>


<?php
function updateReferral()
{
    $query = "SELECT * FROM `users` WHERE `referralcode`='$_POST[referralcode]'";
    $result1 = mysqli_query($GLOBALS['con'], $query);
    $result = mysqli_fetch_array($result1);
    $referpoint = $result['referralpoint'];
    if ($result1) {
        if (mysqli_num_rows($result1) == 1) {

            $referpoint++;
            $reti = "UPDATE users set referralpoint='$referpoint' WHERE `email`='$result[email]'";
            $que = mysqli_query($GLOBALS['con'], $reti);
            if ($que) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: "success!",
                        text: 'referrer was awarded one point',
                        background: '#1E1E1E',
                        confirmButtonColor: "#00C0C0",
                        focusConfirm: false,
                        iconColor: "#0CE864",
                        color: '#ffffff'
                    })
                </script>
                <?php
            }

        }
    }
}

//Code for Registration 
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $sql = mysqli_query($con, "select id from users where email='$email'");
    $row = mysqli_num_rows($sql);
    // updateReferral();
    if ($row > 0) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "Ooops!",
                text: 'Email id already exist with another account. Please try with other email id',
                background: '#1E1E1E',
                confirmButtonColor: "#00C0C0",
                focusConfirm: false,
                iconColor: "#FF3535",
                color: '#ffffff'
            })
        </script>
        <?php
    } else {
        if ($_POST['referralcode'] != ' ') {
            $referer = $_POST['referralcode'];
            updateReferral();
        }

        $referralcode = strtoupper(bin2hex(random_bytes(4)));

        $msg = mysqli_query($con, "insert into users(fname,lname,email,password,referralcode,referralpoint,referralbonus,referrer,contactno) values('$fname','$lname','$email','$password','$referralcode',0,0,'$referer','$contact')");

        if ($msg) {
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>"; ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "Registered!",
                    text: 'User registered successfully',
                    background: '#1E1E1E',
                    confirmButtonColor: "#00C0C0",
                    focusConfirm: false,
                    iconColor: "#0CE864",
                    color: '#ffffff'
                })
            </script>
            <?php
        }
    }
}
?>
