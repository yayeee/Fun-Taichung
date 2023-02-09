
var viewmap = document.getElementById("viewmap");
var vroutex = null;
var arrive = "";
var lat = 24.15195410226608;
var lon = 120.6513409227563;

var orangeIcon = L.icon({
    iconUrl: './pic/orange_icon.png',

    iconSize:     [25, 40], // size of the icon
    iconAnchor:   [20, 20], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -45] // point from which the popup should open relative to the iconAnchor
});

function setViewPoint(slat, slon, sname, sopentime ,sphone,spic) {
    L.marker([slat, slon]).addTo(viewmap).bindPopup(`名稱:` + sname + `<br />營業時間:` + sopentime +`<br />電話:`+sphone +`<br /><input type="image" src="${spic}" width="100px">`
        + `<br /><button onclick="route6(${slat},${slon},'${sname}')" id = "abtn">導航</button>`);
}

function seteViewPoint(slat, slon, sname, sopentime ,sphone,spic) {
    L.marker([slat, slon], {icon: orangeIcon}).addTo(viewmap).bindPopup(`餐廳:` + sname + `<br />營業時間:` + sopentime +`<br />電話:`+sphone +`<br /><input type="image" src="${spic}" width="100px">`
        + `<br /><button onclick="route6(${slat},${slon},'${sname}')" id = "abtn">前往</button>`);
}

function viewmap_ini(){
    viewmap = L.map('viewmap').setView([lat, lon], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(viewmap);
}


function route6(olat, olon, oname) {
    if (vroutex != null) {
        viewmap.removeControl(vroutex);
        vroutex = null;
    }
    arrive = "";
    vroutex = L.Routing.control({
        waypoints: [
            L.latLng(lat, lon),
            L.latLng(olat, olon)
        ],
        lineOptions: {
            styles: [{ color: 'Navy', opacity: 1, weight: 5 }]
        },
        createMarker: function() { return null; },
        routeWhileDragging: false,
        draggableWaypoints: false,
        collapsible: true
    }).addTo(viewmap);
    arrive = oname;
    console.log(arrive);
    let s= new Date().toLocaleString();
    console.log(s);
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
    viewmap.flyTo(new L.LatLng(lat, lon), 15);
    L.marker([lat, lon]).addTo(viewmap).bindPopup(`&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp現在位置`).openPopup();
}
function showError(error) {
    alert("定位取得失敗");
}