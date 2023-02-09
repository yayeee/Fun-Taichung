<? include('connecttodb.php'); ?>
<? session_start(); 
    unset($_SESSION['login_message']);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊-玩轉台中</title>
    <link rel="icon" href="./materials/logo/logo-bluebkg-removebg-preview.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="./signup.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?render=6Lc5vHgUAAAAAKHxlH0FdDJdA2-8yfzpoMDLIWPc'></script>
</head>
<body>
    <div style=" height: 60px; background-color: rgb(43,49,63); 
        color: rgb(249, 239, 225); letter-spacing: 0.3em; font-weight: bold;
        display: flex; align-items: center;">
        &nbsp;
        <a href="login.php">
            <img style="background-color: rgb(224, 173, 105, 0); width: 30px;" src="./materials/icons/icons8-back-to-48.png" alt="">
        </a>
        <p style="margin-left: 115px; font-size: 18px;">成為玩咖</p>
        
    </div>

    <div style=" margin-top: 40px;">
        <img style="width: 200px; margin-left:105px;" 
            src="./materials/logo/logo-noBkg.png" alt="">
    </div>

    <div id="formDiv" style=" text-align: center; line-height: 38px;
    margin-top:0px;">

        <form action="register.php" method="post"
            style="line-height: 44px; letter-spacing: 0.06em;">
            <label>
                姓名 /暱稱 &nbsp;
                <input type="text"
                    id="name" name="name" 
                    onchange="validateName()"
                    value="<? echo $_SESSION['name'] ?>"
                    required
                    />
            </label>
            <br />
            <label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                生日 &nbsp;
                <input type="text"
                    id="birthday" name="birthday"
                    placeholder=" yyyymmdd"
                    onchange="validateBirthday()"
                    value="<? echo $_SESSION['birthday'] ?>"
                    required
                />
            </label>
            <br />
            <label>
                &nbsp;
                電子信箱 &nbsp;
                <input
                    type="email"
                    name="account"
                    placeholder=" 信箱將為您的登入帳號"
                    onchange="validateEmail()"
                    value=""
                    required
                    
                    />
                    <!-- value="echo $_SESSION['account'] " -->
                <!-- pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  -->
            </label>
            <br />

            <?
                // if ($_SESSION['signed'] == 1) {
                //     echo '<p> ERR! 此帳號已被註冊 </p>';
                // }
            ?>
            <?php if (isset($error_message)): ?>
                <div class="error" style=" text-align: center; color:red;
                    height:30px; font-size:12px; margin-top:-10px;">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['err_message']) && $_SESSION['err_message'] !== ""): ?>

                <div style=" text-align: center; color:rgb(230,20,20);
                    height:30px; font-size:12px; margin-top:-10px;">
                    &nbsp;&nbsp;<? echo '[!] '.$_SESSION['account'].$_SESSION['err_message']?>
                </div>

            <?php endif; ?>

            <label for="mobile">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                手機 &nbsp;
                <input type="tel" name="mobile" 
                    placeholder=" 09xxxxxxxx" 
                    onchange="validateMobile()"
                    value="<? echo $_SESSION['mobile'] ?>"
                    required
                />
            </label>
            <br />
            <label for="password">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                密碼 &nbsp;
                <input
                    type="password"
                    name="password"
                    placeholder=" 8-12碼英數字混合"
                    onchange="validatePassword()"
                    required
                />
            </label>
            <br />
            <label for="confirmpassword">
                &nbsp;
                確認密碼 &nbsp;
                <input
                    type="password"
                    name="confirmpassword"
                    placeholder=" 請再次輸入您的密碼"
                    onChange="confirmPassword()"
                    required
                />
            </label>
            <br />
            <div id="errmessage" style=" text-align: center; color:blue;
                    height:30px; font-size:12px; margin-top:-10px;">
            </div>
            <br />
            <button type="submit" value="Submit" disabled>註冊</button><br>
        </form>
    </div>

     <script>
        // function limitInput(max) {
        //     var inputField = document.getElementById("inputField");
        //     if (inputField.value.length > max) {
        //         inputField.value = inputField.value.slice(0, max);
        //     }
        // }
        function validateName() {
            var name = document.getElementById("name").value;
            if (name.length === 0 || name.length > 10) {
                alert("姓名或暱稱需介於1-10個字元之間");
            } else {
                checkSubmitButton();
            }
        }
        function validateBirthday() {
            var birthday = document.getElementById("birthday").value;
            if (birthday === "" || new Date(birthday) > new Date("2005/01/01")) {
                alert("建議18歲以上成人使用，生日應為2005/01/01(含)之後");
                document.getElementsByName("birthday")[0].value = "";
            } else {
                checkSubmitButton();
            }
        }
        function validateMobile() {
            var mobile = document.getElementsByName("mobile")[0].value;
            if (!/^09[0-9]{8}$/.test(mobile)) {
                alert("手機格式不符");
                document.getElementsByName("mobile")[0].value = "";
            } else {
                checkSubmitButton();
            }
        }
        function validateEmail() {
            var email = document.getElementsByName("account")[0].value;
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!pattern.test(email)) {
                alert("電子信箱格式不符");
                document.getElementsByName("account")[0].value = "";
            }
        }
        function validatePassword() {
            var password = document.getElementsByName("password")[0].value;
            var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,12}$/;
            if (!pattern.test(password)) {
                alert("密碼長度應為8-12個英數混合字元，並至少包含大小寫字母及數字各一");
                document.getElementsByName("password")[0].value = "";
            } else {
                checkSubmitButton();
            }
        }
        // 輸入值皆符合條件的情況下才開放點選submit按鈕
        function checkSubmitButton() {
            var name = document.getElementsByName("name")[0].value;
            var birthday = document.getElementsByName("birthday")[0].value;
            var account = document.getElementsByName("account")[0].value;
            var mobile = document.getElementsByName("mobile")[0].value;
            var password = document.getElementsByName("password")[0].value;
            var confirmpassword = document.getElementsByName("confirmpassword")[0].value;
            if ( name && birthday && account && mobile && password && confirmpassword ) {
                document.querySelector('button[type="submit"]').disabled = false;
            }
        }


        function confirmPassword() {
            var p1 = document.getElementsByName("password")[0].value;
            var p2 = document.getElementsByName("confirmpassword")[0].value;
            if ( p1 !== p2){
                alert("兩次密碼不相符");
                document.getElementsByName("password")[0].value = "";
                document.getElementsByName("confirmpassword")[0].value = "";
                // document.querySelector('button[type="submit"]').disabled = true;
            } else {
                document.querySelector('button[type="submit"]').disabled = false;
            }
        }


    </script>




</body>
</html>