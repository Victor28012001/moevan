<?php

include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
  ?>

  <style>
    .notification .badge {
      position: absolute;
      top: -10px;
      right: -10px;
      padding: 5px 10px;
      border-radius: 50%;
      background-color: red;
      color: white;
    }

    .hamburger {
      width: 55px;
      height: 25px;
      /* margin: auto; */
      /* z-index: 10; */
      cursor: pointer;
      position: relative;
      display: flex;
      align-items: center;
      padding: 10px 0;
    }

    .hamburger span {
      position: absolute;
      display: block;
      height: 3px;
      width: 30px;
      background-color: #00C0C0;
      border-radius: 2px;
      transform: rotate(0);
      transition: all 200ms cubic-bezier(0.895, 0.03, 0.685, 0.22);
    }

    span.one {
      top: 0px;
    }

    span.two {
      top: 10px;
    }

    span.three {
      top: 20px;
    }

    .clicked .one {
      transform: translateY(5px) rotate(45deg);
    }

    .clicked .two {
      opacity: 0;
    }

    .clicked .three {
      transform: translateY(-15px) rotate(-45deg);
    }
  </style>

  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

  <?php
  $find_notifications = "Select * from inf where active = 1";
  $result = mysqli_query($con, $find_notifications);
  $count_active = '';
  while ($rows = mysqli_fetch_assoc($result)) {
    $count_active = mysqli_num_rows($result);
    if (is_null($count_active)) {
      $count_active = 0;
    } else {
      $count_active = $rows['message'];
    }
  }
  ?>




  <div class="fixed">
    <div class="hamburger" id="hamburger">
      <span class="one"></span>
      <span class="two"></span>
      <span class="three"></span>
    </div>
    <a href="welcome.php"><img src="..\moevan icons\Wordmark logo.svg" alt=""></a>
    <a href="notifications.php" class="notification">
      <img src="..\moevan icons\🦆 icon _bell_.svg" alt="">
      <?php if (!empty($count_active)) { ?>
        <span class="badge" id="bell-count" data-value="<?php echo $count_active; ?>"><?php echo $count_active; ?></span>
      <?php } ?>
    </a>

  </div>

  <script>
    $("#bell-count").on('click', function (e) {
      e.preventDefault();

      let belvalue = $('#bell-count').attr('data-value');

      if (belvalue == '') {

        console.log("inactive");
      } else {
        $(".round").css('display', 'none');

        $.ajax({
          url: './connection/deactive.php',
          type: 'POST',
          data: { "id": $(this).attr('data-id') },
          success: function (data) {

            console.log(data);
            window.location.href = "notifications.php";
          }
        });
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