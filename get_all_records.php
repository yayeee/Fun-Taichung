<? include('connecttodb.php'); ?>
<?  session_start(); ?>

<?php
    // 根本不會進這個迴圈欸 
    if (isset($_POST["begin_Date"])) {
        $begin_Date = $_POST["begin_Date"];
        // echo 'okok=='.$begin_Date;
    }

    $now = date('Y-m-d');
    $begin = "1911-01-01";
    // echo "請查詢:" . $now . "~1911-01-01<br>";

    $account = $_SESSION['account'];

    $sql = "SELECT * FROM records WHERE account='$account'";
    $result = $link->query($sql);


    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM records WHERE account='$account' AND park_date BETWEEN '$begin' AND '$now'";
        $records = $link->query($sql);


        if ($records->num_rows > 0) {

            
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


?>