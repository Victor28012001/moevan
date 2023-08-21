<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
    error_reporting(E_ALL ^ E_WARNING);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet" />
        <link href="../css/sidebar.css" rel="stylesheet" />
        <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
        <link rel="shortcut icon" href="..\moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Wallet Funding</title>
    </head>

    <body style="height: 100vh;">

        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>


        <div class="scrolls">
            <h3>Wallet Funding</h3>

            <div id="center">

                <h4 id="h4">Select Funding method</h4>

                <a href="bank-transfer.php">
                    <div class="paystack" id="tranfer">
                        <h5>Bank Transfer</h5>
                    </div>
                </a>

                <a href="moniffy.php">
                    <div class="paystack" id="monify">
                        <h5>Monnify</h5>
                    </div>
                </a>


            </div>



        </div>
    </body>
    <script src="../js/script.js"></script>

    </html>

<?php } ?>