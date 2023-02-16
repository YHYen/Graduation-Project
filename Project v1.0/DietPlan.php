<?php 
    session_start();
    if(isset($_SESSION['is_login']) || $_SESSION['is_login'] == TRUE) :

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Page</title>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="css/register.css" rel="stylesheet" media="all">

    <script type="text/javascript">

        function myChange(value) {
            switch(value) {
                case '0':
                    document.getElementById("text").innerHTML="<!-- 介紹我們為甚麼需要他選擇這些方案 --><p>嘿，朋友!當你看到這個畫面，表示你快完成註冊流程了，上面這些計劃是我們歸類出的一些常用的飲食計劃，這些計劃將考量你的身體狀況，絕對不會讓你感到為難，畢竟健康飲食是我們的宗旨~(^v^)</p><br><p>你可以根據你的身體狀況和目標選擇你的飲食計劃，我們將會給予你一些飲食上的建議和幫助，如果您需要一個為您量身打造的客製化飲食計劃，請再給我們一段時間，開發團隊不會令你失望的! b</p><br><p>最後，歡迎你的加入，我的朋友!</p>";
                    break;
                case '1':
                    document.getElementById("text").innerHTML="<!-- 碳水化合物15% 蛋白質25% 脂肪60% --> <p> 這個計劃需要降低碳水化合物的攝取，雖然較有挑戰性，但能夠透過強迫人體燃燒脂肪轉化成能量，達到並維持酮症狀態。 </p><br><p>為了達到更好的效果，我們建議您避免攝取糖、澱粉與穀類等高碳水化合物的食品，反之，建議您食用未含澱粉的蔬菜以及低糖莓果類，如茄子、花椰菜、草莓和覆盆子。但為了能夠維持一天的精神，建議您每日仍然攝取30至50克的碳水化合物，並以此維持酮症狀態。</p><br><p>想要生酮飲食，高品質蛋白將是您最好的夥伴，例如牛肉、肌肉、海鮮及蛋，動物的內臟以及全脂乳品也是不錯的選擇，不只含糖量低，同時富含高蛋白，能夠為您提供每天所需的能量，維持活力。每天的脂肪攝取也是關鍵，但切記不是所有的脂肪都有益。應該避免炸物以及加工食品，因為這些食品含有反式脂肪和化學添加劑。我們建議您可以攝取堅果及酪梨等健康油脂。</p><br><p>建議您每天攝取的營養素比例:</p>";
                    break;
                case '2':
                    document.getElementById("text").innerHTML="<!-- 碳水化合物30% 蛋白質25% 脂肪45% --><p>這個計畫的目標是希望您藉由降低碳水化合物的攝取來達到有效燃脂與減肥的效果，當然，我們建議您提高蛋白質及脂肪的攝取比例，以確保每天擁有足夠的體力和熱量。</p><br><p>大量的碳水化合物堆積，將會轉化為脂肪儲存在體內，降低減重效率設置可能變胖。這個計畫的核心在於藉由降低醣類攝取來降低胰島素的產生，同時觸發體內脂肪的燃燒，而為了優化這個過程，我們建議您每一餐的時間間隔至少為3至4個小時，或是採取16/8間歇性斷食的飲食方式。</p><br><p>剛開始進行這個將會造成您的精神狀態略為不佳，同時會時常引發的飢餓感，引此我們建議您隨身準備小食品，例如堅果、水果和土豆沙拉等低糖點心。過程中，水份的攝取將是一大重點，足夠的水份有助於您的新陳代謝，也會抵抗飢餓感，多喝水將幫助您更好的完成計劃。</p><br><p>建議您每天攝取的營養素比例:</p>";
                    break;
                case '3':
                    document.getElementById("text").innerHTML="<!-- 碳水化合物50% 蛋白質25% 脂肪25% --><p>這個計劃要配合適當的運動，消耗的熱量必須比攝取的多。熱量攝取越少，減肥效果就越好，但並不是越少越好，重要的是每天達到正常攝取標準，以確保每日活動所需，健康減重。我們建議您每天攝取得熱量應該比標準值再低大約300至500卡。</p><br><p>飲食中應該含有三種營養素－蛋白質、碳水化合物與脂肪，想要達到甩油減重的目的，我們建議您適度提高蛋白質的攝取比例，並略微降低碳水化合物的攝取。而碳水化合物的攝取時間也很重要，建議您在運動前或後食用淡水化合物含量較高的食品，以補充能量儲備。而高蛋白搭配高質量的脂肪會是您的最佳選擇，例如綠花菜、堅果及酪梨。</p><br><p>建議您每天攝取的營養素比例:</p>";
                    break;
                case '4':
                    document.getElementById("text").innerHTML="<!-- 碳水化合物50% 蛋白質20% 脂肪30% --><p>想要快速增加肌肉，擁有鋼鐵般的軀體，我們建議您提高熱量的攝取，甚至您可以多吃幾餐來達到增加熱量的目標。</p><br><p>雖然是增加熱量，但我們也建議您不要因此而投向炸物、加工食品和快餐的懷抱，那些石材含有大量的反式脂肪、飽和脂肪和鹽糖，這將成為您在身體塑形上非常大的阻礙。</p><br><p>我們建議您在三餐中增加高品質蛋白的比例，如蛋豆魚肉類、堅果和乳製品。在肉類的選擇上，去掉脂肪的瘦肉將會是一個很好的選擇，而海鮮的蛋白質含量更是獨領風騷，如果您不介意排汗會有較重的體味，我們相當建議您將海鮮作為蛋白質的主要來源。</p><br><p>相對於蛋白質，碳水化合物的重要性也不可小覷，我們建議您多攝取如馬鈴薯、全麥麵包、糙米等含有高纖維的健康含碳食品，而最好的食用時間是在運動前後，這將有助於回復您身體消耗的能量。</p><br><p>除此之外，高品質的脂肪也不能少，我們仍然建議您攝取較為健康的酪梨、堅果和種子類食品，這能讓您在增肌塑形的過程中食客讓身體維持在良好的層面上。</p>";
                    break;
                case '5':
                    document.getElementById("text").innerHTML="<!-- 碳水化合物60% 蛋白質15% 脂肪25% --><p>想要加強體能，作為肌肉能量來源的碳水化合物將是這項計畫的核心，假如您剛高強度運動，準備些小點心，我們建議您以3:1的比例攝取碳水化合物與蛋白質，這不僅能夠讓您快速從疲勞中恢復過來，也能迅速補充您體內存儲肝醣的消耗。</p><br><p>無論攝取哪種營養素，我們都建議您重質不重量，高品質的營養素攝取能夠在最短的時間內提供您身體所需的養分，也能很好的維繫您身體的健康。在含碳食品攝取方面，我們建議您選擇馬鈴薯、全麥麵包、糙米等含有高纖維的健康含碳食品，燕麥也是個不錯的方案。</p><br><p>而蛋白質和熱量的部分，我們則建議您從瘦肉、魚、蛋等高蛋白食材中獲取蛋白質，從酪梨、堅果和種子類食品中攝取健康高質的脂肪。當然，為了飲食均衡考量，含有纖維素的蔬菜在三餐中必不可少。</p> <br><p>最後，別忘了水份這個最佳夥伴，每天攝取適量的水份，增進新陳代謝對於增加體能補充消耗非常有益，如果是在運動後，我們建議您可以適當的攝取一些電解質，這能夠更快的補充您在運動上的消耗，恢復疲勞。</p>";
                    break;
                case '6': 
                    document.getElementById("text").innerHTML="<!-- 碳水化合物55% 蛋白質15% 脂肪30% --><p>維持身心平衡，均衡的飲食將會您的不二選擇，在食材的選擇上自然有機不經加工的食品將會令您的身體維持在健康的狀態，選擇也是豐富多樣，只要維持營養素的攝取，您可以任意搭配出專屬於您的餐點。</p><br><p>儘管如此，我們仍然建議您以健康高質量的營養素為主，適當的加些自己喜好的食品，既滿足身體健康，也吃出心情愉悅。在碳水化合物的部分，全麥食品和糙米等含有高纖維的含碳食品會是主食的好選擇；蛋白質則建議以瘦肉、蛋和乳製品中攝取，海鮮和豆類也是不錯的方案，適當的攝取蛋白質能夠很好的維持肌肉所需的能量；脂肪的選擇上，從酪梨、堅果和種子類食品中攝取健康高質的脂肪有助於維持身體健康。</p><br><p>最後，別忘了加點當季蔬菜，精彩您的餐桌，也豐富您身體的儲備能量。當然，水份仍舊是我們的最佳夥伴，足夠的水份有助於增進新陳代謝，維持體態，也排出身體中的毒素，健康自己、豐富生活。</p>";
                    break;   
            }
        }
    </script>
