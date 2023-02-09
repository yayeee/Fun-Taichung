<? include('connecttodb.php'); ?>

<?php
    // session_start();
    // if(isset($_SESSION['account'])){
       
    //     header('Location: member.php');
    // }else{
    //     // 判斷為未登入狀態，導向登入頁
    //     header('Location: login.php');
    // }
?>

<?php
    session_start();
    if(isset($_SESSION['account'])){
        // 判斷已經為登入狀態，直接導向功能頁
        if(isset($_GET['page'])){

            $page = $_GET['page'];
            $_SESSION['page'] = $page;

            switch ($_GET['page']) {
                case 'member':
                    header('Location: member.php');
                    break;
                case 'parking':
                    header('Location: parking.php');
                    break;
                case 'charge':
                    header('Location: charge.php');
                    break;
                // case 'contact':
                //     header('Location: contact.php');
                //     break;
            }
        }else{
            echo 'page沒有傳入參數';
        }
    }else{
        // 判斷為未登入狀態，導向登入頁
        // echo '未登入狀態，導向登入頁<br>';
        $page = $_GET['page'];
        $_SESSION['page'] = $page;
        // echo 'page:'.$page;
        header('Location: login.php');

    }
?>


<? mysqli_close($link);  // 關閉資料庫連接 ?>