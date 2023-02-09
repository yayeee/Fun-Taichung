var getChargeXhr = new XMLHttpRequest();
var getStaticParkingXhr = new XMLHttpRequest();
var getDynamicParkingXhr = new XMLHttpRequest();
var getDynamicParkingXhr2 = new XMLHttpRequest();
var getDynamicParkingXhr3 = new XMLHttpRequest();
var getDynamicParkingXhr4 = new XMLHttpRequest();
var getDynamicParkingXhr5 = new XMLHttpRequest();
var getDynamicParkingXhr6 = new XMLHttpRequest();

var spa = [];
var spaX = [];
var spaY = [];

var eleUrl = "https://motoretag.taichung.gov.tw/DataAPI/api/ElectricCarInfo";
var staticParkingUrl = "https://motoretag.taichung.gov.tw/DataAPI/api/ParkingAPI";
var dynamicParkingUrl = "https://motoretag.taichung.gov.tw/DataAPI/api/ParkingListAPI?id=";
var dynamicParkingUrl2 = "https://motoretag.taichung.gov.tw/DataAPI/api/ParkingListAPI?id=";
var dynamicParkingUrl3 = "https://motoretag.taichung.gov.tw/DataAPI/api/ParkingListAPI?id=";
var dynamicParkingUrl4 = "https://motoretag.taichung.gov.tw/DataAPI/api/ParkingListAPI?id=";
var dynamicParkingUrl5 = "https://motoretag.taichung.gov.tw/DataAPI/api/ParkingListAPI?id=";
var dynamicParkingUrl6 = "https://motoretag.taichung.gov.tw/DataAPI/api/ParkingListAPI?id=";

var lat = 24.15143190611227;
var lon = 120.66420189575864;
var solat = 24.15143190611227;
var solon = 120.66420189575864;
var routex = null;
var mroutex = null;
var troutex = null;
var groutex = null;
var croutex = null;
var arrive = "";

var redIcon = L.icon({
    iconUrl: './pic/red_icon.png',

    iconSize: [25, 40], // size of the icon
    iconAnchor: [30, 50], // point of the icon which will correspond to marker's location
    popupAnchor: [-3, -45] // point from which the popup should open relative to the iconAnchor
});

// 
var blackIcon = L.icon({
    iconUrl: './pic/black_icon.png',

    iconSize: [40, 40], // size of the icon
    iconAnchor: [30, 50], // point of the icon which will correspond to marker's location
    popupAnchor: [-3, -45] // point from which the popup should open relative to the iconAnchor
});
// 

var orangeIcon = L.icon({
    iconUrl: './pic/orange_icon.png',

    iconSize:     [25, 40], // size of the icon
    iconAnchor:   [30, 50], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -45] // point from which the popup should open relative to the iconAnchor
});

var map = document.getElementById("map");
var mmap = document.getElementById("mmap");

var tmap = document.getElementById("tmap");
var gmap = document.getElementById("gmap");
var cmap = document.getElementById("cmap");
var keepLocation =null;

function map_ini() {
    map = L.map('map').setView([lat, lon], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    mmap = L.map('mmap').setView([lat, lon], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(mmap);
    L.marker([lat,lon],{icon:blackIcon}).addTo(map).bindPopup(`草悟廣場`).openPopup();
    getParkingData();
}
function cmap_ini() {
    tmap = L.map('tmap').setView([lat, lon], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(tmap);

    gmap = L.map('gmap').setView([lat, lon], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(gmap);

    cmap = L.map('cmap').setView([lat, lon], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(cmap);
    getChargeData();
}

function setMapView(slat, slon, szoom) {
    map.flyTo(new L.latLng(slat, slon), szoom);
}

function getLocation2() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getPosition2, showError2);
    } else {
        alert("無法取得定位");
    }
}

// // let t1 =L.latLng(lat,lon);
// // let t2 =L.latLng(lat+1,lon+1);
// // console.log(t1.distanceTo(t2));
// // 計算距離

function getPosition2(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    console.log("ok");
    let d1 = L.latLng(lat, lon);
    let d2 = L.latLng(solat, solon);
    if (d1.distanceTo(d2) <= 20) {
        clearInterval(keepLocation);
        // alert("我到了");
        document.getElementById("parked").style.display = "block";
        display = "block";
    }
    //距離20公尺內會顯示我到了
    //距離20公尺內會跳出按鈕
}
function showError2() {
    alert("定位取得失敗");
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getPosition, showError);
    } else {
        alert("無法取得定位");
    }
}

function getPosition(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    map.flyTo(new L.LatLng(lat, lon), 15);
    L.marker([lat, lon],{icon:orangeIcon}).addTo(map).bindPopup(`現在定位`).openPopup();
}
function showError() {
    alert("定位取得失敗");
}

