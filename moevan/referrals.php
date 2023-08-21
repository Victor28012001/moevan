<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
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
    <title>Referrals | Moevan</title>
</head>
<body>
<?php include_once('includes/navbar.php');?>
        <!-- <div id="layoutSidenav"> -->
          <?php include_once('includes/sidebar.php');?>
            <!-- <div id="layoutSidenav_content"> -->

    <div class="scrolls">
        <h3>Referrals</h3>

        

    <div class="referrrals">


    <div class='wallet-balance' style='color:blue; padding:12px'>
    <?php echo"<p style='color:blue;line-height: 1.0;width: 90%;height: 100%;'>your referral link:</br>
        <a href='http://localhost/user%20Registration%20and%20login%20System%20with%20admin%20panel/loginsystem/signup.php/?referralcode=$result[referralcode]'width: 0.5rem;height: 40%;display: block;'>
        http://localhost/user%20Registration%20and%20login
        %20System%20with%20admin%20panel
        /loginsystem/signup.php/?referralcode=$result[referralcode]
        </a>
        </p>
        ";
        ?>
        </div>

    
        <div class="wallet-balance">
            <img src="moevan icons\🦆 icon _people_.png" alt="">
            <div>
                <h4>Total Referral</h4>
                <h4><?php echo $result['referralpoint'];?></h4>
            </div>
        </div>

        
        <div class="wallet-balance"  style="margin-bottom: 5vh">
            <img src="moevan icons\🦆 icon _coins_.png" alt="">
            <div>
                <h4>Referral Bonus</h4>
                <h4>N<?php echo $result['referralbonus'];?></h4>
            </div>
        </div>

    </div>




        
        <div class="fund-wallet">
            <h5>Convert Bonus to Wallet</h5>
        </div>
        

    </div>
</body>
<script src="js/script.js"></script>
</html>

<?php
}
?>