<!-- 會員分級制度 -->

<?  session_start();
    include('connecttodb.php');

    $sql = "SELECT * FROM parking_record WHERE account='$account'";
    $records = $link->query($sql); 

    // 會員分級制度
    // 因為資料要手動建立所以資料筆數都先設小一點
    if ( $records ->num_rows < 10 ) {
        if ( $records ->num_rows < 5 ) {
            echo 'Normal VIP';
        } else {
            echo 'Sliver VIP';
        }
    } else {
        echo 'Gold VIP';
    }

?>