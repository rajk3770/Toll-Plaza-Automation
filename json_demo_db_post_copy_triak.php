<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
    background-image:"./pics.jpeg";
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.bgg {
  color: #4285F4;
  background-color: #111;
  padding: 5px 0px 5px 0px ; 
}

h1{
font-size:60px;
color:#111;
}

.forr{
  
}

</style>
</head>
<body class="forr">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 <div class="bgg"> <a href="#">Home</a></div>
  <a href="#">Services</a>
  <a href="#">Tolls</a>
  <a href="#">Contact</a>
</div>

<center><b><h1>#WeCode</h1>
<h3 class="bgg"><marquee>Toll ahead!</marquee></h3></b></center>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<center> <h3>All Tolls:</h3></center> 
</body>
</html> 



<?php
$lat=$_GET["lat"];
$long=$_GET["long"];
//echo $lat;
//echo $lat;
//header("Content-Type: application/json; charset=UTF-8");
//$obj = json_decode($_POST["x"], false);

$conn = new mysqli("localhost", "root", "your_password", "hackathon");
$res = $conn->query("SELECT * from toll") or die($conn->error);

//echo ($obj->latitude);
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


$outp = array();
$out1=array();
//=$res->fetch_array(MYSQLI_ASSOC)
//echo "List of all tolls";
while($va=$res->fetch_assoc())
{
    $out1=$va;
    echo "<center>".$out1["Name"]."<br></center>";
    
    if((distance(floatval($lat),floatval($long),floatval($va["latitude"]),floatval($va["longitude"]),"K"))>=2.0)
    {
    	
    	 $outp+=$va;
    	//echo $outp["Latitude"];

    }
    else
    {
    	//$outp="error";
    }
    //echo $va["Name"];
   
}
echo "<br><center> <h3>Tolls near you:</h3>   </center> 
";
$x= $outp["Name"] ;
echo "<center>".$x."</center>";
echo "<center><a href='./pay.html'>PAY</a></center><br>";
//echo "<center><a href='./qr code/QR_BarCode1.php'>GET QRcode</a></center><br>";
//echo "<center><a href='./Nexmo/index.php'>Send SMS</a></center>";

//echo ' is approaching';
//$outp[0]["a"] = "value"
//$outp = $res->fetch_all(MYSQLI_ASSOC);

//echo json_encode($outp);
include('./Nexmo/index.php');
$x=new SMS();
$x->sendSMS();


?>
