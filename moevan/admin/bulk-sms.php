<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
  error_reporting(E_ALL ^ E_WARNING);
} ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.cdnfonts.com/css/adobe-clean" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link href="../css/sidebar.css" rel="stylesheet" />
  <link rel="shortcut icon" href="..\moevan icons\meovan symbol.svg" type="image/x-icon">
  <title>Bulk SMS</title>
</head>

<body>

  <?php include_once('includes/navbar.php'); ?>
  <?php include_once('includes/sidebar.php'); ?>


  <div class="scrolls">
    <h3>Bulk SMS</h3>
    <form method="post">
      <h4 style="color: #00C0C0; margin-left: 4%; margin-top: 1%;">Sender ID</h4>
      <input type="text" name="sender">
      <input type="hidden" name="submit">
      <h4 style="color: #00C0C0; margin-left: 4%; margin-top: 4%;">Enter Phone Numbers</h4>
      <textarea name="numbers" id="numbers" placeholder="Phone Number List"></textarea>
      <br><br>
      <h4 style="color: #00C0C0; margin-left: 4%; margin-top: 2%;">Enter Message</h4>
      <!-- <input type="text" name="message"> -->
      <textarea name="message" id="message" placeholder="Message"></textarea>
      <div class="fund-wallet" name="pay">
        <button type="submit" class="btn-primary" name="pay">
          <h5 style="color: #000;">Send messages</h5>
        </button>
      </div>
    </form>
  </div>
  <script src="js/script.js"></script>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
  // Authorisation details.
// $username = "your username";
  $hash = "your api hash key";
  // Config variables. Consult http://api.textlocal.in/docs for more info.
  $test = "2";
  // Data for text message. This is the text message data.
  $sender = "sender"; // This is who the message appears to be from.
  $numbers = explode(',', $_POST["numbers"]); // A single number or a comma-seperated list of numbers
  $message = $_POST["message"];
  // 612 chars or less
// A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "api_token=" . $hash . "&from=" . $sender . "&to=" . $numbers . "&body=" . $message . "&dnd=" . $test;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  curl_close($ch);
  if (!$result) {
    ?>
    <script>alert('message not sent!')</script>
    <?php
  } else {
    #print the final result
    echo $result;
    ?>
    <script>alert('message sent!')</script>
    <?php
  }
}
?>

<script src="../js/script.js"></script>