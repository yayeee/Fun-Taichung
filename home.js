// get the current hour
var currentHour = new Date().getHours();

// get the image element
var weatherBkg = document.getElementById("weatherBkg");



// set the source of the image based on the current hour
if (currentHour >= 5 && currentHour < 17) {

    weatherBkg.src = "./materials/weather/bluesky.jpg";
    goBkg.src = "./materials/goTravel/go-roadtrip5.jpg";

} else if (currentHour >= 17 && currentHour <= 18) {

    weatherBkg.src = "./materials/weather/evening-sunny2.webp";
    goBkg.src = "./materials/goTravel/go-roadtrip5.jpg";

} else {

    weatherBkg.src = "./materials/weather/nightsky-starry2.jpg";
    goBkg.src = "./materials/goTravel/go-roadtrip-night2.jpg";

}