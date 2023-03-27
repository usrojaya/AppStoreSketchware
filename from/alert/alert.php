<?php
class Alert{
public function Interface($media, $swite, $respon, $text, $message, $confirmButton, $icon, $location, $cek, $cancle){
    echo"$media <br> $swite";
    
    if($cek){
 echo "
<script>
        Swal.fire({
          title: '$text',
          text: '$message',
          icon: '$icon',
          confirmButtonText: '$confirmButton',
          cancelButtonText: 'Back',
  showCancelButton: $cancle,
        }).then((result) => {
  if (result.value) {
window.location.replace('$location'); 
}  
 });
      </script>
     ";
     
   }  else{
   echo "
<script>
        Swal.fire({
          title: '$text',
          text: '$message',
          icon: '$icon',
          cancleButtonText: '$confirmButton'
        }).then((result) => {
  if (result.value) {
window.location.replace('$location'); 
}  
 });
      </script>
     ";  	
     }
}

 public function alertMessage($media, $swite, $respon, $text, $message){
        switch($respon){
     case 'success':
            	
         $this->Interface($media, $swite, $respon, $text, $message, "Login","success", "../view/login.html",true, false);	
                break;
        case 'isLogin': 
       $this->Interface($media, $swite, $respon, $text, $message, "Back","success", "../../index.php",false, true);	
       echo"
<script>
window.onclick = function(){
 window.history.go(-); 
}  
</script>";
          break;
                
     case 'success_login':
     	
         echo"$media <br> $swite";
 
 echo "
    <script>
window.location.replace('../../index.php'); 
      </script>
     ";
                break;

     case 'exist':
     	
        $this->Interface($media, $swite, $respon, $text, $message, "Login", "warning", "../login.html",false, false);	
  
                break;
     case 'not_exist':
        $this->Interface($media, $swite, $respon, $text, $message, "Not Exist", "warning", "../chat-app/index.php",false, false);	
  
              break;
    case 'error':
        $this->Interface($media, $swite, $respon, $text, $message, "Error", "warning", "forgot.html",false, false);	
 
        break;
            case 'errorToken':
              
        $this->Interface($media, $swite, $respon, $text, $message, "Error", "warning", "../forgot.html",false, false);	
 
        break;
           
            case 'success_token':
     echo"$media <br> $swite";
 
 echo "
    <script>
window.location.replace('../view/newPassword.html'); 
      </script>
     ";
        break;        
   
         case 'success_sendmail':
    echo"$media <br> $swite";
 
 echo "
    <script>
window.location.replace('../view/token.html'); 
      </script>
     ";
        break;        
              case 'token_failed':
    echo"$media <br> $swite";
 
 echo "
    <script>
        Swal.fire({
          title: '$text',
          text: '$message',
          icon: 'warning',
          confirmButtonText: 'Ok'
        });
      </script>
     ";
        break;
    case 'success_password':
     echo"$media <br> $swite";
 
  echo "
    <script>
window.location.replace('../view/home.php'); 
      </script>
     ";
              break;
        
                      case 'logout':
    echo"$media <br> $swite";
 echo "
<script>
        Swal.fire({
  title: '$text',
  text: '$message',
  icon: 'success',
  confirmButtonText: 'Login',
  cancelButtonText: 'Back',
  showCancelButton: true,
}).then((result) => {
  if (result.isConfirmed) {
    window.location.replace('../login.html');
  } else {
  if (result.isDenied) {
    // Jika ingin mengubah teks pada deny button, bisa menggunakan result.dismiss
    window.location.replace('http://localhost:8080');

  }else{
  window.location.replace('http://localhost:8080');

  }
  }
});

      </script>
     ";
                break;      
            default;
                break;
        }
    }
}
?>