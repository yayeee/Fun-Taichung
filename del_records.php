<?
session_start();
include('connecttodb.php');

$account = $_SESSION['account'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>玩轉台中</title>
    <link rel="icon" href="./materials/logo/logo-bluebkg-removebg-preview.ico" type="image/x-icon" />
    <!-- <link rel="stylesheet" href="./member2.css" type="text/css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jsDelivr -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body id="body">



    <div id="overlay" class="overlay">
        <div id="card">
            <p id="cardTitle">編輯停車記錄</p>
            <table style="margin-left: 16px;">
                <thead>
                    <tr>
                        <th style="width:115px ">停車日期</th>
                        <th style="width:150px; background-color: rgb(255, 255, 255);">停車場名稱</th>
                        <th style="width:70px">車輛</th>
                        <th style="width:45px; background-color: rgb(255, 255, 255);">刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>這邊會</td>
                        <td>這邊會被擋住</td>
                        <td>這邊會</td>
                        <td>擋住</td>
                    </tr>

                    <?
                    $sql = "SELECT * FROM records WHERE account='$account'";
                    $records = $link->query($sql);
                    ?>
                    <?php while ($row2 = $records->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row2['park_date']; ?></td>
                            <td><?php echo $row2['park_name']; ?></td>
                            <td><?php echo $row2['license_plate_number']; ?></td>
                            <td><input type="checkbox"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button id="btnConfirmDel">確定刪除</button>
        </div>
    </div>


</body>

</html>

