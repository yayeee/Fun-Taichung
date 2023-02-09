 <!-- include('connecttodb.php');  -->

<?php

    $user = 'root';
    $password = 'root';
    $db_name = 'fun_taichung';
    $host = 'localhost';
    $port = 3306;

    $link = mysqli_init();
    $success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db_name,
    $port
    );

    //連線完要加上下面這兩行，編碼跟時區比較不會有問題
    $link->query('SET NAMES UTF8'); // 設定編碼
    $link->query('SET time_zone = "+8:00"'); // 設定台灣時間
    
    if ( !$link ) {
        echo "MySQL資料庫連接錯誤!<br/>";
        exit();
    }
    // else {
    //     echo "MySQL資料庫test連接成功!<br/>";
    // }

?>