function route1(olat, olon, oname) {
    if (routex != null) {
        map.removeControl(routex);
        routex = null;
    }
    arrive = "";
    routex = L.Routing.control({
        waypoints: [
            L.latLng(lat, lon),
            L.latLng(olat, olon)
        ],
        lineOptions: {
            styles: [{ color: 'blue', opacity: 1, weight: 5 }]
        },
        createMarker: function () { return null; },
        routeWhileDragging: false,
        draggableWaypoints: false,
        collapsible: true
    }).addTo(map);
    arrive = oname;
    console.log(arrive);
    let s = new Date().toLocaleString();
    console.log(s);
    solat = olat;
    solon = olon;
    keepLocation =null;
    keepLocation = setInterval(() => {getLocation2();}, 5000);
    //10秒檢測一次當前位置(10000)
    // routex.spliceWaypoints(0, 2);
    // routex.setWaypoints([L.latLng(lat, lon), L.latLng(olat, olon)]);
}

function route2(olat, olon, oname) {
    if (mroutex != null) {
        mmap.removeControl(mroutex);
        mroutex = null;
    }
    arrive = "";
    mroutex = L.Routing.control({
        waypoints: [
            L.latLng(lat, lon),
            L.latLng(olat, olon)
        ],
        lineOptions: {
            styles: [{ color: 'blue', opacity: 1, weight: 5 }]
        },
        createMarker: function () { return null; },
        routeWhileDragging: false,
        draggableWaypoints: false,
        collapsible: true
    }).addTo(mmap);
    arrive = oname;
    console.log(arrive);
    let s = new Date().toLocaleString();
    console.log(s);
    solat = olat;
    solon = olon;
    keepLocation =null;
    keepLocation = setInterval(() => {getLocation2();}, 5000);
}

function route3(olat, olon, oname) {
    if (croutex != null) {
        cmap.removeControl(croutex);
        croutex = null;
    }
    arrive = "";
    croutex = L.Routing.control({
        waypoints: [
            L.latLng(lat, lon),
            L.latLng(olat, olon)
        ],
        lineOptions: {
            styles: [{ color: 'blue', opacity: 1, weight: 5 }]
        },
        createMarker: function () { return null; },
        routeWhileDragging: false,
        draggableWaypoints: false,
        collapsible: true
    }).addTo(cmap);
    arrive = oname;
    console.log(arrive);
    let s = new Date().toLocaleString();
    console.log(s);
    solat = olat;
    solon = olon;
    keepLocation =null;
    keepLocation =setInterval(() => {getLocation2();}, 5000);
}
function route4(olat, olon, oname) {
    if (troutex != null) {
        tmap.removeControl(troutex);
        troutex = null;
    }
    arrive = "";
    troutex = L.Routing.control({
        waypoints: [
            L.latLng(lat, lon),
            L.latLng(olat, olon)
        ],
        lineOptions: {
            styles: [{ color: 'blue', opacity: 1, weight: 5 }]
        },
        createMarker: function () { return null; },
        routeWhileDragging: false,
        draggableWaypoints: false,
        collapsible: true
    }).addTo(tmap);
    arrive = oname;
    console.log(arrive);
    let s = new Date().toLocaleString();
    console.log(s);
    solat = olat;
    solon = olon;
    keepLocation =null;
    keepLocation =setInterval(() => {getLocation2();}, 5000);
}
function route5(olat, olon, oname) {
    if (groutex != null) {
        gmap.removeControl(groutex);
        groutex = null;
    }
    arrive = "";
    groutex = L.Routing.control({
        waypoints: [
            L.latLng(lat, lon),
            L.latLng(olat, olon)
        ],
        lineOptions: {
            styles: [{ color: 'blue', opacity: 1, weight: 5 }]
        },
        createMarker: function () { return null; },
        routeWhileDragging: false,
        draggableWaypoints: false,
        collapsible: true
    }).addTo(gmap);
    arrive = oname;
    console.log(arrive);
    let s = new Date().toLocaleString();
    console.log(s);
    solat = olat;
    solon = olon;
    keepLocation =null;
    keepLocation =setInterval(() => {getLocation2();}, 5000);
}

function arr() {
    console.log("XX停車場");
    var day = new Date();
    console.log(day)
}

function setGogoroPoint(slat, slon, sname, saddress) {
    L.marker([slat, slon]).addTo(gmap).bindPopup(`站名:` + sname + `<br />地址:` + saddress
        + `<br /><button onclick="route5(${slat},${slon},'${sname}')" id = "abtn">前往</button>`);
}

