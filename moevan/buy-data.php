<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Data Plan | Moevan</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>



        <div class="scrolls">
            <h3>Data Plan</h3>



            <form action="" method="post">


                <input type="hidden" name="Topup" value="Topup">
                <div class="cont">
                    <h4>Network</h4>
                    <select id="dd" name="serviceID" required="required">
                        <option selected></option>
                        <option value="mtn-data">MTN</option>
                        <option value="glo-data">GLO</option>
                        <option value="etisalat-data">9MOBILE</option>
                        <option value="airtel-data">AIRTEL</option>
                    </select>
                </div>

                <div class="cont">
                    <h4>Data Type</h4>
                    <select name="variation_code" id="dd" class="idd">
                        <option selected></option>
                    </select>
                </div>


                <div class="cont">
                    <h4>Sender's Mobile Number</h4>
                    <input id="phone" class="form-control" type="text" name="sender"
                        placeholder="Enter Sending Phone Number" required>
                </div>


                <div class="cont">
                    <h4>Receiver's Mobile Number</h4>
                    <input id="phone" class="form-control" type="text" name="recepient"
                        placeholder="Enter recepient Phone Number" required>
                </div>


                <div class="cont">
                    <h4>Amount</h4>
                    <input id="amount" class="form-control" type="text" name="amount" placeholder="Enter Amount" required>
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
            //This function changes when the selected country/value changes
            function populateVariations() {
                //Get the selected value in country
                const network = document.getElementById("dd").value;


                const varations = document.querySelector(".idd");
                const amount = document.getElementById("amount");
                //Clear the options in the select list
                // varations.innerHTML = "";
                varations.options.length = 1;


                const api_url = 'https://sandbox.vtpass.com/api/service-variations?serviceID=' + network;

                async function getvariations() {
                    const response = await fetch(api_url);
                    const data = await response.json();
                    res = data.content.varations
                    let option


                    //Add the new options to the variations list
                    res.forEach((optionText) => {
                        option = document.createElement("option");
                        option.id = optionText.variation_amount;
                        option.value = optionText.variation_code;
                        option.textContent = optionText.name;
                        varations.appendChild(option);
                    });

                    varations.addEventListener('change', () => {
                        let selecetedIndex = varations.options[varations.selectedIndex].id;
                        document.querySelector('#amount').value = selecetedIndex;
                        let value = selecetedIndex;
                    })
                }

                getvariations();


            }
            document.getElementById("dd").addEventListener("change", populateVariations);


        </script>
    </body>

    <?php
    if (isset($_POST['Topup'])) {
        $serviceid = $_POST['serviceID'];
        $vrdata = $_POST['variation_code'];
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
            // print_r($formattedString);


            $data = array(
                'serviceID' => $_POST['serviceID'],
                //integer e.g mtn,airtel
                'amount' => $_POST['amount'],
                // integer
                'billersCode' => $_POST['sender'],
                // integer
                'phone' => $_POST['recepient'],
                //
                'variation_code' => $_POST['variation_code'],
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
                )
            );
            $vdata = curl_exec($curl);
            curl_close($curl);
            $res = json_decode($vdata, true);

            // Insert to Database

            if ($res['code'] == "000") {
                $icon = addslashes('moevan icons\Icon metro-wifi-connect.svg');
                $amount = $_POST['amount'];
                $dated = date("Y-m-d H:m:s");
                $status = $res['response_description'];
                $product = $res['content']['transactions']['product_name'];
                $particulars = $res['content']['transactions']['transactionId'] . " - " . $res['requestId'];
                $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus,numbers,plan,plan_no) VALUES('$fname','$lname','$product','$email','$particulars','$amount','$dated','$status','$phone','data','-')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your data subscription was successful.','1')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
            } else {
                $icon = addslashes('moevan icons\Icon metro-wifi-connect.svg');
                $sql = "INSERT INTO transactions(fname,lname,ttype,user_email,tid,amount,dated,astatus) VALUES('$fname','$lname','Data','$email',0,'-',NOW(),'Error')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your data subscription was not successful.','1')";
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
                    // buttonsStyling: false,
                    iconColor: '<?php echo $color; ?>',
                    color: '#ffffff'
                })
            </script>
            <?php
            header('welcome.php');
        } else {
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
        <?php 
        
        header('welcome.php');}
    } ?>
    <script src="js/script.js"></script>

    </html>
<?php }

?>