<? include('connecttodb.php'); ?>

<?php
    // retrieve user data from session
    session_start();
    // echo('ok'.'<br>');
    // echo($_SESSION['name'].'<br>');
    $account = $_SESSION['account'];

    if(isset($_POST['name'])) { 
        $name = $_POST['name'];
        $update_sql = "UPDATE users SET name='$name' WHERE account='$account'";
        mysqli_query($link, $update_sql);
        $_SESSION['name'] = $name;
        // echo 'name成功更新為'.$name;
    
    }
    if(isset($_POST['mobile'])) { 
        $mobile = $_POST['mobile'];
        $update_sql = "UPDATE users SET mobile='$mobile' WHERE account='$account'";
        mysqli_query($link, $update_sql);
        $_SESSION['mobile'] = $mobile;
    
    }

    if(isset($_POST['password'])) { 
        $password = $_POST['password'];
        $newpassword = $_POST['newPassword'];

        $sql = "SELECT * FROM users WHERE account='$account' AND password='$password'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {

            $update_sql = "UPDATE users SET password='$newpassword' WHERE account='$account'";
            mysqli_query($link, $update_sql);
        } else {
            // 舊密碼輸入錯誤
            $error_message = "舊密碼輸入錯誤";
            header("Location: modify.php?error_message=" . urlencode($error_message));
            exit;
        }


        // $_SESSION['password'] = $newpassword;
    
    }

    header('Location:member.php');

?>
