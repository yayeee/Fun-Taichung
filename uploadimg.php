<? include('connecttodb.php'); ?>

<?php
    // retrieve user data from session
    session_start();
    unset($_SESSION['image']);
    $account = $_SESSION['account'];
    // echo $account.'<br>';

        $max_size =  64*1024; // blob欄位最大可存 64KB
        $file_size = $_FILES['image']['size'];

        if ($file_size > $max_size) {
            echo "<script>alert('Error: 請上傳小於64KB的圖片');</script>";
            exit();
        }

        
        $file = $_FILES['image']['tmp_name'];
        $image = file_get_contents($file);
        $image = base64_encode(file_get_contents($file));
        $image_name = $_FILES['image']['name'];


        $sql = "UPDATE users SET img_name='$image_name', image='$image' 
                WHERE account='$account'";
        // echo $sql.'<br>';
        mysqli_query($link, $sql);
        
        $_SESSION['image'] = $image;

        // echo$sql.'<br><br>'.$image_name.'<br>'.$image.'<br>'.
        // '<img src="data:image/png;base64,'.$image.'" alt="image">';

        header('Location:modify.php');
        
       
 ?>
 
 <?  mysqli_close($link);  // 關閉資料庫連接 ?>


