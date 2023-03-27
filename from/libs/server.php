<?php
namespace Login_full_project;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $db;
    private $con;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
       include"../../config/Connect.php";   
        $connection = new Connect();
        $this->conn = $connection->getConnection();
        
    
    }

    public function onOpen(ConnectionInterface $conn) {
        //  Add new client to list
        $this->clients->attach($conn);
        echo "New client connected: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $data) {
      // Mendapatkan data dari HTTP Request Body
     $data = json_decode(file_get_contents("php: input"));

   //   Escape special characters
     $id = mysqli_real_escape_string($this->conn, $data->id);
     $name = mysqli_real_escape_string($this->conn, $data->nama);
   $email = mysqli_real_escape_string($this->conn, $data->email);
     $password = mysqli_real_escape_string($this->conn, $data->password);
 $reset_token = mysqli_real_escape_string($this->conn, $data->reset_token);
 $reset_at = mysqli_real_escape_string($this->conn, $data->reset_at);
 

    //  Insert data ke database
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
  
        
        //  Broadcast message to all clients
       // foreach ($this->clients as $client) {
       //     if ($client !== $from) {
       //         $client->send(json_encode($msg));
    //        }
    //    }
//}
    public function onClose(ConnectionInterface $conn) {
       //   Remove client from list
        $this->clients->detach($conn);
        echo "Client disconnected: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
       //   Handle errors
        echo "An error occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

?>