<?php

include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {
  ?>

  <style>
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" crossorigin="anonymous"></script>

  <?php
  $find_notifications = "Select * from inf where active = 1";
  $result = mysqli_query($con, $find_notifications);
  $count_active = '';
  while ($rows = mysqli_fetch_assoc($result)) {
    $count_active = mysqli_num_rows($result);
    if (is_null($count_active)) {
      $count_actives = 0;
    } else {
      $count_actives = $count_active;
    }
  }
  ?>




  <div class="fixed">
    <div class="hamburger" id="hamburger">
      <span class="one"></span>
      <span class="two"></span>
      <span class="three"></span>
    </div>
    <a href="welcome.php"><img class="mlogo" src="moevan icons\navbar-icons\Wordmark logo.svg" alt=""></a>
    <a href="notification.php" class="notification">
      <img class="mbell" src="moevan icons\navbar-icons\🦆 icon _bell_.svg" alt="">
      <?php if (!empty($count_actives)) { ?>
        <div class="badge" id="bell-count" data-value="<?php echo $count_actives; ?>"><span>
            <?php echo $count_active; ?>
          </span></div>
      <?php } ?>
    </a>

  </div>

  <script>
    $(".notification").on('click', function (e) {
      e.preventDefault();

      let belvalue = $('#bell-count').attr('data-value');

      if (belvalue == 0) {

        console.log("inactive");
      } else {
        $(".badge").css('display', 'none');
        location.href= 'notification.php';
        // $(".badge").remove();
      }
    });

    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
      var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.querySelector(".fixed").style.top = "0";
      } else {
        document.querySelector(".fixed").style.top = "-112px";
      }
      prevScrollpos = currentScrollPos;
    }

  </script>


<?php } ?>