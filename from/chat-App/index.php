<!DOCTYPE HTML>
<html>
    <head>
      <title>
        Chat app design  
      </title> 
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="theme-color" content="#333" />
      <meta name="author" content="UsroJaya" />
      <meta name="description" content="chat group" />
      <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
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
       <a href="../config/Control.php?logout" class="setting">Log Out</a>
        </div> 
    
 </div>

        <div class="container">
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

<div class="kategori">
               <ul>
                     <li>
                       <p class="active">
                           Messages
                       </p> 
                     </li>
                     <li>
                     Online
                     </li>
                     <li>
                         Group
                     </li>
                 </ul>   
          
            </div>
            <div class="online">
               <div class="title">
            <h5>Favorit Contact</h5>
                 
               </div>

                <div class="user-profil">
                    <div class="profil">
                      <ul>
                     <li>
                        <img src="img/bjorka.jpeg">
                        <p>Natalia</p>
                     </li>
                     <li>
                   <img src="img/bjorka.jpeg">
                 <p>gusion</p>
                   
                     </li>
                                          <li>
                        <img src="img/bjorka.jpeg">
                        <p>Alucard</p>
                     </li>
                     <li>
                   <img src="img/bjorka.jpeg">
                 <p>Hayabusa</p>
                   
                     </li>
                     <li>
                        <img src="img/bjorka.jpeg">
                        <p>Iritel</p>
                     </li>
                     <li>
                   <img src="img/bjorka.jpeg">
                 <p>franco</p>
                   
                     </li>
                                                 <li>
                        <img src="img/bjorka.jpeg">
                        <p>harley</p>
                     </li>
                     <li>
                   <img src="img/bjorka.jpeg">
                 <p>hanabi</p>
                   
                     </li>
                     <li>
                        <img src="img/bjorka.jpeg">
                        <p>odete</p>
                     </li>
                     <li>
                   <img src="img/bjorka.jpeg">
                 <p>gatot kaca</p>
                   
                     </li>
       
                 </ul>   
        
                    </div>
           </div>
              <div class="chat">
             <ul>
                     <li>
                   <img src="img/bjorka.jpeg">
                   <div class="chat-name">
                       <p>gusion</p>
                 <b>halo guuys test chat app</b>
                   
                   </div>
                <div class="time">
                    <p>12:31</p>
                    <b class="notif">
                        <b>2</b>
                    </b>
                </div>   
                     </li>
                                        
                  <li>
                   <img src="img/bjorka.jpeg">
                   <div class="chat-name">
                       <p>odete</p>
                 <b>Halo bro test chat app </b>
                   
                   </div>
                                   <div class="time">
                    <p>12:31</p>
                    <b class="notif">
                        <b>6</b>
                    </b>
                </div>   
          
                     </li>
             </ul>     
              </div>  
            </div>
        </div>
        <script>
const chats = document.querySelectorAll(".chat-name");
const overlay = document.querySelector(".overlay");
const search = document.querySelector(".fa-search");
const input = document.getElementById("input-text");
chats.forEach(chat => {
  chat.addEventListener("click", () => {
    window.location.href = "chat.html";
  });
});

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
search.addEventListener("click", () =>{
 input.style.display="block";   
});
        </script>
    </body>
</html>