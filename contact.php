<? include('connecttodb.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>玩轉台中-聯絡我們</title>
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

    <style>
        .contact {
            background-color: rgb(43, 49, 63);
            overflow: hidden;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1;
        }

        .contact ul {
            list-style-type: none;
            width: 100%;
        }

        h1 {
            color: rgb(246, 242, 229);
        }

        h2 {
            text-align: center;
        }

        .contact li {
            display: inline-block;
        }

        .contact a {
            float: left;
            color: rgb(246, 242, 229);
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 16px;
        }

        .mail li {
            display: inline-block;
        }

        .mail a:visited {
            color: black;
        }
    </style>
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
                        <a href="parkinglotmap.php">
                            <img style="width:24px" src="./materials/icons/icons8-parking-30.png" alt=""><br>
                            找車位
                        </a>
                        <!-- class="on" -->
                        <a href="chargingmap.php">
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
                        <?php if (isset($_SESSION['logined']) && $_SESSION['logined'] !== "") : ?>
                            <a href="logout.php">
                                <img style="width:24px" src="./materials/icons/icons8-logout-24.png" alt=""><br>
                                登出
                            </a>
                        <?php endif; ?>
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
        <div style="margin-top:120px; text-align:center;">
            <br><br>
            <ul class="mail">
                <li style="margin-left: -35px">
                    <a href="http://mail.google.com" target="blank">
                        <svg style=" color:blue;" width="50" height="50" viewBox="0 0 20 20">
                            <path fill="currentColor" fill-rule="evenodd" d="M18.333 2.5c.92 0 1.667.746 1.667 1.667v11.666c0 .92-.746 1.667-1.667 1.667H1.667C.747 17.5 0 16.754 0 15.833V4.167C0 3.247.746 2.5 1.667 2.5h16.666ZM7.168 11.328l-4.91 4.852h15.325l-4.857-4.802L10 13.265l-2.832-1.937ZM18.64 7.292l-4.796 3.316l4.796 4.736V7.292Zm-17.279.061v7.836l4.686-4.631l-4.686-3.205Zm16.956-3.532H1.698a.358.358 0 0 0-.25.086a.26.26 0 0 0-.085.222v1.62L10 11.656l8.644-5.965V4.199c.001-.134-.03-.231-.092-.292a.306.306 0 0 0-.234-.086Z" />
                        </svg>
                    </a>
                    <h4 style="text-align:center; margin-top:10px; letter-spacing:0.1em;
                        font-weight: bolder;">
                        電子郵件
                    </h4>
                    <h5>funtaichung@gmail.com</h5>
                </li>
            </ul>

            <br><br>
            <div>
                <svg style=" color:blue;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M18.4 20.75h-.23a16.73 16.73 0 0 1-7.27-2.58a16.58 16.58 0 0 1-5.06-5.05a16.72 16.72 0 0 1-2.58-7.29A2.3 2.3 0 0 1 3.8 4.1a2.32 2.32 0 0 1 1.6-.84H8a2.36 2.36 0 0 1 2.33 2a9.29 9.29 0 0 0 .53 2.09a2.37 2.37 0 0 1-.54 2.49l-.61.61a12 12 0 0 0 3.77 3.75l.61-.6a2.37 2.37 0 0 1 2.49-.54a9.57 9.57 0 0 0 2.09.53a2.35 2.35 0 0 1 2 2.38v2.4a2.36 2.36 0 0 1-2.35 2.36ZM8 4.75H5.61a.87.87 0 0 0-.61.31a.83.83 0 0 0-.2.62a15.17 15.17 0 0 0 2.31 6.62a15 15 0 0 0 4.59 4.59a15.34 15.34 0 0 0 6.63 2.36A.89.89 0 0 0 19 19a.88.88 0 0 0 .25-.61V16a.86.86 0 0 0-.74-.87a11.42 11.42 0 0 1-2.42-.6a.87.87 0 0 0-.91.19l-1 1a.76.76 0 0 1-.9.12a13.53 13.53 0 0 1-5.11-5.1a.74.74 0 0 1 .12-.9l1-1a.85.85 0 0 0 .19-.9a11.28 11.28 0 0 1-.6-2.42a.87.87 0 0 0-.88-.77Z" />
                </svg>
            </div>
            <h4 style="text-align:center; margin-top:10px; letter-spacing:0.1em;
                    font-weight: bolder;">
                客服專線
            </h4>
            <h5>(04) 2326-5860</h5>

            <br><br><br>

            <ul class="mail">
                <li style="margin-left: -35px">
                    <a href="./form.html" target="blank" style="">
                        <svg style="color:green;" width="50" height="50" viewBox="0 0 20 20">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M18.333 2.5c.92 0 1.667.746 1.667 1.667v11.666c0 .92-.746 1.667-1.667 1.667H1.667C.747 17.5 0 16.754 0 15.833V4.167C0 3.247.746 2.5 1.667 2.5h16.666ZM7.168 11.328l-4.91 4.852h15.325l-4.857-4.802L10 13.265l-2.832-1.937ZM18.64 7.292l-4.796 3.316l4.796 4.736V7.292Zm-17.279.061v7.836l4.686-4.631l-4.686-3.205Zm16.956-3.532H1.698a.358.358 0 0 0-.25.086a.26.26 0 0 0-.085.222v1.62L10 11.656l8.644-5.965V4.199c.001-.134-.03-.231-.092-.292a.306.306 0 0 0-.234-.086Z" />
                        </svg>
                    </a>
                    <h4 style="text-align:center; margin-top:10px; letter-spacing:0.1em;
                        font-weight: bolder;">
                        意見箱
                    </h4>
                </li>
            </ul>

        </div>
    </div>



</body>

</html>


<? mysqli_close($link);  // 關閉資料庫連接 
?>