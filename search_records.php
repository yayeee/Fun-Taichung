<? include('connecttodb.php'); ?>
<?  session_start();
    // unset($_SESSION['records']);
    // $_SESSION['records'] = ""; 
?>

<?php
if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    // do something with the received data
    // echo "請查詢:" . $start_date . "~" . $end_date . '<br>';

    // 檢查收到的日期資料格式
    // if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$start_date) && preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$end_date) ) {
    //     // do something with the received data
    // } else {
    //     echo "Error: Invalid date format";
    // }

    $account = $_SESSION['account'];
    // echo "acc=" . $account . '<br>';

    $sql = "SELECT * FROM records WHERE account='$account'";
    $result = $link->query($sql);
    // echo 'sql1=' . $sql . '<br>';
    // echo "ok0 共有" . ($result->num_rows) . "筆資料<br>";

    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM records WHERE account='$account' AND park_date BETWEEN '$start_date' AND '$end_date'";
        $records = $link->query($sql);

        // echo 'sql2=' . $sql . '<br>';

        if ($records->num_rows > 0) {

            // $_SESSION['records'] = $records;
            // echo "ok2 共有" . ($_SESSION['records']->num_rows) . "筆資料<br>";
            // header('Location: member.php');
            
?>

            <tbody>
                <!-- while ($row2 = $_SESSION['records']->fetch_assoc() -->
                <?php while ($row2 = $records->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row2['park_date']; ?></td>
                        <td><?php echo $row2['park_name']; ?></td>
                        <td><?php echo $row2['license_plate_number']; ?></td>
                        <td><?php echo $row2['reviews']; ?></td>
                        <td><?php echo $row2['remark']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>

<?

        } else {
            echo "<br>查無資料！";
        }
    } else {
        echo "<br>尚無任何紀錄。 ";
    }
} else {
    echo "Error: start date and end date not received.";
}

?>