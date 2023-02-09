<?php
function af(){
    view();
    eat();
}
function view(){
    include "connect.php";
    $sql = "SELECT * FROM `view` WHERE 1";
    $result = $conn->query($sql);
    while ($view = $result->fetch_object()){
        $lat = doubleval($view->vLat);
        $lon = doubleval($view->vLon);
        $name = $view->vName;
        $address = $view->vAddress;
        $opentime = $view->vOpenTime;
        $phone = $view->vPhone;
        $pic = $view->vPic;
        // echo $name;
        echo "<script type='text/javascript'>
        setViewPoint($lat,$lon,'$name','$opentime','$phone','$pic');
        </script>";
    }
}
function eat(){
    include "connect.php";
    $sql = "SELECT * FROM `eat` WHERE 1";
    $result = $conn->query($sql);
    while ($eat = $result->fetch_object()){
        $lat = doubleval($eat->vLat);
        $lon = doubleval($eat->vLon);
        $name = $eat->vName;
        $address = $eat->vAddress;
        $opentime = $eat->vOpenTime;
        $phone = $eat->vPhone;
        $pic = $eat->vPic;
        // echo $name;
        echo "<script type='text/javascript'>
        seteViewPoint($lat,$lon,'$name','$opentime','$phone','$pic');
        </script>";
    }
}
?>