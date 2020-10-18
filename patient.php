<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: index1.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" class="rel">
    <link rel="stylesheet" href="responsive.css" class="rel">
    <title>Nearby Hospital</title>
</head>
<body>
<nav class="navbar h-nav-resp" style="background: black; position: relative;">
    <ul class="nav-list v-class-resp">
        <div class="logo"><img src="logo.png" alt="logo"></div>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="index1.php">Dashboard</a></li>
        <li><a href="ambulance.php">Book an Ambulance</a></li>
        <li><a href="logout.php">Logout</a></li>    
    </ul>
    <div class="rightNav v-class-resp">
    <img src="https://img.icons8.com/metro/26/000000/guest-male.png"><font color="white"> <?php echo "Welcome, ". $_SESSION['username']?></font>
    <div class="date"></div>
  </div>
    <div class="burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</nav>
<section style="height: 80vh; height: 80vh;
    position: relative;
    top: 90px;
    left: 70px;
}">
    <button onclick="getLocation()">Share your location</button>
        <div id="output"></div>
        <div class="card a"><i class="fa fa-tachometer"></i><h5>Total no of empty beds available - 54</h5><span id="active"></span></div>
      <div class="card ca"><i class="fa fa-th-list"></i><h5>Total no of empty beds available - 54</h5><span id="cases"></span></div>
      <div class="card cr"><i class="fa fa-times-circle"></i><h5>Total no of empty beds available - 82</h5><span id="critical"></span></div>
      <div class="card d"><i class="fa fa-times"></i><h5>Total no of empty beds available -11</h5><span id="death"></span></div>
      <div class="card r"><i class="fa fa-check-square-o"></i><h5>Total no of empty beds available - 12</h5><span id="recovered"></span></div>
      <div class="card t"><i class="fa fa-eye"></i><h5>Total no of empty beds available - 18</h5><span id="tests"></span></div>
    </div>
</section>
    <script>
        var x = document.getElementById('output');
        var longitude,latitude;
        
        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        }

        

        function showPosition(position) {
        latitude = position.coords.latitude; 
        longitude = position.coords.longitude;
        x.innerHTML = "Now sending your coordinates";
        x.innerHTML = longitude + " " + " " + latitude;
        
        var url = 'https://cors-anywhere.herokuapp.com/https://services.gisgraphy.com/geoloc/search?lat='+latitude+'&lng='+longitude+'&radius=7000&placetype=hospital&format=json';
        fetch(url)
  .then((response) =>
   {
    return response.json();
  }
  )
  .then((data) => {
    console.log(data);
    var json = data;
    document.getElementById("output").innerHTML = data.result[0].name;    
    document.getElementById("active").innerHTML = data.result[1].name;
    document.getElementById("cases").innerHTML = data.result[2].name;
    document.getElementById("critical").innerHTML = data.result[3].name;
    document.getElementById("death").innerHTML = data.result[4].name;
    document.getElementById("recovered").innerHTML = data.result[5].name;
    document.getElementById("tests").innerHTML =" ";
    
  });
        }
           
    </script>
    <script type="text/javascript" src="resp.js"></script>
<script type="text/javascript" src="main.js"></script> 
    <section>
      <div class="main-content">
          <div class="left box" style="background: black;
          color: white;">
            <h2>
    About us</h2>
    <div class="content">
              <p> TheVirus.org is a service built just for the people so that people can get correct and authentic information at a single place in a hasslefree manner in this pandemic situation.</p>
    <div class="social">
                <a href="https://facebook.com/"><span class="fab fa-facebook-f"></span></a>
                <a href="#"><span class=""></span></a>
                <a href="https://instagram.com/"></a><span class="fab fa-instagram"></span></a>
                <a href="https://youtube.com/c/"><span class="fab fa-youtube"></span></a>
              </div>
    </div>
    </div>
    <div class="center box" style="background: black;
    color: white;">
            <h2>
    Address</h2>
    <div class="content">
              <div class="place">
                <span class="fas fa-map-marker-alt"></span>
                <span class="text">Jadavpur University, Kolkata</span>
              </div>
    <div class="phone">
                <span class="fas fa-phone-alt"></span>
                <span class="text">+91 9432067721</span>
              </div>
    <div class="email">
                <span class="fas fa-envelope"></span>
                <span class="text">khanradeeptansu@gmail.com</span>
              </div>
    </div>
    </div>
    <div class="right box" style="background: black;
    color: white;">
            <h2>Quick Links</h2>
    <div class="content">
      <li><a href="#">Home</a></li><br>
      <li><a href="index1.php">Dashboard</a></li><br>
      <li><a href="ambulance.php">Book an Ambulance</a></li><br>
      <li><a href="logout.php">Logout</a></li><br>
      <li><a href="about.html">About</a></li><br>
    </div>
              
                  
    
  </section>
</body>
</html>
