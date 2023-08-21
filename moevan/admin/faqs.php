<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
} ?>

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
    <title>Frequently asked questions</title>
</head>

<body>



    <?php include_once('includes/navbar.php'); ?>
    <!-- <div id="layoutSidenav"> -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- <div id="layoutSidenav_content"> -->

    <div class="scrolls">
        <h3>Frequently asked questions</h3>

        <div class="questions">


            <div class="question">
                <h5>Question </h5>
                <img src="..\moevan icons\down arrow.png" alt="">
            </div>

            <div class="answer">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, impedit, accusantium
                    laudantium numquam cupiditate non dolorem autem nemo debitis voluptatum dicta quis, veniam vel
                    dolorum velit quo officia magni exercitationem.
                </p>
            </div>

        </div>

        <div class="questions">


            <div class="question">
                <h5>Question </h5>
                <img src="..\moevan icons\down arrow.png" alt="">
            </div>

            <div class="answer">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, impedit, accusantium
                    laudantium numquam cupiditate non dolorem autem nemo debitis voluptatum dicta quis, veniam vel
                    dolorum velit quo officia magni exercitationem.
                </p>
            </div>

        </div>


        <div class="questions">


            <div class="question">
                <h5>Question </h5>
                <img src="..\moevan icons\down arrow.png" alt="">
            </div>

            <div class="answer">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, impedit, accusantium
                    laudantium numquam cupiditate non dolorem autem nemo debitis voluptatum dicta quis, veniam vel
                    dolorum velit quo officia magni exercitationem.
                </p>
            </div>

        </div>


        <div class="questions">


            <div class="question">
                <h5>Question </h5>
                <img src="..\moevan icons\down arrow.png" alt="">
            </div>

            <div class="answer">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, impedit, accusantium
                    laudantium numquam cupiditate non dolorem autem nemo debitis voluptatum dicta quis, veniam vel
                    dolorum velit quo officia magni exercitationem.
                </p>
            </div>

        </div>


        <div class="questions">


            <div class="question">
                <h5>Question </h5>
                <img src="..\moevan icons\down arrow.png" alt="">
            </div>

            <div class="answer">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, impedit, accusantium
                    laudantium numquam cupiditate non dolorem autem nemo debitis voluptatum dicta quis, veniam vel
                    dolorum velit quo officia magni exercitationem.
                </p>
            </div>

        </div>


        <div class="questions">


            <div class="question">
                <h5>Question </h5>
                <img src="..\moevan icons\down arrow.png" alt="">
            </div>

            <div class="answer">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis, impedit, accusantium
                    laudantium numquam cupiditate non dolorem autem nemo debitis voluptatum dicta quis, veniam vel
                    dolorum velit quo officia magni exercitationem.
                </p>
            </div>

        </div>



    </div>
    <script>
        const questions = document.querySelectorAll(".questions");

        questions.forEach((question) => {
            question.addEventListener("click", () => {
                question.classList.toggle("active");
            });
        });
    </script>
    <script src="../js/script.js"></script>
</body>

</html>