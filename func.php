<script src="./func.js"></script>
<?php
function gogorodata(){
    include "connecttodb.php";
    $sql = "SELECT * FROM `gogoro` WHERE 1";
    $result = $link->query($sql);
    while ($gogoro = $result->fetch_object()){
        // echo '<tr>';
        $lat = doubleval($gogoro->g_lat);
        $lon = doubleval($gogoro->g_lon);
        $name = $gogoro->g_name;
        $address = $gogoro->g_address;
        // echo $name;
        // echo $lat;
        echo "<script type='text/javascript'>
        setGogoroPoint($lat,$lon,'$name','$address');
        </script>";
    }
    echo "<script type='text/javascript'>
    $(document.getElementById('gmap')).css('display', 'none');
    </script>";
}
function tesladata(){
    include "connect.php";
    $sql = "SELECT * FROM `tesla` WHERE 1";
    $result = $link->query($sql);
    while ($tesla = $result->fetch_object()){
        $lat = doubleval($tesla->t_lat);
        $lon = doubleval($tesla->t_lon);
        $name = $tesla->t_name;
        $address = $tesla->t_address;
        $opentime = $tesla->t_opentime;
        $count = $tesla->t_count;
        // echo $name;
        echo "<script type='text/javascript'>
        setTeslaPoint($lat,$lon,'$name','$address','$count','$opentime');
        </script>";
    }
    echo "<script type='text/javascript'>
    $(document.getElementById('tmap')).css('display', 'none');
    </script>";
}
?>
