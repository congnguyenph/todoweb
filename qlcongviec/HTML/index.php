<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Project</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../CSS/swiper-bundle.min.css" />

  <link rel="stylesheet" href="../CSS/style.css" />
</head>

<body>
  <div class="hero sticky">
    <a href="#" class="logolink">
      <img class="logo" src="../images/logo.png" alt="logo" />
    </a>
    <nav>
      <ul class="nav_links">
        <li><a href="#">Home</a></li>
        <li><a href="#section-about">About</a></li>
        <li><a href="#section-contact">Contact</a></li>
      </ul>
    </nav>
    <?php
    if (isset($_SESSION["userid"])) {
    ?>
      <a href="../HTML/work.php"><button class="get-started open-login-form">Get Started</button></a>
    <?php
    } else {
    ?>
      <button class="get-started open-login-form" onclick="openWrapper()">Get Started</button>
    <?php
    }
    ?>
  </div>

  <div class="wrapper">
    <div class="form-box login">
      <span class="icon-close login-close"><ion-icon name="close"></ion-icon></span>
      <h2>Login</h2>
      <form action="../PHP/includes/login.inc.php" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="person"></ion-icon></ion-icon></span>
          <input type="text" name="username" required />
          <label>Username/Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required />
          <label>Password</label>
        </div>
        <button type="submit" class="btn" name="submit">Login</button>
        <div class="login-register">
          <p>
            Don't have an account?
            <a href="#" class="register-link">Register</a>
          </p>
        </div>
      </form>
    </div>

    <div class="form-box register">
      <span class="icon-close register-close"><ion-icon name="close"></ion-icon></span>
      <h2>Registration</h2>
      <form action="../PHP/includes/register.inc.php" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="person"></ion-icon></span>
          <input type="text" name="username" required />
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required />
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required />
          <label>Password</label>
        </div>
        <button type="submit" class="btn" name="submit">Register</button>
        <div class="login-register">
          <p>
            Already have an account?
            <a href="#" class="login-link">Login</a>
          </p>
        </div>
      </form>
    </div>
  </div>

  <section class="black" id="section-home">
    <div class="intro-section">
      <h1 class="intro">
        Organize your
        <br />
        work and life, finally.
      </h1>

      <p class="sub-intro">
        A simple task management website to help manage your work and life
        arrangements
      </p>

      <!-- <a class="get-started" href="./work.php">
          <button>Get Started</button>
        </a> -->
      <?php
      if (isset($_SESSION["userid"])) {
      ?>
        <a href="../HTML/work.php"><button class="open-login-form">Get Started</button></a>
      <?php
      } else {
      ?>
        <button class="open-login-form" onclick="openWrapper()">Get Started</button>
      <?php
      }
      ?>
    </div>
  </section>

  <div class="spacer layer1"></div>

  <section class="blue" id="section-about">
    <h1>About</h1>
    <div class="about-grid">
      <img class="about-img1" src="../images/about-img1.png" alt="" />
      <h2 class="about-para1">Create your todo-list of tasks</h2>

      <img class="about-img2" src="../images/about-img2.png" alt="" />
      <h2 class="about-para2">Organize your tasks to track progress</h2>
    </div>
  </section>

  <div class="spacer layer2"></div>

  <section class="white" id="section-contact">
    <h1>Contact</h1>
    <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../images/Ina.jpg" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Hứa Tiên Hào</h2>
              <p class="description">MSSV: 46.01.104.049</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./contacts.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../images/NguyenThiYenKhoa/pic.jpg" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Huỳnh Thị Yến Khoa</h2>
              <p class="description">MSSV: 46.01.104.087</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./KHOA/html/tabcontent.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="./PCN/picture/nguyen.png" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Phước Công Nguyên</h2>
              <p class="description">MSSV: 46.01.104.125</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./PCN/index.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="./MY/images/girl.png" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Châu Tiểu My</h2>
              <p class="description">MSSV: 47.01.104.131</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./MY/index.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../SVG/user-solid.svg" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Hoàng Văn Thịnh</h2>
              <p class="description">MSSV: 47.01.104.201</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./contacts.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>

          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../images/Ina.jpg" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Hứa Tiên Hào</h2>
              <p class="description">MSSV: 46.01.104.049</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./contacts.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../images/NguyenThiYenKhoa/pic.jpg" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Huỳnh Thị Yến Khoa</h2>
              <p class="description">MSSV: 46.01.104.087</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./KHOA/html/tabcontent.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="./PCN/picture/nguyen.png" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Phước Công Nguyên</h2>
              <p class="description">MSSV: 46.01.104.125</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./PCN/index.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="./MY/images/girl.png" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Châu Tiểu My</h2>
              <p class="description">MSSV: 47.01.104.131</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./MY/index.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../SVG/user-solid.svg" alt="" class="card-img" />
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Hoàng Văn Thịnh</h2>
              <p class="description">MSSV: 47.01.104.201</p>
              <p class="description">Khoa: CNTT</p>

              <a href="./contacts.html" class="view">
                <button class="button">View More</button>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
</body>

<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    $message = "Fill in all fields.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  } else if ($_GET["error"] == "invalidusername") {
    $message = "Invalid username.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  } else if ($_GET["error"] == "invalidemail") {
    $message = "Invalid Email.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  } else if ($_GET["error"] == "usernametaken") {
    $message = "Username/Email already exists.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  } else if ($_GET["error"] == "wronglogin") {
    $message = "Username/Password is incorrect, please try again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  } else if ($_GET["error"] == "stmtfailed") {
    $message = "Something went wrong, please try again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  } else if ($_GET["error"] == "none") {
    $message = "Registration completed!";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}
?>

<script src="../JS/swiper-bundle.min.js"></script>

<script src="../JS/script.js"></script>

<script src="../JS/form.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>