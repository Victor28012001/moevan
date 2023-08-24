<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
    <meta name="description" content="VTU website with the best data and airtime plans" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>Dashboard | Moevan</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
    <!-- <link href="css/styles.css" rel="stylesheet" /> -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/sidebar.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
  </head>

  <body style="overflow-x:hidden;">


    <?php include_once('includes/navbar.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>


    <div class="scrolls">

      <?php

      $userid = $_SESSION['id'];
      $query = mysqli_query($con, "select * from users where id='$userid'");
      while ($result = mysqli_fetch_array($query)) { ?>
        <?php if (is_null($result['balance'])) {
          $balance = 0;
        } else {
          $balance = $result['balance'];
        }
        error_reporting(E_ALL ^ E_WARNING);
        $find_notifications = "Select * from inf where active = 1";
        $res = mysqli_query($con, $find_notifications);
        $rows = mysqli_fetch_assoc($res);
        $message = $rows['message'];
        if (is_null($message)) {
          $message = "Hello dear, welcome to moevan enterprises, we are honoured to have you, here!!!";
        } else {
          echo $message;
        }
        ?>



        <div class="welcome-message">
          <h5 id="welcome">Welcome,</h5>
          <h4 id="username">
            <?php echo $result['fname'] . " " . $result['lname']; ?>
          </h4>

          <marquee behavior="scroll" direction="left" scrollamount="10" scrolldelay="100"
            style="width:95%;height:30px;border: none; border-radius:5px; margin: 5px auto; align-content:center;">
            <?php
            echo $message;
            ?>
          </marquee>
          <h4 id="referralcode" style="margin-left:20px;">Your referral code:
            <?php echo $result['referralcode']; ?>
          </h4>

        </div>


      <?php } ?>

      <div class="all-things-wallet">
        <div class="wallet-balance">
          <img src="moevan icons\Vector1.png" alt="">
          <div class="write-up">
            <h5>Wallet balance</h5>
            <h5>N
              <?php echo number_format($balance); ?>
            </h5>
          </div>
        </div>

        <a href="funding.php">
          <div class="fund-wallet" style="margin: 10px auto;">
            <h4>Fund wallet</h4>
          </div>
        </a>
      </div>

      <div id="services">
        <h3>Our Services</h3>
      </div>

      <div class="service-boxes">

        <div class="service-box">
          <a href="topup.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\airtime top-up.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Airtime Top-UP</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="buy-data.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\buy data.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Buy Data</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="airtime2cash.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\airtime to cash.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Airtime to Cash</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="electricity.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\electricity bill.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Electricity bill</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="cable.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\cable subscriptions.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Cable subscriptions</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="bulk-sms.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\bulk SMS.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Bulk SMS</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="result.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\result checker.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Result checker</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="referrals.php">
            <div class="service-boxe">
              <img src="moevan icons\moevandashboardicons\referrals.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Referrals</h5>
            </div>
          </a>
        </div>

      </div>


      <div class="faq">
        <a href="faqs.php">
          <p>Click to have a better knowledge of this platform.</p>
          <img src="moevan icons\Group 65.svg" alt="">
        </a>
      </div>


    </div>



    </div>
    </div>

    <script src="js/script.js"></script>


  </body>

  </html>
<?php } ?>