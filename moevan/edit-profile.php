<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    //Code for Updation 
    if (isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        $DP = $_FILES["DP"]["name"];
        $tempname = $_FILES["DP"]["tmp_name"];
        $folder = "./images/" . $DP;


        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        $userid = $_SESSION['id'];
        $msg = mysqli_query($con, "update users set fname='$fname',lname='$lname',contactno='$contact',DP='$DP' where id='$userid'");

        if ($msg) {
            echo "<script>alert('Profile updated successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
        }
    }



    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile | Moevan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css">
        <link href="css/sidebar.css" rel="stylesheet" />
        <link rel="shortcut icon" href="moevan icons\meovan symbol.svg" type="image/x-icon">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php include_once('includes/navbar.php'); ?>
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        <?php
                        $userid = $_SESSION['id'];
                        $query = mysqli_query($con, "select * from users where id='$userid'");
                        while ($result = mysqli_fetch_array($query)) { ?>
                            <h1 class="mt-4" style="color: var(--color-black);">
                                <?php echo $result['fname']; ?>'s Profile
                            </h1>
                            <div class="card mb-4">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>First Name</th>
                                                <td><input class="form-control" id="fname" name="fname" type="text"
                                                        value="<?php echo $result['fname']; ?>" required /></td>
                                            </tr>
                                            <tr>
                                                <th>Last Name</th>
                                                <td><input class="form-control" id="lname" name="lname" type="text"
                                                        value="<?php echo $result['lname']; ?>" required /></td>
                                            </tr>
                                            <tr>
                                                <th>Contact No.</th>
                                                <td colspan="3"><input class="form-control" id="contact" name="contact"
                                                        type="text" value="<?php echo $result['contactno']; ?>"
                                                        pattern="[0-9]{11}" title="11 numeric characters only" maxlength="11"
                                                        required /></td>
                                            </tr>

                                            <tr>
                                                <th>Display Image</th>
                                                <td colspan="3"><input class="form-control" id="DP" name="DP" type="file"
                                                        value="" /></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td colspan="3">
                                                    <?php echo $result['email']; ?>
                                                </td>
                                            </tr>


                                            <tr>
                                                <th>Reg. Date</th>
                                                <td colspan="3">
                                                    <?php echo $result['posting_date']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="text-align:center ;"><button type="submit"
                                                        class="btn btn-primary btn-block" name="update">Update</button></td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>

                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/script.js"></script>
    </body>

    </html>
<?php } ?>