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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/sidebar.css" rel="stylesheet" />
    <link rel="shortcut icon" href="..\moevan icons\meovan symbol.svg" type="image/x-icon">
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <style>
      body {
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
      }

      .round {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: relative;
        background: red;
        display: inline-block;
        padding: 0.3rem 0.2rem !important;
        margin: 0.3rem 0.2rem !important;
        left: -18px;
        top: 10px;
        z-index: 99 !important;
      }

      .round>span {
        color: white;
        display: block;
        text-align: center;
        font-size: 1rem !important;
        padding: 0 !important;
      }

      #list {

        display: none;
        top: 33px;
        position: absolute;
        right: 2%;
        background: #ffffff;
        z-index: 100 !important;
        width: 25vw;
        margin-left: -37px;

        padding: 0 !important;
        margin: 0 auto !important;


      }

      .message>span {
        width: 100%;
        display: block;
        color: red;
        text-align: justify;
        margin: 0.2rem 0.3rem !important;
        padding: 0.3rem !important;
        line-height: 1rem !important;
        font-weight: bold;
        border-bottom: 1px solid white;
        font-size: 1.8rem !important;

      }

      .message {
        /* background:#ff7f50;
            margin:0.3rem 0.2rem !important;
            padding:0.2rem 0 !important;
            width:100%;
            display:block; */

      }

      .message>.msg {
        width: 90%;
        margin: 0.2rem 0.3rem !important;
        padding: 0.2rem 0.2rem !important;
        text-align: justify;
        font-weight: bold;
        display: block;
        word-wrap: break-word;


      }
    </style>
  </head>

  <body>
    <?php
    $find_notifications = "Select * from inf where active = 1 and id = ";
    $result = mysqli_query($con, $find_notifications);
    $count_active = '';
    $notifications_data = array();
    $deactive_notifications_dump = array();
    while ($rows = mysqli_fetch_assoc($result)) {
      $count_active = mysqli_num_rows($result);
      $notifications_data[] = array(
        "n_id" => $rows['n_id'],
        "notifications_name" => $rows['notifications_name'],
        "message" => $rows['message']
      );
    }
    //only five specific posts
    $deactive_notifications = "Select * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5";
    $result = mysqli_query($con, $deactive_notifications);
    while ($rows = mysqli_fetch_array($result)) {
      $deactive_notifications_dump[] = array(
        "n_id" => $rows['n_id'],
        "notifications_name" => $rows['notifications_name'],
        "message" => $rows['message']
      );
    }

    ?>

    <?php if (!empty($count_active)) { ?>
      <div id="list">
        <?php
        foreach ($notifications_data as $list_rows) { ?>
          <li id="message_items">
            <div class="message alert alert-warning" data-id=<?php echo $list_rows['n_id']; ?>>
              <span>
                <?php echo $list_rows['notifications_name']; ?>
              </span>
              <div class="msg">
                <p>
                  <?php
                  echo $list_rows['message'];
                  ?>
                </p>
              </div>
            </div>
          </li>
        <?php }
        ?>
      </div>
    <?php } else { ?>
      <!--old Messages-->
      <div id="list">
        <?php
        foreach ($deactive_notifications_dump as $list_rows) { ?>
          <li id="message_items">
            <div class="message alert alert-danger" data-id=<?php echo $list_rows['n_id']; ?>>
              <span>
                <?php echo $list_rows['notifications_name']; ?>
              </span>
              <div class="msg">
                <p>
                  <?php
                  echo $list_rows['message'];
                  ?>
                </p>
              </div>
            </div>
          </li>
        <?php }
        ?>
        <!--old Messages-->

      <?php } ?>

    </div>

  </body>
  <script>
    $(document).ready(function () {
      var ids = new Array();
      $('#over').on('click', function () {
        $('#list').toggle();
      });

      //Message with Ellipsis
      $('div.msg').each(function () {
        var len = $(this).text().trim(" ").split(" ");
        if (len.length > 12) {
          var add_elip = $(this).text().trim().substring(0, 65) + "…";
          $(this).text(add_elip);
        }

      });


      $("#bell-count").on('click', function (e) {
        e.preventDefault();

        let belvalue = $('#bell-count').attr('data-value');

        if (belvalue == '') {

          console.log("inactive");
        } else {
          $(".round").css('display', 'none');
          $("#list").css('display', 'block');

          // $('.message').each(function(){
          // var i = $(this).attr("data-id");
          // ids.push(i);

          // });
          //Ajax
          $('.message').click(function (e) {
            e.preventDefault();
            $.ajax({
              url: './connection/deactive.php',
              type: 'POST',
              data: { "id": $(this).attr('data-id') },
              success: function (data) {

                console.log(data);
                location.reload();
              }
            });
          });
        }
      });

      $('#notify').on('click', function (e) {
        e.preventDefault();
        var name = $('#notifications_name').val();
        var ins_msg = $('#message').val();
        if ($.trim(name).length > 0 && $.trim(ins_msg).length > 0) {
          var form_data = $('#frm_data').serialize();
          $.ajax({
            url: './connection/insert.php',
            type: 'POST',
            data: form_data,
            success: function (data) {
              location.reload();
            }
          });
        } else {
          alert("Please Fill All the fields");
        }


      });
    });
  </script>

  </html>
  <?php
}
?>