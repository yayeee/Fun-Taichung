<? include('connecttodb.php'); ?>
<?  session_start(); ?>

<?php
    // 根本不會進這個迴圈欸 
    if (isset($_POST["the_date"])) {
        $the_date = $_POST["the_date"];
        // echo 'okok=='.$the_date;
    }

    $now = date('Y-m-d');
    $one_year_ago = date('Y-m-d', strtotime('-1 year'));
    // echo "請查詢:" . $the_date . "~" . $now . '<br>';

    $account = $_SESSION['account'];

    $sql = "SELECT * FROM records WHERE account='$account'";
    $result = $link->query($sql);


    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM records WHERE account='$account' AND park_date BETWEEN '$one_year_ago' AND '$now'";
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