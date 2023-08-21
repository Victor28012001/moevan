

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>



    <section class="sidebar" id="sidebar">
      <div class="nav-header">
       <div class="logo">
        <img src="..\moevan icons\Ellipse 18(1).png"/>
            <span class="title">Admin</span>
       </div>
        <img src="..\moevan icons\fi-br-menu-burger.png" alt="menu" class="btn-menu"/>
      </div>
      <ul class="nav-links">
        <li>
          <a href="welcome.php">
            <img src="..\moevan icons\Icon open-grid-three-up.png" alt="search" />
            <span class="title">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="history.php">
            <img src="..\moevan icons\Icon awesome-history.png" alt="dashboard" />
            <span class="title">History</span>
          </a>
          <span class="tooltip">History</span>
        </li>
        <li>
          <a href="funding.php">
            <img src="..\moevan icons\Icon material-account-balance-wallet.png" />
            <span class="title">Fund Wallet</span>
          </a>
          <span class="tooltip">Fund Wallet</span>
        </li>
        <li>
          <a href="pricing.php">
            <img src="..\moevan icons\🦆 icon _Clipboard List_.svg"/>
            <span class="title">Pricing</span>
          </a>
          <span class="tooltip">Pricing</span>
        </li>
        <li>
          <a href="support.php">
            <img src="..\moevan icons\🦆 icon _support_.svg"/>
            <span class="title">Support Team</span>
          </a>
          <span class="tooltip">Support Team</span>
        </li>
        <li>
          <a href="upgrade.php">
            <img src="..\moevan icons\Icon awesome-level-up-alt.png"/>
            <span class="title">Upgrade</span>
          </a>
          <span class="tooltip">Upgrade</span>
        </li>
        <li>
          <a href="logout.php">
            <img src="..\moevan icons\🦆 icon _log out_.svg"/>
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


