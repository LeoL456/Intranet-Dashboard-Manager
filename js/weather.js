/* $(document).ready(function(){

    //GEO ON CLICK
    $("#geo").on("click", function(){
            var long;
            var lat;
            var swap = true;
      
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position) {

                    lat = position.coords.latitude;
                    lon = position.coords.longitude;
          
                        //API variable with geolocation
                    var apiGeo = "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lon +   "&lang=fr&APPID=e6b88e356d8e6ddb4de648c62a1eaf63&units=imperial"
                  $.getJSON(apiGeo, function(data){
                        //Call WEATHER APP API
                          var description = data.weather[0].description;
                    var tempFa = Math.floor(data.main.temp);
                    var windSpeed = data.wind.speed;
                    var city = data.name + ", " + data.sys.country;
                    var tempCe = Math.floor((tempFa - 32) * .5556);
                    var humidity = data.main.humidity;
                    var icon = data.weather[0].icon;
                    var tempMinF = Math.floor(data.main.temp_min)
                    var tempMaxF = Math.floor(data.main.temp_max)
                    var tempMinC = Math.floor((tempMinF - 32) * .5556)
                    var tempMaxC = Math.floor((tempMaxF - 32) * .5556)
                    var windSpeedKMn = Math.floor((windSpeed)* 1.61)
                    var windSpeedKM = Math.round(windSpeedKMn * 100) / 100
    	
                    $("#input").val("").blur();
                    $("#city").html(city);
                    $("#tempFa").html(tempCe + " &#8451");
                    $("#minMax").html(tempMinC + "/" + tempMaxC + " &#8451");
                    $("#description").html(description);
                    $("#windSpeed").html(windSpeedKM + " km/h");
                    $("#humidity").html(humidity + "%");
                    $("#icon").html("<img class=\"weather-icon \" src='http://openweathermap.org/img/wn/" + icon + ".png'>");
                    $(".swap").html("<button>&#8451 </button>");
                    $("#secondInfo").css("display", "grid");

                    //CHANGING FROM F to C
                    $(".swap").on("click", function(){
                        if (swap === true){
                            $(this).html("<button> &#8457 </button>")
                            $("#tempFa").html(tempCe + " &#8451;");
                            $("#minMax").html(tempMinC + "/" + tempMaxC + " &#8451;");
                            $("#windSpeed").html(windSpeedKM + " km/h");
                            swap = false;
                        } else {
                            $(this).html("<button>&#8451 </button>")
                            $("#tempFa").html(tempFa + " &#8457;");
                            $("#minMax").html(tempMinF + "/" + tempMaxF + " &#8457;");
                            $("#windSpeed").html(windSpeed + " mph");
                            swap = true;
                        }
                    })
                });
              });
            }
    })

    $('input').on("keypress", function(event){    
        if(event.keyCode===13){
           $('#search').trigger('click')

        }
    });

    $("#search").on("click", function(){

        var input = $("#input").val()
        var apiInput = "https://api.openweathermap.org/data/2.5/weather?q=" + "Orgeval" + "&lang=fr&APPID=e6b88e356d8e6ddb4de648c62a1eaf63&units=imperial";
        var swap = true;

        $.getJSON(apiInput, function(data){
            var description = data.weather[0].description;
            var tempFa = Math.floor(data.main.temp);
            var windSpeed = data.wind.speed;
            var city = data.name + ", " + data.sys.country;
            var tempCe = Math.floor((tempFa - 32) * .5556);
            var humidity = data.main.humidity;
            var icon = data.weather[0].icon;
            var tempMinF = Math.floor(data.main.temp_min)
            var tempMaxF = Math.floor(data.main.temp_max)
            var tempMinC = Math.floor((tempMinF - 32) * .5556)
            var tempMaxC = Math.floor((tempMaxF - 32) * .5556)
            var windSpeedKMn = Math.floor((windSpeed)* 1.61)
            var windSpeedKM = Math.round(windSpeedKMn * 100) / 100

            $("#input").val("").blur();
            $("#city").html(city);
            $("#tempFa").html(tempCe + " &#8451");
            $("#minMax").html(tempMinC + "/" + tempMaxC + " &#8451");
            $("#description").html(description);
            $("#windSpeed").html(windSpeedKM + " km/h");
            $("#humidity").html(humidity + "%");
            $("#icon").html("<img class=\"weather-icon \" src='http://openweathermap.org/img/wn/" + icon + ".png'>");
            $(".swap").html("<button>&#8451 </button>");
            $("#secondInfo").css("display", "grid");


            //CHANGING FROM F to C
            $(".swap").on("click", function(){
                if (swap === true){
                    $(this).html("<button> &#8457 </button>")
                    $("#tempFa").html(tempFa + " &#8457;");
                    $("#minMax").html(tempMinF + "/" + tempMaxF + " &#8457;");
                    $("#windSpeed").html(windSpeed + " mph");
                    swap = false;
                } else {
                    $(this).html("<button>&#8451 </button>")
                    $("#tempFa").html(tempCe + " &#8451;");
                    $("#minMax").html(tempMinC + "/" + tempMaxC + " &#8451;");
                    $("#windSpeed").html(windSpeedKM + " km/h");
                    swap = true;
                }
            })
        });
    })
});

 */
