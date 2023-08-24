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
        <link href="css/sidebar.css" rel="stylesheet" />
        <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
        <title>Cable subscription | Moevan</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>

    <body>
        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>



        <div class="scrolls">
            <h3>Cable subscription</h3>


            <form action="" method="post">
                <input type="hidden" name="tvsub" value="tvsub">

                <div class="cont">
                    <h4>Cable name</h4>
                    <div class="dropdown">
                        <select name="serviceID" id="dd" required="required">
                            <option value="" selected></option>
                            <option value="gotv">GOTV Payment</li>
                            <option value="dstv">DSTV Subscription</li>
                            <option value="startimes">Startimes Subscription</li>
                            <option value="showmax">Showmax Subscription</li>
                        </select>
                    </div>
                </div>
                <div class="cont">
                    <h4>Cable plan</h4>
                    <div class="dropdown">
                        <select name="variation_code" id="dd" class="idd">
                            <option selected></option>
                        </select>
                    </div>
                </div>

                <div class="cont">
                    <h4>Cable plan type</h4>
                    <div class="dropdown">
                        <select name="type" id="dd" class="idd">
                            <option selected></option>
                            <option value="change">Change</option>
                            <option value="renew">Renew</option>
                        </select>
                    </div>
                </div>

                <div class="cont">
                    <h4>SmartCard number/ IUC number</h4>
                    <input id="billerscode" class="form-control" type="text" name="billersCode"
                        placeholder="Enter Smartcard Number" required>
                </div>

                <div class="cont">
                    <h4>Phone</h4>
                    <input id="phone" class="form-control" type="text" name="phone" placeholder="Enter Phone Number"
                        required>
                </div>

                <div class="cont">
                    <h4>Enter Amount</h4>
                    <input id="amount" class="form-control" type="text" name="amount" required>
                </div>


                <div class="fund-wallet" name="tvsub">
                    <button type="submit" class="btn-primary">
                        <h5>Validate</h5>
                    </button>
                </div>

            </form>


            <!-- <div class="faq">
                <img src="moevan icons\Group 66(1).svg" alt="">
            </div> -->

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
    if (isset($_POST['tvsub'])) {
        // error_reporting(E_ALL ^ E_WARNING);
        $serviceid = htmlspecialchars($_POST['serviceID']);
        $billerscode = htmlspecialchars($_POST['billersCode']);
        $variation_code = htmlspecialchars($_POST['variation_code']);
        $type = $_POST['type'];
        $amount = htmlspecialchars($_POST['amount']);
        $phone = $_POST['phone'];
        $username = "Moevanenterprise@gmail.com"; //email address(sandbox@vtpass.com)
        $password = "Promise1234"; //password (sandbox)
        $host = 'https://sandbox.vtpass.com/api/pay';
        echo "<script>alert($phone)</script>";
        echo "<script>console.log($phone)</script>";


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
                //integer e.g gotv,dstv,eko-electric,abuja-electric
                'billersCode' => $_POST['billersCode'],
                // e.g smartcardNumber, meterNumber,
                'variation_code' => $_POST['variation_code'],
                // e.g dstv1, dstv2,prepaid,(optional for somes services)
                'amount' => $_POST['amount'],
                // integer (optional for somes services)
                'phone' => $_POST['phone'],
                //integer
                'subscription_type' => $_POST['type'],
                'request_id' => $formattedString . substr(md5(uniqid(mt_rand(), true) . microtime(true)), 0, 8)
            );

            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => $host,
                    CURLOPT_RETURNTRANSFER => true,
                    // CURLOPT_ENCODING => "",
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
                $icon = addslashes('moevan icons\🦆 icon _Television_.svg');
                $amount = $_POST['amount'];
                $dated = date("Y-m-d H:m:s");
                $status = $res['response_description'];
                $product = $res['content']['transactions']['product_name'];
                $particulars = $res['content']['transactions']['transactionId'] . " - " . $res['requestId'];
                $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus,numbers,plan,plan_no) VALUES('$fname','$lname','$product','$email','$particulars','$amount','$dated','$status','$billerscode','cable', '-')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your cable payment was successful.','1')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
            } else {
                $icon = addslashes('moevan icons\🦆 icon _Television_.svg');
                $sql = "INSERT INTO transactions(fname,lname,ttype,email,tid,amount,dated,astatus) VALUES('$fname','$lname','Cable','$email',0,'-',NOW(),'Error')";
                $result1 = mysqli_query($GLOBALS['con'], $sql);
                $sql1 = "INSERT INTO inf(icon,messages,active) VALUES('$icon','Your cable payment was not successful.','1')";
                $result2 = mysqli_query($GLOBALS['con'], $sql1);
            }
            if ($status == "TRANSACTION SUCCESSFUL") {
                $astatus = "success!";
                $icons = "success";
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
                    icon: '<?php echo $icons; ?>',
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
;

?>