</head>

<body background="Main.jpg">
        <div class="page-wrapper font-robo" style="padding-top: 1%">
            <div class="wrapper wrapper--w960">
                <div class="card card-2">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h2 class="title">快要完成了...</h2>
                        <form method="POST" action="DP_onload.php">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="diet_plan" onchange="myChange(this.value);">
                                        <option value="0" selected="selected" disabled="disabled">您的飲食計畫</option>
                                        <option value="1">生酮飲食</option>
                                        <option value="2">低碳飲食</option>
                                        <option value="3">甩油減重</option>
                                        <option value="4">增肌塑形</option>
                                        <option value="5">加強體能</option>
                                        <option value="6">身心平衡</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                            <div id="text">
                                <!-- 介紹我們為甚麼需要他選擇這些方案 -->
                                <p>
                                    嘿，朋友!
                                </p>
                                <br>
                                <p>
                                    當你看到這個畫面，表示你快完成註冊流程了，上面這些選項是我們歸類出的一些常用飲食計劃，這些計劃將考量你的身體狀況，絕對不會讓你感到為難，畢竟健康飲食是我們的宗旨~(^v^)
                                </p>
                                <br>
                                <p>
                                    你可以根據你的身體狀況和目標選擇你的飲食計劃，我們將會給予你一些飲食上的建議和幫助，如果您需要一個為您量身打造的客製化飲食計劃，請再給我們一段時間，開發團隊不會令你失望的! b
                                </p>
                                <br>
                                <p>
                                    最後，歡迎你的加入，我的朋友!
                                </p>
                            </div>

                            <div class="p-t-30">
                                <button class="btn btn--radius btn--green" type="submit">確定</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>

</body>

</html>
<?php 
    else:
        header('Location: register.html');

    endif;
?>