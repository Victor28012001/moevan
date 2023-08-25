<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
} ?>

<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/sidebar.css" rel="stylesheet" />
    <link href="css/prestyles.css" rel="stylesheet" />
    <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>Support Team | Moevan</title>
</head>

<body>
    <?php include_once('includes/navbar.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <div class="scrolls">
        <h3>Support Team</h3>


        <h5 class="info">For more complaints or further info, contact us on these lines:</h5>

        <div class="contwhat" style="color: rgba(0, 0, 0, 0.8);">

            <div class="whatsapp">
                <img src="moevan icons\🦆 icon _brand whatsapp_.svg" alt="">
                <h5>1234567890</h5>
            </div>

            <div class="whatsapp" style="color: rgba(0, 0, 0, 0.8);">
                <img src="moevan icons\🦆 icon _telegram plane_.svg" alt="">
                <h5>1234567890</h5>
            </div>


        </div>



    </div>
</body>
<script src="js/script.js"></script>

</html>