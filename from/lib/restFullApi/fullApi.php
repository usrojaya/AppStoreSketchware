<?php

class Data {
      
    private $conn;
    private $table_name = "users";

     
    public function __construct() {
        include"../../config/Connect.php";   
        $connection = new Connect();
        $this->conn = $connection->getConnection();
        $this->table_name = "users";
    }

    public function getAllData() {
      $query = "SELECT * FROM " . $this->table_name;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }


}

  //  File api.php
  $data = new Data();
  
  $response = array();

 // Mendapatkan request method
  $method = $_SERVER['REQUEST_METHOD'];

   //Handle request method GET
   if ($method == 'GET') {
     $stmt = $data->getAllData();
     $num = $stmt->rowCount();
     if ($num > 0) {
       $response["data"] = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         extract($row);
         $data = array(
           "id" => $id,
            "nama" => $name,
           "email" => $email,
         "password" => $password,
           "reset_token" => $reset_token,
           "reset_at" => $reset_at       );
         array_push($response["data"], $data);
       }
       $response["status"] = 1;
       $response["message"] = "Data berhasil ditemukan.";
     } else {
       $response["status"] = 0;
    $response["message"] = "Data tidak ditemukan.";
   
 }


 // Handle request method POST
  if ($method == 'POST') {

  //    Mendapatkan data dari HTTP Request Body
     $data = json_decode(file_get_contents("php: input"));

   //   Escape special characters
     $id = mysqli_real_escape_string($con, $data->id);
     $name = mysqli_real_escape_string($con, $data->nama);
   $email = mysqli_real_escape_string($con, $data->email);
     $password = mysqli_real_escape_string($con, $data->password);
 $reset_token = mysqli_real_escape_string($con, $data->reset_token);
 $reset_at = mysqli_real_escape_string($con, $data->reset_at);
 

   //   Insert data ke database
     $sql = "INSERT INTO users (id, nama, email, password) VALUES ('$id', '$name', '$email', '$password', '$reset_Token', '$reset_at')";
     if (mysqli_query($con, $sql)) {
       $response = array(
         "status" => 1,
         "message" => "Data berhasil disimpan."
       );
       } else
           {
     $response = array(
         "status" => 0,
         "message" => "Gagal menyimpan data."
       );
     }
   }
  

 // Handle request method DELETE
  if ($method == 'DELETE') {
  //    Mendapatkan data dari HTTP Request Body
    $data = json_decode(file_get_contents("php: input"));

   //   Escape special characters
$id = mysqli_real_escape_string($con, $data->id);
$name = mysqli_real_escape_string($con, $data->name);
$email = mysqli_real_escape_string($con, $data->email);

  //    Delete data dari database
    $sql = "DELETE FROM data WHERE id=$id";
    if (mysqli_query($con, $sql)) {
      $response = array(
        "status" => 1,
        "message" => "Data berhasil dihapus."
      );
    } else {
      $response = array(
        "status" => 0,
        "message" => "Gagal menghapus data."
      );
    }
  }

  //  Return response dalam format JSON
  header('Content-Type: application/json');
  echo json_encode($response);
   }