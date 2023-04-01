<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


include_once"Connect.php";
include_once"../alert/alert.php";


//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

class Database
{
  private $cookie;
  private $conn;
  private $media ="<meta name='viewport' content='width=device-width, initial-scale=1'/>";
   private $swite ="
<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
private $sendMail;
    public function __construct()
    {
        $connection = new Connect();
        $this->conn = $connection->getConnection();
$this->sendMail = new PHPMailer(true);
    }

public function cookie($nama){
ob_start();
 $cek = setcookie("user", $nama, time() + (86400 * 30), "/");
 ob_end_flush();
 return $cek;
}
public function tokencookie($token){
 $cek = setcookie("token", $token, time() + (86400 * 30), "/");
 return $token;  
}
public function deleteCookie(){
  ob_start();
    setcookie('user', '', time() - 3600, '/');
    ob_end_flush();
}

private function generate_user_id($username) {
    // Menambahkan tanggal dan waktu pendaftaran
    $timestamp = time();

    // Menggabungkan nama pengguna dan tanggal/waktu pendaftaran
    $user_id = $username . "_" . $timestamp;

    // Mengemas user_id dengan SHA-1
    $user_id = sha1($user_id);

    // Memotong user_id menjadi 8 karakter pertama
    $user_id = substr($user_id, 0, 8);

    return $user_id;
}




public function register($reg)
{
    try {
        // Menangkap input yang diterima oleh parameter $reg
        $nama = $reg['nama'];
        $email = $reg['email'];
        $password =$reg['password'];
        $reset_token = "";
        $reset_at = "";
        // Enkripsi password dengan hash
        $password_encript = password_hash($password, PASSWORD_BCRYPT);
        $uPassword = $reg['Upassword'];
$user_id = $this->generate_user_id($nama); // asumsikan $this merujuk pada objek kelas yang memiliki method generate_user_id()
$GLOBALS['id'] = $user_id; // asumsikan variabel global 'id' telah didefinisikan sebelumnya
     // Deteksi input tidak boleh kosong
        if (empty($nama)) {
            throw new Exception("Nama tidak boleh kosong");
        }elseif(empty($email)){
            throw new Exception("Email tidak boleh kosong");
        }elseif(empty($password)) {
            throw new Exception("Password tidak boleh kosong");
        }elseif(empty($uPassword)) {
            throw new Exception("Ulangi password");
        }
        
             // Cek apakah password sudah sesuai
    if ($password != $uPassword) {
        //tampilkan pringatan ketika user sudah teregister
$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'error', 'Password', 'ulangi password tidak sesuai');
        exit;
    }
          
 
         
           // Cek user di database
            $query_cek = "SELECT * FROM users WHERE email = ? ";
            $stm = $this->conn->prepare($query_cek);
            $stm->bindParam('1', $email);
            $stm->execute();
            $cek = $stm->fetchAll();
    
           if($cek){
$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'exist', 'Exist', 'Email sudah terdaftar');
 return false;
          exit;
               
           }
           
         
      $id = $this->generate_user_id($nama);

 $resetToken = bin2hex(random_bytes(16));
 $resetAt = date("Y-m-d H:i:s");
              
