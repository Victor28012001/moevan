<?php 

 include_once('includes/config.php');
 if (strlen($_SESSION['id'] == 0)) {
     header('location:logout.php');
 } else {
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
$result=mysqli_fetch_array($query);
$DP = $result['DP'];

$userImage =  $DP;
$defaultImage = 'Ellipse18.png';

$image = (!file_exists($userImage)) ? $userImage : $defaultImage; 
?> 

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>



    <section class="sidebar" id="sidebar">
      <div class="nav-header">
       <div class="logo">
        <a href="profile.php"><img src="./images/<?php echo $image; ?>" style="width:50px; height:50px; border-radius:50%;  background-image:url('./images/Ellipse18.png');"></a>
            <span class="title"><?php echo $result['fname'];?></span>
       </div>
        <img src="moevan icons\sidebar-icons\fi-br-menu-burger.svg" alt="menu" class="btn-menu"/>
      </div>
      <ul class="nav-links">
        <li>
          <a href="welcome.php">
            <img src="moevan icons\sidebar-icons\Icon open-grid-three-up.svg" alt="search" />
            <span class="title">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="history.php">
            <img src="moevan icons\sidebar-icons\Icon awesome-history.svg" alt="dashboard" />
            <span class="title">History</span>
          </a>
          <span class="tooltip">History</span>
        </li>
        <li>
          <a href="funding.php">
            <img src="moevan icons\sidebar-icons\Icon material-account-balance-wallet.svg" />
            <span class="title">Fund Wallet</span>
          </a>
          <span class="tooltip">Fund Wallet</span>
        </li>
        <li>
          <a href="pricing.php">
            <img src="moevan icons\sidebar-icons\🦆 icon _Clipboard List_.svg"/>
            <span class="title">Pricing</span>
          </a>
          <span class="tooltip">Pricing</span>
        </li>
        <li>
          <a href="support.php">
            <img src="moevan icons\sidebar-icons\🦆 icon _support_.svg"/>
            <span class="title">Support Team</span>
          </a>
          <span class="tooltip">Support Team</span>
        </li>
        <li>
          <a href="upgrade.php">
            <img src="moevan icons\sidebar-icons\Icon awesome-level-up-alt.svg"/>
            <span class="title">Upgrade</span>
          </a>
          <span class="tooltip">Upgrade</span>
        </li>
        <li>
          <a href="logout.php">
            <img src="moevan icons\sidebar-icons\🦆 icon _log out_.svg"/>
            <span class="title">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>
      </ul>
      <div class="theme-wrapper">
        <!-- <p>Dark Theme</p> -->
        <div class="theme-btn">
          <span class="theme-ball"></span>
        </div>
      </div>
    </section>

    <script>
      const btn_menu = document.querySelector(".btn-menu");
      const side_bar = document.querySelector(".sidebar");

      btn_menu.addEventListener("click", function () {
        side_bar.classList.toggle("expand");
        changebtn();
      });

      function changebtn() {
        if (side_bar.classList.contains("expand")) {
          btn_menu.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
          btn_menu.classList.replace("bx-menu-alt-right", "bx-menu");
        }
      }

      const btn_theme = document.querySelector(".theme-btn");
      const theme_ball = document.querySelector(".theme-ball");

      const localData = localStorage.getItem("theme");

      if (localData == null) {
        localStorage.setItem("theme", "light");
      }

      if (localData == "dark") {
        document.body.classList.add("dark-mode");
        theme_ball.classList.add("dark");
      } else if (localData == "light") {
        document.body.classList.remove("dark-mode");
        theme_ball.classList.remove("dark");
      }

      btn_theme.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        theme_ball.classList.toggle("dark");
        if (document.body.classList.contains("dark-mode")) {
          localStorage.setItem("theme", "dark");
        } else {
          localStorage.setItem("theme", "light");
        }
      });
    </script>


<?php } ?>
