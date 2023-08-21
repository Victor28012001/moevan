<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
    header('location:logout.php');
} else {
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/sidebar.css" rel="stylesheet" />
    <link rel="shortcut icon" href="..\moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>Notifications</title>
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>
    <!-- <div id="layoutSidenav"> -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- <div id="layoutSidenav_content"> -->

    <div class="scrolls">
        <h3>Notifications</h3>


        <div class="box">
            <div class="bg">
                <img src="" alt="">
                <div class="rect"></div>
            </div>
            <div class="fg">
                <img src="" alt="">
                <div class="write">
                    <h4>Upgrade to Topuser was successful!</h4>
                </div>
            </div>
        </div>


        <div class="box">
            <div class="bg">
                <img src="" alt="">
                <div class="rect"></div>
            </div>
            <div class="fg">
                <img src="" alt="">
                <div class="write">
                    <h4>Upgrade to Affiliate was successful!</h4>
                </div>
            </div>
        </div>


        <div class="box">
            <div class="bg">
                <img src="" alt="">
                <div class="rect"></div>
            </div>
            <div class="fg">
                <img src="" alt="">
                <div class="write">
                    <h4>Airtime TopUP failed!</h4>
                </div>
            </div>
        </div>



    </div>
</body>
<script src="../js/script.js"></script>

</html>