          //kunci pesan 
         
// setting kunci enkripsi simetris
//$key = $resetToken;

// mengambil data input dari form
//$plaintext = $_POST["plaintext"];
//$recipient_public_key = $_POST["recipient_public_key"];

// mengenkripsi pesan menggunakan kunci enkripsi simetris
//$ciphertext = openssl_encrypt($nama, "AES-128-ECB", $key);

// mengirim pesan yang telah dienkripsi melalui API
//$response = $this->sendMessageAPI($recipient_public_key, $ciphertext);

//$plaintext = openssl_decrypt($ciphertext, "AES-128-ECB", $key);
$ciphertext="";
$plaintext="";
           // Jika tidak ada di database, daftarkan baru
                $query = "INSERT INTO users (id, nama, email, password, reset_token, reset_at) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam('1', $id);
                $stmt->bindParam('2', $nama);
                $stmt->bindParam('3', $email);
                $stmt->bindParam('4', $password_encript);
                $stmt->bindParam('5', $ciphertext);
                $stmt->bindParam('6', $plaintext);
              
            
                if($stmt->execute()){
               $cek = $stmt->fetch();
     $nama = $cek['nama'];
$this->cookie($nama);

$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'success', 'Berhasil', 'Registration berhasil');
}
    } catch (PDOException $e) {
        echo "Registration failed: " . $e->getMessage();
        return false;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    
}
    public function login($login)
{


    try {
        $email = $login['email'];
        $password = $login['password'];

        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $cek = $stmt->fetch();
        
        if ($cek) {
          $nama = $cek['nama'];
            if (password_verify($password, $cek['password'])) {
$this->cookie($nama);
  $alert = new Alert();          
$alert->alertMessage($this->media, $this->swite, 'success_login', 'Success', 'Login berhasil');

          } else {
$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'error', 'Gagal', 'Password salah');

            }
        } else {
$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'error', 'Gagal', 'Email Belum terdaftar');
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



public function forgot($email)
{
    try {
   $query = "SELECT * FROM users WHERE email = :email";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':email', $email['email']);
$stmt->execute();
$user = $stmt->fetch();
if ($user) {
  // Generate a random token
  $resetToken = bin2hex(random_bytes(16));
  $resetAt = date("Y-m-d H:i:s");
  $query = "UPDATE users SET reset_Token = :resetToken, reset_at = :resetAt WHERE id = :id";
  $stmt = $this->conn->prepare($query);
  $stmt->bindParam(':resetToken', $resetToken);
  $stmt->bindParam(':resetAt', $resetAt);
  $stmt->bindParam(':id', $user['id']);
  $stmt->execute();
 $_SESSION['reset'] = $user['id'];
      
$this->sendMail->SMTPDebug = false;                               
$this->sendMail->isSMTP();                                   
$this->sendMail->Host = "smtp.gmail.com";

$this->sendMail->SMTPAuth = true;                            
$this->sendMail->Username = "sketchlaskar@gmail.com";

$this->sendMail->Password = "bmoxgsleatllkuci";                    
$this->sendMail->SMTPSecure = "tls";                           
$this->sendMail->Port = 587;                                   
$this->sendMail->From = "sketchlaskar@gmail.com";

$this->sendMail->FromName = "BlogLife Team";

$this->sendMail->addAddress($email['email'], $user['nama']);

$this->sendMail->isHTML(true);

$this->sendMail->Subject = $user['nama'];

$this->sendMail->Body = "<h2>Token Reset Password Anda Adalah: <h1 style='color: green;'> $resetToken </h1></h2>";

$this->sendMail->AltBody = "This is the plain text version of the email content";

 $this->sendMail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

$this->sendMail->send();
$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'success_sendmail', 'Terkirim', 'cek token yang di kirim ke email anda');

}else{
$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'errorToken', 'Gagal', 'Invalid data');
}
 
            
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function cekToken($token){
    
    // Validasi tipe data $token
    $id = $_SESSION['reset'];
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch();

    // Jika user ada
    if ($user) {
        if($user['reset_Token'] === $token['token']){
            // Durasi waktu expired token dalam detik
            $expired_duration = 60; // 2 menit

            // Ambil waktu saat ini
          $current_time = time();

            // Ambil waktu pembuatan token dari database
// Ambil waktu pembuatan token dari database
$reset_at = strtotime($user['reset_at']); // ubah format tanggal menjadi UNIX timestamp
            // Hitung selisih waktu antara waktu saat ini dan waktu pembuatan token dalam detik
            $time_diff = $current_time - $reset_at;

           // Jika selisih waktu melebihi durasi waktu expired token, token dianggap kadaluwarsa
            if ($time_diff > $expired_duration) {
                $alert = new Alert();
                $alert->alertMessage($this->media, $this->swite, 'token_failed', 'Gagal', 'Token salah atau sudah tidak berlaku');
            } else {
                // Token masih berlaku, lakukan proses aktivasi token
                // ... kode proses aktivasi token di sini ...
                $alert = new Alert();
                $alert->alertMessage($this->media, $this->swite, 'success_token', 'Berhasil', 'Token berhasil diotentikasi');
            }
        } else {
            $alert = new Alert();
            $alert->alertMessage($this->media, $this->swite, 'token_failed', 'Gagal', 'Token salah atau sudah tidak berlaku');
        }
    } else {
        $alert = new Alert();
        $alert->alertMessage($this->media, $this->swite, 'token_failed', 'Gagal', 'Kesalahan sistem');
    }
}


