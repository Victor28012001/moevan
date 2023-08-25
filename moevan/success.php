<?php
session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {?>


<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Document</title>
</head>
<body>
  
</body>
</html>
<?php
  if (!$_GET["successfullypaid"]) {
    header("Location: welcome.php");
    exit;
  } else {
    $reference = $_GET["successfullypaid"];
    $status = $_GET["status"];
    $amount = $_GET["amount"];
    // echo $amount;

    $userid = $_SESSION['id'];
    $query = mysqli_query($con, "select * from users where id='$userid'");
    $result = mysqli_fetch_array($query);

    if ($query) {
      $fname = $result["fname"];
      $lname = $result["lname"];
      $phone = $result["contactno"];
      $email = $result["email"];
      $balance = $result['balance'];
      $referrer = $result['referrer'];




      function rewardreferrer()
      {

        global $referrer;
        global $amount;


        //award referrer 0.3% of transaction
        $query = "SELECT * FROM `users` WHERE `referralcode`='$referrer'";
        $que = mysqli_query($GLOBALS['con'], $query);
        $request = mysqli_fetch_array($que);
        $referbonus = $request['referralbonus'];
        // echo "$referbonus";
        if ($que) {
          $referbonus = floatval($referbonus) + floatval(3 / 1000) * floatval($amount);
          $referbonus = floatval($referbonus);
          // echo "<script>alert($referbonus);</script>";
          $reti = "UPDATE users set referralbonus='$referbonus' WHERE `email`='$request[email]'";
          $qu = mysqli_query($GLOBALS['con'], $reti);
          // if ($qu) {
          //   echo "<script>alert('Your payment rewarded your referrer!');</script>";
          // }
        }
      }

      if ($status == 'SUCCESS') {
        $dated = date("Y-m-d H:m:s");

        rewardreferrer();

        //Insert into database
        $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus,numbers,plan,plan_no) VALUES('$fname','$lname','Funding','$email',$reference,'$amount','$dated','$status','$phone','funding','-')";
        $result1 = mysqli_query($GLOBALS['con'], $sql);
        $icon = addslashes('moevan icons\🦆 icon _cash plus_.svg');
        $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your account was funded successfully.','1')";
        $result2 = mysqli_query($GLOBALS['con'], $sql1);
        //  $result2=mysqli_fetch_array($result1);
        if ($result1) {
          $new_balance = (int) $balance + (int) $amount;
          $update = mysqli_query($con, "update users set balance='$new_balance' where id='$userid'"); ?>
          <script>
            Swal.fire({
              icon: 'success',
              title: '<?php echo $status; ?>',
              text: 'Your account was funded successfully.',
              background: '#1E1E1E',
              confirmButtonColor: "#00C0C0",
              focusConfirm: false,
              // buttonsStyling: false,
              iconColor: 'green',
              color: '#ffffff'
            })
          </script>
          <?php
          header("Location: welcome.php");
          //  session_unset();
          //  session_destroy(); 
        } else {
          die("Sorry, something went!");
        }
        unset($result);
        //close connection
        unset($result1);
      } else {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          Swal.fire({
            icon: 'success',
            title: '<?php echo $status; ?>',
        text: 'Your account was funded successfully.',
        background: '#1E1E1E',
        confirmButtonColor: "#00C0C0",
        focusConfirm: false,
        // buttonsStyling: false,
        iconColor: 'green',
        color: '#ffffff'
      })
    </script>
<?php
                $icon = addslashes('moevan icons\🦆 icon _cash plus_.svg');
                echo "Transaction Verification Failed!";
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your account was not funded successfully.','1')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
                exit();
      }

    } else {
      echo "payment Reference is Required!";
      exit();
    }

  }
  ?>

<?php } ?>