<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
    <!-- <link href="css/style.css" rel="stylesheet" /> -->
    <link href="css/navbar.css" rel="stylesheet" />
    <link href="css/pre.css" rel="stylesheet" />
    <title>Pricing | Moevan</title>
</head>

<body>
    <?php include('includes/navbar1.php'); ?>

    <main>
        <div class="pricing">
            <h2>Our Data Pricing</h2>
            <?php


            error_reporting(E_ALL ^ E_WARNING);

            $username = "MoevannEnterprise"; //email address(sandbox@vtpass.com)
            $password = "Promise1234";

            $host = 'https://sandbox.vtpass.com/api/service-variations?serviceID=airtel-data';
            $curl = curl_init();


            curl_setopt($curl, CURLOPT_URL, $host);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $vdata = curl_exec($curl);

            if ($e = curl_error($curl)) {
                echo $e;
            } else {
                $res = json_decode($vdata, true);

                $color = NULL;

                $color1 = "#f6f6f6";
                $color2 = "#e0e0e0";
                // print_r($res);
            
                ?>
                <div class="airtel">
                    <div class="slogo">
                        <img src="moevan icons\Airtel.svg" alt="">
                    </div>
                    <table border="0" cellpadding="5" cellspacing="0" width="200">
                        <?php



                        foreach ($res['content']['varations'] as $vars) {


                            $str = $vars['name'];
                            $headers = explode('-', $str);


                            // $headers.shift();        
                            // print_r($headers);
                    
                            $color == $color1 ? $color = $color2 : $color = $color1;


                            ?>
                            <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $headers[2] . " " . $headers[3] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>"; ?>
                            <?php

                        }

                        ?>
                    </table>
                    <div class="button">
                    <a href="login.php"><button>buy</button></a>
                    </div>
                </div>
                <?php
            }



            curl_close($curl);



            $host = 'https://sandbox.vtpass.com/api/service-variations?serviceID=mtn-data';
            $curl = curl_init();


            curl_setopt($curl, CURLOPT_URL, $host);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $vdata = curl_exec($curl);

            if ($e = curl_error($curl)) {
                echo $e;
            } else {
                $res = json_decode($vdata, true);

                $color = NULL;

                $color1 = "#fcbd1c";
                $color2 = "#ffca45";
                // print_r($res);
            
                ?>
                <div class="mtn">
                    <div class="slogo">
                        <img src="moevan icons\MTN.svg" alt="">
                    </div>
                    <table border="0" cellpadding="5" cellspacing="0" width="200">
                        <?php



                        foreach ($res['content']['varations'] as $vars) {


                            $str = $vars['name'];
                            $headers = explode('-', $str);


                            // $headers.shift();        
                            // print_r($headers);
                            $exp = $headers[0];
                            $header = explode(' ', $exp);

                            $color == $color1 ? $color = $color2 : $color = $color1;


                            ?>
                            <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $header[1] . " " . $headers[1] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>"; ?>
                            <?php

                        }

                        ?>
                    </table>
                    <div class="button">
                    <a href="login.php"><button>buy</button></a>
                    </div>
                </div>
                <?php
            }



            curl_close($curl);



            $host = 'https://sandbox.vtpass.com/api/service-variations?serviceID=glo-data';
            $curl = curl_init();


            curl_setopt($curl, CURLOPT_URL, $host);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $vdata = curl_exec($curl);

            if ($e = curl_error($curl)) {
                echo $e;
            } else {
                $res = json_decode($vdata, true);

                $color = NULL;

                $color1 = "#0a8e24";
                $color2 = "#4d9332";
                // print_r($res);
            
                ?>
                <div class="glo">
                    <div class="slogo">
                        <img src="moevan icons\Glo.svg" alt="">
                    </div>
                    <table border="0" cellpadding="5" cellspacing="0" width="200">
                        <?php



                        foreach ($res['content']['varations'] as $vars) {


                            $str = $vars['name'];
                            $headers = explode('-', $str);


                            // $headers.shift();        
                            // print_r($headers);
                    


                            $color == $color1 ? $color = $color2 : $color = $color1;


                            ?>
                            <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $headers[1] . " " . $headers[2] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>"; ?>
                            <?php

                        }

                        ?>
                    </table>
                    <div class="button">
                        <a href="login.php"><button>buy</button></a>
                    </div>
                </div>
                <?php
            }



            curl_close($curl);



            $host = 'https://sandbox.vtpass.com/api/service-variations?serviceID=etisalat-data';
            $curl = curl_init();


            curl_setopt($curl, CURLOPT_URL, $host);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $vdata = curl_exec($curl);

            if ($e = curl_error($curl)) {
                echo $e;
            } else {
                $res = json_decode($vdata, true);

                $color = NULL;

                $color1 = "#004b10";
                $color2 = "#00570d";
                // print_r($res);
            
                ?>
                <div class="mobile9">
                    <div class="slogo">
                        <img src="moevan icons\9mobile.svg" alt="">
                    </div>
                    <table border="0" cellpadding="5" cellspacing="0" width="200">
                        <?php



                        foreach ($res['content']['varations'] as $vars) {


                            $str = $vars['name'];
                            $headers = explode('-', $str);


                            // $headers.shift();        
                            // print_r($headers);
                    


                            $color == $color1 ? $color = $color2 : $color = $color1;


                            ?>
                            <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $headers[2] . " " . $headers[3] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>"; ?>
                            <?php

                        }

                        ?>
                    </table>
                    <div class="button">
                        <a href="login.php"><button>buy</button></a>
                    </div>
                </div>
                <?php
            }



            curl_close($curl);

            ?>

    </main>

</body>

</html>

<script src="js/script.js"></script>