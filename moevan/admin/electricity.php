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
        <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/sidebar.css">
        <link rel="shortcut icon" href="..\moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Electricity</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>



        <div class="scrolls">
            <h3>Electricity Bill Payment</h3>


            <form action="" method="post">


                <input type="hidden" name="Topup" value="Topup">
                <div class="cont">
                    <h4>Disco name</h4>
                    <select name="serviceID" id="dd" required="required">
                        <option selected></option>
                        <option value="portharcourt-electric">PHED</option>
                        <option value="ikeja-electric">IKEDC</option>
                        <option value="eko-electric">EKEDC</option>
                        <option value="abuja-electric">AEDC</option>
                        <option value="jos-electric">JED</option>
                        <option value="benin-electric">BEDC</option>
                        <option value="eko-electric">IBEDC</option>
                        <option value="kaduna-electric">KAEDCO</option>
                        <option value="kano-electric">KEDCO</option>
                        <option value="enugu-electric">EEDC</option>
                    </select>
                </div>
                <div class="cont">
                    <h4>Meter Type</h4>
                    <div class="dropdown">
                        <select name="variation_code" id="dd" required="required">
                            <option></option>
                            <option value="prepaid">PREPAID</option>
                            <option value="postpaid">POSTPAID</option>
                        </select>
                    </div>
                    <div class="cont">
                        <h4>Meter Number</h4>
                        <input id="Meter_Number" class="form-control" type="text" name="Meter_Number"
                            placeholder="Enter Meter Number" required>
                    </div>
                    <div class="cont">
                        <h4>Amount</h4>
                        <input id="amount" class="form-control" type="text" name="amount" placeholder="Enter Amount"
                            required>
                    </div>
                    <div class="cont">
                        <h4>Customer Phone</h4>
                        <input id="phone" class="form-control" type="text" name="recepient" placeholder="Enter Phone Number"
                            required>
                    </div>



                    <div class="fund-wallet" name="Topup" onclick="confirm()">
                        <button type="submit" class="btn-primary">
                            <h5>Validate</h5>
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </body>

    <?php
    if (isset($_POST['Topup'])) {
        $phone = $_POST['recepient'];
        error_reporting(E_ALL ^ E_WARNING);
        $serviceid = $_POST['serviceID'];
        $variation_code = $_POST['variation_code'];
        $amount = $_POST['amount'];
        $username = "Moevanenterprise@gmail.com"; //email address(sandbox@vtpass.com)
        $password = "Promise1234"; //password (sandbox)
        $host = 'https://sandbox.vtpass.com/api/pay';

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
                'serviceID' => $_POST['serviceID'],
                //integer e.g mtn,airtel
                'amount' => $_POST['amount'],
                // integer
                'phone' => $_POST['recepient'],
                //integer
                'request_id' => $formattedString . substr(md5(uniqid(mt_rand(), true) . microtime(true)), 0, 8),
                'billersCode' => $_POST['Meter_Number'],
                'variation_code' => $_POST['variation_code']
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
                )
            );
            echo $vdata = curl_exec($curl);
            // $curl_error = curl_error($curl);
            // print_r($curl_error);
            curl_close($curl);
            $res = json_decode($vdata, true);

            // Insert to Database

            if ($res['code'] == "000") {
                $amount = $_POST['amount'];
                $dated = date("Y-m-d H:m:s");
                $time = time();
                $year = date("Y-m-d");
                $status = $res['response_description'];
                $product = $res['content']['transactions']['product_name'];
                $particulars = $res['content']['transactions']['transactionId'] . " - " . $res['requestId'];
                $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus) VALUES('$fname','$lname','$product','$email','$particulars','$amount','$dated','$status')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                $sql1 = "INSERT INTO inf(amount,numbers,plan,timer,dated) VALUES('$amount','$phone','-','$time','$year')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
            } else {
                $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus) VALUES('$fname','$lname','Electricity','$email',0,'-',NOW(),'Error')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
            }
            if ($status == "TRANSACTION SUCCESSFUL") {
                $astatus = "success!";
                $icon = "success";
                $color = "#0CE864";
                $tstatus = "successful (" . $res['response_description'] . ")";
                $new_balance = $balance - $amount;
                $update = mysqli_query($con, "update users set balance='$new_balance' where id='$userid'");
                $query = mysqli_query($con, "select * from users where id='$userid'");
                $result = mysqli_fetch_array($query);
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
                    iconColor: '#FF3535',
                    color: '#ffffff'
                })
            </script>
        <?php }
    }

    ?>
    <script src="../js/script.js"></script>

    </html>
<?php }
;

?>