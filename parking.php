<? include('connecttodb.php'); ?>
<? session_start(); ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>玩轉台中-找車位</title>
        <link rel="icon" href="./materials/logo/logo-bluebkg-removebg-preview.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./menu.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- jsDelivr -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>


    <body style="background-color: rgb(236, 233, 240);">

        <div class="wrapper"><input id="menuExtend" type="checkbox" />

            <!-- 這邊是navbar跟menu 不要動！！ -->
            <header>
                <div class="row">
                    <div class="col" id="menubar">
                        <!-- <a id="logo" href=".">玩轉台中</a> -->
                        <a id="logo" href=".">
                            <img style="width: 120px;" src="./materials/logo/logoWithName-BlueBkg.png" alt="">
                        </a>
                        <label id="hamburger" for="menuExtend"><span>Menu</span></label>
                    </div>
                    <div class="col" id="navbar">
                        <nav>
                            <a href="parking.php">
                                <img style="width:24px" src="./materials/icons/icons8-parking-30.png" alt=""><br>
                                找車位
                            </a>
                            <!-- class="on" -->
                            <a href="charge.php">
                                <img style="width:24px" src="./materials/icons/icons8-electric-plug-66.png" alt=""><br>
                                找充電</a>
                            <a href="contact.php">
                                <img style="width:24px" src="./materials/icons/icons8-envelope-30.png" alt=""><br>
                                聯絡我們
                            </a>
                            <a href="member.php">
                                <img style="width:24px" src="./materials/icons/icons-user-48-white.png" alt=""><br>
                                會員中心
                            </a>
                            <a href="logout.php">
                                <img style="width:24px" src="./materials/icons/icons8-logout-24.png" alt=""><br>
                                登出
                            </a>
                        </nav>
                        <div id="links">
                            <a id="info" href="home.php" style="width: 2.5rem; height: 2.5rem;">
                                <img style="width:28px" src="./materials/icons/icons-home-48.png" alt="home" />
                            </a>
                        </div>
                        
                    </div>
                </div>
            </header>


            <!-- 這邊可以放內容-->
            <div style="margin-top:50px;">
                <h2>parking</h2>

            </div>
        </div>



    </body>

    </html>


<? mysqli_close($link);  // 關閉資料庫連接 ?>