<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "Database.php";
include_once "../alert/alert.php";
$media ="<meta name='viewport' content='width=device-width, initial-scale=1'/>";
$swite ="
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

$bash = new Database();

if(isset($_POST['login'])){
 $bash->login($_POST);  
}
if(isset($_GET['aksi'])){
 $bash->logout();  
}
if(isset($_POST['register'])){
  $bash->register($_POST);  
}
if(isset($_POST['forgot'])){
$bash->forgot($_POST);  

}
if(isset($_POST['cektoken'])){
//$bash->cekToken($_POST);
$bash->cekToken($_POST);
}
if(isset($_POST['newpss'])){
    if(isset($_SESSION['reset'])){
        $id = $_SESSION['reset'];
//$bash->cekToken($_POST);
$bash->newPassword($id, $_POST);
}else{
      $alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'token_failed', 'Gagal', 'token salah atau tidak terverifikasi');  
}
}
if(isset($_GET['delet'])){
$bash->deleteUser();  

}
if(isset($_GET['logout'])){
	$bash->logout();
}
if(isset($_GET['token'])){
    $code = $_GET['token'];
$bash->tokencookie($code);  
}
if(isset($_GET['isLogin'])){
        $alert = new Alert();
$alert->alertMessage($media, $swite, 'isLogin', 'Sudah Login', '');  
}
if(isset($_FILES['fileUpload'])){
        if(isset($_COOKIE['user'])){
        $nama = $_COOKIE['user'];
        $alert = new Alert();
$alert->alertMessage($media, $swite, 'isLogin', 'Sudah Login', '');
}
  $bash->uploadFile($_FILES['fileUpload']);
 
  
}


?>