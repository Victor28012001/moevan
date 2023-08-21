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
    <title>Support Team</title>
</head>

<body>
    <style>
        .info {
            color: #00C0C0;
            align-self: center;
        }

        .contwhat {
            position: relative;
            width: 100%;
            height: 30vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            justify-content: space-around;
            align-items: center;
        }

        .whatsapp {
            position: relative;
            width: 30%;
            height: 50px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
            background: #00C0C0;
            color: rgba(0, 0, 0, 0.8);
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <?php include_once('includes/navbar.php'); ?>
    <!-- <div id="layoutSidenav"> -->
    <?php include_once('includes/sidebar.php'); ?>
    <!-- <div id="layoutSidenav_content"> -->

    <div class="scrolls">
        <h3>Support Team</h3>


        <h5 class="info">For more complaints or further info, contact us on these lines:</h5>

        <div class="contwhat">

            <div class="whatsapp">
                <img src="moevan icons\🦆 icon _brand whatsapp_.png" alt="">
                <h5>1234567890</h5>
            </div>

            <div class="whatsapp">
                <img src="moevan icons\🦆 icon _telegram plane_.png" alt="">
                <h5>1234567890</h5>
            </div>


        </div>



    </div>
</body>
<script src="../js/script.js"></script>

</html>