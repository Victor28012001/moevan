<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {

    error_reporting(E_ALL ^ E_WARNING);
    ?>

    <style>
        table{
            width: 90%;
        }
        .airtel{
            position: relative;
            background: #f6f6f6;
            border-radius: 25px;
            margin: 12px auto;
            height: 90%;
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-top: 30px;
            padding: 10px;
        }
        .mtn{
            position: relative;
            background: #fcbd1c;
            border-radius: 25px;
            margin: 12px auto;
            height: 90%;
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-top: 30px;
            padding: 10px;
        }
        .glo{
            position: relative;
            background: #0a8e24;
            border-radius: 25px;
            margin: 12px auto;
            height: 90%;
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-top: 30px;
            padding: 10px;
        }
        .mobile9{
            position: relative;
            background: #004b10;
            border-radius: 25px;
            margin: 12px auto;
            height: 90%;
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-top: 30px;
            padding: 10px;
        }
        .button{
           position: relative;
           display: flex;
           align-self: flex-end;
           margin: 5px;
           
        }
    </style>


    <?php

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
        
        $color= NULL;

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

                    $color == $color1 ? $color=$color2 : $color=$color1;

                    
     ?>
                         <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $headers[2] . " " . $headers[3] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>";?>
            <?php

        }

            ?>
        </table>
        <div class="button">
                    <button>buy</button>
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
        
        $color= NULL;

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

                    $color == $color1 ? $color=$color2 : $color=$color1;

                    
     ?>
                         <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $header[1] . " " . $headers[1] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>";?>
            <?php

        }

            ?>
        </table>
        <div class="button">
                    <button>buy</button>
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
        
        $color= NULL;

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

                

                    $color == $color1 ? $color=$color2 : $color=$color1;

                    
     ?>
                         <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $headers[1] . " " . $headers[2] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>";?>
            <?php

        }

            ?>
        </table>
        <div class="button">
                    <button>buy</button>
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
        
        $color= NULL;

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

                

                    $color == $color1 ? $color=$color2 : $color=$color1;

                    
     ?>
                         <?php echo "
                <tr style='background-color:$color; text-align:center; font-weight:bold;'>
                    <td value=" . $vars['name'] . ">" . $headers[2] . " " . $headers[3] . "</td>
                    <td value=" . $vars['variation_amount'] . ">" . $vars['variation_amount'] . "</td>
                </tr>";?>
            <?php

        }

            ?>
        </table>
        <div class="button">
                    <button>buy</button>
                </div>
        </div>
    <?php
    }



    curl_close($curl);

?>
<?php } ?>