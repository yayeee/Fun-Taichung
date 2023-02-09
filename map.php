<?php 
include "func.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>

    <link rel="stylesheet" href="./leaflet/leaflet.css" />
    <script src="./leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="./leaflet-routing-machine/dist/leaflet-routing-machine.css">
    <script src="./leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="./js/jquery-3.6.0.js"></script>
    
    <script src="./func.js"></script>

    <style>
        #map, #mmap, #tmap, #gmap, #cmap,#viewmap {
            height:80%;
            width: 100%;
        }
        /* 地圖大小 */

        .popupCustom .leaflet-popup-tip,
        .popupCustom .leaflet-popup-content-wrapper{
            background: rgba(255, 255, 255, 0.7);
            color: black;
            font-weight: bold;
            font-size: 18px;
            width:300px;
        }
        /* 彈出視窗的文字和背景 */

        #abtn{
            font-size: 24px;
        }
        /* 彈出視窗的按鈕樣式 */
    </style>
</head>

<body>
    <div id="map" class="popupCustom"></div>
    <div id="mmap" class="popupCustom"></div>
    <!-- 一般機車和汽車停車場地圖，其中一個已經預設隱藏 -->

    <br>

    <button onclick="setMapView(24.161881630522924,120.64687488397529,17)">setview</button>
    <!-- 經緯度+縮放大小 -->
    
    <button onclick="car()">汽車</button>
    <button onclick="motor()">機車</button>
    <!-- 切換地圖 -->

    <script>
        map_ini();//一般地圖初始化
        cmap_ini();//充電地圖初始化
        getLocation();//得到現在位置
        // setMapView(24.161881630522924, 120.64687488397529,17); //設定地圖視野為,縮放程度
    </script>
    <?php 
    tesladata();
    gogorodata();
    // 從資料庫取出資料並載入地圖
    ?>
</body>
</html>