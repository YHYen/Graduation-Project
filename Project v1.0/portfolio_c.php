<?php 
  session_start();
  header('Content-Type: text/html; charset=utf-8');

  $account = $_SESSION['account'];
  $password = $_SESSION['password'];  
  require ("mysql_connect.inc.php");

  //搜索資料庫，定位使用者資料，傳值給JavaScript
  $Diet_Plan = mysqli_query($db_link, "SELECT Diet_Plan FROM member WHERE Email = '$account' AND Password = '$password'");
  $username = mysqli_result(mysqli_query($db_link, "SELECT Name FROM member WHERE Email = '$account' AND Password = '$password'"), 0);
  $birthday = mysqli_result(mysqli_query($db_link, "SELECT Birthday FROM member WHERE Email = '$account' AND Password = '$password'"), 0);
  $gender = mysqli_result(mysqli_query($db_link, "SELECT Gender FROM member WHERE Email = '$account' AND Password = '$password'"), 0);
  $height = mysqli_result(mysqli_query($db_link, "SELECT Height FROM member WHERE Email = '$account' AND Password = '$password'"), 0);
  $weight = mysqli_result(mysqli_query($db_link, "SELECT Weight FROM member WHERE Email = '$account' AND Password = '$password'"), 0);
  $sport_stage = mysqli_result(mysqli_query($db_link, "SELECT Sport_Stage FROM member WHERE Email = '$account' AND Password = '$password'"), 0);
  $pic = "userIMG/".mysqli_result(mysqli_query($db_link, "SELECT userPic FROM member WHERE Email = '$account' AND Password = '$password'"), 0);
  if($pic == "userIMG/"){
    $pic = "userIMG/default.png";
  }
  //取得欄位資料
  $value = mysqli_result($Diet_Plan,0) ;

  $DATE =  date ("Y-m-d" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
  $Carbohydrate=0;
  $Protein=0;
  $Fat=0;
  $con = new mysqli("localhost","root","","ubuntu506");
  $data = $con->query("SELECT * FROM record WHERE member_email = '$account' AND Date = '$DATE'");
  while($row = $data->fetch_assoc()){
    $Carbohydrate += $row["Carbohydrate"];
    $Protein += $row["Protein"];
    $Fat += $row["Fat"];
  }

  $Calorie = $Carbohydrate*4+$Protein*4+$Fat*9;
  
  $age = explode ('-', $birthday);
  $age = (int)date("Y")-(int)$age[0];

  $BMR = 0;
  if($gender == 2 ){
    $BMR = 9.6 * $weight + 1.8 * $height - 4.7 * $age + 655;
  }else{
    $BMR = 13.7 * $weight + 5.0 * $height - 6.8 * $age + 66;
  }

  $TDEE = $BMR;
  switch ($sport_stage) {
    case '1':
      $TDEE *= 1.2;
      break;
    case '2':
      $TDEE *= 1.375;
      break;
    case '3':
      $TDEE *= 1.55;
      break;
    case '4':
      $TDEE *= 1.725;
      break;
    case '5':
      $TDEE *= 1.9;
      break;
   
  }




  //創建取得欄位資料的語法
  function mysqli_result($Diet_Plan,$n){    
    $arr = mysqli_fetch_array($Diet_Plan);    
    return $arr[$n]; 
  }

  $month = $birthday[5].$birthday[6];
  $year = $birthday[0].$birthday[1].$birthday[2].$birthday[3];
  $day = $birthday[8].$birthday[9];

  $Month=array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "Norvember", "December");

  $Day=array("1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th", "11th", "12th", "13th", "14th", "15th", "16th", "17th", "18th", "19th", "20th", "21th", "22th", "23th", "24th", "25th", "26th", "27th", "28th", "29th", "30th", "31th");

  $Birthday_Month = $Month[((int)$month)-1];
  $Birthday_Day = $Day[((int)$day)-1];

  $Birthday = $Birthday_Day.' '.$Birthday_Month.', '.$year;

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Personal Page</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="echarts/dist/echarts.min.js"></script>


        <script type="text/javascript">
        window.onload = DP;
        function DP() {   
          var value = <?php echo $value ?>;            
            switch(value) {
                case 1:
                    document.getElementById("text").innerHTML="<!-- 碳水化合物15% 蛋白質25% 脂肪60% --><h4>生酮飲食</h4><p> 這個計劃需要降低碳水化合物的攝取，雖然較有挑戰性，但能夠透過強迫人體燃燒脂肪轉化成能量，達到並維持酮症狀態。 </p><p>為了達到更好的效果，我們建議您避免攝取糖、澱粉與穀類等高碳水化合物的食品，反之，建議您食用未含澱粉的蔬菜以及低糖莓果類，如茄子、花椰菜、草莓和覆盆子。但為了能夠維持一天的精神，建議您每日仍然攝取30至50克的碳水化合物，並以此維持酮症狀態。</p><p>想要生酮飲食，高品質蛋白將是您最好的夥伴，例如牛肉、肌肉、海鮮及蛋，動物的內臟以及全脂乳品也是不錯的選擇，不只含糖量低，同時富含高蛋白，能夠為您提供每天所需的能量，維持活力。每天的脂肪攝取也是關鍵，但切記不是所有的脂肪都有益。應該避免炸物以及加工食品，因為這些食品含有反式脂肪和化學添加劑。我們建議您可以攝取堅果及酪梨等健康油脂。</p><p>建議您每天攝取的營養素比例:</p>";
                    <?php 
                      $sugCarbohydrate = $TDEE * 0.15;
                      $sugProtein = $TDEE * 0.25;
                      $sugFat = $TDEE * 0.6;
                    ?>
                    break;
                case 2:
                    document.getElementById("text").innerHTML="<!-- 碳水化合物30% 蛋白質25% 脂肪45% --><h4>低碳飲食</h4><p>這個計畫的目標是希望您藉由降低碳水化合物的攝取來達到有效燃脂與減肥的效果，當然，我們建議您提高蛋白質及脂肪的攝取比例，以確保每天擁有足夠的體力和熱量。</p><p>大量的碳水化合物堆積，將會轉化為脂肪儲存在體內，降低減重效率設置可能變胖。這個計畫的核心在於藉由降低醣類攝取來降低胰島素的產生，同時觸發體內脂肪的燃燒，而為了優化這個過程，我們建議您每一餐的時間間隔至少為3至4個小時，或是採取16/8間歇性斷食的飲食方式。</p><p>剛開始進行這個將會造成您的精神狀態略為不佳，同時會時常引發的飢餓感，引此我們建議您隨身準備小食品，例如堅果、水果和土豆沙拉等低糖點心。過程中，水份的攝取將是一大重點，足夠的水份有助於您的新陳代謝，也會抵抗飢餓感，多喝水將幫助您更好的完成計劃。</p><p>建議您每天攝取的營養素比例:</p>";
                    <?php 
                      $sugCarbohydrate = $TDEE * 0.3;
                      $sugProtein = $TDEE * 0.25;
                      $sugFat = $TDEE * 0.45;
                    ?>
                    break;
                case 3:
                    document.getElementById("text").innerHTML="<!-- 碳水化合物50% 蛋白質25% 脂肪25% --><h4>甩油減重</h4><p>這個計劃要配合適當的運動，消耗的熱量必須比攝取的多。熱量攝取越少，減肥效果就越好，但並不是越少越好，重要的是每天達到正常攝取標準，以確保每日活動所需，健康減重。我們建議您每天攝取得熱量應該比標準值再低大約300至500卡。</p><p>飲食中應該含有三種營養素－蛋白質、碳水化合物與脂肪，想要達到甩油減重的目的，我們建議您適度提高蛋白質的攝取比例，並略微降低碳水化合物的攝取。而碳水化合物的攝取時間也很重要，建議您在運動前或後食用淡水化合物含量較高的食品，以補充能量儲備。而高蛋白搭配高質量的脂肪會是您的最佳選擇，例如綠花菜、堅果及酪梨。</p><p>建議您每天攝取的營養素比例:</p>";
                    <?php 
                      $sugCarbohydrate = $TDEE * 0.5;
                      $sugProtein = $TDEE * 0.25;
                      $sugFat = $TDEE * 0.25;
                    ?>
                    break;
                case 4:
                    document.getElementById("text").innerHTML="<!-- 碳水化合物50% 蛋白質20% 脂肪30% --><h4>增肌塑形</h4><p>想要快速增加肌肉，擁有鋼鐵般的軀體，我們建議您提高熱量的攝取，甚至您可以多吃幾餐來達到增加熱量的目標。</p><p>雖然是增加熱量，但我們也建議您不要因此而投向炸物、加工食品和快餐的懷抱，那些石材含有大量的反式脂肪、飽和脂肪和鹽糖，這將成為您在身體塑形上非常大的阻礙。</p><p>我們建議您在三餐中增加高品質蛋白的比例，如蛋豆魚肉類、堅果和乳製品。在肉類的選擇上，去掉脂肪的瘦肉將會是一個很好的選擇，而海鮮的蛋白質含量更是獨領風騷，如果您不介意排汗會有較重的體味，我們相當建議您將海鮮作為蛋白質的主要來源。</p><p>相對於蛋白質，碳水化合物的重要性也不可小覷，我們建議您多攝取如馬鈴薯、全麥麵包、糙米等含有高纖維的健康含碳食品，而最好的食用時間是在運動前後，這將有助於回復您身體消耗的能量。</p><p>除此之外，高品質的脂肪也不能少，我們仍然建議您攝取較為健康的酪梨、堅果和種子類食品，這能讓您在增肌塑形的過程中食客讓身體維持在良好的層面上。</p>";
                    <?php 
                      $sugCarbohydrate = $TDEE * 0.5;
                      $sugProtein = $TDEE * 0.2;
                      $sugFat = $TDEE * 0.3;
                    ?>
                    break;
                case 5:
                    document.getElementById("text").innerHTML="<!-- 碳水化合物60% 蛋白質15% 脂肪25% --><h4>加強體能</h4><p>想要加強體能，作為肌肉能量來源的碳水化合物將是這項計畫的核心，假如您剛高強度運動，準備些小點心，我們建議您以3:1的比例攝取碳水化合物與蛋白質，這不僅能夠讓您快速從疲勞中恢復過來，也能迅速補充您體內存儲肝醣的消耗。</p><p>無論攝取哪種營養素，我們都建議您重質不重量，高品質的營養素攝取能夠在最短的時間內提供您身體所需的養分，也能很好的維繫您身體的健康。在含碳食品攝取方面，我們建議您選擇馬鈴薯、全麥麵包、糙米等含有高纖維的健康含碳食品，燕麥也是個不錯的方案。</p><p>而蛋白質和熱量的部分，我們則建議您從瘦肉、魚、蛋等高蛋白食材中獲取蛋白質，從酪梨、堅果和種子類食品中攝取健康高質的脂肪。當然，為了飲食均衡考量，含有纖維素的蔬菜在三餐中必不可少。</p> <p>最後，別忘了水份這個最佳夥伴，每天攝取適量的水份，增進新陳代謝對於增加體能補充消耗非常有益，如果是在運動後，我們建議您可以適當的攝取一些電解質，這能夠更快的補充您在運動上的消耗，恢復疲勞。</p>";
                    <?php 
                      $sugCarbohydrate = $TDEE * 0.6;
                      $sugProtein = $TDEE * 0.15;
                      $sugFat = $TDEE * 0.25;
                    ?>
                    break;
                case 6: 
                    document.getElementById("text").innerHTML="<!-- 碳水化合物55% 蛋白質15% 脂肪30% --><h4>身心平衡</h4><p>維持身心平衡，均衡的飲食將會您的不二選擇，在食材的選擇上自然有機不經加工的食品將會令您的身體維持在健康的狀態，選擇也是豐富多樣，只要維持營養素的攝取，您可以任意搭配出專屬於您的餐點。</p><p>儘管如此，我們仍然建議您以健康高質量的營養素為主，適當的加些自己喜好的食品，既滿足身體健康，也吃出心情愉悅。在碳水化合物的部分，全麥食品和糙米等含有高纖維的含碳食品會是主食的好選擇；蛋白質則建議以瘦肉、蛋和乳製品中攝取，海鮮和豆類也是不錯的方案，適當的攝取蛋白質能夠很好的維持肌肉所需的能量；脂肪的選擇上，從酪梨、堅果和種子類食品中攝取健康高質的脂肪有助於維持身體健康。</p><p>最後，別忘了加點當季蔬菜，精彩您的餐桌，也豐富您身體的儲備能量。當然，水份仍舊是我們的最佳夥伴，足夠的水份有助於增進新陳代謝，維持體態，也排出身體中的毒素，健康自己、豐富生活。</p>";
                    <?php 
                      $sugCarbohydrate = $TDEE * 0.55;
                      $sugProtein = $TDEE * 0.15;
                      $sugFat = $TDEE * 0.3;
                    ?>
                    break;   
                }

                var gender = <?php echo $gender ?>;

                switch(gender) {
                  case 1:
                    document.getElementById("gen").innerHTML = "男性";
                    break;
                  case 2:
                    document.getElementById("gen").innerHTML = "女性";
                    break;
                }

                var sport_stage = <?php echo $sport_stage ?>;

                switch(sport_stage) {
                  case 1:
                    document.getElementById("sport_stage").innerHTML = "辦公室工作，沒什麼運動";
                    break;
                  case 2:
                    document.getElementById("sport_stage").innerHTML = "每周輕鬆的運動3~5天";
                    break;
                  case 3:
                    document.getElementById("sport_stage").innerHTML = "每周中等強度的運動3~5天";
                    break;
                  case 4:
                    document.getElementById("sport_stage").innerHTML = "每周高強度的運動3~5天";
                    break;
                  case 5:
                    document.getElementById("sport_stage").innerHTML = "勞力密集工作，或是每天訓練一到兩次以上";
                    break;
                }
        }

          
        </script>

    </head>
    <body>
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<a class="navbar-brand" href="index.html" style="color: white">CALORIE</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="index.php">首頁</a></li> 
								<li class="nav-item lnr lnr-exit"><a class="nav-link" href="logout.php">登出</a></li> 
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        
        <section class="home_banner_area">
           	<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
      					<div class="banner_content">
      						<div class="media">
      							<div class="d-flex" style="margin-left: 10%;">
      								<img src=<?php echo $pic; ?> alt="" width="600" height="600" data-toggle="modal" data-target="#myModal">
      							</div>
      							<div class="media-body" style="margin-left: 10%;">
      								<div class="personal_text">
      									<h6>嘿，你好！</h6>
      									<h3><?php echo $username ?></h3>
      									<h4>這裡是卡路里團隊</h4>
      									<p>在這裡，除了你的資訊外，你會看到我們給予你的一些飲食建議，我們真誠的希望這些資訊能夠給你帶來幫助，如果你在使用上有任何問題，歡迎你到我們的粉絲團留言，當然，別忘了按讚喔！</p>
      									<ul class="list basic_info">
      										<li><i class="lnr lnr-calendar-full"></i>     <?php echo $Birthday ?></li>
      										<li><i class="lnr lnr-heart"></i>  <SP id="gen"></SP></li>
      										<li><i class="lnr lnr-user"></i>      <?php echo $height ?> cm, <?php echo $weight ?> kg</li>
      										<li><i class="lnr lnr-heart-pulse"></i>  <SP id="sport_stage"></SP></li>
      									</ul>
      								</div>
      							</div>
      						</div>
      					</div>
      				</div>
            </div>
        </section>


        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
                  <div id="text">
                  </div>	
        				</div>
        			</div>
        			<div class="col-lg-6" id="main" style="width: 600px;height:600px;padding-left: 0px;padding-right: 0px; ">
        			</div>
        		</div>
        	</div>
        </section>


        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'));

            // 指定图表的配置项和数据
            option = {
            title: {
                text: '雷達圖'
            },
            tooltip: {}, 
            legend: {
                data: ['計畫標準', '目前狀態']
            }, 
            radar: {
                center: ['53%', '50%'],
                name: {
                    textStyle: {
                        color: '#fff',
                        backgroundColor: '#999',
                        borderRadius: 3,
                        padding: [3, 5]
                   }
                },
                indicator: [
                   { name: '熱量', max: 100},
                   { name: '碳水化合物', max: 100},
                   { name: '蛋白質', max: 100},
                   { name: '酯類', max: 100}
                ]
            },
            series: [{
                name: '計劃 vs 當前',
                type: 'radar',
                // areaStyle: {normal: {}},
                data : [
                    {
                        value : [<?php echo ($TDEE/$TDEE*100).",".($sugCarbohydrate/ $TDEE * 100).",".($sugProtein/ $TDEE * 100).",".($sugFat/ $TDEE * 100); ?>],
                        name : '計畫標準'
                    },
                     {
                        value : [<?php printf("%.2f, %.2f, %.2f, %.2f",($Calorie/$TDEE*100), ($Carbohydrate/$sugCarbohydrate*100), ($Protein/$sugProtein*100), ($Fat/$sugFat*100)); ?>],
                        name : '目前狀態'
                    }
                ]
            }]
        };
            
              //顯示圖表
              myChart.setOption(option);
        </script>
        
        
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
            </div>
            <div class="modal-body">
              更改圖片
            </div>
            <form action="upload_pic.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              
                  選擇圖片:
                  <input type="file" name="fileToUpload" id="fileToUpload">
                  
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">關閉
              </button>
              <input type="submit" value="上傳圖片" name="submit" class="btn btn-primary">
                
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal -->
      </div>

    </body>
</html>