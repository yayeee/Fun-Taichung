<!-- login.php -->
<? include('connecttodb.php'); 
    session_start(); 
    
    $_SESSION['err_message'] = "";
    unset($_SESSION['account']);
    unset($_SESSION['err_message']);
?>
<?php
    if (isset($_GET['error_message'])) {
        $error_message = $_GET['error_message'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入-玩轉台中</title>
    <link rel="icon" href="./materials/logo/logo-bluebkg-removebg-preview.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="./login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?render=6Lc5vHgUAAAAAKHxlH0FdDJdA2-8yfzpoMDLIWPc'></script>
</head>
<body>
    <div style=" height: 60px; background-color: rgb(43,49,63); 
        color: rgb(249, 239, 225); letter-spacing: 0.3em; font-weight: bold;
        display: flex; align-items: center;">
        &nbsp;
        <a href="home.php">
            <img style="background-color: rgb(224, 173, 105, 0); width: 30px;" src="./materials/icons/icons8-back-to-48.png" alt="">
        </a>
        <p style="margin-left: 115px; font-size: 18px;">
            玩咖登入
        </p>
        
    </div>

    <div style=" margin-top: 40px;">
        <img style="width: 200px; margin-left:105px;" 
            src="./materials/logo/logo-noBkg.png" alt="">
    </div>

    
    <?php if (isset($_SESSION['ok_message']) && $_SESSION['ok_message'] !== ""): ?>

        <div style=" text-align: center; color: rgb(20,180,30); font-weight:bold;
            height:20px; font-size:13px; margin-top:30px; margin-bottom:-20px;">
            &nbsp;&nbsp;<? echo $_SESSION['ok_message']?>
        </div>

    <?php endif; ?>
    <?php if (isset($_SESSION['login_message']) && $_SESSION['login_message'] !== ""): ?>

        <div style=" text-align: center; color: rgb(230,20,20); font-weight:bold;
            height:20px; font-size:13px; margin-top:30px; margin-bottom:-20px;">
            &nbsp;&nbsp;<? echo $_SESSION['login_message']?>
        </div>

    <?php endif; ?>

    <div id="formDiv" style=" text-align: center; line-height: 38px;">

        <form id="loginForm" action="check_login.php">
            <label>
                帳號:
                <input
                    type="email"
                    name="account"
                    id="account"  
                    value="<?echo $_SESSION['temp_acc']?>"  
                    placeholder=" 您的電子信箱"                
                />
            </label>
            <br />
            <label>
                密碼:
                <input
                    type="password"
                    name="password"
                    id="password"  
                />
            </label>
            <br /><br />
            
            <button type="submit">登入</button>
            <br />           
            <button>
                <a style="color: beige; text-decoration: none;" 
                href="signup.php">註冊</a>
            </button>
        </form>
    </div>

    
</body>
</html>



<? mysqli_close($link);  // 關閉資料庫連接 ?>