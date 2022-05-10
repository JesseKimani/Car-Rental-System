<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clients page</title>

    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
  margin: 10px 130px 15px 4px;
  padding: 0;
  box-sizing: border-box;
  scroll-padding-top: 2rem;
  scroll-behaviour: smooth;
  list-style: none;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}

:root {
  --main-color: #fe5b3d;
  --second-color: #ffac38;
  --text-color: #444;
  --gradient: linear-gradient(#fe5b3d, #ffac38);
}

html::-webkit-scrollbar {
  width: 0.5rem;
}
html::-webkit-scrollbar-track {
  background: transparent;
}
html::-webkit-scrollbar-thumb {
  background: var(--main-color);
  border-radius: 5rem;
}

section {
  padding: 50px 100px;
}
header {
  position: fixed;
  width 100%;
  top: 0;
  right:0;
  z-index: 1000;
  display: flex;
  align-items: center;
  justify-content:space-between;
  background: #eeeff1;
  padding: 15px 100px;
}
.logo img {
  width: 40px;
}
.navbar {
  display: flex;
}
.navbar li {
  position: relative;
}
.navbar a {
  font-size: 1rem;
  padding: 10px 20px;
  color: var(--text-color);
  font-weight:500;
}
.navbar a::after{
  content: "";
  width: 0;
  height: 3px;
  background: var(--gradient);
  position: absolute;
  bottom: -4px;
  left: 0;
  transition: 0.5s;
}
.home{
  width: 100%;
  min-height: 100vh;
  position:relative;
  background:url(images/bg.png);
  background-repeat: no-repeat;
  background-position: center right;
  background-size: cover;
  display:grid;
  align-items: center;
  grid-template-columns: repeat(2,1fr);
}
.text h1{
  font-size: 3.5rem;
  letter-spacing: 2px;
}
.text span{
  color: var(--main-color);
}
.text p{
  margin: 00.5rem 0 1rem;
}
.app-stores img{
  width: 100px;
  margin-right: 1rem;
  cursor: pointer;
}

        </style>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>
<body>

<script>

  </script>

<header>
<a href="#" class="logo"> <img src="{{URL::asset('/images/jeep.png')}}" alt=""> </a>
<div class="bx bx-menu" id="menu-icon"></div>
<ul class="navbar">

<button id="viewCars"/>
    <script>
      document.getElementById("viewCars").addEventListener("click", myFunction);
      function myFunction() {
        window.location.href="availablecars";
      }
    </script>Check Available Cars</button>

<button id="viewFeedback"/>
    <script>
      document.getElementById("viewFeedback").addEventListener("click", myFunction);
      function myFunction() {
        window.location.href="receivedfeedback";
      }
    </script>Reviews</button>

<button id="logout"/>
    <script>
      document.getElementById("logout").addEventListener("click", myFunction);
      function myFunction() {
        window.location.href="homepage";
      }
    </script>Log Out</button>
  
</ul>

</header>

<section class="home" id="home">
  <div class="text">
    <h1><span>Safaris</span> Car Hire <br>Company</h1>
    <p>Get the best car for you</p>
    <div class="app-stores">
    <img src="{{ URL::to('/images/ios.png') }} ">
<img src="{{ URL::to('/images/play.png') }} " >
    </div>
  </div>
</section>

 <div>

</div>
    </div>



</body>
</html>