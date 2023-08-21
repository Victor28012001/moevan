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
    <title>Notifications | Moevan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

  </head>

  <body>

    <?php include_once('includes/navbar.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <div class="scrolls">
      <h3>Notifications</h3>
      <?php
      $id = $_SESSION['id'];
      // $deactive = "UPDATE inf SET active=0 where n_id= " . $ids . " ";
      $find_notifications = "Select * from inf where active = 1 and id ='$id' ";
      $result = mysqli_query($con, $find_notifications);
      $count_active = '';
      $notifications_data = array();
      $deactive_notifications_dump = array();
      while ($rows = mysqli_fetch_assoc($result)) {
        $count_active = mysqli_num_rows($result);
        $notifications_data[] = array(
          "n_id" => $rows['n_id'],
          "icon" => $rows['icon'],
          "message" => $rows['message']
        );
      }

      $deactive = "UPDATE inf SET active=0 where active=1";

      $result = mysqli_query($con, $deactive);
      echo mysqli_error($con);

      //only five specific posts
      $deactive_notifications = "Select * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5";
      $result = mysqli_query($con, $deactive_notifications);
      while ($rows = mysqli_fetch_array($result)) {
        $deactive_notifications_dump[] = array(
          "n_id" => $rows['n_id'],
          "icon" => $rows['icon'],
          "message" => $rows['messages']
        );
      }
      ?>

      <?php if (!empty($count_active)) { ?>
        <div id="list">
          <?php
          foreach ($notifications_data as $list_rows) { ?>
            <div class="notif-box" data-id=<?php echo $list_rows['n_id']; ?>>
              <img src="<?php echo $list_rows['icon']; ?>" alt="funds">
              <div class="write">
                <?php
                echo $list_rows['message'];
                ?>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      <?php } else { ?>
        <!--old Messages-->
        <div id="list">
          <?php
          foreach ($deactive_notifications_dump as $list_rows) { ?>
            <div class="notif-box" data-id=<?php echo $list_rows['n_id']; ?>>
              <img src="<?php echo $list_rows['icon']; ?>" alt="funds">
              <div class="write">
                <?php
                echo $list_rows['message'];
                ?>
              </div>
            </div>
          <?php }
          ?>
          <!--old Messages-->

        <?php } ?>

      </div>
    </div>

  </body>
  <script src="js/script.js"></script>


  </html>
  <?php
}
?>