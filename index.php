<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check the weather</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 100%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
            padding: 2px 16px;
        }
        .bord{
            list-style-type: square;
            display: block;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <!--<div class="col-sm-6" >
                <div style="margin-left: 10%;">
                  <h2>My home</h2>

                <div class="card" style="width: 80%;">
                <img src="4204145.jpg" class="img-fluid" alt="Avatar" style="width:100%; height: auto;">
                    <div class="container">
                        <p><h4><b>Weather</b></h4> </p>
                        <p><span id="name">Station : </span></p>
                        <p><span id="country">Country : </span></p>
                        <p><span id="temp">Temp : </span></p>
                        <p><span id="humidity">Humidity : </span></p>
                        <p><span id="sunrise">Sunrise : </span></p>
                        <p><span id="sunset">Sunset : </span></p>
                        <p><span id="windSpeed">Wind speed : </span></p>
                        <p><span id="windDegrees">Wind degrees : </span></p>
                        <p><span id="clouds">Clouds : </span></p>
                    </div>
                </div>  
                </div>
                

            </div>-->
            <div class="col-md-12" >
               
                
                <h2 style="text-align: center;">Watch the weather</h2>
                
                <div class="card" style="width: 40%; margin-left: auto;margin-right: auto;">
                    <table class="table" >
                        <thead>
                            <tr>
                                <td>
                                    <input type="text" id="latitude" class="form-control" len=20 value="8.385722" placeholder="Latitude">
                                </td>
                                <td>
                                    <input type="text" id="longitude" class="form-control" len=20 value="99.972066" placeholder="Longitude">
                                </td>
                                <td>
                                    <button type="submit" value="submit" class="btn  btn-primary" id="btnSearch">Load</button>
                                </td>
                                
                            </tr>
                        </thead>
                    </table>  
                <img src="https://www.centralpattana.co.th/storage/our-properties/shopping-center/central-plaza/nakornsithammarat/gallery/001.jpg" alt="Avatar" style="width:100%;height: auto;">
                    <div class="container-fluid" style=" height: 50%; ">
 
                        
                        <div id="hid" class="container">
                           <p><h4><b><span id="name">Weather at </span></b></h4></p> 
                            <!--<p><span id="name">Station : </span></p>-->
                            <p><span id="country">Country : </span></p>
                            <p><span id="temp">Temp : </span></p>
                            <p><span id="humidity">Humidity : </span></p>
                            <p><span id="sunrise">Sunrise : </span></p>
                            <p><span id="sunset">Sunset : </span></p>
                            <p><span id="windSpeed">Wind speed : </span></p>
                            <p><span id="windDegrees">Wind degrees : </span></p>
                            <p><span id="clouds">Clouds : </span></p>
                            <p><span id="now">Information update : </span></p>
                        </div>
                        <!--<div id="hid1" class="container">
                        
                            <p><span id="name_s">Station : </span></p>
                            <p><span id="country_s">Country : </span></p>
                            <p><span id="temp_s">Temp : </span></p>
                            <p><span id="humidity_s">Humidity : </span></p>
                            <p><span id="sunrise_s">Sunrise : </span></p>
                            <p><span id="sunset_s">Sunset : </span></p>
                            <p><span id="windSpeed_s">Wind speed : </span></p>
                            <p><span id="windDegrees_s">Wind degrees : </span></p>
                            <p><span id="clouds_s">Clouds : </span></p>
                        </div>    -->                  
                    </div>
                </div>             
            </div>
        </div>      
    </div>

    <script>
        
        function PullWeather(){
            var url = "https://api.openweathermap.org/data/2.5/weather?lat=8.385722&lon=99.972066&appid=a455c00476d1492900b85d3a61b5c51a&units=metric";
           
            $.getJSON(url)
                .done((data)=>{
                    console.log(data)
                    sunr(data.sys.sunrise);
                    suns(data.sys.sunset);
                    $("#name").append(data.name);
                    $("#country").append(data.sys.country);
                    $("#temp").append(data.main.temp+" celsius");
                    $("#humidity").append(data.main.humidity+" %");
                    //$("#sunrise").append(data.sys.sunrise);
                    //$("#sunset").append(data.sys.sunset);
                    $("#windSpeed").append(data.wind.speed+" ms");
                    $("#windDegrees").append(data.wind.deg+" degrees");
                    $("#clouds").append(data.clouds.all+" %");
                })
              /*  var sun = "https://api.sunrise-sunset.org/json?lat=8.385722&lng=99.972066&date=today"  
            $.getJSON(sun)
                .done((json)=>{
                    console.log(json)
                    $("#sunrise").append(json.results.sunrise);
                    $("#sunset").append(json.results.sunset);
                })
                .fail((xhr, status, err)=>{
                    console.log("error")
                })*/
                .fail((xhr, status, err)=>{
                    console.log("error")
                })
            
        }
        function search2(){
            
           
            var url2 = "https://api.openweathermap.org";
                var lat = $("#latitude").val();
                var lon = $("#longitude").val();
                url2 = url2 + "/data/2.5/weather?lat="+lat+"&lon="+lon+"&appid=a455c00476d1492900b85d3a61b5c51a&units=metric";
               
                if(lat>0){
                    
                    $("#hid").empty();
                }
              
                $.getJSON(url2)
                .done((data)=>{
                    console.log(data)
                    sunr(data.sys.sunrise);
                    suns(data.sys.sunset);
                        var update = datenow()
                    
                    var line = "<span>"
                        +"<p><h4><b><span>Weather at "+data.name+"</span></b></h4></p>"
                        //+"<p><h4><b>Weather</b></h4> </p> "
                        //+"<p><span>Station : "+data.name+"</span></p>"
                        +"<p><span>Country : "+data.sys.country+"</span></p>" 
                        +"<p><span>Temp : "+data.main.temp+" celsius </span></p>"
                        +"<p><span>Humidity : "+data.main.humidity+" %</span></p>"
                        +"<p><span>Sunrise : "+data.sys.sunrise+" unix</span></p>"
                        +"<p><span>Sunset : "+data.sys.sunset+" unix</span></p>"
                        +"<p><span>Wind speed : "+data.wind.speed+" ms</span></p>"
                        +"<p><span>Wind degrees : "+data.wind.deg+" degrees</span></p>"
                        +"<p><span>Clouds : "+data.clouds.all+" %</span></p>"
                        +"<p><span>Data update : "+update+"</span></p>"
                        "</span>"
                        $("#hid").append(line);
                     
                    })
                    
                .fail((xhr, status, err)=>{
                    console.log("error")
                })
                
        }
        
        function datenow(){
            let date = new Date();
            
            let hours = + date.getHours();
            let minutes = "0" + date.getMinutes();
            let seconds = "0" + date.getSeconds();
            let formattedTime =  hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
            console.log(formattedTime);
                $("#now").append(formattedTime);
                return this.formattedTime;
        }

        function sunr(d_time){
            let unix = d_time*1000;
            let date = new Date(unix);
            
            let hours = date.getHours();
            let minutes = "0" + date.getMinutes();
            let seconds = "0" + date.getSeconds();

            let formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
            var sunrise = formattedTime;
            console.log(formattedTime);
            
                $("#sunrise").append(formattedTime);
               
        }
        function suns(set_time){
            let unix = set_time*1000;
            let date = new Date(unix);

            let hours = date.getHours();
            let minutes = "0" + date.getMinutes();
            let seconds = "0" + date.getSeconds();
            let formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
            var sunset = formattedTime;
            console.log(formattedTime);
            
            $("#sunset").append(formattedTime);
        }
        
       

        function searchWithlatlon(){
                
                //$("#hid1").show();
                var url2 = "https://api.openweathermap.org";
                var lat = $("#latitude").val();
                var lon = $("#longitude").val();
                url2 = url2 + "/data/2.5/weather?lat="+lat+"&lon="+lon+"&appid=a455c00476d1492900b85d3a61b5c51a&units=metric";
                $.getJSON(url2)
                .done((data)=>{
                    console.log(data)
                    $("#name").append(data.name);
                    $("#country").append(data.sys.country);
                    $("#temp").append(data.main.temp+" celsius");
                    $("#humidity").append(data.main.humidity+" %");
                    $("#sunrise").append(data.sys.sunrise);
                    $("#sunset").append(data.sys.sunset);
                    $("#windSpeed").append(data.wind.speed+" ms");
                    $("#windDegrees").append(data.wind.deg+" degrees");
                    $("#clouds").append(data.clouds.all+" %");
                   
                })
                .fail((xhr, status, err)=>{
                    console.log("error")
                })
                
        }
        $(()=>{
            
            $("#hid1").hide();
            datenow();
            PullWeather();
            $("#btnSearch").click(()=>{
                //$("#hid").hide();
                
                search2();
               
            })
            
            
        })
        
    </script>
</body>
</html>
