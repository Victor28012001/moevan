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
    <link href="../css/sidebar.css" rel="stylesheet" />
    <link rel="shortcut icon" href="..\moevan icons\meovan symbol.svg" type="image/x-icon">
    <title>Account History</title>
</head>
<body>


<?php include_once('includes/navbar.php');?>
          <?php include_once('includes/sidebar.php');?>

    <div class="scrolls">
        <h3>Account History</h3>

        <div class="boxe">
                <div class="img">
                <img src="..\moevan icons\Icon awesome-sim-card(1).png" alt="">
                </div>
                <div class="write">
                    <h4>Airtime TopUP</h4>
                    <div class="writes">
                    <div class="keys">
                        <p>Amount:</p>
                        <p>Number:</p>
                        <p>Time:</p>
                        <p>Date:</p>
                    </div>
                    <div class="values">
                        <span><p>N700</p></span>
                        <span><p>1234567890</p></span>
                        <span><p>2:00</p></span>
                        <span><p>01/01/2023</p></span>
                    </div>
                    </div>

            </div>
        </div>
 


        <div class="boxe">

                <div class="img">
                <img src="..\moevan icons\🦆 icon _cash plus_.png" alt="">
                </div>
                <div class="write">
                    <h4>Account Funding</h4>
                    <div class="writes">
                    <div class="keys">
                        <p>Amount:</p>
                        <p>From:</p>
                        <p>Time:</p>
                        <p>Date:</p>
                    </div>
                    <div class="values">
                        <span><p>N700</p></span>
                        <span><p>1234567890</p></span>
                        <span><p>2:00</p></span>
                        <span><p>01/01/2023</p></span>
                    </div>
                    </div>
                </div>
        </div>

        <div class="boxe">
                <div class="img">
                <img src="..\moevan icons\Icon metro-wifi-connect.png" alt="">
                </div>
                <div class="write">
                    <h4>Data subscription</h4>
                    <div class="writes">
                    <div class="keys">
                        <p>Amount:</p>
                        <p>Number:</p>
                        <p>Time:</p>
                        <p>Date:</p>
                    </div>
                    <div class="values">
                        <p>N700</p>
                        <p>1234567890</p>
                        <p>2:00</p>
                        <p>01/01/2023</p>
                    </div>
                    </div>
                </div>
        </div>
 
        
        <div class="boxe">
                <div class="img">
                <img src="..\moevan icons\🦆 icon _Television_.png" alt="">
                </div>
                <div class="write">
                    <h4>Cable subscription</h4>
                    <div class="writes">
                    <div class="keys">
                        <p>Amount:</p>
                        <p>Smart card/ IUC Number:</p>
                        <p>Cable plan</p>
                        <p>Time:</p>
                        <p>Date:</p>
                    </div>
                    <div class="values">
                        <p>N700</p>
                        <p>1234567890</p>
                        <p>GOTV-MAX</p>
                        <p>2:00</p>
                        <p>01/01/2023</p>
                    </div>
                    </div>
                </div>
        </div>
        
        
        <div class="boxe">
            <div class="img">
            <img src="..\moevan icons\🦆 icon _Electricity_.png" alt="">    
            </div>
                <div class="write">
                    <h4>Electricity bill</h4>
                    <div class="writes">
                    <div class="keys">
                        <p>Amount:</p>
                        <p>Meter Number:</p>
                        <p>Customer number</p>
                        <p>Time:</p>
                        <p>Date:</p>
                    </div>
                    <div class="values">
                        <p>N700</p>
                        <p>1234567890</p>
                        <p>1234567890</p>
                        <p>2:00</p>
                        <p>01/01/2023</p>
                    </div>
                    </div>
                </div>
        </div>
 
    </div>
</body>
<script src="../js/script.js"></script>
</html>

<?php
  }
  ?>