<?php
include "./af.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./leaflet/leaflet.css" />
    <script src="./leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="./leaflet-routing-machine/dist/leaflet-routing-machine.css">
    <script src="./leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="./js/jquery-3.6.0.js"></script>

    <script src="./af.js"></script>
    <style>
        #viewmap {
            height:1000px;
            width: 100%;
        }
        /* 地圖大小 */

        .popupCustom .leaflet-popup-tip,
        .popupCustom .leaflet-popup-content-wrapper{
            background: RGB( 43, 49, 63,0.9 );
            color: white;
            font-weight: bold;
            font-size: 18px;
            width:250px;
            
        }
        /* 彈出視窗的文字和背景 */

        #abtn{
            font-size: 18px;
            border-radius: 10%;
            color: white;
            background-color: transparent;
            border: solid;
        }
        /* 彈出視窗的按鈕樣式 */
    </style>
</head>
<body>
    <div id="viewmap" class="popupCustom" ></div>
    <script>
        viewmap_ini();
        getLocation();
    </script>
    <?php af(); ?>
</body>
</html>