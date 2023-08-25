<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en" style="overflow-x:hidden;">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="css/sidebar.css" rel="stylesheet" />
        <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Account History | Moevan</title>
    </head>

    <body>


        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>

        <div class="scrolls">
            <h3>Account History</h3>


            <?php
            $userid = $_SESSION['id'];
            $query = mysqli_query($con, "select * from users where id='$userid'");
            $result = mysqli_fetch_array($query);
            if ($query) {
                $fname = $result["fname"];
                $lname = $result["lname"];
                $email = $result["email"];
                $ret = mysqli_query($con, "select * from transactions where email='$email'");
                $row = mysqli_fetch_array($ret);
                while ($row = mysqli_fetch_array($ret)) {
        
                    $ttype = $row["ttype"];
                    $plan = $row["plan"];
                    $numbers = $row["numbers"];
                    $dated = $row["dated"];
                    $amount = $row["amount"];
                    $plan_no = $row["plan_no"];
                    $datetime = (explode(" ",$dated));
                    $dates = $datetime[0];
                    $timer = $datetime[1];



                    switch ($plan) {
                        case 'funding': ?>
                            <div class="boxe">
                                <div class="img">
                                    <img src="moevan icons\🦆 icon _cash plus_.svg" alt="">
                                </div>
                                <div class="write">
                                    <h4>Account Funding</h4>
                                    <div class="writes">
                                        <div class="wr-it">
                                            <p class="keys">Amount:</p>
                                            <p class="values">
                                            <span>&#x20A6;</span><?php echo $amount; ?>
                                            </p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">From:</p>
                                            <p class="values"><?php echo $numbers; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Time:</p>
                                            <p class="values"><?php echo $timer; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Date:</p>
                                            <p class="values"><?php echo $dates; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            ;
                            break;
                        case 'data': ?>
                            <div class="boxe">
                                <div class="img">
                                    <img src="moevan icons\Icon metro-wifi-connect.svg" alt="">
                                </div>
                                <div class="write">
                                    <h4>Data subscription</h4>
                                    <div class="writes">
                                        <div class="wr-it">
                                            <p class="keys">Amount:</p>
                                            <p class="values">
                                            <span>&#x20A6;</span><?php echo $amount; ?>
                                            </p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Number:</p>
                                            <p class="values">
                                                <?php echo $numbers; ?>
                                            </p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Time:</p>
                                            <p class="values">
                                                <?php echo $timer; ?>
                                            </p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Date:</p>
                                            <p class="values">
                                                <?php echo $dates; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            ;
                            break;
                        case 'cable': ?>
                            <div class="boxe">
                                <div class="img">
                                    <img src="moevan icons\🦆 icon _Television_.svg" alt="">
                                </div>
                                <div class="write">
                                    <h4>Cable subscription</h4>
                                    <div class="writes">
                                        <div class="wr-it">
                                            <p class="keys">Amount:</p>
                                            <p class="values"><span>&#x20A6;</span><?php echo $amount; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Smart card Number:</p>
                                            <p class="values"><?php echo $numbers; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Cable plan:</p>
                                            <p class="values"><?php echo $ttype; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Time:</p>
                                            <p class="values"><?php echo $timer; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Date:</p>
                                            <p class="values"><?php echo $dates; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            ;
                            break;
                        case 'electricity': ?>
                            <div class="boxe">
                                <div class="img">
                                    <img src="moevan icons\🦆 icon _Electricity_.svg" alt="">
                                </div>
                                <div class="write">
                                    <h4>Electricity bill</h4>
                                    <div class="writes">
                                        <div class="wr-it">
                                            <p class="keys">Amount:</p>
                                            <p class="values"><span>&#x20A6;</span><?php echo $amount; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Meter Number:</p>
                                            <p class="values"><?php echo $plan_no; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Customer number:</p>
                                            <p class="values"><?php echo $numbers; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Time:</p>
                                            <p class="values"><?php echo $timer; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Date:</p>
                                            <p class="values"><?php echo $dates; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            ;
                            break;
                        case 'result':
                            ?>
                            <div class="boxe">
                                <div class="img">
                                    <img src="moevan icons\moevandashboardicons\result checker.svg" alt="">
                                </div>
                                <div class="write">
                                    <h4>Result Check</h4>
                                    <div class="writes">
                                        <div class="wr-it">
                                            <p class="keys">Amount:</p>
                                            <p class="values"><span>&#x20A6;</span><?php echo $amount; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Customer number:</p>
                                            <p class="values"><?php echo $numbers; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Time:</p>
                                            <p class="values"><?php echo $timer; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Date:</p>
                                            <p class="values"><?php echo $dates; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            ;
                            break;
                        case 'airtime':
                            ?>
                            <div class="boxe">
                                <div class="img">
                                    <img src="moevan icons\Icon awesome-sim-card(1).svg" alt="">
                                </div>
                                <div class="write">
                                    <h4>Airtime TopUP</h4>
                                    <div class="writes">
                                        <div class="wr-it">
                                            <p class="keys">Amount:</p>
                                            <p class="values"><span>&#x20A6;</span><?php echo $amount; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Number:</p>
                                            <p class="values"><?php echo $numbers; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Time:</p>
                                            <p class="values"><?php echo $timer; ?></p>
                                        </div>
                                        <div class="wr-it">
                                            <p class="keys">Date:</p>
                                            <p class="values"><?php echo $dates; ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                            ;
                            break;
                        default:
                            echo "";
                    }

                }
            }

            ?>

        </div>
    </body>
    <script src="js/script.js"></script>

    </html>

    <?php
}
?>