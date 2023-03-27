<?php
if(!isset($_COOKIE['user'])){
  echo"<script>
    window.location.replace('../viee/login.html'); 
  </script>";
}
?>
<!DOCTYPE HTML>
<html>
    <head>
      <title>
        Chat app design  
      </title> 
   <meta name="viewport" content="width=device_width, initial_scale=1, maximum_scale=1, user_scalable=no">    <meta name="theme_color" content="#333" />
      <meta name="author" content="UsroJaya" />
      <meta name="description" content="chat group" />
      <link rel="stylesheet" href="stylechat.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font_awesome/4.7.0/css/font_awesome.min.css"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
                <div class="overlay">
            
        </div>
   
    <div id="mySidenav" class="sidenav">
        <div class="navbar_sidebar">
       <i class="fa fa_angle_left"></i> 
       <a class="setting">Setting</a>
        </div>
        <div class="profile_user">
        <img src="img/bjorka.jpeg">  
        <b>Gusion</b>
        </div>
        <div class="navbar_sidebar">
       <i class="fa fa_key"></i> 
       <a class="setting">Account</a>
        </div>
      <div class="navbar_sidebar">
       <i class="fa fa_comment"></i> 
       <a class="setting">Chats</a>
        </div>
        <div class="navbar_sidebar">
       <i class="fa fa_bell"></i> 
       <a class="setting">Notification</a>
        </div>
      <div class="navbar_sidebar">
       <i class="fa fa_database"></i> 
       <a class="setting">Data and Storage</a>
        </div>
        
    <div class="divider">
        
    </div>
    
         <div class="navbar_sidebar">
       <i class="fa fa_group"></i> 
       <a class="setting">Invite a friend</a>
        </div> 
    <div class="kosong">
        
    </div>
         <div class="navbar_sidebar_footer">
       <i class="fa fa_arrow_left"></i> 
       <a class="setting">Log Out</a>
        </div> 
    
 </div>


<!__ Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page __>
<div class="container">
    <div class="navbar">
  <div class="logo">
  <i class="fa fa_angle_left"></i>  <!__ elemen logo __>
  </div>

      
     
    <div class="nav_links">
  </div>

  <div class="menu_button">
  <i class="fa fa_ellipsis_v" onclick="openNav()"></i>  <!__ tombol menu __>
  </div>

    </div>
    <div class="content">
     <div class="name">
         <b>gusion</b>
         <p>5 menit yang lalu</p>
     </div> 
     <div class="chat_body">
<div class="chat_container">
  <div class="chat_message right">Pesan dari saya<div class="status">
        <p>12:20</p>
      <i class="fas fa_check_double"></i>
  </div>
  </div>
  <div class="chat_message left">balasan dari teman<div class="status">
        <p>12:23</p>
     
  </div>

  </div>
  <div class="chat_message right">Pesan lagi dari saya
    <div class="status">
        <p>12:26</p>
      <i class="fas fa_check_double"></i>
  </div>
  </div>
  <div class="chat_message left">Balasan lagi dari teman
      <div class="status">
        <p>12:29</p>
     
  </div></div>
</div>

	<div class="footer_chat">
		<div class="chat_input">
		<textarea id="input_text" placeholder="message here..."></textarea>
		</div>
		<div class="send">
			<div class="icon_send">
			<i class="fa fa_send"></i>
		</div>	    
		</div>

	</div>
</div>
	<script>
		// get the input element
		const inputText = document.getElementById("input_text");
const sendButton = document.querySelector(".icon_send");
const overlay = document.querySelector(".overlay");
	
		// adjust the height of the input element based on its content
		function adjustInputHeight() {
inputText.addEventListener('input', () => {
  inputText.rows = inputText.value.split('\n').length;
  inputText.style.paddingBottom="10px";
    
});
	}
	
	// add an event listener to the input element to adjust its height when the user types
		inputText.addEventListener("input", adjustInputHeight);

		// add an event listener to the input element to reset its height when the Enter key is pressed
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