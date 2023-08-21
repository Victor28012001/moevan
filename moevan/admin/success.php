<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
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
        echo "$referbonus";
        if ($que) {
          $referbonus = floatval($referbonus) + floatval(3 / 1000) * floatval($amount);
          $referbonus = floatval($referbonus);
          echo "<script>alert($referbonus);</script>";
          $reti = "UPDATE users set referralbonus='$referbonus' WHERE `email`='$request[email]'";
          $qu = mysqli_query($GLOBALS['con'], $reti);
          if ($qu) {
            echo "<script>alert('Your payment rewarded your referrer!');</script>";
          }
        }
      }

      if ($status == 'SUCCESS') {
        $dated = date("Y-m-d H:m:s");
        $time = time();
        $year = date("Y-m-d");

        rewardreferrer();

        //Insert into database
        $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus) VALUES('$fname','$lname','Funding','$email',$reference,'$amount','$dated','$status')";
        $result1 = mysqli_query($GLOBALS['con'], $sql);
        $sql1 = "INSERT INTO inf(amount,numbers,plan,timer,dated) VALUES('$amount','$phone','-','$time','$year')";
        $result2 = mysqli_query($GLOBALS['con'], $sql1);
        //  $result2=mysqli_fetch_array($result1);
        if ($result1) {
          echo "<script>alert('Your payment went through!')</script>";
          $new_balance = (int) $balance + (int) $amount;
          $update = mysqli_query($con, "update users set balance='$new_balance' where id='$userid'");
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
        echo "Transaction Verification Failed!";
        exit();
      }

    } else {
      echo "payment Reference is Required!";
      exit();
    }

  }
  ?>

<?php } ?>