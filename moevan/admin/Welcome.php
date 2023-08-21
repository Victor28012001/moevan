<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="VTU website with the best data and airtime plans" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="..\moevan icons\meovan symbol.png" type="image/x-icon">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <!-- <link href="css/styles.css" rel="stylesheet" /> -->
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/sidebar.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
  </head>

  <body>
    <?php include_once('includes/navbar.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <div class="scrolls">


      <?php
      error_reporting(E_ALL ^ E_WARNING);
      ?>


      <div class="welcome-message">
        <h5 id="welcome">Welcome,</h5>
        <h4 id="username">
          Admin
        </h4>
      </div>

      <div class="all-things-wallet">
        <div class="wallet-balance">
          <img src="..\moevan icons\Vector1.png" alt="">
          <div class="write-up">
            <h5>Wallet balance</h5>
            <h5>N 0</h5>
          </div>
        </div>

        <a href="funding.php">
          <div class="fund-wallet" style="margin: 10px auto;">
            <h4>Fund wallet</h4>
          </div>
        </a>
      </div>

      <h3 id="services">Our Services</h3>

      <div class="service-boxes">

        <div class="service-box">
          <a href="topup.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\airtime top-up.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Airtime Top-UP</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="buy-data.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\buy data.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Buy Data</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="airtime2cash.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\airtime to cash.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Airtime to Cash</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="electricity.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\electricity bill.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Electricity bill</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="cable.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\cable subscriptions.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Cable subscriptions</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="bulk-sms.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\bulk SMS.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Bulk SMS</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="result.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\result checker.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Result checker</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="referrals.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\airtime to cash.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>All Transactions</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="referrals.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\referrals.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>All Users</h5>
            </div>
          </a>
        </div>


        <div class="service-box">
          <a href="referrals.php">
            <div class="service-boxe">
              <img src="..\moevan icons\moevandashboardicons\referrals.svg" alt="">
            </div>
            <div class="servic" style="padding:4px; width:80px; height:17px;">
              <h5>Create User</h5>
            </div>
          </a>
        </div>
      </div>

      <div class="faq">
        <a href="faqs.php">
          <p>Click to have a better knowledge of this platform.</p>
          <img src="..\moevan icons\Group 65.svg" alt="">
        </a>
      </div>

    </div>



    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"></script>
    <!-- <script src="../js/scripts.js"></script> -->
    <script src="../js/script.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script> -->



  </body>

  </html>
<?php } ?>