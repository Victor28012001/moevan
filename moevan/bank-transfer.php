<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
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
        <link rel="stylesheet" href="css/style.css">
        <link href="css/sidebar.css" rel="stylesheet" />
        <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Bank Transfer | Moevan</title>
    </head>

    <body>
        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>

        <div class="scrolls">
            <h3>Bank Transfer</h3>

            <h5 id="h5">Transfer to any of these accounts to fund wallet</h5>


            <!--card for sterling bank-->

            <div class="box" id="box1">
                <h4>Sterling bank</h4>
                <div class="rect">
                    <img src="moevan icons\Rectangle 458.png" alt="">
                    <div class="topup-pay">
                        <div class="keys">
                            <p>Account Number:</p>
                            <p>Account Name:</p>
                            <p>Charge:</p>
                        </div>
                        <div class="values">
                            <p>1234567890</p>
                            <p>Client name</p>
                            <p>N50</p>
                        </div>
                    </div>
                </div>
            </div>




            <!--card for Wema bank-->
            <div class="box" id="box2">
                <h4>Wema bank</h4>
                <div class="rect">
                    <img src="moevan icons\Rectangle 459.png" alt="">
                    <div class="topup-pay">
                        <div class="keys">
                            <p>Account Number:</p>
                            <p>Account Name:</p>
                            <p>Charge:</p>
                        </div>
                        <div class="values">
                            <p>1234567890</p>
                            <p>Client name</p>
                            <p>N50</p>
                        </div>
                    </div>
                </div>
            </div>


            <!--card for Moniepoint-->

            <div class="box" id="box3">
                <h4>Moniepoint</h4>
                <div class="rect">
                    <img src="moevan icons\Rectangle 460.png" alt="">
                    <div class="topup-pay">
                        <div class="keys">
                            <p>Account Number:</p>
                            <p>Account Name:</p>
                            <p>Charge:</p>
                        </div>
                        <div class="values">
                            <p>1234567890</p>
                            <p>Client name</p>
                            <p>N50</p>
                        </div>
                    </div>
                </div>
            </div>




            <!--card for Fidelity bank-->

            <div class="box" id="box4">
                <h4>Fidelity bank</h4>
                <div class="rect">
                    <img src="moevan icons\Rectangle 461.png" alt="">
                    <div class="topup-pay">
                        <div class="keys">
                            <p>Account Number:</p>
                            <p>Account Name:</p>
                            <p>Charge:</p>
                        </div>
                        <div class="values">
                            <p>1234567890</p>
                            <p>Client name</p>
                            <p>N50</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </body>
    <script src="js/script.js"></script>

    </html>

    <?php
}
?>