function setTeslaPoint(slat, slon, sname, saddress, scount, sopentime) {
    L.marker([slat, slon]).addTo(tmap).bindPopup(`站名:` + sname + `<br />地址:` + saddress + `<br />充電樁數目:` + scount + `<br />開放時間:` + sopentime
        + `<br /><button onclick="route4(${slat},${slon},'${sname}')" id = "abtn">前往</button>`);
}

function tesla() {
    $(document.getElementById("gmap")).css('display', 'none');
    $(document.getElementById("tmap")).css('display', 'block');
    $(document.getElementById("cmap")).css('display', 'none');
}
function gogoro() {
    $(document.getElementById("tmap")).css('display', 'none');
    $(document.getElementById("gmap")).css('display', 'block');
    $(document.getElementById("cmap")).css('display', 'none');
}
function charge_parking() {
    $(document.getElementById("tmap")).css('display', 'none');
    $(document.getElementById("gmap")).css('display', 'none');
    $(document.getElementById("cmap")).css('display', 'block');
}

function motor() {
    $(document.getElementById("map")).css('display', 'none');
    $(document.getElementById("mmap")).css('display', 'block');
}
function car() {
    $(document.getElementById("mmap")).css('display', 'none');
    $(document.getElementById("map")).css('display', 'block');
}


function getChargeData() {
    getChargeXhr.addEventListener("load", setChargeData);
    getChargeXhr.open("GET", eleUrl);
    getChargeXhr.send();
}

function setChargeData() {
    var jsData = getChargeXhr.responseText;
    var myData = JSON.parse(jsData);
    myData.Data.forEach(obj => {
        // console.log(obj);
        L.marker([obj.Latitude, obj.Longitude]).addTo(cmap).bindPopup(obj.Name + `<br />地址:<br />` + obj.Address
            + `<br />充電樁數目:&nbsp` + obj.StationCount + `<br />開放時間:&nbsp` + obj.OpenRange
            + `<br /><button onclick="route3(${obj.Latitude},${obj.Longitude},'${obj.Name}')" id = "abtn">前往</button>`
        );
    })
    // $(document.getElementById('cmap')).css('display', 'none');
}

function getParkingData() {
    getStaticParkingXhr.addEventListener("load", setStaticParkingData);
    getStaticParkingXhr.open("GET", staticParkingUrl);
    getStaticParkingXhr.send();
}

function setStaticParkingData() {
    var jsData = getStaticParkingXhr.responseText;
    var myData = JSON.parse(jsData);
    for (let i = 0; i < myData.length; i++) {
        spa[i] = myData[i].ID;
        spaX[i] = myData[i].X;
        spaY[i] = myData[i].Y;
    }

    myData.forEach(obj => {
        if (dynamicParkingUrl.length <= 1000) {
            dynamicParkingUrl += obj.ID + "%2C";
        }
        else if (dynamicParkingUrl2.length <= 1000) {
            dynamicParkingUrl2 += obj.ID + "%2C";
        }
        else if (dynamicParkingUrl3.length <= 1000) {
            dynamicParkingUrl3 += obj.ID + "%2C";
        }
        else if (dynamicParkingUrl4.length <= 1000) {
            dynamicParkingUrl4 += obj.ID + "%2C";
        }
        else if (dynamicParkingUrl5.length <= 1000) {
            dynamicParkingUrl5 += obj.ID + "%2C";
        }
        else {
            dynamicParkingUrl6 += obj.ID + "%2C";
        }
    })
    // console.log(dynamicParkingUrl);
    getDynamicParkingDataTotal();
    $(document.getElementById('mmap')).css('display', 'none');
}


function getDynamicParkingDataTotal() {
    getDynamicParkingData();
    getDynamicParkingData2();
    getDynamicParkingData3();
    getDynamicParkingData4();
    getDynamicParkingData5();
    getDynamicParkingData6();
}

function getDynamicParkingData() {
    getDynamicParkingXhr.addEventListener("load", setDynamicParkingData);
    getDynamicParkingXhr.open("GET", dynamicParkingUrl);
    getDynamicParkingXhr.send();
}

