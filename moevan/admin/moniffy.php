<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {

    //Instantiate the class

    $userid = $_SESSION['id'];
    $query = mysqli_query($con, "select * from users where id='$userid'");
    $result = mysqli_fetch_array($query);
    $balance = $result['balance'];
    $fname = $result['fname'];
    $lname = $result['lname'];
    $phone = $result['contactno'];
    $email = $result['email'];
    $trans_charge = 50;

    //Code for Updation 
    if (isset($_POST['update'])) {
        $amount = $_POST['amount'];
        echo "<script>alert('Profile updated successfully');</script>";
    }

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
        <title>Monnify</title>
        <script type="text/javascript" src="https://sandbox.sdk.monnify.com/plugin/monnify.js"></script>
    </head>

    <body>

        <?php include_once('includes/navbar.php'); ?>
        <!-- <div id="layoutSidenav"> -->

        <!-- <div id="layoutSidenav_content"> -->


        <!-- <div class="container"> -->


        <div class="scrolls">
            <h3>monnify</h3>


            <form id="fom" action="" method="POST">


                <div class="cont">
                    <h4>Enter Amount</h4>
                    <input id="amount" class="form-control" type="number" name="amount" placeholder="Enter Amount"
                        oninput="myFunction()" required>
                </div>

                <input id="trans_charge" class="form-control" type="hidden" name="trans_charge" value="50">
                <input id="" class="form-control" type="hidden" name="update">

                <div class="topup-pay" style="padding-bottom: 30vh">
                    <div class="keys">
                        <h5>Transaction Charge</h5>
                        <h5>Payment</h5>
                    </div>

                    <div class="values">
                        <h5>N<span id="chg"></span>.00</h5>
                        <h5>N<span id="chng"></span>.00</h5>
                    </div>

                    <script type="text/javascript" src="https://sandbox.sdk.monnify.com/plugin/monnify.js"></script>

                </div>
                <!-- <div class="fund-wallet" name="pay"> -->
                <button type="submit" class="fund-wallet" name="pay">
                    <h4>Continue to Funding</h4>
                </button>
                <!-- </div> -->
            </form>


        </div>
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

        <?php include_once('includes/sidebar.php'); ?>

        <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function payWithMonnify(amount) {
                MonnifySDK.initialize({
                    amount: +amount+ + 50,
                    currency: "NGN",
                    reference: '' + Math.floor((Math.random() * 1000000000) + 1),
                    customerFullName: "<?php echo "$fname.' '.$lname"; ?>",
                    customerEmail: "<?php echo $email; ?>",
                    customerMobileNumber: "<?php echo $phone; ?>",
                    apiKey: "MK_TEST_ZKN0GQZUX9",
                    contractCode: "7324151870",
                    paymentDescription: "MOEVAN Account Funding",
                    isTestMode: true,
                    onComplete: function (response) {
                        const status = response.status;
                        const referenced = response.paymentReference;
                        window.location.href = 'success.php?successfullypaid=' + referenced + "&status=" + status + "&amount=" + +amount;
                    },
                    onClose: function (data) {
                        //Implement what should happen when the modal is closed here
                    }
                });
            }

            $(function () {

                $("form").submit(function (e) {
                    // alert('in here!');
                    e.preventDefault();
                    let data = $(this).serializeArray();
                    let amount = data[0].value;
                    payWithMonnify(amount);
                });
            });



        </script>
        <script src="../js/script.js"></script>
    </body>

    </html>

<?php } ?>