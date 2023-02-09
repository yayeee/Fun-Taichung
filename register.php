<? include('connecttodb.php'); ?>

<? session_start(); 
    // 清空 帳號已存在 的提示訊息
    $_SESSION['err_message'] = "";
    unset($_SESSION['err_message']);

    // 確定有從signup收到account
    if(isset($_POST["account"])&&$_POST["account"]!==''){
        
        $account = $_POST["account"];
        echo '錯誤訊息:'.$_SESSION['err_message'].'...<br>';
        echo 'acc='.$account.'<br>';
        //可以成功進register代表目前acc尚未註冊
        // $_SESSION['signed'] = '0';
        
    
        $sql = "SELECT * FROM users WHERE account='$account'";
        // $_SESSION['tempaccount'] = $account;
        echo $sql.'<br>';
        $result = $link->query($sql);
        
        // echo ('ok1').'<br>';
        echo '找到'.($result->num_rows).'筆資料<br>';
        
        if ($result->num_rows == '0') {
            echo ('ok2');
            echo '成功訊息:'.$_SESSION['ok_message'].'...<br>';
    
            $username = $_POST["name"];
            $account = $_POST["account"];
            $password = $_POST["password"];
            $birthday = $_POST["birthday"];
            $mobile = $_POST["mobile"];
    
    
            // 插入資料到資料庫
            $sql = "INSERT INTO users (name, account, password, birthday, mobile)
            VALUES ('$username', '$account', '$password', '$birthday', '$mobile')";
            mysqli_query($link, $sql);

            $ok_message = "註冊成功，請登入";
            $_SESSION['ok_message'] = "$ok_message";    
            echo '成功訊息:'.$_SESSION['ok_message'].'...<br>';    
            header('Location: login.php');
        }else {
            echo ('ok3');
            // $_SESSION['signed'] = '1';
            // header('Location: signup.php');
            $account = $_POST["account"];
            $name = $_POST["name"];
            $birthday = $_POST["birthday"];
            $mobile = $_POST["mobile"];
            $_SESSION['account'] = "$account";
            $_SESSION['name'] = "$name";
            $_SESSION['birthday'] = "$birthday";
            $_SESSION['mobile'] = "$mobile";
           
            $err_message = "已是會員";
            $_SESSION['err_message'] = "$err_message";
            // echo '錯誤訊息:'.$_SESSION['err_message'].'...<br>';
            header("Location: signup.php");
            exit;
        }
    } else {
        echo '沒有從signup.php收到account的值';
    }

?>



