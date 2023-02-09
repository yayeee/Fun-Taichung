<!-- modify.php -->
<? include('connecttodb.php'); ?>

<?php
    // retrieve user data from session
    session_start();
    if(isset($_SESSION['account'])){
        $account = $_SESSION['account'];
        $name = $_SESSION['name'];
        $birthday = $_SESSION['birthday'];
        $mobile = $_SESSION['mobile'];
        // 在user第一次上傳頭貼前 讀不到
        $image = $_SESSION['image'];
        
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
                        <title>玩轉台中-個資修改</title>
                        <link rel="stylesheet" href="./modifyuserinfo.css">
                        <link rel="icon" href="./materials/logo/logo-bluebkg-removebg-preview.ico" type="image/x-icon" />
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    </head>
                    <body id="body">

                        <div style=" height: 60px; background-color: rgb(43,49,63); 
                            color: rgb(249, 239, 225); letter-spacing: 0.3em; font-weight: bold;
                            display: flex; align-items: center;">
                            <a href="member.php">
                            &nbsp;<img style="background-color: rgb(224, 173, 105, 0); width: 30px;" src="./materials/icons/icons8-back-to-48.png" alt="">
                            </a>                            
                            <p style="margin-left: 115px; font-size: 18px;">個資修改</p>
                        
                        </div>

                        <div style=" text-align: center; margin-top: 50px;">
                            <!-- 預設的兔兔大頭貼 -->
                            <img style="width: 200px; border-radius: 50%; position: absolute; z-index: 1;
                                margin-left: -95px; opacity:100%;"
                                src="./materials/members/default-62kb.jpg" alt="defaultImg"> 
                            <!-- user實際上傳的照片 -->
                            <img style="width: 200px; border-radius: 50%; position: absolute; z-index: 2;
                                margin-left: -95px; "
                                src="data:image/png;base64,<?php echo $_SESSION['image']; ?>" alt=""> 
                            
                        </div>

                        <div id="formDiv" style=" text-align: center; line-height: 40px;
                            margin-top: 230px;">
                            <!-- 大頭貼 -->
                            <form action="uploadimg.php" method="post" enctype="multipart/form-data">
                                <label for="image" style="letter-spacing: 0.3em;">
                                    大頭貼<br>
                                    <input type="file" id="image" 
                                        name="image" 
                                        accept="image/*"
                                        style="width:70px; background-color:none;">
                                </label>
                                
                                <input type="submit" value="確認上傳">
                            </form>

                            <form style="margin-top: -20px;" 
                            id="modifyForm" action="change_info.php" method="post">
                                <label for="name" style="letter-spacing: 0.3em; padding-left: 20px;">
                                    姓名
                                    <input
                                        type="text"
                                        id="name" 
                                        name="name" 
                                        value="<?php echo $name; ?>"
                                    />
                                </label>
                                <br />
                                <label for="birthday" style="letter-spacing: 0.3em; padding-left: 20px;">
                                    生日
                                    <input
                                        type="text"
                                        id="birthday"
                                        name="birthday"
                                        value="<?php echo $birthday; ?>"
                                        readonly
                                    />
                                </label>
                                <br />
                                <label for="mobile" style="letter-spacing: 0.3em; padding-left: 20px;">
                                    手機
                                    <input
                                        type="tel"
                                        id="mobile"
                                        name="mobile"
                                        value="<?php echo $mobile; ?>"
                                    />
                                </label>
                                <br />
                                <label for="account" style="letter-spacing: 0.1em;">
                                    電子信箱
                                    <input
                                        type="email"
                                        id="account" 
                                        name="account" 
                                        value="<?php echo $account; ?>"
                                        readonly
                                    />
                                </label>
                                <br />
                                <label for="password" style="letter-spacing: 0.1em;">
                                    原有密碼
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        placeholder="<?php if (isset($error_message)): 
                                            echo $error_message;
                                            endif;?>"
                                    />
                                </label>
                                <br />
                                <label for="newPassword" style="letter-spacing: 0.2em; padding-left: 10px;">
                                    新密碼
                                    <input
                                        type="password"
                                        id="newPassword"
                                        name="newPassword"
                                    />
                                </label>
                                <br /><br />
                                <button type="submit" onclick="">儲存</button><br />
                                <!-- <button type="" onclick="handleClick3()">取消</button> -->
                            </form>
                        </div>
                        <div>
                            <img style="margin-left: 220px; margin-top: -24px; width: 220px; opacity: 0.3;" 
                                src="./materials/logo/logo-noBkg.png" alt="">
                        </div>


                        <script>
                            function handleClick3() {
                                $.ajax({
                                    url: "login_114.php",
                                    type: "POST",
                                    data: { event: "button_clicked" },
                                    success: function(response) {
                                        console.log(response);
                                        // $("#body").html(response);
                                    }
                                });
                            }
                            function handleClick() {
                                $.ajax({
                                    url: "handle_event.php",
                                    type: "POST",
                                    data: { event: "button_clicked" },
                                    success: function(response) {
                                        console.log(response);
                                    }
                                });
                            }
                        </script>




                        <style>
                        body {
                        width: 390px;
                        height: 844px;
                        overflow: hidden;
                        margin: 0;
                        padding: 0;
                        background-color: rgb(236, 233, 240);
                        }
                    
                        form {
                            background-color: rgb(228, 141, 141, 0);
                            padding-top: 30px;
                            font-size: 14px;
                            /* letter-spacing: 0.1em; */
                            font-weight: bold;
                            color: rgb(43, 49, 63);
                        }
                    
                        button {
                            background-color: rgb(43, 49, 63);
                            border: none;
                            border-radius: 10px;
                            color: rgb(249, 239, 225);
                            padding: 5px 10px;
                            letter-spacing: 0.1em;
                        }
                    
                        input {
                            border: none;
                            border-radius: 5px;
                            height: 28px;
                            
                        }
                    </style>
            </html>          

<?
    }else{
        // 請重新登入
        header('Location:login.php');
    }

?>