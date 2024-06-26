<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    error_reporting(E_ALL ^ E_WARNING);

    ?>
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
        <title>Airtime TopUP | Moevan</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>


        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>



        <div class="scrolls">
            <h3>Airtime TopUP</h3>


            <form action="" method="post">
                <input type="hidden" name="Topup" value="Topup">
                <div class="cont">
                    <h4>Network</h4>
                    <select name="serviceID" id="dd" required="required">
                        <option value="mtn" selected></option>
                        <option value="mtn">MTN</option>
                        <option value="glo">GLO</option>
                        <option value="etisalat">9MOBILE</option>
                        <option value="airtel">AIRTEL</option>
                    </select>
                </div>
                <div class="cont">
                    <h4>Airtime Type</h4>
                    <select id="dd" required="required">
                        <option selected></option>
                        <option>VTU</option>
                        <option>Share and Sell</option>
                    </select>
                </div>
                <div class="cont">
                    <h4>Mobile Number</h4>
                    <input id="phone" class="form-control" type="text" name="recepient" placeholder="Enter Phone Number"
                        required>
                </div>
                <div class="cont">
                    <h4>Amount</h4>
                    <input id="amount" class="form-control" type="text" name="amount" oninput="myFunction()" required>
                </div>
                <input id="trans_charge" class="form-control" type="hidden" name="trans_charge" value="50">


                <div class="topup-pay">
                    <div class="keys">
                        <h5>Transaction Charge</h5>
                        <h5>Payment</h5>
                    </div>

                    <div class="values">
                        <h5><span>&#8358;</span><span id="chg"></span>.00</h5>
                        <h5><span>&#8358;</span><span id="chng"></span>.00</h5>
                    </div>

                </div>



                <div class="fund-wallet" name="Topup">
                    <button type="submit" class="btn-primary">
                        <h5>Buy Now</h5>
                    </button>
                </div>
        </div>
        </form>



        </div>
        <script>
            function myFunction() {
                let amount = document.getElementById("amount").value;
                let trans_charge = document.getElementById("trans_charge").value;
                let tranx_charge = document.getElementById("chg");
                let tranx_amount = document.getElementById("chng");
                tranx_charge.innerHTML = trans_charge;
                tranx_amount.innerHTML = +amount + + trans_charge;
            }
        </script>
    </body>

    <?php
    if (isset($_POST['Topup'])) {
        $serviceid = $_POST['serviceID'];
        $phone = $_POST['recepient'];
        $username = "Moevanenterprise@gmail.com"; //email address(sandbox@vtpass.com)
        $password = "Promise1234"; //password (sandbox)
        $host = 'https://sandbox.vtpass.com/api/pay';
        $amount = $_POST['amount'];


        $userid = $_SESSION['id'];

        // global $current_user;
        $query = mysqli_query($con, "select * from users where id='$userid'");
        $result = mysqli_fetch_array($query);

        $fname = $result['fname'];
        $lname = $result['lname'];
        $email = $result['email'];
        $balance = $result['balance'];


        if ($balance >= $amount) {

            date_default_timezone_set("Africa/Lagos");
            $currentTime = new DateTime();
            $formattedString = $currentTime->format('YmdHisZ');

            $data = array(
                'serviceID' => $serviceid,
                //integer e.g mtn,airtel
                'amount' => $amount,
                // integer
                'phone' => $phone,
                //integer
                'request_id' => $formattedString . substr(md5(uniqid(mt_rand(), true) . microtime(true)), 0, 8)
            );
            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => $host,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_USERPWD => $username . ":" . $password,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $data,
                    CURLOPT_VERBOSE => true,
                    CURLOPT_STDERR => fopen('curl.log', 'w+'),
                )
            );
            $vdata = curl_exec($curl);
            // $info = curl_getinfo($curl);
            // var_dump($info);
            // print_r($info);
            // $curl_error = curl_error($curl);
            // print_r($curl_error);
            curl_close($curl);
            echo $res = json_decode($vdata, true);


            // Insert to Database

            if ($res['code'] == "000") {
                $icon = addslashes('moevan icons\Icon awesome-sim-card(1).svg');
                $amount = $_POST['amount'];
                $dated = date("Y-m-d H:m:s");
                $status = $res['response_description'];
                $product = $res['content']['transactions']['product_name'];
                $particulars = $res['content']['transactions']['transactionId'] . " - " . $res['requestId'];
                // print_r($particulars);
                $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus,numbers,plan,plan_no) VALUES('$fname','$lname','$product','$email','$particulars','$amount','$dated','$status','$phone','airtime','-')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your topup payment was successful.','1')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
            } else {
                $icon = addslashes('moevan icons\Icon awesome-sim-card(1).svg');
                $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus) VALUES('$fname','$lname','Airtime','$email',0,'-',NOW(),'Error')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your topup payment was not successful.','1')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
            }
            if ($status == "TRANSACTION SUCCESSFUL") {
                $astatus = "success!";
                $icon = "success";
                $color = "#0CE864";
                $tstatus = "successful (" . $res['response_description'] . ")";
                $new_balance = $balance - $amount;
                $update = mysqli_query($con, "update users set balance='$new_balance' where id='$userid'");
                $query = mysqli_query($con, "select * from users where id='$userid'");
                $result = mysqli_fetch_array($query); ?>

                <?php
                header("Location: welcome.php");

            } else {
                $astatus = "Oops..";
                $icon = "error";
                $color = "#FF3535";
                $tstatus = "NOT successful (" . $res['response_description'] . ")";
            }
            ?>

    <style>
        .swal2-title {
            color:
                <?php echo $color; ?>
                !important;
        }

        .swal2-button {
            padding-bottom: 10px;
            box-sizing: border-box;
        }

        .swal2-popup .swal2-styled:focus {
            box-shadow: none !important;
        }
    </style>
    <script>
        Swal.fire({
            icon: '<?php echo $icon; ?>',
            title: '<?php echo $astatus; ?>',
            text: 'Your <?php echo $product; ?> was <?php echo $tstatus; ?>.',
            background: '#1E1E1E',
            confirmButtonColor: "#00C0C0",
            focusConfirm: false,
            // buttonsStyling: false,
            iconColor: '<?php echo $color; ?>',
            color: '#ffffff'
        })
    </script>
<?php } else {
            ?>


    <style>
        .swal2-title {
            color: #FF3535 !important;
        }

        .swal2-button {
            padding-bottom: 10px;
            box-sizing: border-box;
        }

        .swal2-popup .swal2-styled:focus {
            box-shadow: none !important;
        }
    </style>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'Your account balance is too low for this transaction.',
            background: '#1E1E1E',
            confirmButtonColor: "#00C0C0",
            focusConfirm: false,
            // buttonsStyling: false,
            iconColor: '#FF3535',
            color: '#ffffff'
        })
    </script>
<?php }
    } ?>
    <script src="js/script.js"></script>

    </html>
<?php }
?>