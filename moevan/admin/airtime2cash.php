<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/sidebar.css">
        <link rel="shortcut icon" href="..\moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Airtime To Cash</title>
    </head>

    <body>
        <?php include_once('includes/navbar.php'); ?>

        <div class="scrolls">
            <h3>Airtime to Cash</h3>

            <div class="cont">
                <h4>Network</h4>
                <div class="dropdown">
                    <select id="dd">
                        <option selected> </option>
                        <option>MTN</option>
                        <option>GLO</option>
                        <option>9MOBILE</option>
                        <option>AIRTEL</option>
                    </select>
                </div>
            </div>
            <div class="cont">
                <h4>Deposit location</h4>
                <div class="dropdown">
                    <select id="dd">
                        <option selected> </option>
                        <option>Wallet</option>
                        <option>Bank</option>
                    </select>
                </div>
            </div>
            <div class="cont">
                <h4>Mobile Number</h4>
                <input type="text">
            </div>
            <div class="cont">
                <h4>Bank name</h4>
                <div class="dropdown">
                    <select id="dd">
                        <option selected> </option>
                        <option>Wallet</option>
                        <option>Bank</option>
                    </select>
                </div>
            </div>
            <div class="cont">
                <h4>Account number</h4>
                <input type="text">
            </div>

            <div class="fund-wallet">
                <h5>Proceed</h5>
            </div>
        </div>
    </body>

    <script>

    </script>

    <script src="../js/script.js"></script>

    </html>

    <?php

} ?>