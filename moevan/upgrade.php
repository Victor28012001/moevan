<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>Upgrade | Moevan</title>
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <div class="scrolls">
        <h3>Upgrade</h3>



        <div class="wallet-balance">
            <img src="moevan icons\🦆 icon _connect link category_.png" alt="">
            <div class="write">
                <h4>Upgrade to Affiliate</h4>
                <h4>N 10000</h4>
            </div>
        </div>


        <div class="wallet-balance">
            <img src="moevan icons\🦆 icon _user group_.png" alt="">
            <div class="write">
                <h4>Upgrade to Top user</h4>
                <h4>N 5000</h4>
            </div>
        </div>



    </div>
</body>
<script src="js/script.js"></script>

</html>