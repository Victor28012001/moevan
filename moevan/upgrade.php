<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else { ?>

    <!DOCTYPE html>
    <html lang="en" style="overflow-x:hidden;">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Upgrade | Moevan</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>

        <div class="scrolls">
            <h3>Upgrade</h3>



            <a href='upgrade.php?hello=true'>
                <div class="wallet-balance">
                    <img src="moevan icons\🦆 icon _connect link category_.svg" alt="">
                    <div class="write">
                        <h4>Upgrade to Affiliate</h4>
                        <h4><span>&#8358;</span> 10000</h4>
                    </div>
                </div>
            </a>


            <a href='upgrade.php?hell=true'>
                <div class="wallet-balance">
                    <img src="moevan icons\🦆 icon _user group_.svg" alt="">
                    <div class="write">
                        <h4>Upgrade to Top user</h4>
                        <h4><span>&#8358;</span> 5000</h4>
                    </div>
                </div>
            </a>

            <?php

            if (isset($_GET['hell'])) {
                $icon = addslashes('moevan icons\🦆 icon _user group_(1).svg');
                $sql = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your upgrade to Top user is being processed.','1')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                if ($result1) {
                    ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: "success!",
                            text: 'Your application for Top user has successfully been received',
                            background: '#1E1E1E',
                            confirmButtonColor: "#00C0C0",
                            focusConfirm: false,
                            iconColor: "#0CE864",
                            color: '#ffffff'
                        })
                    </script>
                <?php } else { ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: "Failed!",
                            text: 'Your application for Top user was not successfully sent',
                            background: '#1E1E1E',
                            confirmButtonColor: "#00C0C0",
                            focusConfirm: false,
                            iconColor: "#FF3535",
                            color: '#ffffff'
                        })</script>
                <?php }
            }

            if (isset($_GET['hello'])) {
                $icon = addslashes('moevan icons\🦆 icon _connect link category_(1).svg');
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your upgrade to Affiliate member  is being processed.','1')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
                if ($result2) {
                    ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: "success!",
                            text: 'Your application for Affiliate member has successfully been received',
                            background: '#1E1E1E',
                            confirmButtonColor: "#00C0C0",
                            focusConfirm: false,
                            iconColor: "#0CE864",
                            color: '#ffffff'
                        })
                    </script>
                <?php } else { ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: "Failed!",
                            text: 'Your application for Affiliate member was not successfully sent',
                            background: '#1E1E1E',
                            confirmButtonColor: "#00C0C0",
                            focusConfirm: false,
                            iconColor: "#FF3535",
                            color: '#ffffff'
                        })</script>

                <?php }
            }

            ?>




        </div>
    </body>
    <script src="js/script.js"></script>

    </html>

<?php } ?>