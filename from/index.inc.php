<?php
if(isset($_COOKIE['user'])){
    header("Location: ../index.php");
}else{
    header("Location: login.html");
}
?>