/* 
    A local weather widget that pulls data from openweathermap.org

    SVG and background image will change to reflect day/night & conditions

    C/F conversion when temp is clicked
           
*/

let isCelsius = true;
let date = new Date();
let today = date.getHours();

// Pull api from openweathermap.org 
const getApiUrl = (lat, lon) => 'https://api.openweathermap.org/data/2.5/weather?lat=' + lat + '&lon=' + lon + '&lang=fr&appid=2bcc4123a99bf9b75c11673b0029ea8a';

const geoSuccess = position => {
    startPos = position;
    lat = startPos.coords.latitude;
    lon = startPos.coords.longitude;

    // Call the api and fetch the local weather
    makeRequest('GET', getApiUrl(lat, lon), handleWeather);
};

// Request server data
const makeRequest = (type, url, callback) => {
    const req = new XMLHttpRequest();
    let response = '';

    req.open(type, url, true);

    // Confirm response is ready (200: "OK")
    req.onreadystatechange = () => {
        if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {
            callback(req.responseText);
        }
    }
    req.send(null);
};

const setNodeContents = (node, content) => {
    document.querySelector(node).innerHTML = content;
}

// Round temp to nearest decimal
const formatTemp = x => Number.parseFloat(x).toFixed(1);

// Fill with fetched data
const updateTempDashboard = (city, country, temp, desc) => {
    document.querySelector('#loading').remove();
    setNodeContents('.city', city);
    setNodeContents('.country', `, ${country}`);
    setNodeContents('.temp', `${temp} ºC`);
    setNodeContents('.desc', desc);
}

// ºC and ºF conversions
const getCelsius = tempKelvin => formatTemp(tempKelvin - 273);
const getFahrenheit = tempKelvin => formatTemp(1.8 * (tempKelvin - 273) + 32);

// Conversion toggle
const handleToggleTemp = () => {
    console.log('clicked');
    if (isCelsius) {
        setNodeContents('.temp', tempF + ' ºF');
    } else {
        setNodeContents('.temp', tempC + ' ºC');
    }
    isCelsius = !isCelsius;
}

// Set data variables
const handleWeather = (data) => {
    // console.log(data);
    const obj = JSON.parse(data);
    city = obj.name;
    country = obj.sys.country;
    tempKelvin = obj.main.temp;
    tempF = getFahrenheit(tempKelvin);
    tempC = getCelsius(tempKelvin);
    tempDescription = obj.weather[0].main;

    document.querySelector('.temp').addEventListener('click', handleToggleTemp);

    updateTempDashboard(city, country, tempC, tempDescription);

    // Select background image and icon based on tempDescription & current time
    let image = document.getElementById("icon");

    if (tempDescription === "Rain") {
        if (today >= 7 && today <= 19) {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821722/rainy-1.svg";
        }
        else {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821730/rainy-7.svg";
        }

    } else if (tempDescription === "Thunderstorm") {
        if (today >= 7 && today <= 19) {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821752/thunder.svg";
        }
        else {

        }

    } else if (tempDescription === "Snow") {
        if (today >= 7 && today <= 19) {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821749/snowy-3.svg";
        }
        else {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821752/snowy-6.svg";
        }

    } else if (tempDescription === "Clear") {
        if (today >= 7 && today <= 19) {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821710/day.svg";
        }
        else {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821712/night.svg";
        }

    } else if (tempDescription === "Clouds") {
        if (today >= 7 && today <= 19) {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821701/cloudy-day-2.svg";
        }
        else {

            document.body.style.backgroundSize = "cover";
            image.src = "https://res.cloudinary.com/trobes/image/upload/v1537821702/cloudy-night-2.svg";
        }

    } else

        document.body.style.backgroundSize = "cover";
}


// Check for Geolocation support
if (navigator.geolocation) {
    window.onload = () => {

        navigator.geolocation.getCurrentPosition(geoSuccess);

    };

} else {
    alert('Geolocation is not supported! Check browser/os settings.');
}

