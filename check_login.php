<!-- check_login.php -->
<? include('connecttodb.php'); 
    session_start();
    // 清空 帳號密碼錯誤 的提示訊息
    $_SESSION['ok_message'] = "";
    $_SESSION['login_message'] = "";
    $_SESSION['temp_acc'] = "";
    unset($_SESSION['ok_message']);
    unset($_SESSION['login_message']);
    unset($_SESSION['temp_acc']);
?>

<?php
    // 過濾特殊字元 防止 SQL injection 
    $account = mysqli_real_escape_string($link, $_GET["account"]);
    $password = mysqli_real_escape_string($link, $_GET["password"]);

    $sql = "SELECT * FROM users WHERE account='$account'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM users WHERE account='$account' AND password='$password'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {

            $row1 = $result->fetch_assoc();
            $name = $row1['name'];
            $birthday = $row1['birthday'];
            $mobile = $row1['mobile'];
            $account = $row1['account'];
            $email = $row1['account'];
            $image = $row1['image'];
            // echo $name;

            // session_start();
            $_SESSION['account'] = $account;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['birthday'] = $birthday;
            $_SESSION['mobile'] = $mobile;
            $_SESSION['image'] = $image;

            // 表示user接下來在登出前 都是登入狀態
            $logined = "1";
            $_SESSION['logined'] = $logined;

            // echo 'Location: '.$_SESSION['page'].'.php';
            header('Location: '.$_SESSION['page'].'.php');
            

?>


<?
    } else {
        $login_message = "密碼錯誤";
        $_SESSION['login_message'] = "$login_message";

        $temp_acc = $account;
        $_SESSION['temp_acc'] = $temp_acc; 
        header("Location: login.php");
        exit;
    }
} else {
    // echo "您還不是會員，立即註冊吧";
    // header('Location: login.php');
    // $error_message = "帳號不存在";
    // header("Location: login.php?error_message=" . urlencode($error_message));
    // exit;
    $login_message = "帳號不存在";
    $_SESSION['login_message'] = "$login_message";
    header("Location: login.php");
    exit;
}
?>
</body>
</html>

<?

mysqli_close($link);  // 關閉資料庫連接


?>