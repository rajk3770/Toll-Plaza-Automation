<html>
<head>
    <title>
        Database Connection
    </title>
</head>
<body>
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" id="uname" name="uname" required>
<br>
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" id="psw" name="psw" required>
        
      <button type="button" id="main" onclick="getLocation()">Login</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
         </div>
  </form>
</div>
    



  	<!--<button onclick="getLocation()">Try It</button>-->
	<p id="demo"></p>
    <div id="floating-panel">
      
      <input id="latlng" type="text" value="">
      <input id="submit" type="button" value="Reverse Geocode">
      
    </div>
    <div id="Address"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        $(document).ready{
            $('main').click(function(){
                  var obj1, dbParam, xmlhttp, myObj, x, txt = "";
                    obj1 = { 
                  "Username":(document.getElementById('uname').text),
                  "Password":(document.getElementById('psw').text)}
                console.log("getLocation");
                dbParam = JSON.stringify(obj1);
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 // console.log("Hi");
                  console.log(JSON.parse(this.responseText));

                 myObj = JSON.parse(this.responseText);
                 document.getElementById("Address").innerHTML += myObj.uname;

            }
      };
        xmlhttp.open("POST", "checklogin.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("x=" + dbParam);
      }
      } 
    var x = document.getElementById("demo");
    var ab,xy;
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;


		     xy=position.coords.latitude;
			 ab=position.coords.longitude;
       //xy=;
       //ab=124.07939014;
			var cd=xy+","+ab; 
			document.getElementById('latlng').value=cd;
			var geocoder = new google.maps.Geocoder;
	        var infowindow = new google.maps.InfoWindow;

			geocodeLatLng(geocoder,infowindow);
      var ef= new Date().toLocaleTimeString();
      document.getElementById('time').innerHTML ="" +ef;

			
		}
       

        function geocodeLatLng(geocoder, infowindow) {
        var input = document.getElementById('latlng').value;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        

        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {

                var obj, dbParam, xmlhttp, myObj, x, txt = "";
                obj = { 
                  "name":"Hello",
                  "latitude": xy , 
                  "longitude":ab,
                  "Address":""+(results[0].formatted_address)};
                console.log("getLocation");
                dbParam = JSON.stringify(obj);
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 // console.log("Hi");
                  console.log(JSON.parse(this.responseText));

                 myObj = JSON.parse(this.responseText);
                 document.getElementById("Address").innerHTML += myObj.Name;

        //console.log("hi");
       /* for (x in myObj) {
            txt += myObj[x].name + "<br>";*/
                  for(i=0; i<myObj.length; i++)
                  {
                    //console.log("Hi");
                    
                  }
    }
};
xmlhttp.open("POST", "json_demo_db_post.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
            }
            else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY">
    </script>

    <div id="text"></div>
    <div id="time"></div>
  </body>
