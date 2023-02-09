<? include('connecttodb.php'); ?>

<?php
    // 刪除當前用戶對應的 session 檔案以及釋放 session ID
    // 內存中的 $_SESSION 變數內容依然保留
    session_start();
    session_destroy();

    // 
    session_start();
    $_SESSION['page'] = "home";
    header('Location: login.php');
    // 或者直接導向首頁比較單純
    // header('Location: home.php');
?>
