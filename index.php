   <?php
include "config/detaiProject.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
      <title>
     PROJECT SKETCHWARE 
      </title> 

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
  <link href="css/modal.css" rel="stylesheet">
 
   <link href="css/style.css" rel="stylesheet">
      <link href="css/sidenav.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
    	  <div class="overlay-nav">
            
        </div>
        
<div id="mySidenav" class="sidenav">
        <div class="navbar-sidebar">
       <i class="fa fa-angle-left"></i> 
       <a style="margin-left: -30px;" class="setting">Setting</a>
        </div>
        <br>
        <div class="profile-user">
        <img src="img/bgProfile.png">  
        <b id="nameUser">Gusion</b>
        </div>
        <br>
        <br>
        <div class="navbar-sidebar">
       <i class="fa fa-key"></i> 
       <a class="setting">Account</a>
        </div>
        <br>
      <div class="navbar-sidebar" id="myBtn">
       <i class="fa fa-file"></i> 
       <a class="setting">myProject</a>
        </div>
        <br>
        <div class="navbar-sidebar">
       <i class="fa fa-bell"></i> 
       <a class="setting">Notification</a>
        </div>
        <br>
      <div class="navbar-sidebar">
       <i class="fa fa-database"></i> 
       <a class="setting">Data and Storage</a>
        </div>
        <br>
    <div class="divider">
        
    </div>
    <br>
    <br>
         <div class="navbar-sidebar">
       <i class="fa fa-group"></i> 
       <a class="setting">Invite a friend</a>
        </div> 
    <div class="kosong">
        
    </div>
         <div onclick="logout()" class="navbar-sidebar-footer">
       <i class="fa fa-arrow-left"></i> 
       <a class="setting" href="from/config/Control.php?logout">Log Out</a>
        </div> 
    
 </div>
        
    <div class="container">
  <div class="header">
   <div class="overlayjut">
<div class="bar">
  <div class="logo">
    <p>BlogLife</p>
  </div>
  <div class="button-bar">
    <button id="btnLogin" onclick="login()">LOGIN</button>
    <button>FORUM</button>
 <button id="bar-icon">

      <i class="fa fa-bars w3-bar-item btn btn-two"  onclick="openNav()"></i>  
 </button>
 
 </div>
</div>

<div class="text">
	<h2>Hello!! Welcome Back to BlogLife</h2>
	<p>Sketchware free All project </p>
	<button style="background-color: #5000D5;
	color: white;
	padding: 4px 8px;
	text-align: center;
	font-size: 16px;
	border-radius: 8px;">Get Now</button>
</div>

</div><!--OVERLAY BAR-->   
   </div><!--HEADER-->
   <div class="content">
   	<div class="text-content">
   		<h3>Download All project FrondEnd, Backend, Free  </h3>
   		<p>Colaborator All Master developer sketchware</p>
   	</div>
   	<div class="class">
   		
   	<div class="class-item">
   	<div class="icon1">
   	 <i class="fa fa-upload"></i> Upload
   	</div>
   	<h3>New Feature</h3>
   	<p>upload your project </p>
   	</div>
   	   	<div class="class-item">
   	   	<div class="icon2">
   	 <i class="fa fa-user"></i> Inspiration
   	</div>	
   	   	<h3>Get Now</h3>
   	<p>get strong support your skil </p>

   	</div>
   	<div class="class-item">
   	<div class="icon3">
   	 <i class="fa fa-download"></i> Download
   	</div>
   	   	   	<h3>Get Now</h3>
   	<p>Download now all project</p>
   	</div>
   	</div>
   <div class="main">
     <h3>New Project</h3>
     <div id="container-project">

  <div id="flex-scroll">
   <?php
$project = new Project();
$newProjects = $project->displayProjects();
?>
  </div>
</div> 
        <h3>Ui Ux</h3>
   
 <div id="container-project">

  <div id="flex-scroll">
   <?php
$show = new Project();
$show->showProject('ui ux');
?>
  </div>
</div>
     <h3>Education</h3>
 <div id="container-project">
  <div id="flex-scroll">
   <?php
$show = new Project();
$show->showProject('edukasi');
?>
  </div>
</div>


</div>
   	   </div><!--CONTENT-->

  <!-- footer area -->
  <footer class="footer-container">
    <div class="newsletter">
      <span>Subscribe</span><div class="email"><input type="email" placeholder="Your email"><i class="fa fa-paper-plane"></i></div>
    </div>
    <div class="social-links">
      <div class="link"><a href="#"><i class="fa fa-facebook"></i></a></div>
      <div class="link"><a href="#"><i class="fa fa-instagram"></i></a></div>
      <div class="link"><a href="#"><i class="fa fa-twitter"></i></a></div>
    </div>
    <div class="copyright">
      <p>&copy; Copyright, 2023 - UsroDevElite</p>
    </div>
  </footer>
</div>



<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Upload Project</h2>
    </div>
    <div class="modal-body-bottomsheet">
<div class="grid-container-bottomsheet">
  <?php
  include "config/selectFile.php";
  $select = new FileDir();
    // direktori yang ingin ditampilkan filenya
 $select->showFile();
  ?>

  </div>

</div>

</div>
    <div class="modal-footer">
</div>
  </div>

</div>



    </div><!--CONTAINER-->
        <script src="js/app.js"></script>
 
   </body>
</html>