public function newPassword($id, $update){

$password = $update['newpassword'];
$uPassword = $update['newupassword'];

if($password == $uPassword){
  
 $password_encript = password_hash($password, PASSWORD_BCRYPT);
  
    
$query = "SELECT * FROM users WHERE id = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch();
  
if ($user) {
    
  $query = "UPDATE users SET password = :password WHERE id = :id";
  $stmt = $this->conn->prepare($query);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':password', $password_encript);
  $users = $stmt->fetch();

  if (!$stmt->execute()) {
    $error = $stmt->errorInfo();
    echo "Error executing query: " . $error[2];
} else{
    
// tampilkan alert berhasil
  $alert = new Alert();
  $alert->alertMessage($this->media, $this->swite, 'success_password', 'Berhasil','password berhasil di update');

    }

}else{
  $alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'token_failed', 'Gagal', 'id salah atau tidak terverifikasi');  
}

}else{
    
  
    $alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'token_failed', 'Gagal', 'password tidak sama');  
}
}


public function logout(){
    session_destroy();
    $this->deleteCookie();
$alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'logout', 'Logout', '');  

}

public function deleteUser($user = null) {
    if ($user === null) {
      // Menghapus semua user
      $sql = "DELETE FROM users";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    } else {
      // Menghapus user tertentu
      $sql = "DELETE FROM users WHERE name = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("s", $user);
      $stmt->execute();
    }
  }
  
 
  function sendMessageAPI($recipient_public_key, $ciphertext) {
  // kode untuk mengirim data melalui API
  // ...
  return $result;
}

//upload file
public function uploadFile($upload){
  try{
    if(isset($_COOKIE['user'])){
        $nama = $_COOKIE['user'];
        //cek id 
        $query = "SELECT * FROM users WHERE nama = :nama";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->execute();
        $user = $stmt->fetch();
     
        if ($user) {
          
  $files = $upload;
  $count = count($files['name']);  
  
  for($i = 0; $i < $count; $i++) {
    $fileName = $files['name'][$i];
    $fileTmpName = $files['tmp_name'][$i];
    $fileSize = $files['size'][$i];
    $fileType = $files['type'][$i];
  
              // ambil data dari form
          $basename = $fileName;
            $img_path = '2.png';
         $id = $this->generate_user_id($user['id']);
           $user_id = $user['id'];
            $description = "project bagus";
            $kategori = "ui ux";
            $created_at = null;
$filesize_kb = round($fileSize / 1024, 2);
$size = $filesize_kb . " KB";
            // lakukan upload file ke direktori tujuan
            $target_dir = "../../uploads/";
            $target_file = $target_dir . $basename;
            // lakukan upload file ke direktori tujuan
$target_dir = "../../uploads/";
$target_file = $target_dir . $basename;
if (move_uploaded_file($fileTmpName, $target_file)) {
    // Menambahkan data file ke dalam tabel projects
    $query = "INSERT INTO projects (id, id_user, title, description, kategori, created_at, size, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam('1', $id);
    $stmt->bindParam('2', $user_id);
    $stmt->bindParam('3', $basename);
    $stmt->bindParam('4', $description);
    $stmt->bindParam('5', $kategori);
    $stmt->bindParam('6', $created_at);
    $stmt->bindParam('7', $size);
    $stmt->bindParam('8', $img_path);
              
    // Eksekusi statement SQL untuk setiap file yang diunggah
    for($i = 0; $i < $count; $i++) {
        $basename = $files['name'][$i];
        $fileSize = $files['size'][$i];
        $filesize_kb = round($fileSize / 1024, 2);
        $size = $filesize_kb . " KB";

        if ($stmt->execute()) {
            $alert = new Alert();
            $alert->alertMessage($this->media, $this->swite, 'success', 'Berhasil', 'Upload berhasil');
            
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            return false;
        }
    }
} else {
    
                $alert = new Alert();
$alert->alertMessage($this->media, $this->swite, 'token_failed', 'Gagal', 'Anda belum login');  

            return false;
 
}

        }
    }
    }
  } catch (PDOException $e) {
        echo "Upload failed: " . $e->getMessage();
        return false;
    } catch (Exception $e) {
    echo $e->getMessage();
    return false;
 
}

}
}
?>