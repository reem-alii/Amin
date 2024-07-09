// geolocation code
let latitude=37.77493000;
let longitude=-122.41942000;
function showNotification(message) {
    const notificationContainer = document.getElementById('notification-container-c');
    const notificationMessage = document.getElementById('notification-message-c');
    notificationMessage.textContent = message;
    notificationContainer.classList.remove('hidden-c');
}
  //  hide custom notification
function hideNotification() {
    const notificationContainer = document.getElementById('notification-container-c');
    notificationContainer.classList.add('hidden-c');
}
  //  close the notification
document.getElementById('close-notification-c').addEventListener('click', hideNotification);

  // Check if geolocation is available
    if ("geolocation" in navigator) {
    navigator.geolocation.watchPosition(function(position) {
        console.log(latitude,longitude);
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;
    }, function(error) {
      // Handle permission denied error
    if (error.code === error.PERMISSION_DENIED) {
        console.error("User denied the request for Geolocation.");
        // Display a custom notification to the user
        showNotification("Allow location access for accurate weather updates. Otherwise, the forecast will default to San Francisco.");
    } else {
        // Handle other errors
    switch(error.code) {
        case error.POSITION_UNAVAILABLE:
            console.error("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            console.error("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            console.error("An unknown error occurred.");
            break;
        }
    }
    });
} else {
    console.error("Geolocation is not supported by this browser.");
}

// Fetching the api response
async function weatherBalloon(lat, lon) {
    // API key
    const key = 'aaf3430f61ac73a6d7b3cf283e5d3ddc';
    try{
        const response = await fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${key}&units=metric`);
        const json = await response.json();
        // Display api response in console
        console.log(json);
        // Call drawWeather() function responsible for displaying the weather information which takes the API response as parameter
        drawWeather(json);
    }
    catch(error){
        console.log(error)
    };
}
// Calling the function with correct city coordinates
window.onload = function() {
    weatherBalloon(latitude, longitude);
}
// Function to round up the temperatures
// NOTE: Only works for small numbers
function tempUP(temp){
    return temp | 0;
}
// Gets the full date for the date field
function getDate(value){
    let date = new Date(value);
    const days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    let day = date.getDay();
    let month = date.getMonth();
    let time = days[day] + ' ' + months[month] + ', ' + date.getDate();
    return time;
}
// Convert UNIX timestaps to human time for the sunrise and sunset fields
function getUnixTime(unix){
    let unix_ms = new Date(unix * 1000);
    let hour = `${unix_ms.getHours()}` < 10? + "0" + `${unix_ms.getHours()}` : `${unix_ms.getHours()}`;
    let min = `${unix_ms.getMinutes()}` < 10? + "0" + `${unix_ms.getMinutes()}` : `${unix_ms.getMinutes()}`;
    let time = hour + ':' + min;
    return time;
}
// Gets the day and time for the middle grid
function getTime(value){
    let date = new Date(value);
    const days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
    let day = date.getDay();
    let hour = `${date.getHours()}` < 10? + "0" + `${date.getHours()}` : `${date.getHours()}`;
    let min = `${date.getMinutes()}` < 10? + "0" + `${date.getMinutes()}` : `${date.getMinutes()}`;
    let time = days[day] + '<br> ' + hour + ':' + min;
    return time;
}
// END --->
// This function is responsible for populating all the weather data
function drawWeather(json){
    // Populate the left weather data
    document.getElementById('date').textContent = getDate(json.list[0].dt_txt);
	document.getElementById('description').textContent = json.list[0].weather[0].description;
    document.getElementById('location').textContent = json.city.name + ', ' + json.city.country;
	document.getElementById('avg-temp').textContent = `${tempUP(json.list[0].main.temp)}`;
    // Populate the right weather details
    document.getElementById('wind').textContent = json.list[0].wind.speed;
    document.getElementById('humidity').textContent = json.list[0].main.humidity;
    document.getElementById('pressure').textContent = json.list[0].main.pressure;
    document.getElementById('clouds').textContent = json.list[0].clouds.all;
    document.getElementById('rise').textContent = getUnixTime(json.city.sunrise);
    document.getElementById('set').textContent = getUnixTime(json.city.sunset);
    // Populate the middle grid with timesatamps and their respective temperatures
    for (let index = 1; index <= 12; index++) {
        document.getElementById(`${index}`).innerHTML = getTime(json.list[index*3].dt_txt);
    }
    for (let index = 13; index <= 24; index++) {
        document.getElementById(`${index}`).textContent = tempUP(json.list[(index-12)*3].main.temp);
        
    }
    // Populate the middle grid with their respective icons
    
    for (let index = 25; index <= 36; index++) {
        document.getElementById(`${index}`).src = `images/weather-icons/${json.list[(index-24)*3].weather[0].description}.svg`
        document.getElementById(`${index}`).alt = `${json.list[(index-24)*3].weather[0].description}.png`
    }
    document.getElementById('weather-icon').src = `images/weather-icons/${json.list[0].weather[0].description}.svg`
    document.getElementById('weather-icon').alt = `${json.list[0].weather[0].description}.png`

}