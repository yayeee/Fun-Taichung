<!-- member.php -->
<? 
    session_start();
    include('connecttodb.php');

    $account = $_SESSION['account']; 
    $sql = "SELECT * FROM users WHERE account='$account'";
    // echo $sql.'<br>';
    $result = $link->query($sql);
    if ($result->num_rows > 0) {

        $row1 = $result->fetch_assoc();
        $name = $row1['name'];
        $birthday = $row1['birthday'];
        $mobile = $row1['mobile'];
        $account = $row1['account'];
        $email = $row1['account'];
        // echo $name;
        
        $sql = "SELECT * FROM records WHERE account='$account'";
        $records = $link->query($sql);        
        $_SESSION['records'] = serialize($records);

        // 會員分級制度
        // 因為資料要手動建立所以資料筆數都先設小一點
        if ( $records ->num_rows < 10 ) {
            if ( $records ->num_rows < 5 ) {
                // echo 'Normal VIP';
                $level = "0";
                $_SESSION['level'] = $level;
            } else {
                // echo 'Sliver VIP';
                $level = "1";
                $_SESSION['level'] = $level;
            }
        } else {
            // echo 'Gold VIP';
            $level = "2";
            $_SESSION['level'] = $level;
        }
    

?>

<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>玩轉台中</title>
            <link rel="icon" href="./materials/logo/logo-bluebkg-removebg-preview.ico" type="image/x-icon" />
            <link rel="stylesheet" href="./member2.css" type="text/css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- jsDelivr -->
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">            
            <!-- Popper JS -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <!-- Latest compiled JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        </head>

        <body id="body">

            <div class="wrapper"><input id="menuExtend" type="checkbox" />
                <header>
                    <div class="row">
                        <div class="col" id="menubar">
                            <a id="logo" href="home.php">
                                <img style="width: 115px;" src="./materials/logo/logo-MemberPage-BlueBkg.PNG" alt="">
                            </a>
                            <label id="hamburger" for="menuExtend"><span>Menu</span></label>
                        </div>
                        <div class="col" id="navbar">
                            <nav>
                                <a href="parkinglotmap.php">
                                    <img style="width:24px" src="./materials/icons/icons8-parking-30.png" alt=""><br>
                                    找車位
                                </a>
                                <!-- class="on" -->
                                <a href="chargingmap.php">
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
                                <a href="logout.php">
                                    <img style="width:24px" src="./materials/icons/icons8-logout-24.png" alt=""><br>
                                    登出
                                </a>
                            </nav>
                            <div id="links">
                                <a id="info" href="home.php" 
                                    style="width: 2.5rem; height: 2.5rem;"> 
                                    <img style="width:28px"
                                        src="./materials/icons/icons-home-48.png" alt="home" />
                                </a>
                            </div>
                        </div>
                    </div>
                </header>

                <div id="memberInfo" class="row">
                    <div id="vipHello" class="col-12">
                        <p>
                        <?php echo $_SESSION['name']; ?>, <span style="font-size: 16px;">您好</span>
                        </p>
                        <img style="width: 22px; padding-top: 5px;" src="./materials/icons/oie_rounded_corners.gif" alt="wink gif">
                        <button style="background-color: rgba(43, 49, 63, 0.4); border-radius: 10px; font-size: 12px;
                            margin-left:92px;" 
                            id="btn4">
                            修改個人資料
                        </button>
                    </div>
                    <div id="vipCard" class="col-12" style="display: flex; overflow: hidden; color:rgb(43,49,63);
                        background-image: url(./materials/specialBkg/whiteMarbleBkg.jpg)">
                        <div class="col-5" style="background-color: rgb(150, 238, 238, 0); height: 100%;">
                        <!-- 大頭貼 -->
                            <!-- <img style="border-radius: 50%; margin-top: 30px; width: 100px;" src="./materials/members/selfie-IU.png" alt="大頭貼"> -->
                            
                            
                            <img style="border-radius: 50%; margin-top: 30px; width: 100px; 
                                position: absolute; z-index: 1;"
                                src="./materials/members/default-62kb.jpg" alt="defaultImg"> 
                            <!-- user實際上傳的照片 -->
                            <img style="border-radius: 50%; margin-top: 30px; width: 100px; 
                                position: absolute; z-index: 2;"
                                src="data:image/png;base64,<?php echo $_SESSION['image']; ?>" alt=""> 


                            <!-- 會員等級 : 依停車紀錄筆數判斷 -->
                            <?php if ($level == "1"): ?>
                                <p style="margin-top: 155px; margin-left: -50px; font-size: 14px;
                                    letter-spacing: 0.08em;  text-align:right;
                                    background-color: rgba(43,49,63,0.9);
                                    background-image: none; 
                                    color:white; text-shadow: -0.5px 0 1px rgb(80,80,80);" id="vipLevel">
                                    Normal VIP&nbsp;&nbsp;
                                </p>
                            <?php endif; ?>
                            <?php if ($level == "0"): ?>
                                <p style="margin-top: 155px; margin-left: -50px; font-size: 14px;
                                    letter-spacing: 0.1em; font-weight: bold; text-align:right;
                                    background-color: rgba(100,100,100,0.9);
                                    color:rgb(205,205,205); text-shadow: -0.5px 0 1px rgb(155,155,155);" id="vipLevel">
                                    <!-- background-image: url('./materials/specialBkg/silver.jpg'); -->
                                    Sliver VIP&nbsp;&nbsp;
                                </p>
                            <?php endif; ?>
                            <?php if ($level == "2"): ?>
                                <p style="margin-top: 155px; margin-left: -50px; font-size: 14px;
                                    letter-spacing: 0.1em; font-weight: bold; text-align:right;
                                    background-image: url('./materials/specialBkg/goldBkg.jpg');
                                    color:rgb(215,180,2); text-shadow: -0.5px 0 1px rgb(95,95,15);" id="vipLevel">
                                    Golden VIP&nbsp;&nbsp;
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-7" style="background-color: rgba(152, 94, 207, 0); height: 100%;">
                            <div class="col" style="background-color: rgba(178, 223, 120, 0); height: 100px;
                                              font-size: 14px; letter-spacing: 0.1em; margin-left: -20px;">
                                <p style="margin-left: 0px; padding-top: 26px;">
                                    <img style="width: 14px;" src="./materials/icons/icons8-user-24.png" alt="">
                                    <?php echo $_SESSION['name']; ?>
                                </p>
                                <p style="margin-top: -10px;">
                                    <img style="width: 14px;" src="./materials/icons/icons8-birthday-24.png" alt="">
                                    <?echo $_SESSION['birthday']; ?>
                                </p>
                                <p style="margin-top: -10px;">
                                    <img style="width: 14px;" src="./materials/icons/icons8-iphone-se-24.png" alt="">
                                    <?echo $_SESSION['mobile'];?>
                                </p>
                                <p style="margin-top: -10px; font-size: 13px; width:176px; background-color: rgb(215, 234, 250,0);">
                                    <img style="width: 14px;" src="./materials/icons/icons8-envelope-24.png" alt="">
                                    <?echo $account;?>
                                </p>
                                <p style="margin-top: 40px; font-size: 10px; width:176px; 
                                    letter-spacing: 0.03em; font-weight:bold;">
                                    © FUN TAICHUNG 2023
                                </p>


                            </div>
                            <div class="col" id="vipCardLogo" style="background-color: rgba(189, 83, 83, 0);
                                              margin-top: -80px;">
                                <img style="width: 180px; filter: grayscale(20%) contrast(100%); opacity: 0.2;
                                                  margin-left: 40px; margin-top: 45px;" src="./materials/logo/logo-noBkg.png" alt="">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row" style="background-color: rgba(236, 233, 240, 1);
                                  height: 55%; min-width: 100%;">
                    <div id="pRecordsTit" class="col">
                        <div id="parkRecTitle">
                            停車記錄查詢
                        </div>
                    </div>
                    <div id="pRecordsCon" class="col">


                        <div id="searchRecBy">
                            <!-- <label for="start-date">日期</label> -->
                            <input type="date" 
                                id="start-date" name="start-date" 
                                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" 
                                min="2020-02-08" max="2023-02-09" 
                                required 
                                />-
                            <input type="date" 
                                id="end-date" name="end-date" 
                                pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" 
                                min="2022-01-20" max="2023-01-19" 
                                required 
                                />
                            <button id="btnSearchRecByDate">
                                <img style="width:18px;" 
                                    src="./materials/icons/icons8-search-more-50.png" alt="search">
                            </button>
                            <!-- <button id="btnSearchRec1yr">近一年</button> -->
                            <button id="btnSearchRecAll">全部</button>
                            <button id="btnEditRec">編輯</button>

                        </div>

                        <table id="table1">
                            <thead>
                                <tr>
                                    <th>停車日期</th>
                                    <th>停車場名稱</th>
                                    <th>車輛</th>
                                    <th>評價</th>
                                    <th>備註</th>
                                </tr>
                            </thead>

                            <tbody id="tbody1">
                                <!-- while ($row2 = $_SESSION['records']->fetch_assoc()) -->
                                <?php while ($row2 = $records->fetch_assoc()) { ?>

                                    <tr>
                                        <td><?php echo $row2['park_date']; ?></td>
                                        <td><?php echo $row2['park_name']; ?></td>
                                        <td><?php echo $row2['car']; ?></td>
                                        <td><?php echo $row2['reviews']; ?></td>
                                        <td><?php echo $row2['remark']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>




            <div id="overlay" class="overlay">
                <div id="card">
                    <p id="cardTitle">編輯停車記錄</p>
                    <table style="margin-left: 16px;">
                        <thead>
                            <tr>
                                <th style="width:115px ">停車日期</th>
                                <th style="width:150px; background-color: rgb(255, 255, 255);">停車場名稱</th>
                                <th style="width:70px">車輛</th>
                                <th style="width:45px; background-color: rgb(255, 255, 255);">刪除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>這邊會</td>
                                <td>這邊會被擋住</td>
                                <td>這邊會</td>
                                <td>擋住</td>
                            </tr>
                            
                            <?
                                $sql = "SELECT * FROM records WHERE account='$account'";
                                $records = $link->query($sql);
                            ?>
                            <?php while ($row2 = $records->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row2['park_date']; ?></td>
                                    <td><?php echo $row2['park_name']; ?></td>
                                    <td><?php echo $row2['license_plate_number']; ?></td>
                                    <td><input type="checkbox"></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button id="btnConfirmDel">確定刪除</button>
                </div>
            </div>

            <script>
                document.getElementById("btnSearchRecAll").addEventListener("click", function() {
                    console.log('search all clicked !');
                    var beginDate = "1911-01-01";
                    console.log( beginDate );
                    $.ajax({
                            type: "POST",
                            url: "get_all_records.php",
                            data: { begin_Date: beginDate },
                            success: function(data) {
                                console.log(data);
                                // Do something with the returned data
                                var element = document.getElementById("tbody1");
                                element.innerHTML = data;
                            }
                    });

                });

                document.getElementById("btnSearchRec1yr").addEventListener("click", function() {
                    console.log('search 1yr clicked !');
                    var theDate = "2020/02/08";
                    console.log( theDate );
                    $.ajax({
                            type: "POST",
                            url: "get_1yr_records.php",
                            data: { the_Date: theDate },
                            success: function(data) {
                                console.log(data);
                                // Do something with the returned data
                                var element = document.getElementById("tbody1");
                                element.innerHTML = data;
                            }
                    });

                });

                document.getElementById("btnSearchRecByDate").addEventListener("click", function() {
                    console.log('clicked');
                    var startDate = document.getElementById("start-date").value;
                    var endDate = document.getElementById("end-date").value;
                    console.log(startDate, endDate);
                    if (startDate && endDate) {
                        if (startDate <= endDate) {

                            $.ajax({
                            type: "POST",
                            url: "search_records.php",
                            data: { start_date: startDate, end_date: endDate },
                            success: function(data) {
                                console.log(data);
                                // Do something with the returned data
                                var element = document.getElementById("tbody1");
                                element.innerHTML = data;
                            }
                            });
                        } else {
                            alert("結束日期須在開始日期(含)之前");
                        }
                    } else {
                        alert("請輸入起訖日期，兩者皆需輸入");
                    }
                });


                // jQuery code for button clicks
                $("#btn4").on("click", function() {
                    window.location.href = "modify.php";
                });
            
                // 

                const btnEditRec = document.getElementById("btnEditRec");
                const overlay = document.getElementById("overlay");
                const btnConfirmDel = document.getElementById("btnConfirmDel");

                btnEditRec.addEventListener("click", () => {
                    overlay.style.display = "flex";
                });

                overlay.addEventListener("click", (event) => {
                    if (event.target == btnConfirmDel) {
                        overlay.style.display = "none";
                    }
                });
            </script>

        </body>

        </html>
        



<?
    } else {
        echo "無法成功讀取會員頁面";
    }


mysqli_close($link);  // 關閉資料庫連接


?>

