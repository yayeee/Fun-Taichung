<? include('connecttodb.php'); ?>
<?  session_start(); 
    $_SESSION['page'] = "";
    unset($_SESSION['page']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>玩轉台中</title>
    <link rel="icon" href="./materials/logo/logo-bluebkg-removebg-preview.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./home.css" type="text/css">
    <script type="javascript" src="./home.js"></script>

     <!-- jsDelivr -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>
    
    <div class="wrapper"><input id="menuExtend" type="checkbox" />
        <header>
            <div class="row">
                <div class="col" id="menubar">
                    <!-- <a id="logo" href=".">玩轉台中</a> -->
                    <a id="logo" href=".">
                        <img style="width: 120px;"
                            src="./materials/logo/logoWithName-BlueBkg.png" alt="">
                    </a>
                    <label id="hamburger" for="menuExtend"><span>Menu</span></label>
                </div>
                <div class="col" id="navbar">
                    <nav>
                        <a href="parkinglotmap.php">
                        <!-- <a href="in_or_out.php?page=parkinglotmap"> -->
                            <img style="width:24px" src="./materials/icons/icons8-parking-30.png" alt=""><br>
                            找車位
                        </a>
                        <!-- class="on" -->
                        <a href="chargingmap.php">
                        <!-- <a href="in_or_out.php?page=chargingmap"> -->
                            <img style="width:24px" src="./materials/icons/icons8-electric-plug-66.png" alt=""><br>
                            找充電</a>
                        
                        <a href="in_or_out.php?page=member">
                            <img style="width:24px" src="./materials/icons/icons-user-48-white.png" alt=""><br>
                            會員中心
                        </a>
                        <a href="in_or_out.php?page=collect">
                            <img style="width:24px" src="./materials/icons/icons8-love-circled-50.png" alt=""><br>
                            我的收藏
                        </a>
                        <a href="contact.php">
                            <img style="width:24px" src="./materials/icons/icons8-envelope-30.png" alt=""><br>
                            聯絡我們
                        </a>
                        <?php if (isset($_SESSION['logined']) && $_SESSION['logined'] !== ""): ?>
                            <a href="logout.php">
                                <img style="width:24px" src="./materials/icons/icons8-logout-24.png" alt=""><br>
                                登出
                            </a>
                        <?php endif; ?>
                    </nav>
                    <div id="links">
                        <a id="info" href="home.php" 
                            style="width: 2.5rem; height: 2.5rem;"> 
                            <img style="width:28px"
                                src="./materials/icons/icons-home-48.png" alt="home" />
                        </a>
                    </div>
                    <!-- <div id="links">
                        <a id="info" href="javascript:;" target="_blank"
                            style="width: 2.5rem; height: 2.5rem;"> 
                            <img style="width:28px"
                                src="./materials/icons/icons8-question-mark-48.png" alt="more" />
                        </a>
                    </div> -->
                </div>
            </div>
        </header>


        <div id="overlay">
            <div id="card">
                <p id="attName">勤美草悟廣場</p>
                <img style="width:200px" 
                    src="./materials/attractions/att_ChinMeiPark.jpg">
                <p id="attOpenTime">
                    營業時間：24hr
                </p>
                <p id="attIntro">
                    【簡介】<br/>
                    
                    集結「公園」、「店鋪」、「藝文生活」三大主軸，
                    以「大人系的公園」為想像，在這占地2,000坪，
                    涵蓋1F、B1兩層樓的基地，從建築、景觀設計、視覺設計、店鋪設計、野植生活、
                    藝術裝置各種面向重塑一座結合商業與公共空間的新型態複合設施。
                </p>
                <button href="" class="bounce" id="btnGoAtt" style="color: beige;"
                    onclick="setMapView(24.15143190611227,120.66420189575864)">
                    go
                </button>
                <!-- <button href="" class="bounce" id="btnGoAtt">
                    <a href="parkinglotmap.php"
                        style="color: beige; text-decoration: none;">
                    go
                    </a>
                </button> -->
            </div>
        </div>


        <div class="row">
            <div id="weatherSection" class="col-12">
               
                <div class="">
                    <div id="weatherDetails">
                        <!-- <p>台中</p>
                        <p>19°C</p> -->
                        <div style="padding-left: 78px; font-size: 44px; color: aliceblue;
                             text-shadow: 0.5px 0.5px 5px rgba(43, 49, 63, 0.8);">
                            20°C
                        </div>
                        <div style="padding-left: 255px; padding-top: 73px;  font-size: 18px; font-weight: bold;
                            color: aliceblue; text-shadow: 0.5px 0.5px 3px rgba(43, 49, 63, 0.8);">
                            晴時多雲
                        </div>
                        <div style="margin-left:35px; margin-top:-86px; font-size: 13px;  
                            text-align: center; letter-spacing: 0.08em; height:90px; color:rgb(255,255,255);
                            background: radial-gradient( rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.5) 25%, rgba(255,255,255,0.1) 100%);
                            width: 170px; box-shadow: 0.5px 1px 8px rgba(255,255,255,0.8);
                            text-shadow: 0.5px 0.5px 3px rgba(43, 49, 63, 0.8);
                            justify-content:center;">
                            <table style="border-collapse: collapse;">
                                <tr>
                                    <td style="border-right: 1px solid white;
                                               border-bottom: 1px solid white;
                                               padding: 8px 1px 8px 0px; width: 85px;">
                                        今日最高溫<br>24°C
                                    </td>
                                    <td style="border-left: 1px solid white;
                                               border-bottom: 1px solid white;
                                               padding: 8px 1px 8px 1px;width: 85px;">
                                        今日最低溫<br>16°C
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" 
                                    style="padding: 8px 7px 8px 7px; width: 170px;
                                           height:30px;">
                                        <img style="width: 18px;" 
                                        src="./materials/icons/icons8-water-48.png" alt="">
                                        &nbsp;降雨機率&nbsp;2%
                                    </td>
                                    <!-- <td>紫外線指數<br>10</td> -->
                                </tr>
                            </table>


                            <!-- background-color: rgb(236, 246, 255, 0.3); -->
                            <!-- <p style="padding-top: 10px;">今日最高溫 &nbsp;今日最低溫</p> -->
                            <!-- <p style="margin-top:-12px;">24°C &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15°C</p> -->
                            <!-- <p style="margin-top:-12px;">今日最低溫 &nbsp;15°C</p>  -->
                            <!-- <p style="margin-top:-8px;">&nbsp;&nbsp;降雨機率 &nbsp; 紫外線指數</p>  -->
                            <!-- <p style="margin-top:-12px; padding-bottom: 10px;">2% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</p> -->
                            <!-- <p style="margin-top:-12px;">紫外線指數 &nbsp;10</p>  -->
                        </div>
                    </div>
                    <img id="weatherIcon" class="" style="width: 110px;"
                        src="./materials/icons/3d_weather_icons/cloud/33.png" alt="sun">
                        
                </div>
                <img id="weatherBkg"  
                    src="./materials/weather/nightsky.jpg" alt="bluesky">
   
            </div>


            <div id="attSection" class="col-12">
                <div id="attSectionBkg" class="col">
                    <img src="./materials/specialBkg/whiteMarbleBkg.jpg" alt="whiteMarbleBkg">
                </div>


                <!-- carousel -->
                <div id="attSectionCrl" class="carousel slide" data-ride="carousel">
                                  

                    <!-- The slideshow -->
                    <div id="home_carousel" class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="ctl1" src="./materials/attractions/att_nightview3.jpg" alt="att_castle2" width="390px">
                            <div class="carousel-caption">
                                <p style="padding: 20px 20px 5px 10px;"
                                    id="ctlname1">
                                    大坑 / 新社古堡
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img id="ctl2" src="./materials/attractions/att_GaomeiWetland.jpg" alt="att_ChinMeiPark" width="390px">
                            <div class="carousel-caption">
                                <p style="padding: 20px 20px 5px 10px;"
                                    id="ctlname2">
                                    西區 / 草悟廣場
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img id="ctl3" src="./materials/attractions/att_sing.jpg" alt="att_museum3" width="390px">
                            <div class="carousel-caption">
                                <p style="padding: 20px 20px 5px 10px;"
                                    id="ctlname3">
                                    西區 / 國立科博館
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img id="ctl4" src="./materials/attractions/att_outlet.jpeg" alt="att_outlet" width="390px">
                            <div class="carousel-caption">
                                <p style="padding: 20px 20px 5px 10px;"
                                    id="ctlname4">
                                    梧棲 / 三井outlet
                                </p>
                            </div>
                        </div> 
                    </div>
                    
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#attSectionCrl" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#attSectionCrl" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <!-- carousel end-->


            </div>


            <div id="goSection" class="col-12">
                <div id="goWord" class="">
                    <img class="bounce" style="padding-left: 100px;" 
                        src="./materials/icons/icon-car-48-2.png" alt=""><br>
                    <p style="margin-top: 6px;">
                        現在啟程
                    </p>
                </div>
                <a href="login_t.html">
                    <img id="goBkg"  
                        src="./materials/goTravel/go-roadtrip-night2.jpg" alt="go-roadtrip5">
                </a>
            </div>

        </div>
    </div>



    <script>
        
        $("#btnGoAtt").on("click", function() {
                    window.location.href = "parkinglotmap2.php";
                });


        function setMapView(slat, slon, szoom) {
            map.flyTo(new L.latLng(slat, slon), szoom);
        }
        const carouselItems = document.querySelectorAll('.carousel-item');

        carouselItems.forEach(item => {
            const img = item.querySelector('img');
            img.addEventListener('click', function() {
                // alert('Image clicked!');
                overlay.style.display = 'flex';
            });
        });

        overlay.addEventListener('click', (event) => {
            if (event.target !== card) {
                overlay.style.display = 'none';
            }
        });


        // get the current hour
        var currentHour = new Date().getHours();

        // get the image element
        var weatherBkg = document.getElementById("weatherBkg");


        // 根據現在時間改變天氣、出發BKG
        if (currentHour >= 5 && currentHour < 17) {

            weatherIcon.src= "./materials/icons/3d_weather_icons/sun/27.png";
            weatherBkg.src = "./materials/weather/bluesky.jpg";
            goBkg.src = "./materials/goTravel/go-roadtrip5.jpg";
            ctl1.src = "./materials/attractions/att_castle2.jpeg";
            ctl2.src = "./materials/attractions/att_ChinMeiPark.jpg";
            ctl3.src = "./materials/attractions/att_museum3.jpg";
            ctl4.src = "./materials/attractions/att_outlet.jpeg";
            ctlname1.innerHTML="大坑 / 新社古堡"
            ctlname2.innerHTML="西區 / 草悟廣場"
            ctlname3.innerHTML="西區 / 國立科博館"
            ctlname4.innerHTML=" 梧棲 / 三井outlet"

        } else if (currentHour >= 17 && currentHour <= 18) {

            weatherIcon.src= "./materials/icons/3d_weather_icons/sun/26.png";
            // weatherBkg.src = "./materials/weather/evening-sunny2.webp";
            weatherBkg.src = "./materials/weather/bluesky.jpg";
            goBkg.src = "./materials/goTravel/go-roadtrip5.jpg";
            ctl1.src = "./materials/attractions/att_nightview3.jpg";
            // ctl2.src = "./materials/attractions/att_GaomeiWetland.jpg";
            ctl2.src = "./materials/attractions/att_ChinMeiPark.jpg";
            ctl3.src = "./materials/attractions/att_sing.jpg";
            ctl4.src = "./materials/attractions/att_maplegarden.jfif";
            ctlname1.innerHTML="清水 / 鰲峰山觀景台"
            // ctlname2.innerHTML="清水 / 高美濕地"
            ctlname2.innerHTML="西區 / 草悟廣場"
            ctlname3.innerHTML="西屯 / 臺中歌劇院"
            ctlname4.innerHTML="西屯 / 秋紅谷"

        } else {

            
            weatherBkg.src = "./materials/weather/nightsky-starry2.jpg";
            goBkg.src = "./materials/goTravel/go-roadtrip-night2.jpg";
            ctl1.src = "./materials/attractions/att_nightview3.jpg";
            ctl2.src = "./materials/attractions/att_GaomeiWetland.jpg";
            ctl3.src = "./materials/attractions/att_sing.jpg";
            ctl4.src = "./materials/attractions/att_maplegarden.jfif";
            ctlname1.innerHTML="清水 / 鰲峰山觀景台"
            ctlname2.innerHTML="清水 / 高美濕地"
            ctlname3.innerHTML="西屯 / 臺中歌劇院"
            ctlname4.innerHTML="西屯 / 秋紅谷"

        }

    </script>
    <style>
        @keyframes bounce{from{transform:translateY(0px)}
            to{transform:translateY(-10px)}}
        @-webkit-keyframes bounce{from{transform:translateY(0px)}
            to{transform:translateY(-10px)}}
        .bounce {
            animation: bounce 0.5s infinite alternate;
            -webkit-animation: bounce 0.5s infinite alternate;
        }

        @keyframes movearound {
            0%  { transform: translate( -1px, 0 ); }
            20% { transform: translate( 6px, 1px ); }
            40% { transform: translate( 0px, 6px ); }
            60% { transform: translate( 6px, 6px ); }
            80% { transform: translate( 0px, 3px ); }
            100% { transform: translate( -1px, 0 ); }
        }
        @keyframes movearound2 {
            0%  { transform: translate( 0, 0 ); }
            20% { transform: translate( 1px, -1px ); }
            40% { transform: translate( 0px, -4px ); }
            60% { transform: translate( 1px, -3px ); }
            80% { transform: translate( 0px, -2px ); }
            100% { transform: translate( 0px, 0 ); }
        }

  
    </style>

</body>
</html>



<? mysqli_close($link);  // 關閉資料庫連接 ?>