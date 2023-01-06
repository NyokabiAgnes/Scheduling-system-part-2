<!DOCTYPE html>
<html>
<head>

<title>ABOUT US</title>
</style>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
<link rel="stylesheet" type="text/css" href="show.css" />

<style type="text/css">
    .about h1{
      text-align: center; 
      font-size: 40px;
      position: relative;
      color: black;

      font-family: 'Josefin Sans',sans-serif;
        }
        .paragraph p{
          background: url("");
          font-size: 50px;
          font-family: 'Josefin Sans',sans-serif;
          color:darkgrey;
          text-align: justify;
          margin-right: 400px;
          margin-left: 400px;


        }
        header{
        background: url("");
        height: 150px;
        background-size: cover;
        background-position: center center;
      }
      .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%;

}
}
</style>
</head>
<body>


<header>
  <div class="wrapper">
    <div class="images">
      <img src="" alt="">
      <div class="about">
        <h1> DSSS About us</h1>
        </div>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/melon.jpeg" style="width:100%; height: 500px;">
  <div class="text">Driving School Scheduling System(DSSS) is a program that can be accessed effectively and used through proper login enabled. This program enables the school to recommend their students for classes when they are available as well as the istructors. </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/Apple.jpeg" style="width:100%; height: 500px;">
  <div class="text">This ensures convinience to all the students and it gives them a good opportunity for them to attend classes according to their own schedules and availability. </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/banana.jpeg" style="width:100%; height: 500px;">
  <div class="text"> This system also gives the School an opportunity to recommend time for the students to attend class and inform tem if the schedule recommended has been changed of cancelled. </div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
        <img src="" width="500px" class="center">
      </div>
  


<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>

</div>
</header>
</body>
</html>