<?php
if(!isset($_COOKIE['user'])){
  echo"<script>
  window.location.replace('login.html'); 
  </script>";
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
     <title>
      SketchLaskar Design   
     </title>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link rel="stylesheet" href="../assets/css/index.css"/>
      <meta name="theme-color" content="#2196F3" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
      <meta name="author" content="Usro Jaya"/>
      <meta name="description" content="web upload project sketchware"/>
  </head>
    <body>
                        <div class="overlay">
            
        </div>
   
    <div id="mySidenav" class="sidenav">
        <div class="navbar-sidebar">
       <i class="fa fa-angle-left"></i> 
       <a class="setting">Setting</a>
        </div>
        <div class="profile-user">
        <img src="img/bjorka.jpeg">  
        <b>Gusion</b>
        </div>
        <div class="navbar-sidebar">
       <i class="fa fa-key"></i> 
       <a class="setting">Account</a>
        </div>
      <div class="navbar-sidebar">
       <i class="fa fa-comment"></i> 
       <a class="setting">Chats</a>
        </div>
        <div class="navbar-sidebar">
       <i class="fa fa-bell"></i> 
       <a class="setting">Notification</a>
        </div>
      <div class="navbar-sidebar">
       <i class="fa fa-database"></i> 
       <a class="setting">Data and Storage</a>
        </div>
        
    <div class="divider">
        
    </div>
    
         <div class="navbar-sidebar">
       <i class="fa fa-group"></i> 
       <a class="setting">Invite a friend</a>
        </div> 
    <div class="kosong">
        
    </div>
         <div class="navbar-sidebar-footer">
       <i class="fa fa-arrow-left"></i> 
       <a class="setting">Log Out</a>
        </div> 
    
 </div>


           <div class="container_login">
              
<div class="navbar">
  <div class="logo">
  <i class="fa fa-bars" onclick="openNav()"></i>  <!-- elemen logo -->
  </div>
          
          <div class="input-box">
        		<div class="chat-input">
		<input type="search" id="input-text" placeholder="Search..."></input>
		</div>
       </div>
  <div class="menu-button">
  <i class="fa fa-search"></i>  <!-- tombol menu -->
  </div>
</div>       

               </div>
           <div class="from_container">
              <div class="con_img">
              <!--  <img src="../assets/img/unggah.avif">
              --></div>
              <?php
              for($i = 0; $i<5; $i++){
              ?>
       <div class="con_text">
           <div class="title">
         <?php echo "<h2> project $i </h2>"; ?>   
             
           </div>
     
<div class="grid-container">
    
  <div class="grid-item">
      <img src="../assets/img/css.jpg">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div>
  <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
   </div>
    </div>
    
  <div class="grid-item">
      <img src="../assets/img/javascript.png">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div> 
  
  <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
 
    </div>
    </div>
    
      <div class="grid-item">
      <img src="../assets/img/html.jpg">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div>
    <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
  
    </div>
    </div>
    
  <div class="grid-item">
      <img src="../assets/img/php.jpg">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div> 
  <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
 
    </div>
    </div>
    
      <div class="grid-item">
      <img src="../assets/img/css.jpg">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div> 
  <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
 
    </div>
    </div>
    
  <div class="grid-item">
      <img src="../assets/img/javascript.png">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div>
      <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
 
    </div>
    </div>

      <div class="grid-item">
      <img src="../assets/img/html.jpg">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div> 
      <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
 
    </div>
    </div>
    
  <div class="grid-item">
      <img src="../assets/img/php.jpg">
    <div class="container-download">
  <div class="description">
<b>Databse sql</b> 
<b class="size">Size 34kb</b>
  </div> 
  
      <div class="like">
     <i class="fa fa-thumbs-up"></i>  
     <b>189k</b>
  </div>
  <div class="comment">
      <i class="fa fa-comment"></i>   
    <b>80k</b>
  </div>
  <div class="unduh">
       <i class="fa fa-download"></i>
 <b>800k</b>
 </div>
    </div>
    </div>
</div><!--AND GRID-->
<?php
}
?>
    
     </div> <!--AND container_login-->
           <script>
const overlay = document.querySelector(".overlay");


/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  overlay.style.display="block";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
overlay.style.display="none";
    
}
overlay.addEventListener("click", () =>{
    closeNav();
});

        </script> 
    </body>
</html>