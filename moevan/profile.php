<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Profile | Moevan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css">
        <link href="css/sidebar.css" rel="stylesheet" />
        <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
    </head>

    <body class="sb-nav-fixed">
        <?php include_once('includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <?php
                        error_reporting(0);
                        $userid = $_SESSION['id'];
                        $query = mysqli_query($con, "select * from users where id='$userid'");
                        while ($result = mysqli_fetch_array($query)) {
                            $DP = $result['DP'];

                            $userImage =  $DP;
                            $defaultImage = 'Ellipse18.png';

                            $image = (!file_exists($userImage)) ? $userImage : $defaultImage; 
                            ?>
                            <h1 class="mt-4" style="color: var(--color-black);">
                                <?php echo $result['fname']; ?>'s Profile
                            </h1>
                            <div class="card mb-4">

                                <div class="card-body">
                                    <a href="edit-profile.php">Edit</a>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>First Name</th>
                                            <td>
                                                <?php echo $result['fname']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>
                                                <?php echo $result['lname']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td colspan="3">
                                                <?php echo $result['email']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Contact No.</th>
                                            <td colspan="3">
                                                <?php echo $result['contactno']; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Display Image.</th>
                                            <td colspan="3"><img src="./images/<?php echo $image; ?>"
                                                    style="width:60px; height:60px; border-radius:50%; background-image:url('./images/Ellipse18.png');">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Reg. Date</th>
                                            <td colspan="3">
                                                <?php echo $result['posting_date']; ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </main>

            </div>
        </div>
        <script src="js/script.js"></script>
    </body>

    </html>
<?php } ?>