function setDynamicParkingData() {
    var jsData = getDynamicParkingXhr.responseText;
    var myData = JSON.parse(jsData);
    for (let i = 0; i < myData.length; i++) {
        for (let j = 0; j < spa.length; j++) {
            if (myData[i].ID == spa[j]) {
                if (myData[i].AvailableCar > 0) {
                    // let d1 = L.latLng([spaY[j], spaX[j]]);
                    // let d2 = L.latLng(lat,lon);
                    // if (d1.distanceTo(d2) <= 1000){}
                    L.marker([spaY[j], spaX[j]]).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp` + myData[i].AvailableCar + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                if (myData[i].AvailableMotor > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp` + myData[i].AvailableMotor + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
            }
        }
    }
}

function getDynamicParkingData2() {
    getDynamicParkingXhr2.addEventListener("load", setDynamicParkingData2);
    getDynamicParkingXhr2.open("GET", dynamicParkingUrl2);
    getDynamicParkingXhr2.send();
}

function setDynamicParkingData2() {
    var jsData = getDynamicParkingXhr2.responseText;
    var myData = JSON.parse(jsData);
    for (let i = 0; i < myData.length; i++) {
        for (let j = 0; j < spa.length; j++) {
            if (myData[i].ID == spa[j]) {
                if (myData[i].AvailableCar > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp` + myData[i].AvailableCar + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                       
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                if (myData[i].AvailableMotor > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp` + myData[i].AvailableMotor + `<br>付費方式:<br>${myData[i].PayEX}`
                       
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
            }
        }
    }
}

function getDynamicParkingData3() {
    getDynamicParkingXhr3.addEventListener("load", setDynamicParkingData3);
    getDynamicParkingXhr3.open("GET", dynamicParkingUrl3);
    getDynamicParkingXhr3.send();
}

function setDynamicParkingData3() {
    var jsData = getDynamicParkingXhr3.responseText;
    var myData = JSON.parse(jsData);
    for (let i = 0; i < myData.length; i++) {
        for (let j = 0; j < spa.length; j++) {
            if (myData[i].ID == spa[j]) {
                if (myData[i].AvailableCar > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp` + myData[i].AvailableCar + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                if (myData[i].AvailableMotor > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp` + myData[i].AvailableMotor + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
            }
        }
    }
}

function getDynamicParkingData4() {
    getDynamicParkingXhr4.addEventListener("load", setDynamicParkingData4);
    getDynamicParkingXhr4.open("GET", dynamicParkingUrl4);
    getDynamicParkingXhr4.send();
}

function setDynamicParkingData4() {
    var jsData = getDynamicParkingXhr4.responseText;
    var myData = JSON.parse(jsData);
    for (let i = 0; i < myData.length; i++) {
        for (let j = 0; j < spa.length; j++) {
            if (myData[i].ID == spa[j]) {
                if (myData[i].AvailableCar > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp` + myData[i].AvailableCar + `<br>付費方式:<br>${myData[i].PayEX}`
                       
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                       
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                if (myData[i].AvailableMotor > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp` + myData[i].AvailableMotor + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
            }
        }
    }
}

function getDynamicParkingData5() {
    getDynamicParkingXhr5.addEventListener("load", setDynamicParkingData5);
    getDynamicParkingXhr5.open("GET", dynamicParkingUrl5);
    getDynamicParkingXhr5.send();
}

function setDynamicParkingData5() {
    var jsData = getDynamicParkingXhr5.responseText;
    var myData = JSON.parse(jsData);
    for (let i = 0; i < myData.length; i++) {
        for (let j = 0; j < spa.length; j++) {
            if (myData[i].ID == spa[j]) {
                if (myData[i].AvailableCar > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp` + myData[i].AvailableCar + `<br>付費方式:<br>${myData[i].PayEX}`
                       
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                       
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                if (myData[i].AvailableMotor > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp` + myData[i].AvailableMotor + `<br>付費方式:<br>${myData[i].PayEX}`
                      
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                     
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
            }
        }
    }
}

function getDynamicParkingData6() {
    getDynamicParkingXhr6.addEventListener("load", setDynamicParkingData6);
    getDynamicParkingXhr6.open("GET", dynamicParkingUrl6);
    getDynamicParkingXhr6.send();
}

function setDynamicParkingData6() {
    var jsData = getDynamicParkingXhr6.responseText;
    var myData = JSON.parse(jsData);
    for (let i = 0; i < myData.length; i++) {
        for (let j = 0; j < spa.length; j++) {
            if (myData[i].ID == spa[j]) {
                if (myData[i].AvailableCar > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp` + myData[i].AvailableCar + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(map).bindPopup(myData[i].CName
                        + `<br>汽車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route1(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                if (myData[i].AvailableMotor > 0) {
                    L.marker([spaY[j], spaX[j]]).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp` + myData[i].AvailableMotor + `<br>付費方式:<br>${myData[i].PayEX}`
                     
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
                else {
                    L.marker([spaY[j], spaX[j]], { icon: redIcon }).addTo(mmap).bindPopup(myData[i].CName
                        + `<br>機車剩餘車位:&nbsp 0` + `<br>付費方式:<br>${myData[i].PayEX}`
                        
                        + `<br><button onclick="route2(${spaY[j]}, ${spaX[j]},'${myData[i].CName}')" id = "abtn">前往</button>`);
                }
            }
        }
    }
}