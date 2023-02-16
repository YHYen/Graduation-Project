<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Calorie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="vendor/animate/animate.css">
  <link rel="stylesheet" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" href="vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" href="vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="css/util.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="index.css">
</head>
<body>
  
  <?php 
    if (!isset($_SESSION['is_login'])):
  ?>
  
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">CALORIE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">首頁</a>
          </li>
          <li class="nav-item">
            <div class="show-login-btn nav-link">登入<i class="fas fa-sign-in-alt"></i></div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">個人資料</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 圖片輪播設定 -->
  <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img src="Main.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated bounceInRight" style="animation-delay: 1s">隨時記錄，隨時管理</h5>
          <p class="animated bounceInLeft" style="animation-delay: 2s">使用「添加餐點」，上傳餐點照片。<br>輕鬆紀錄餐點熱量，管理飲食習慣！</p>
          <p class="animated bounceInRight" style="animation-delay: 3s"><a href="#">馬上加入</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="p3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated fadeInDown" style="animation-delay: 1s">選擇瘦身策略，獲取飲食建議</h5>
          <p class="animated fadeInUp" style="animation-delay: 2s">填下個人資料，我們將為您計算每日營養需求。<br>根據您想要的瘦身方針給予飲食建議，輕鬆健身就在此刻！</p>
          <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">點擊設定</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="p4.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated zoomIn" style="animation-delay: 1s">更新個人名片，紀錄健康日誌</h5>
          <p class="animated fadeInLeft" style="animation-delay: 2s">
          隨時修正你的個人名片，與其他的瘦身同好交流心得吧！</p>
          <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">點擊前往</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- 圖片輪播設定結束 -->

<div class="login-box">
      <div class="row"></div>
      <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
          <div class="hide-login-btn"><i class="fas fa-times"></i></div> 
          <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="connect.php">
              <span class="login100-form-logo">
                <!-- 這裡放LOGO圖片 -->
                <!-- <i class="zmdi zmdi-landscape"></i> -->
                <img src="LOGO (2).png" class="circle" width="100px" height="100px">
              </span>

              <span class="login100-form-title p-b-34 p-t-27">
                歡迎回來，夥伴！
              </span>

              <div class="wrap-input100 validate-input" data-validate = "Enter username">
                <input class="input100" type="text" name="account" placeholder="電子信箱">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100" type="password" name="password" placeholder="密碼">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
              </div>

              <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                  保持登入
                </label>
              </div>

              <div class="container-login100-form-btn">
                
                <button class="login100-form-btn">
                  <a href="register.html">註冊</a>
                </button>

                <button class="login100-form-btn" type="submit">
                  登入
                </button> 
              </div>

              <div class="text-center p-t-90">
                <a class="txt1" href="#">
                  忘記密碼？
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>

<?php 
  elseif ($_SESSION['is_login'] == TRUE):
?>

    
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">CALORIE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">首頁</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">登出</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portfolio.php">個人資料</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- 圖片輪播設定 -->
  <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img src="Main.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated bounceInRight" style="animation-delay: 1s">隨時記錄，隨時管理</h5>
          <p class="animated bounceInLeft" style="animation-delay: 2s">使用「添加餐點」，上傳餐點照片。<br>輕鬆紀錄餐點熱量，管理飲食習慣！</p>
          <p class="animated bounceInRight" style="animation-delay: 3s"><a href="#">馬上加入</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="p3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated fadeInDown" style="animation-delay: 1s">選擇瘦身策略，獲取飲食建議</h5>
          <p class="animated fadeInUp" style="animation-delay: 2s">填下個人資料，我們將為您計算每日營養需求。<br>根據您想要的瘦身方針給予飲食建議，輕鬆健身就在此刻！</p>
          <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">點擊設定</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="p4.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated zoomIn" style="animation-delay: 1s">更新個人名片，紀錄健康日誌</h5>
          <p class="animated fadeInLeft" style="animation-delay: 2s">
          隨時修正你的個人名片，與其他的瘦身同好交流心得吧！</p>
          <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">點擊前往</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- 圖片輪播設定結束 -->

  <?php 
    else :
  ?>
  
  <script>
    window.onload = func;
    function func() {
      document.getElementById('login').click();
    }
  </script>

  
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">CALORIE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">首頁</a>
          </li>
          <li class="nav-item">
            <div class="show-login-btn nav-link" id="login">登入<i class="fas fa-sign-in-alt"></i></div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">個人資料</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 圖片輪播設定 -->
  <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img src="Main.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated bounceInRight" style="animation-delay: 1s">隨時記錄，隨時管理</h5>
          <p class="animated bounceInLeft" style="animation-delay: 2s">使用「添加餐點」，上傳餐點照片。<br>輕鬆紀錄餐點熱量，管理飲食習慣！</p>
          <p class="animated bounceInRight" style="animation-delay: 3s"><a href="#">馬上加入</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="p3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated fadeInDown" style="animation-delay: 1s">選擇瘦身策略，獲取飲食建議</h5>
          <p class="animated fadeInUp" style="animation-delay: 2s">填下個人資料，我們將為您計算每日營養需求。<br>根據您想要的瘦身方針給予飲食建議，輕鬆健身就在此刻！</p>
          <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">點擊設定</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="p4.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 class="animated zoomIn" style="animation-delay: 1s">更新個人名片，紀錄健康日誌</h5>
          <p class="animated fadeInLeft" style="animation-delay: 2s">
          隨時修正你的個人名片，與其他的瘦身同好交流心得吧！</p>
          <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">點擊前往</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- 圖片輪播設定結束 -->

<!-- 修正，登入畫面沒動畫 -->
<div class="login-box">
      <div class="row"></div>
      <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
          <div class="hide-login-btn"><i class="fas fa-times"></i></div> 
          <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="connect.php">
              <span class="login100-form-logo">
                <!-- 這裡放LOGO圖片 -->
                <!-- <i class="zmdi zmdi-landscape"></i> -->
                <img src="LOGO (2).png" class="circle" width="100px" height="100px">
              </span>

              <span class="login100-form-title p-b-34 p-t-27">
                歡迎回來，夥伴！
              </span>

              <div class="wrap-input100 validate-input" data-validate = "Enter username">
                <input class="input100" type="text" name="account" placeholder="電子信箱">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100" type="password" name="password" placeholder="密碼">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
              </div>

              <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                  保持登入
                </label>
              </div>

              <div class="container-login100-form-btn">
                
                <button class="login100-form-btn">
                  <a href="register.html">註冊</a>
                </button>

                <button class="login100-form-btn" type="submit">
                  登入
                </button> 
              </div>

              <div class="text-center p-t-90">
                <a class="txt1" href="#">
                  忘記密碼？
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>


  <?php 
    endif;
  ?>

  <script type="text/javascript">

    $(document).ready(function(){
      $(".show-login-btn").click(function(){
        $(".login-box").toggleClass("showed");
        $(".carousel").fadeToggle(1000);
        $(".navbar-toggler").slideUp("slow");
        $(".navbar-nav").slideToggle("slow");
      });
    });

    $(document).ready(function(){
      $(".hide-login-btn").click(function(){
        $(".login-box").toggleClass("showed");
        $(".carousel").fadeToggle(1000);
        $(".navbar-toggler").slideDown("slow");
        $(".navbar-nav").slideToggle("slow");
      });
    });

  </script>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script src="js/main.js"></script>  
</body>
</html>